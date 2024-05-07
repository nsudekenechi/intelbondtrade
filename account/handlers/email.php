<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('../../');
$dotenv->load();
function sendEmail($to, $subject, $emailFile, $search, $replace)
{


    try {
        $mail = new PHPMailer(true);

        $senderemail = $_ENV["SENDER_EMAIL"];
        $senderFrom = "Intelbondtrade";
        $senderpassword = $_ENV["SENDER_PASSWORD"];
        $body = file_get_contents($emailFile);
        $body = str_replace($search, $replace, $body);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'intelbondtrade.ltd';
        $mail->SMTPAuth = true;
        $mail->Username = $senderemail;
        $mail->Password = $senderpassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->setFrom($senderemail, $senderFrom);
        $mail->clearAddresses();
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