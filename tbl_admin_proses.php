<?php
$updated = date("Y-m-d H:i:s");
$updater = $_SESSION['username'];
	include "fungsi_koneksi.php";
	switch($_GET['act']){
		case 'add':
			$password = md5($_POST['password']);
			mysqli_query($con, "INSERT INTO tbl_admin SET 
			nama_lengkap				= '$_POST[nama_lengkap]',
			username					= '$_POST[username]',
			password					= '$password',
			status						= '$_POST[status]',
			updated						= '$updated',
			updater						= '$updater'");		
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_admin'>";
		break;
		case 'edit':
			$id_admin = $_POST['id_admin'];
			$new_password = md5($_POST['password']);
			
			$query_data = mysqli_fetch_array(mysqli_query($con, "select * from tbl_admin where id_admin='$id_admin'"));
			$old_password = $query_data['password'];
			
			if($_POST['password']==$old_password){
				$password = $_POST['password'];
			}else{
				$password = $new_password;
			}
			
			mysqli_query($con, "UPDATE tbl_admin SET 
			nama_lengkap				= '$_POST[nama_lengkap]',
			username					= '$_POST[username]',
			password					= '$password',
			status						= '$_POST[status]',
			updated						= '$updated',
			updater						= '$updater'
			WHERE id_admin				= '$id_admin'");
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_admin'>";			
		break;
		case 'delete':
			mysqli_query($con, "DELETE FROM tbl_admin WHERE id_admin = '$_GET[id]'");
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_admin'>";
		break;
	}
?>