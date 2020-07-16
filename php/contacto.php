<?php
 
 require("class.phpmailer.php");
 require("class.smtp.php");
 
 if ($_POST) {
     
     $destino  = "armandomm@live.com.mx";
     $name     = @trim(stripslashes($_POST['nempresa']));
     $email    = @trim(stripslashes($_POST['email']));
     $telefono = @trim(stripslashes($_POST['tel']));
     $servicio    = @trim(stripslashes($_POST['servicio']));
     $terminos    = @trim(stripslashes($_POST['terminos']));
     $mensaje  = @trim(stripslashes($_POST['mensaje']));
     
     // Datos de la cuenta de correo utilizada para enviar vía SMTP
     $smtpHost    = "mail.ammdesigns.com.mx"; // Dominio alternativo brindado en el email de alta 
     $smtpUsuario = "amatias@ammdesigns.com.mx"; // Mi cuenta de correo
     $smtpClave   = "Amatias24"; // Mi contraseña
     
     $mail = new PHPMailer();
     $mail->IsSMTP();
     $mail->SMTPAuth = true;
     $mail->Port     = 587;
     $mail->IsHTML(true);
     $mail->CharSet = "utf-8";
     
     // VALORES A MODIFICAR //
     $mail->Host     = $smtpHost;
     $mail->Username = $smtpUsuario;
     $mail->Password = $smtpClave;
     
     $mail->From     = $email; // Email desde donde envío el correo.
     $mail->FromName = $name;
     $mail->AddAddress($destino); // Esta es la dirección a donde enviamos los datos del formulario
     
     $mail->Subject = "Contacto desde la web"; // Este es el titulo del email.
     $mensajeHtml   = nl2br($mensaje);
     
     $mail->Body    = "
<html> 

<body> 

<h1>Recibiste una nueva consulta desde el formulario de la página web</h1>

<p>Información enviada por el usuario de la web:</p>

<p>Empresa: {$name}</p>

<p>email: {$email}</p>

<p>telefono: {$telefono}</p>

<p>Servicio requerido: {$servicio}</p>

<p>Acepta terminos: {$terminos}</p>

<p>mensaje: {$mensaje}</p>

</body> 

</html>

<br />"; 
// Texto del email en formato HTML
     $mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
     // FIN - VALORES A MODIFICAR // 
     
     
     $mail->SMTPOptions = array(
         'ssl' => array(
             'verify_peer' => false,
             'verify_peer_name' => false,
             'allow_self_signed' => true
         )
     );
     
     $estadoEnvio = $mail->Send();
     if ($estadoEnvio) {
         echo "<script language='javascript'>
  alert('Mensaje enviado, muchas gracias.');
  window.location.href = 'http://4punto0.mx/formulario/';
  </script>";
     } else {
         echo 'Falló el envio';
     }
 } else {
     echo 'no hay datos';
     exit();
     
     
 }
?>