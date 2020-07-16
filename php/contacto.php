<?php 
    // Llamando a los campos
    $nombre = $_POST['nempresa'];
    $correo = $_POST['email'];
    $telefono = $_POST['mov'];
    $serv = $_POST['servicio'];
    $mensaje = $_POST['mensaje'];

    // Datos para el correo
    $destinatario = "amatias2401@gmail.com";
    $asunto = "Contacto desde nuestra web";

    $carta = "Nombre de la empresa: $nombre \n";
    $carta .= "Email de contacto: $correo \n";
    $carta .= "Movil: $telefono \n";
    $carta .= "Servicio de interes: $serv \n";
    $carta .= "Mensaje: $mensaje";
    $carta .= "SI Acepto términos y condiciones ";

    // Enviando Mensaje
    mail($destinatario, $asunto, $carta);
    header('Location:../index.html');
?>