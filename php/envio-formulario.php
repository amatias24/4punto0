<?php

$destino="chucho970407@gmail.com";
$desde="From: 4punto0.mx";
$asunto="Solicitud";
$mensaje="
    Nombre: $_POST[nombre] 
    Correo: $_POST[email]
    Actividades: $_POST[actividades]
    Logo: $_POST[logo]
    Sector de Edad: $_POST[sectoredad]
    Slogan: $_POST[slogan]";
mail($destino,$asunto,$mensaje,$desde);

?>