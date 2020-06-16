<?php
$updated = date("Y-m-d H:i:s");
$updater = $_SESSION['username'];
	include "fungsi_koneksi.php";
	switch($_GET['act']){
		case 'add':
			mysql_query("INSERT INTO tbl_project SET 
			kode_project				= '$_POST[kode_project]',
			nama_project				= '$_POST[nama_project]',
			updated						= '$updated',
			updater						= '$updater'");		
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_project'>";
		break;
		case 'edit':
			mysql_query("UPDATE tbl_project SET 
			nama_project				= '$_POST[nama_project]',
			updated						= '$updated',
			updater						= '$updater'
			WHERE kode_project			= '$_POST[kode_project]'");
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_project'>";			
		break;
		case 'delete':
			mysql_query("DELETE FROM tbl_project WHERE kode_project = '$_GET[id]'");
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_project'>";
		break;
	}
?>