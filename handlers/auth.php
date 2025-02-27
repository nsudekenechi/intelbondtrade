<?php
require_once("../db/db_connect.php");
require_once "./email.php";
session_start();

function verifyCaptcha($POST)
{

    if (isset($POST["g-recaptcha-response"]) && !empty($POST["g-recaptcha-respons"])) {
        $secret = "6LfQaOQqAAAAABgX9Ypj3FEFvHNEijaP8KjqzOIc";
        $response = $POST["g-recaptcha-response"];
        $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
        $response = json_decode($verifyResponse);

        if (!$response->success) {

            return false;
        }
    } else {

        return false;
    }
}

// Adding Users to DB
if (isset($_POST["signUp"])) {
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);
    // verifying recaptcha is valid
    if (!verifyCaptcha($_POST)) {
        header("Location: ../signup.php");
    }
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
        $msg = html_entity_decode("
        <p style='margin-bottom: 10px;'>
        Welcome to Intelbondtrade! We're thrilled to have you onboard and excited to embark on this investment journey together.
        </p>

        <p style='margin-bottom: 10px;'>
        To get started, simply log in to your account using the credentials you entered and explore all that Intelbondtrade has to offer. And if you ever have any questions or need assistance, don't hesitate to reach out to our customer support team.
        </p>
        <a href='https://intelbondtrade.ltd/login.php' style='background-color:#6576ff;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 30px'>Login</a>
        ");
        $send = sendEmail(
            $email,
            "Welcome to Intelbondtrade",
            "../email.html",
            ["{type}", "{user}", "{body}", "{date}"],
            ["Welcome to Intelbondtrade", $username, $msg, date("Y")]
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
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);
    // verifying recaptcha is valid
    if (!verifyCaptcha($_POST)) {
        header("Location: ../login.php");
    }
    $query = "SELECT * FROM users WHERE username='$username' OR email='$username'";
    $res = mysqli_query($conn, $query);
    if ($res->num_rows) {
        $row = $res->fetch_assoc();

        if (password_verify($password, $row["password"]) && !$row["suspend"]) {
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
   $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);
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
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);
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
