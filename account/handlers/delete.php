<?php
session_start();
require_once "../../db/db_connect.php";
$user = $_SESSION["user"];
if (isset ($_GET["deleteNotifcation"])) {
    $query = "DELETE FROM notifications WHERE user = '$user'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        echo true;
    } else {
        echo false;
    }
}
?>