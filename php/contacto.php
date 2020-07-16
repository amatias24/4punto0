<?php 
if(isset($_POST['submit'])){
    if(isset($_POST['terminos'])) {

        // Llamando a los campos
        $nombre = $_POST['nempresa'];
        $correo = $_POST['email'];
        $telefono = $_POST['mov'];
        $mensaje = $_POST['mensaje'];

        // Datos para el correo
        $destinatario = "amatias2401@gmail.com";
        $asunto = "Contacto desde nuestra web";

        $carta = "De: $nombre \n";
        $carta .= "Correo: $correo \n";
        $carta .= "Telefono: $telefono \n";
        $carta .= "Mensaje: $mensaje";

        // Enviando Mensaje
        mail($destinatario, $asunto, $carta);
        header('Location:index.html');
        } else {
        echo 'Debe acertar las condiciones de uso y privacidad';
    }
}
?>