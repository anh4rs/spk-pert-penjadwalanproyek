        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
				<!--BLOCK SECTION -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <div class="col-lg-12"><h1>Welcome Admin<h1></div>
                             <div class="col-lg-12"><br></div>
                             <div class="col-lg-12">
								<form class="form-horizontal" action="?pert=Home&kode_project=<?php echo $_GET['kode_project'];?>&result=1" method="POST" enctype="multipart/form-data" target="_blank">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label">PILIH PROJECT DAN TANGGAL MULAI UNTUK MENCARI TAHU KAPAN PROJECT SELESAINYA.</label>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-4">NAMA PROJECT</label>
										<div class="col-lg-8">
											<input type="hidden" name="kode_project" value="<?php echo $_GET['kode_project'];?>">
											<select name="formc" onchange="location = this.value;" class="form-control">
												<?php 
												if($_GET['kode_project']){
													$query_data_project = mysqli_fetch_array(mysqli_query($con, "select * from tbl_project where kode_project='$_GET[kode_project]'"));
													$hitung_jumlah_kegiatan = mysqli_fetch_array(mysqli_query($con, "select count(*) as counter from tbl_basis_aturan,tbl_kegiatan where tbl_basis_aturan.kode_kegiatan=tbl_kegiatan.kode_kegiatan and kode_project='$_GET[kode_project]'"));
													$hitung_jumlah_kegiatan_double = mysqli_fetch_array(mysqli_query($con, "select count(*) as counter from tbl_basis_aturan where id_basis IN(select id_basis from tbl_basis_aturan,tbl_kegiatan where tbl_basis_aturan.kode_kegiatan=tbl_kegiatan.kode_kegiatan and kode_project='$_GET[kode_project]' group by kegiatan_sebelumnya HAVING COUNT(kegiatan_sebelumnya) >1)"));
													$jumlahjaringan = $hitung_jumlah_kegiatan['counter']-$hitung_jumlah_kegiatan_double['counter'];
													echo "<option value=''>$query_data_project[nama_project]</option>";
												}else{
													echo "<option value=''>Pilih Nama Project</option>";
												}	
												 $query_project = mysqli_query($con, "select * from tbl_project  where kode_project!='$_GET[kode_project]' order by nama_project ASC");
													while($data_project = mysqli_fetch_array($query_project)){
													?>	
														<option value="?pert=Home&kode_project=<?php echo $data_project['kode_project'];?>"><?php echo $data_project['nama_project'];?></option>
													<?php } ?>
											</select>
										</div>
									</div>
									<?php if($_GET['result']){
									$tanggal_mulai = $_POST['tanggal_mulai'];
									$query_data_jalurkritis = mysqli_fetch_array(mysqli_query($con, "select * from tbl_jalurkritis where kode_project='$_POST[kode_project]'"));
									$earliest = $query_data_jalurkritis['earliest_start'];
									$latest = $query_data_jalurkritis['latest_finish'];
									$earliest_start = date('Y-m-d', strtotime($tanggal_mulai. ' + '.$earliest.' days'));
									$latest_finish = date('Y-m-d', strtotime($tanggal_mulai. ' + '.$latest.' days'));
									?>
									
									<div class="form-group">
										<label class="control-label col-lg-4">TANGGAL MULAI (PERKIRAAN)</label>
										<div class="col-lg-8">
											<input type="text" class="form-control" value="<?php echo Tanggal($_POST['tanggal_mulai']);?>"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-4">TANGGAL SELESAI (PALING CEPAT)</label>
										<div class="col-lg-8">
											<input type="text" class="form-control" value="<?php echo Tanggal($earliest_start);?>"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-4">TANGGAL SELESAI (PALING LAMBAT)</label>
										<div class="col-lg-8">
											<input type="text" class="form-control" value="<?php echo Tanggal($latest_finish);?>"/>
										</div>
									</div>
									<?php }else{?>
									
									<div class="form-group">
										<label class="control-label col-lg-4">TANGGAL MULAI PROJECT</label>
										<div class="col-lg-8">
											<input type="date" class="form-control" name="tanggal_mulai"/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-4"></label>
										<div class="col-lg-7">
											<button class="btn btn-info"><i class="icon-search icon-white"></i> Cari </button>
										</div>
									</div>
									<?php } ?>
								</div>
								</form>
							 </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php include "footer.php";?>
            </div>
        </div>
       <!--END PAGE CONTENT -->


        
