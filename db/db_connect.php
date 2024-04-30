<?php
$host = "localhost";
$mode = "test";
if ($mode == "test") {
    $username = "root";
    $password = "";
    $db = "intelbondtrade";
} else {
    $username = "inteopax_db_user";
    $password = "#db_user123";
    $db = "inteopax_intelbondtrade";
}

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    exit();
}
