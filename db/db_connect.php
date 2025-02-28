<?php
require_once dirname(__DIR__) . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$host = "localhost";
$mode = "test";
if ($mode == "test") {
    $username = "root";
    $password = "";
    $db = "intelbondtrade";
} else {
    $username = $_ENV["DB_USER"];
    $password = $_ENV["DB_PASSWORD"];
    $db = $_ENV["DB_NAME"];
}

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    exit();
}
?>
