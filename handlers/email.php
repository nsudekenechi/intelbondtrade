<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

function sendEmail($to, $subject, $emailFile, $search, $replace)
{

    $mail = new PHPMailer(true);

    try {
        $senderemail = $_ENV["SENDER_EMAIL"];
        $senderpassword = $_ENV["SENDER_PASSWORD"];
        $senderFrom = "Intelbondtrade";
        $body = file_get_contents($emailFile);
        $body = str_replace($search, $replace, $body);
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com;';
        $mail->SMTPAuth = true;
        $mail->Username = $senderemail;
        $mail->Password = $senderpassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('Intelbondtrade@support.com', $senderFrom);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}