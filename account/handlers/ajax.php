<?php
session_start();
require_once "../../db/db_connect.php";

if (isset($_GET["plans"])) {
    $id = $_GET["plans"];
    $query = "SELECT * FROM plans WHERE id = '$id'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    echo json_encode($row);

}