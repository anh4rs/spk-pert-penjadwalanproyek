<?php
$updated = date("Y-m-d H:i:s");
$updater = $_SESSION['username'];
	include "fungsi_koneksi.php";
	switch($_GET['act']){
		case 'add':
			$jumlahjaringan = $_POST['jumlahjaringan'];
			$id_jaringankerja = $_POST['id_jaringankerja'];
			
			mysqli_query($con, "INSERT INTO tbl_jaringankerja SET 
			id_jaringankerja		= '$id_jaringankerja',
			kode_project			= '$_POST[kode_project]',
			nama_jalur				= '$_POST[nama_jalur]',
			updated					= '$updated',
			updater					= '$updater'");
			
			for ($v = 1; $v <= $jumlahjaringan; $v++) {
				$jaringan_[$v] = explode(",",$_POST['jaringan_'.$v]);
				$jaringan0 = $jaringan_[$v][0];
				$jaringan1 = $jaringan_[$v][1];
				mysqli_query($con, "UPDATE tbl_jaringankerja SET jaringan_$v = '$jaringan0' 
				where id_jaringankerja = '$id_jaringankerja'");
				$urutan_kegiatan[$v] = $jaringan1;
				$array_urutan_kegiatan = implode(",",$urutan_kegiatan);
			}
			
			mysqli_query($con, "UPDATE tbl_jaringankerja SET urutan_kegiatan = '$array_urutan_kegiatan' 
			where id_jaringankerja = '$id_jaringankerja'");
			
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_jaringankerja'>";
		break;
		case 'edit':
			$jumlahjaringan = $_POST['jumlahjaringan'];
			$id_jaringankerja = $_POST['id_jaringankerja'];
			
			mysqli_query($con, "UPDATE tbl_jaringankerja SET 
			kode_project			= '$_POST[kode_project]',
			nama_jalur				= '$_POST[nama_jalur]',
			updated					= '$updated',
			updater					= '$updater'
			where id_jaringankerja	= '$id_jaringankerja'
			");
			
			for ($v = 1; $v <= $jumlahjaringan; $v++) {
				$jaringan_[$v] = explode(",",$_POST['jaringan_'.$v]);
				$jaringan0 = $jaringan_[$v][0];
				$jaringan1 = $jaringan_[$v][1];
				mysqli_query($con, "UPDATE tbl_jaringankerja SET jaringan_$v = '$jaringan0' 
				where id_jaringankerja = '$id_jaringankerja'");
				$urutan_kegiatan[$v] = $jaringan1;
				$array_urutan_kegiatan = implode(",",$urutan_kegiatan);
			}
			
			mysqli_query($con, "UPDATE tbl_jaringankerja SET urutan_kegiatan = '$array_urutan_kegiatan' 
			where id_jaringankerja = '$id_jaringankerja'");
			
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_jaringankerja'>";			
		break;
		case 'delete':
			mysqli_query($con, "DELETE FROM tbl_jaringankerja WHERE id_jaringankerja = '$_GET[id]'");
			echo "<meta http-equiv='refresh' content='0;url=?pert=tbl_jaringankerja'>";
		break;
	}
?>