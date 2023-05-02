<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombreyapellido = $_POST["nombreyapellido"];
  $email = $_POST["email"];
  $telefono = $_POST["telefono"];
  $nrodematricula = $_POST["nrodematricula"];
  $profesion = $_POST["profesion"];

  // Configura el destinatario, asunto y contenido del correo
  $destinatario = "munay.mym@gmail.com";
  $asunto = "Formulario de contacto";
  $contenido = "Nombre: " . $nombre . "\r\n";
  $contenido .= "Email: " . $email . "\r\n";
  $contenido .= "Telefono: " . $telefono . "\r\n";
  $contenido .= "Numero de Matricula: " . $nrodematricula . "\r\n";
  $contenido .= "Profesion: " . $profesion . "\r\n";

  // Agrega otros campos al contenido del correo si los tienes

  // Envía el correo
  if (mail($destinatario, $asunto, $contenido)) {
    echo "El formulario ha sido enviado correctamente.";
  } else {
    echo "Ha ocurrido un error al enviar el formulario.";
  }
}

?>
