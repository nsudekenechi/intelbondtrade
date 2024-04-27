<?php
session_start();
require_once "../../db/db_connect.php";
require_once ("email.php");
$user = $_SESSION["user"];

// Depositing into user's account
if (isset($_POST["deposit"])) {
    extract($_POST);
    $startDate = date('d-M-Y h:i');
    $endDate = date('d-M-Y h:i', strtotime($days . 'days'));
    $query = "INSERT INTO deposits (amount,user,plan,wallet,start_date,end_date)  VALUES ('$amount', '$user', '$plan', '$selectedWallet', '$startDate', '$endDate')";
    $res = mysqli_query($conn, $query);
    if ($res) {
        $query = "SELECT id FROM deposits WHERE id = (SELECT MAX(id) FROM deposits)";
        $res = mysqli_query($conn, $query);
        $id = $res->fetch_column();
        header("Location: ../invest-form.php?plan=$plan&deposit=$id");
    } else {
        header("../myplan.php");
    }
}

if (isset($_POST["verify_deposit"])) {
    // Uploading payment proof
    extract($_FILES);
    extract($_POST);
    $from = $paymentProof["tmp_name"];
    $newFileName = "paymentProof" . $deposit_id . "." . pathinfo($paymentProof["name"], PATHINFO_EXTENSION);
    $to = "../images/paymentProof/" . $newFileName;
    if (move_uploaded_file($from, $to)) {
        $query = "UPDATE deposits SET payment_proof = '$newFileName' WHERE id = '$deposit_id'";
        $res = mysqli_query($conn, $query);
        if ($res) {
            // Getting deposit details
            $query = "SELECT deposits.amount, users.username, wallet.wallet_rate, wallet.wallet_symbol, wallet.wallet_code FROM deposits JOIN users ON deposits.user = users.id JOIN wallet ON deposits.wallet = wallet.id WHERE deposits.id='$deposit_id'";
            $res = mysqli_query($conn, $query);
            $row = $res->fetch_assoc();
            $username = $row["username"];
            $amount = $row['amount'] * $row['wallet_rate'];
            $amount = $row['wallet_symbol'] . number_format($amount, intval($amount) == 0 ? 5 : 2);
            $walletType = $row['wallet_code'];

            $msg = html_entity_decode(" <p style='margin-bottom: 10px;'> This is to inform you that $username deposited $amount into your $walletType wallet</p>  <p style='margin-bottom: 10px;'>Please verify deposit and confirm payment from your dashboard </p>");

            $query = "SELECT email,username FROM users WHERE admin = true";
            $res = mysqli_query($conn, $query);
            $row = $res->fetch_assoc();

            // sending email to user when 
            $send = sendEmail($row["email"], "Deposit Request", "../../admin/email.html", ["{request type}", "{name}", "{body}", "{date}"], ["Deposit", $row["username"], $msg, date("Y")]);

            if ($send) {
                header("Location: ../invest-form.php?plan=$plan&verified=s");
            }
        } else {
            header("Location: ../invest-form.php?plan=$plan&verified=f");
        }
    }
}

// Withdrawal
if (isset($_POST["withdrawal"])) {
    extract($_POST);
    $date = date("d-M-Y h:i A");
    $query = "INSERT INTO withdrawal (wallet_address, wallet_type, amount, user,date) VALUES ('$wallet_address',  '$wallet_type', '$amount', '$user', '$date')";
    $res = mysqli_query($conn, $query);

    $query = "UPDATE users SET balance = balance - '$amount', withdrawn = withdrawn +'$amount'  WHERE id = '$user'";
    $res = mysqli_query($conn, $query);

    $query = "SELECT users.username, withdrawal.amount, wallet.wallet_rate, wallet.wallet_symbol, wallet.wallet_code  FROM withdrawal JOIN users ON users.id = withdrawal.user JOIN wallet ON withdrawal.wallet_type = wallet.id WHERE withdrawal.id = (SELECT MAX(id) FROM withdrawal)";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();

    $username = $row["username"];
    $amount = $row['amount'] * $row['wallet_rate'];
    $amount = $row['wallet_symbol'] . number_format($amount, intval($amount) == 0 ? 5 : 2);
    $walletType = $row['wallet_code'];

    $msg = html_entity_decode(" <p style='margin-bottom: 10px;'> This is to inform you that $username wants to withdraw $amount to their $walletType wallet</p>  <p style='margin-bottom: 10px;'>Check your dashboard for more details about the withdrawal</p>");


    // sending email to admin
    $query = "SELECT email,username FROM users WHERE admin = true";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();

    $send = sendEmail($row["email"], "Withdrawal Request", "../../admin/email.html", ["{request type}", "{name}", "{body}", "{date}"], ["Withdrawal", $row["username"], $msg, date("Y")]);

    $query = "SELECT email,username FROM users WHERE id = '$user'";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();

    $msg = html_entity_decode(" <p style='margin-bottom: 10px;'> Thank you for your withdrawal request. We're processing it promptly. </p>  <p style='margin-bottom: 10px;'>You'll receive an email confirmation once the transaction is complete.</p>");

    $send = sendEmail($row["email"], " Withdrawal Request Confirmation", "../../admin/email.html", ["{request type}", "{name}", "{body}", "{date}"], ["Withdrawal", $row["username"], $msg, date("Y")]);

    // sending email to user
    if ($send) {
        header("Location: ../withdraw.php?withdraw=s");
    } else {
        header("Location: ../withdraw.php?withdraw=f");
    }



}


