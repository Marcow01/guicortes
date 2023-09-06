<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'guicortes5500@gmail.com'; 
    $mail->Password = 'bqithtvlgucyktgw';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom($_POST["email"], $_POST["nome"], $_POST["tel"]);
    $mail->addAddress('guicortes5500@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'MENSAGEM';
    $mail->Body = "nome: {$_POST['nome']}<br>email: {$_POST['email']}<br>mensagem: {$_POST['mensagem']}<br>telefone: {$_POST["tel"]}";

    $mail->send();
    header('Location:../obrigado.html');
    exit();
} catch (Exception $e) {
    echo "erro ao enviar o email: " . $mail->ErrorInfo;
}

?>
