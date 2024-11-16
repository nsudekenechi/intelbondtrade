<?php
session_start();
require_once "../../db/db_connect.php";
require_once("email.php");
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
            $query = "SELECT deposits.amount, users.fullname, wallet.wallet_rate, wallet.wallet_symbol, wallet.wallet_code FROM deposits JOIN users ON deposits.user = users.id JOIN wallet ON deposits.wallet = wallet.id WHERE deposits.id='$deposit_id'";
            $res = mysqli_query($conn, $query);
            $row = $res->fetch_assoc();
            $username = $row["username"];
            $fullname = $row["fullname"];
            $amount = $row['amount'] * $row['wallet_rate'];
            $amount = number_format($amount, intval($amount) == 0 ? 5 : 2);
            $walletType = $row['wallet_code'];

            // sending email to admin  
            $query = "SELECT id,email,username,admin FROM users WHERE admin = true OR id='$user'";
            $res = mysqli_query($conn, $query);
            $count = 0;
            while ($row = $res->fetch_assoc()) {
                // Message for user
                if ($row["admin"] != true) {
                    $msg = html_entity_decode(" <p style='margin-bottom: 10px;'>We have received your deposit request of $amount $walletType</p>
                    <p style='margin-bottom: 10px;'> Our team is currently processing your request, and we will update your account accordingly once the deposit has been successfully verified.</p>
                <p style='margin-bottom: 10px;'>  Should you have any questions or require further assistance, please feel free to reach out to our support team.</p>
              ");

                } else {
                    $msg = html_entity_decode("
                    <p style='margin-bottom:10px;'>This is to alert you that a deposit request has been submitted by a user, details of the deposit requests are as follows:</p>
                    <div style='margin-bottom:10px;'>
                    <p>User: $fullname</p>
                    <p>Amount: $amount $walletType</p>
                    </div>
                  
                    <p>
                    Please promptly review, process and ensure all necessary verifications are completed before updating the user's account.
                    </p>
                    <p style='margin-bottom: 10px;'>  Should you have any questions or require further assistance, please feel free to reach out to our support team at support@intelbondtrade.ltd.</p>
                    ");
                }
                $count++;
                $send = sendEmail($row["email"], "Confirmation Of Deposit Request", "../../email.html", ["{type}", "{user}", "{body}", "{date}"], ["Deposit Request", $row["username"], $msg, date("Y")]);

            }

            if ($count == $res->num_rows) {
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
    $date = date("d-M-Y ") . $time;
    $query = "INSERT INTO withdrawal (wallet_address, wallet_type, amount, user,date) VALUES ('$wallet_address',  '$wallet_type', '$amount', '$user', '$date')";
    $res = mysqli_query($conn, $query);

    $query = "UPDATE users SET balance = balance - '$amount', withdrawn = withdrawn +'$amount'  WHERE id = '$user'";
    $res = mysqli_query($conn, $query);

    $query = "SELECT users.fullname, withdrawal.amount, wallet.wallet_rate, wallet.wallet_symbol, wallet.wallet_code  FROM withdrawal JOIN users ON users.id = withdrawal.user JOIN wallet ON withdrawal.wallet_type = wallet.id WHERE withdrawal.id = (SELECT MAX(id) FROM withdrawal)";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();

    $fullname = $row["fullname"];
    $amount = $row['amount'] * $row['wallet_rate'];
    $amount = number_format($amount, intval($amount) == 0 ? 5 : 2);
    $walletType = $row['wallet_code'];

    $count = 0;
    $query = "SELECT id,email,username,admin FROM users WHERE admin = true OR id='$user'";
    $res = mysqli_query($conn, $query);
    // sending email to admin
    while ($row = $res->fetch_assoc()) {
        // Message for user
        if ($row["admin"] != true) {
            $msg = html_entity_decode(" <p style='margin-bottom: 10px;'> Thank you for your withdrawal request of $amount $walletType. We're processing it promptly. </p>  <p style='margin-bottom: 10px;'>You'll receive an email confirmation once the transaction is complete.</p>");
        } else {
            // sending email to user
            $msg = html_entity_decode(" <p style='margin-bottom: 10px;'>This is to inform you that a withdrawal request was received from $fullname and amount is $amount $walletType.</p>  <p style='margin-bottom: 10px;'>Please proceed with the necessary steps to process the withdrawal</p>");
        }
        $send = sendEmail($row["email"], "Confirmation Of Withdrawal Request", "../../email.html", ["{type}", "{user}", "{body}", "{date}"], ["Withdrawal Request", $row["username"], $msg, date("Y")]);
        $count++;

    }


    if ($count == $res->num_rows) {
        header("Location: ../withdraw.php?withdraw=s");
    } else {
        header("Location: ../withdraw.php?withdraw=f");
    }
}

// Reinvest
if (isset($_POST["reinvest"])) {
    extract($_POST);
    print_r($_POST);

    if ($balance > $amount) {
        $startDate = date('d-M-Y h:i');
        $endDate = date('d-M-Y h:i', strtotime($days . 'days'));
        $query = "INSERT INTO deposits (amount,user,plan,wallet,start_date,end_date, verified)  VALUES ('$amount', '$user', '$plan', ' ', '$startDate', '$endDate', true)";
        $res = mysqli_query($conn, $query);
        $query = "UPDATE users SET balance = balance - $amount,invested = invested + $amount WHERE id = '$user'";
        $res = mysqli_query($conn, $query);
        if ($res) {
            header("Location: ../reinvest.php?reinvest=s");
        } else {
            header("Location: ../reinvest.php?reinvest=f");
        }
    } else {
        header("Location: ../reinvest.php?reinvest=bf");
    }

}


