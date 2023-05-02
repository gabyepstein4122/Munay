<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Valida que se haya enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Define los valores del formulario
  $nombreyapellido = $_POST['nombreyapellido'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $nromatricula = $_POST['nromatricula'];
  $profesion = $_POST['profesion'];

  // Carga la plantilla del correo electrónico
  $correo = file_get_contents('plantilla_correo.html');

  // Remplaza las variables en la plantilla con los valores del formulario
  $correo = str_replace('%nombre%', $nombreyapellido, $correo);
  $correo = str_replace('%email%', $email, $correo);
  $correo = str_replace('%telefono%', $telefono, $correo);
  $correo = str_replace('%nromatricula%', $nromatricula, $correo);
  $correo = str_replace('%profesion%', $profesion, $correo);

  // Crea una nueva instancia de PHPMailer
  $mail = new PHPMailer(true);

  try {
    // Configura los ajustes del servidor de correo electrónico
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'munay.mym@gmail.com'; // Reemplaza con tu dirección de correo electrónico
    $mail->Password = ''; // Reemplaza con tu contraseña de Gmail
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configura el correo electrónico
    $mail->setFrom('munay.mym@gmail.com', 'Equipo Munay'); // Reemplaza con tu dirección de correo electrónico y tu nombre o el nombre de tu empresa
    $mail->addAddress('destinatario@example.com', 'Destinatario'); // Reemplaza con la dirección de correo electrónico y el nombre del destinatario
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo formulario de solicitud de empleo';
    $mail->Body = $correo;

    // Envía el correo electrónico
    $mail->send();
    echo 'El formulario se ha enviado correctamente';
  } catch (Exception $e) {
    echo 'El formulario no se ha podido enviar. Error de correo electrónico: ', $mail->ErrorInfo;
  }
}
?>
