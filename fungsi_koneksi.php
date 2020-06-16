<?php
$server = "localhost";
$username = "mule7148_proyekpert";
$password = "proyekpert";
$database = "mule7148_proyekpert";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
