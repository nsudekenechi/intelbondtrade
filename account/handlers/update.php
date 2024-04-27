<?php
session_start();
require_once "../../db/db_connect.php";
$user = $_SESSION["user"];
// Checking if old password matches new password

if (isset($_GET["verifyOldPassword"])) {
    $oldPassword = $_GET["verifyOldPassword"];
    $query = "SELECT password FROM users WHERE id = '$user'";
    $res = mysqli_query($conn, $query);
    $hashPassword = $res->fetch_column();
    if (password_verify($oldPassword, $hashPassword)) {
        echo true;
    } else {
        echo false;
    }
}

// Updating User's Info
if (isset($_POST["updateProfile"])) {
    extract($_POST);
    if ($newPassword) {
        $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password='$hashPassword', fullname = '$fullName' WHERE id = '$user'";
    } else {
        $query = "UPDATE users SET fullname = '$fullName' WHERE id = '$user'";
    }
    $res = mysqli_query($conn, $query);
    if ($newPassword) {
        session_destroy();
    }
    header("Location: ../index.php");
}

