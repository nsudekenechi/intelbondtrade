<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$mail = new PHPMailer(true);

try {
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
    $mail->addAddress("princetalentd@gmail.com");
    $mail->Subject = "Confirmation of Deposit Request: $50.00 Received";
    $mail->Body = "Dear Alabah,

    I hope this message finds you well. We are writing to confirm that we have received your deposit request in the amount of $50.00.
    
    Our team is currently processing your request, and we will update your account accordingly once the deposit has been successfully verified.
    
    Should you have any questions or require further assistance, please feel free to reach out to our support team at admin@intelbondtrade.ltd.
    
    Thank you for choosing our service.";
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    return true;

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}