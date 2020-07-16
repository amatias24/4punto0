<?php 
if(isset($_POST['submit'])){
    if(isset($_POST['terminos'])) {
        $to = "armandomm@live.com.mx"; // Tu email
        $name = $_POST['nempresa'];
        $email = $_POST['email'];
        $mov = $_POST['mov'];
        $subject = "Contacto desde la web";
        $message = $name . " escribió lo siguiente:" . "\n\n" . $_POST['message'];

        $headers = "From:" . $email;
        mail($to,$subject,$message,$headers);
        echo "Mensaje enviado. Gracias " . $name . ", me pondré en contacto lo antes posible.";
    } else {
        echo 'Debe acertar las condiciones de uso y privacidad';
    }
}
?>