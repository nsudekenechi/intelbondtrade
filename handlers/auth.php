<?php
require_once ("../db/db_connect.php");
require_once "./email.php";
session_start();

// Adding Users to DB
if (isset($_POST["signUp"])) {
    extract($_POST);
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (fullname,username,email,password)  VALUES ('$fullname', '$username','$email','$hashPassword')";
    $res = mysqli_query($conn, $query);
    $query = "SELECT MAX(id) FROM users";
    $res = mysqli_query($conn, $query);
    $user_id = $res->fetch_column();

    // Storing information for referrals
    if (isset($_SESSION["ref"])) {
        $user = $_SESSION["ref"];
        $refUser = $username;
        $date = date("d-M-Y h:i");
        $query = "SELECT id FROM  users WHERE username = '$user'";
        $res = mysqli_query($conn, $query);
        $user = $res->fetch_column();

        $query = "SELECT id from users WHERE username = '$refUser'";
        $res = mysqli_query($conn, $query);
        $refUserId = $res->fetch_column();
        $query = "INSERT INTO referrals (user, ref_user, date) VALUES ('$user', '$refUserId','$date')";
        $res = mysqli_query($conn, $query);
        session_destroy();
    }

    if ($res) {
        $msg = html_entity_decode("<p style='margin-bottom: 25px;'>
        Welcome to Intelbondtrade, we're pleased to have you here, below is your login details, please keep your password private.
        </p>
        <p>
           Your username is $username and password is $password
        </p>
        <a href='https://intelbondtrade.ltd/login.php' style='background-color:#6576ff;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 30px'>Login</a>
        ");
        $send = sendEmail(
            $email,
            "Welcome to Intelbondtrade",
            "../email.html",
            ["{type}", "{user}", "{body}", "{date}"],
            ["", $username, $msg, date("Y")]
        );
        header("Location: ../login.php");
    } else {
        header("Location: ../signup.php");
    }
}

// Verifying if email already exists
if (isset($_GET["verifyEmail"])) {
    $email = $_GET["verifyEmail"];
    $query = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        echo true;
    } else {
        echo false;
    }
}


// Verifying if email already exists
if (isset($_GET["verifyUsername"])) {
    $username = $_GET["verifyUsername"];
    $query = "SELECT * FROM users WHERE username='$username'";
    $res = mysqli_query($conn, $query);
    if (mysqli_num_rows($res) > 0) {
        echo true;
    } else {
        echo false;
    }
}

// Logging user in
if (isset($_POST["login"])) {
    extract($_POST);
    $query = "SELECT * FROM users WHERE username='$username' OR email='$username'";
    $res = mysqli_query($conn, $query);
    if ($res->num_rows) {
        $row = $res->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            $_SESSION["user"] = $row["id"];
            if ($row['admin']) {
                header("Location: ../admin/");

            } else {
                header("Location: ../account/");

            }
        } else {
            header("Location: ../login.php?auth=f");
        }
    } else {
        header("Location: ../login.php?auth=f");
    }
}

// Forgot password
if (isset($_GET["resetPassword"])) {
    $email = $_GET["resetPassword"];
    $code = generateRandomPassword(6);
    $hashPassword = password_hash($code, PASSWORD_DEFAULT);
    $msg = html_entity_decode("<p style='margin-bottom: 25px;'>Enter code below in the reset password page
    </p>
    <p
        style='background-color:#6576ff;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 25px'>
        $code
    </p>");

    $query = "SELECT username FROM users WHERE email='$email'";
    $res = mysqli_query($conn, $query);
    $username = $res->fetch_column();

    $send = sendEmail(
        $email,
        "Forgot Password",
        "../email.html",
        ["{type}", "{user}", "{body}", "{date}"],
        ["Reset Password", $username, $msg, date("Y")]
    );
    if ($send) {
        $query = "INSERT INTO forgotpassword (email,code) VALUES ('$email', '$hashPassword')";
        $res = mysqli_query($conn, $query);
        if ($res) {
            $_SESSION["forgotpassword"] = $email;
            echo true;
        } else {
            echo false;
        }
    }

}

// Verify code
if (isset($_POST["verifyCode"])) {
    extract($_POST);
    $email = $_SESSION["forgotpassword"];
    $query = "SELECT * FROM forgotpassword WHERE email ='$email' ORDER BY id DESC LIMIT 1";
    $res = mysqli_query($conn, $query);
    $row = $res->fetch_assoc();
    $verify = password_verify($code, $row["code"]);
    if ($verify) {
        header("Location: ../forgotpassword.php?page=reset");
    } else {
        header("Location: ../forgotpassword.php?page=verify&code=f");
    }
}

// Reset Password
if (isset($_POST["reset"])) {
    extract($_POST);
    $email = $_SESSION["forgotpassword"];
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    // Updating user's password
    $query = "UPDATE users SET password = '$hashPassword' WHERE email = '$email'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        // Deleting user from forgotpassword
        $query = "DELETE FROM forgotpassword WHERE email='$email'";
        $res = mysqli_query($conn, $query);
        // Deleting all sessions
        session_unset();
        session_destroy();
        header("Location: ../login.php?reset=s");
    } else {
        header("Location: ../forgotpassword.php?page=reset&reset=f");
    }

}

// Logging user's out

function generateRandomPassword($length)
{
    $characters = "0123456789";
    $code = "";
    for ($i = 1; $i <= $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}