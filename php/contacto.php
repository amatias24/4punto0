<?php 
    if(isset($_POST['terminos'])) {
        // Llamando a los campos
        $nombre = $_POST['nempresa'];
        $correo = $_POST['email'];
        $telefono = $_POST['mov'];
        $serv = $_POST['servicio'];
        $mensaje = $_POST['mensaje'];
        $term = $_POST['terminos'];

        // Datos para el correo
        $destinatario = "amatias2401@gmail.com";
        $asunto = "Contacto desde nuestra web";

        $carta = "Nombre de la empresa: $nombre \n";
        $carta .= "Email de contacto: $correo \n";
        $carta .= "Movil: $telefono \n";
        $carta .= "Servicio de interes: $serv \n";
        $carta .= "Mensaje: $mensaje \n" ;
        $carta .= "Terminos: $term \n" ;
        $carta .= "SI Acepto términos y condiciones ";

        // Enviando Mensaje
        mail($destinatario, $asunto, $carta);

        // Mensaje enviado
        echo "<script>alert('Mensaje enviado, muchas gracias.');
        window.location.href = 'http://4punto0.mx/formulario/';</script>";
    } else {
        echo "<script>alert('Debe acertar las condiciones de uso y privacidad');
        location.href ='javascript:history.back()';</script>";
    }
?>