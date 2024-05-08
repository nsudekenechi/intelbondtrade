<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require_once ("../db/db_connect.php");

$dotenv = Dotenv\Dotenv::createImmutable('../');
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

if (isset($_GET["verify_deposit"])) {
    $id = $_GET["verify_deposit"];
    $query = "SELECT deposits.amount, deposits.user,users.username,users.email  FROM deposits JOIN users ON deposits.user=users.id WHERE deposits.id = '$id'";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();
    $amount = $row['amount'];
    $user = $row['user'];
    $username = $row["username"];
    $email = $row["email"];
    // Updating users account
    $query = "UPDATE users SET balance = balance + $amount, invested = invested + $amount WHERE id='$user'";
    $res = mysqli_query($conn, $query);
    // Verifying deposit
    $query = "UPDATE deposits SET verified = true WHERE id = '$id'";
    $res = mysqli_query($conn, $query);
    // Checking if user was reffered so we add 10% to the user who referred him
    $query = "SELECT  user FROM referrals WHERE ref_user='$user' AND ref_earned  = 0";
    $res = mysqli_query($conn, $query);

    if ($res->num_rows > 0) {
        $profit = $amount * (10 / 100);
        $referrer = $res->fetch_column();
        $query = "UPDATE users SET balance = balance + $profit WHERE id='$referrer'";
        $res = mysqli_query($conn, $query);

        $query = "UPDATE referrals  SET ref_earned = $profit WHERE ref_user='$user'";
        $res = mysqli_query($conn, $query);
    }
    // $query = "SELECT wallet.wallet_code,wallet.wallet_rate,deposits.amount FROM deposits JOIN wallet ON deposits.wallet=wallet.id WHERE deposits.id='$id'";
    // $res = mysqli_query($conn, $query);
    // $row = $res->fetch_assoc();
    // $amount = $row['amount'] * $row['wallet_rate'];
    // $amount = number_format($amount, intval($amount) == 0 ? 5 : 2) . " " . $row["wallet_code"];
    $amount = number_format($amount, 2);
    $msg = html_entity_decode("Your deposit of $$amount has been successfully processed and funds are now credited to your account. Thank you for investing with us.");
    $search = ["{type}", "{user}", "{body}", "{date}"];
    $replace = ["Deposit Request Verified", $username, $msg, date("Y")];
    $send = sendEmail($email, "Deposit Confirmed", "../email.html", $search, $replace);

    if ($send) {
        echo true;
    } else {
        echo false;
    }

}


if (isset($_GET["verify_withdraw"])) {
    $id = $_GET["verify_withdraw"];
    $query = "UPDATE withdrawal SET verified = true WHERE id = '$id' AND verified=false";
    $res = mysqli_query($conn, $query);
    if ($res) {
        $query = "SELECT users.email, users.username, withdrawal.amount, wallet.wallet_code,wallet.wallet_rate
        FROM withdrawal 
        JOIN users 
        ON withdrawal.user = users.id 
        JOIN wallet ON withdrawal.wallet_type = wallet.id
        WHERE withdrawal.id='$id'";
        $res = mysqli_query($conn, $query);
        $row = $res->fetch_assoc();
        $username = $row["username"];
        $email = $row["email"];
        $amount = $row['amount'] * $row['wallet_rate'];
        $walletType = $row["wallet_code"];
        $amount = number_format($amount, intval($amount) == 0 ? 5 : 2) . " " . $row["wallet_code"];
        $msg = html_entity_decode(" 
  Your withdrawal of $amount has been successfully processed and funds are now credited to your $walletType wallet. Thank you for choosing to invest with us.");
        $search = ["{type}", "{user}", "{body}", "{date}"];
        $replace = ["Withdrawal Request Verified", $username, $msg, date("Y")];
        $send = sendEmail($email, "Withdrawal Confirmed", "../email.html", $search, $replace);

        if ($send) {
            echo true;
        } else {
            echo false;
        }
    }

}

if (isset($_GET["suspend_user"])) {
    $user = $_GET["suspend_user"];
    $query = "UPDATE users SET suspend = !suspend WHERE id='$user'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        echo true;
    } else {
        echo false;
    }
}