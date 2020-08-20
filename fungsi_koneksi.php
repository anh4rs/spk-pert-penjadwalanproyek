<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "mule7148_proyekpert";

// Koneksi dan memilih database di server
$con = mysqli_connect($server,$username,$password, $database);
if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
session_start();
?>
