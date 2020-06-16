<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include "fungsi_koneksi.php";
	switch($_GET['pert']){
	    case '':
			include("home.php");		
		break;
		case 'Home':
			include("home.php");		
		break;
		case 'Logout':
			include("fungsi_logout.php");		
		break;
		case 'tbl_project':
			include("tbl_project.php");		
		break;
		case 'tbl_project_add':
			include("tbl_project_add.php");		
		break;
		case 'tbl_project_edit':
			include("tbl_project_edit.php");		
		break;
		case 'tbl_project_proses':
			include("tbl_project_proses.php");		
		break;
		case 'tbl_kegiatan':
			include("tbl_kegiatan.php");		
		break;
		case 'tbl_kegiatan_add':
			include("tbl_kegiatan_add.php");		
		break;
		case 'tbl_kegiatan_edit':
			include("tbl_kegiatan_edit.php");		
		break;
		case 'tbl_kegiatan_proses':
			include("tbl_kegiatan_proses.php");		
		break;
		case 'tbl_basis_aturan':
			include("tbl_basis_aturan.php");		
		break;
		case 'tbl_basis_aturan_add':
			include("tbl_basis_aturan_add.php");		
		break;
		case 'tbl_basis_aturan_edit':
			include("tbl_basis_aturan_edit.php");		
		break;
		case 'tbl_basis_aturan_proses':
			include("tbl_basis_aturan_proses.php");		
		break;
		case 'tbl_jaringankerja':
			include("tbl_jaringankerja.php");		
		break;
		case 'tbl_jaringankerja_add':
			include("tbl_jaringankerja_add.php");		
		break;
		case 'tbl_jaringankerja_edit':
			include("tbl_jaringankerja_edit.php");		
		break;
		case 'tbl_jaringankerja_proses':
			include("tbl_jaringankerja_proses.php");		
		break;
		case 'tbl_jalurkritis':
			include("tbl_jalurkritis.php");		
		break;
		case 'tbl_jalurkritis_add':
			include("tbl_jalurkritis_add.php");		
		break;
		case 'tbl_jalurkritis_proses':
			include("tbl_jalurkritis_proses.php");		
		break;
		case 'tbl_admin':
			include("tbl_admin.php");		
		break;
		case 'tbl_admin_add':
			include("tbl_admin_add.php");		
		break;
		case 'tbl_admin_edit':
			include("tbl_admin_edit.php");		
		break;
		case 'tbl_admin_proses':
			include("tbl_admin_proses.php");		
		break;
		
		
	};
?>	