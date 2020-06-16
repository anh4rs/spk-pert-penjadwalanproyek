<?php
$updated = date("Y-m-d H:i:s");
$updater = $_SESSION['username'];
	include "fungsi_koneksi.php";
	switch($_GET['act']){
		case 'add':
			mysql_query("INSERT INTO tbl_basis_aturan SET 
			kode_kegiatan			= '$_POST[kode_kegiatan]',
			kegiatan_sebelumnya		= '$_POST[kegiatan_sebelumnya]',
			kegiatan_setelahnya		= '$_POST[kegiatan_setelahnya]',
			updated					= '$updated',
			updater					= '$updater'");		
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_basis_aturan'>";
		break;
		case 'edit':
			$id_basis = $_POST['id_basis'];
			mysql_query("UPDATE tbl_basis_aturan SET 
			kode_kegiatan			= '$_POST[kode_kegiatan]',
			kegiatan_sebelumnya		= '$_POST[kegiatan_sebelumnya]',
			kegiatan_setelahnya		= '$_POST[kegiatan_setelahnya]',
			updated					= '$updated',
			updater					= '$updater'
			WHERE id_basis 			= '$id_basis'");
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_basis_aturan'>";			
		break;
		case 'delete':
			mysql_query("DELETE FROM tbl_basis_aturan WHERE id_basis = '$_GET[id]'");
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_basis_aturan'>";
		break;
	}
?>