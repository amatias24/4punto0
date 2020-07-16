<?php

/*$destino="chucho970407@gmail.com";
$desde="From:4punto0.mx";
$asunto="Solicitud";
*/

$mensaje="
    Nombre: $_POST[nombre] 
    Correo: $_POST[email]
    Actividades: $_POST[actividades]
    Logo: $_POST[logo]
    Sector de Edad: $_POST[sectoredad]
    Slogan: $_POST[slogan]
    Archivo: $_POST[file]";

    $email = $_POST['email'];
    $name = $_POST['nombre'];
    $subject = "Solicitud";
    $message = $mensaje;             
                   
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
                // Recipient
                $toEmail = 'chucho970407@gmail.com';
                // Sender
                $from = $email;
                $fromName = 'Encuesta 4punto0.mx';              
                // Subject
                $emailSubject = 'Formulario contestado por '.$name;              
                // Message 
                $htmlContent = '<h2>Respuestas Formulario</h2>
                    <p><b>Empresa:</b> '.$name.'</p>
                    <p><b>Email:</b> '.$email.'</p>
                    <p><b>Message:</b><br/>'.$message.'</p>';
                
                // Header for sender info
                $headers = "From: $fromName"." <".$from.">";

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";

        $uploadedFile = $target_file;
        echo "<br>".$uploadedFile;
            // Boundary 
            $semi_rand = md5(time()); 
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
            
            // Headers for attachment 
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
            
            // Multipart boundary 
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 
            
            // Preparing attachment
            if(is_file($uploadedFile)){
                $message .= "--{$mime_boundary}\n";
                $fp =    @fopen($uploadedFile,"rb");
                $data =  @fread($fp,filesize($uploadedFile));
                @fclose($fp);
                $data = chunk_split(base64_encode($data));
                $message .= "Content-Type: application/octet-stream; name=\"".basename($uploadedFile)."\"\n" . 
                "Content-Description: ".basename($uploadedFile)."\n" .
                "Content-Disposition: attachment;\n" . " filename=\"".basename($uploadedFile)."\"; size=".filesize($uploadedFile).";\n" . 
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
            }
            
            $message .= "--{$mime_boundary}--";
            $returnpath = "-f" . $email;
            echo 'aqui estamos bien';
            // Send email
            $mail = mail($toEmail, $emailSubject, $message, $headers, $returnpath);
            
            @unlink($uploadedFile);
            // Delete attachment file from the server
        
      } else {
            // Set content-type header for sending HTML email
           $headers .= "\r\n". "MIME-Version: 1.0";
           $headers .= "\r\n". "Content-type:text/html;charset=UTF-8";
           echo'fallo';
           // Send email
           $mail = mail($toEmail, $emailSubject, $htmlContent, $headers); 
       
      }    
            


                
            
?>