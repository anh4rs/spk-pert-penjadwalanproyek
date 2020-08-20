<?php
$updated = date("Y-m-d H:i:s");
$updater = $_SESSION['username'];
	include "fungsi_koneksi.php";
	switch($_GET['act']){
		case 'add':
			$waktuselesai_perkiraan = round(($_POST['waktuselesai_optimis']+($_POST['waktuselesai_realistis']*4)+$_POST['waktuselesai_pesimis'])/6,2);
			mysqli_query($con, "INSERT INTO tbl_kegiatan SET 
			kode_project				= '$_POST[kode_project]',
			kode_kegiatan				= '$_POST[kode_kegiatan]',
			nama_kegiatan				= '$_POST[nama_kegiatan]',
			waktuselesai_optimis		= '$_POST[waktuselesai_optimis]',
			waktuselesai_realistis	= '$_POST[waktuselesai_realistis]',
			waktuselesai_pesimis		= '$_POST[waktuselesai_pesimis]',
			waktuselesai_perkiraan		= '$waktuselesai_perkiraan',
			updated						= '$updated',
			updater						= '$updater'");		
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_kegiatan'>";
		break;
		case 'edit':
			$waktuselesai_perkiraan = round(($_POST['waktuselesai_optimis']+($_POST['waktuselesai_realistis']*4)+$_POST['waktuselesai_pesimis'])/6,2);
			mysqli_query($con, "UPDATE tbl_kegiatan SET 
			kode_project				= '$_POST[kode_project]',
			nama_kegiatan				= '$_POST[nama_kegiatan]',
			waktuselesai_optimis		= '$_POST[waktuselesai_optimis]',
			waktuselesai_realistis	= '$_POST[waktuselesai_realistis]',
			waktuselesai_pesimis		= '$_POST[waktuselesai_pesimis]',
			waktuselesai_perkiraan		= '$waktuselesai_perkiraan',
			updated						= '$updated',
			updater						= '$updater'
			WHERE kode_kegiatan			= '$_POST[kode_kegiatan]'");
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_kegiatan'>";			
		break;
		case 'delete':
			mysqli_query($con, "DELETE FROM tbl_kegiatan WHERE kode_kegiatan = '$_GET[id]'");
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_kegiatan'>";
		break;
	}
?>