<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
try {
    $mail = new PHPMailer(true);
    $senderemail = $_ENV["SENDER_EMAIL"];
    $senderpassword = $_ENV["SENDER_PASSWORD"];
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'intelbondtrade.ltd';
    $mail->SMTPAuth = true;
    $mail->Username = $senderemail;
    $mail->Password = $senderpassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->SetFrom($senderemail, 'intelbondtrade.ltd');
    $mail->addAddress("nsudekenechi2@gmail.com");
    $mail->Subject = "Texting you...";
    $mail->Body = "Hello Jeff";
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    return true;

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}