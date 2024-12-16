<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'servidor';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

$bodycontent = '<h1>Lista de Usuarios</h1><ul>';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $bodycontent .= '<li>'.$row['nombre'].'</li>';
    }
} else{
    $bodycontent .= '<p>No hay usuarios en la base de datos</p>';
}

$bodycontent .= '</ul>';

$conn->close();

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp';
    $mail->Port = 1025;
    $mail -> SMTPAuth = false;

    //Recipients
    $mail->setFrom('hola@fuentezuelas.com', 'Hola');
    $mail->addAddress('ayuda@fuentezuelas.com', 'Ayuda');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'PHPMailer Test Subject';
    $mail->Body    = $bodycontent;

    $mail->send();
    echo 'Message has been sent';
}
catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
