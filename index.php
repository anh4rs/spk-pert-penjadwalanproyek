<?php error_reporting(E_ERROR | E_WARNING | E_PARSE);?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>PERT Admin Panel</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
	<!-- Start Favicon-->
	<!-- End Favicon-->	
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/loading.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
	<link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
	<link href="assets/css/jquery-ui.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/plugins/uniform/themes/default/css/uniform.default.css" />
	<link rel="stylesheet" href="assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
	<link rel="stylesheet" href="assets/plugins/chosen/chosen.min.css" />
	<link rel="stylesheet" href="assets/plugins/colorpicker/css/colorpicker.css" />
	<link rel="stylesheet" href="assets/plugins/tagsinput/jquery.tagsinput.css" />
	<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" />
	<link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css" />
	<link rel="stylesheet" href="assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
	<link rel="stylesheet" href="assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />
	<link rel="stylesheet" href="assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
	<link rel="stylesheet" href="assets/css/Markdown.Editor.hack.css" />
	<link rel="stylesheet" href="assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
	<link rel="stylesheet" href="assets/css/jquery.cleditor-hack.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-wysihtml5-hack.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- END PAGE LEVEL  STYLES -->
	
	<!-- PAGE LEVEL STYLES -->
  
<link href="assets/css/jquery-ui.css" rel="stylesheet" />
<style>
                        ul.wysihtml5-toolbar > li {
                            position: relative;
                        }
</style>
<style type="text/css">    
      #map {
        margin: 10px;
        width: 100%;
        height: 300px;  
        padding: 10px;
      }
</style>   
    <!-- END PAGE LEVEL  STYLES -->
	
	<!-- PAGE LEVEL STYLES -->
<link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
    <!-- END PAGE LEVEL  STYLES -->
	
	<!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="assets/plugins/social-buttons/social-buttons.css" />
    <!-- END PAGE LEVEL  STYLES -->
	
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

	</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >
<?php
include('fungsi_koneksi.php');
include('fungsi_tanggalindo.php');
include "fungsi_enc_dec.php";
session_start();
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string(md5($_POST['password']));

$query_userportal = mysql_query("select * from tbl_admin where username='$username' and password='$password' and status='1'");
if(mysql_num_rows($query_userportal)==1){ //jika berhasil akan bernilai 1
	$data_userportal = mysql_fetch_array($query_userportal);
	$_SESSION['username'] = $data_userportal['username'];
	$_SESSION['password'] = $data_userportal['password'];
}

if (!isset($_SESSION['username']) || $status=='0') {
?>

	<!-- LOGIN -->
	<div class="container">
        <div class="row text-center ">
        </div>
         <div class="row ">
                  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-4 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>Silahkan Login 
						<?php if($status=='0'){ echo "<i style='color:red;'>[ Maaf, Status User Anda Nonaktif ]</i>";}?>
						</strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input name="username" type="text" class="form-control" placeholder="Your Username " />
                                        </div><br />
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="password" type="password" class="form-control"  placeholder="Your Password" />
                                        </div><br />
                                    <div class="form-group">
                                            
                                        </div>
                                     
                                     <button type="submit" class="btn btn-success">Login Now</button>
                                    
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
	<!-- END LOGIN -->
	
<?php
}else{
?>

    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        

        <!-- HEADER SECTION -->
        <div id="top">
			
        </div>
        <!-- END HEADER SECTION -->

		<?php include "fungsi_menu.php";?>
		<?php include "fungsi_content.php";?>


    </div>
<?php }?>
	
   
    <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	
    <!-- END GLOBAL SCRIPTS -->

	<?php 
	
		include "fungsi_script_datatables.php";
	?>
	
</body>
</html>
