<?php session_start();include('fungsi_koneksi.php');if(isset($_SESSION['username']))
unset($_SESSION['username']);
echo "<meta http-equiv='refresh' content='0;index.php'>";
?>
