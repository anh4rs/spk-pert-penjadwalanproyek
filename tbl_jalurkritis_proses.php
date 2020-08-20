<?php
$updated = date("Y-m-d H:i:s");
$updater = $_SESSION['username'];
	include "fungsi_koneksi.php";
	switch($_GET['act']){
		case 'add':
			mysqli_query($con, "INSERT INTO tbl_jalurkritis SET 
			id_jalurkritis				= '$_POST[id_jalurkritis]',
			kode_project				= '$_POST[kode_project]',
			nama_jalur					= '$_POST[nama_jalur]',
			earliest_start				= '$_POST[earliest_start]',
			latest_finish				= '$_POST[latest_finish]',
			updated						= '$updated',
			updater						= '$updater'");		
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_jalurkritis'>";
		break;
		case 'edit':
			$id_jalurkritis = $_POST['id_jalurkritis'];
			mysqli_query($con, "UPDATE tbl_jalurkritis SET 
			kode_project				= '$_POST[kode_project]',
			nama_jalur					= '$_POST[nama_jalur]',
			earliest_start				= '$_POST[earliest_start]',
			latest_finish				= '$_POST[latest_finish]',
			updated						= '$updated',
			updater						= '$updater'
			WHERE id_jalurkritis	= '$id_jalurkritis'");
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_jalurkritis'>";			
		break;
		case 'delete':
			mysqli_query($con, "DELETE FROM tbl_jalurkritis WHERE id_jalurkritis = '$_GET[id]'");
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_jalurkritis'>";
		break;
	}
?>