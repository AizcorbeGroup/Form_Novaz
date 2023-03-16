<?php
// levanto datos del form
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];

// dominios restringidos
$dominios_restringidos = array("gmail.com", "yahoo.com", "outlook.com", "hotmail.com");

$dominio_destinatario = substr(strrchr($email, "@"), 1);

// verifico los correos
if (in_array($dominio_destinatario, $dominios_restringidos)) {
    
    // redirijo a pagina de error
    header("Location: error.html");

} else {

    // Envio el correo utilizando la función mail() de PHP
    $destinatario = "info@aizcorbe-group.com.ar";
    $asunto = "Mensaje de contacto form para novaz";
    $contenido = "Nombre: $nombre\nCorreo electrónico: $email\nMensaje:\n$mensaje";
    mail($destinatario, $asunto, $contenido);

    // redirijo a pagina de confirmacion.
    header("Location: confirmacion.html");

}
?>