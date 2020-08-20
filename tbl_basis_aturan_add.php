
        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner">
				<!--BLOCK SECTION -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
						<table width="100%">
						<tr>
							<td width="50%">
                            TAMBAH BASIS ATURAN
							</td>
						</tr>
						</table>
                        </div>
                        <div class="panel-body">
					<form class="form-horizontal" action="?pert=tbl_basis_aturan_proses&act=add" method="POST" enctype="multipart/form-data">
					<!--LEFT SECTION -->
					<div class="col-lg-10">
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA PROJECT</label>
							<div class="col-lg-8">
								<input type="hidden" name="kode_project" value="<?php echo $_GET['kode_project'];?>">
								<select name="formc" onchange="location = this.value;" class="form-control">
									<?php 
									if($_GET['kode_project']){
										$query_data_project = mysqli_fetch_array(mysqli_query($con, "select * from tbl_project where kode_project='$_GET[kode_project]'"));
										echo "<option value=''>$query_data_project[nama_project]</option>";
									}else{
										echo "<option value=''>Pilih Nama Project</option>";
									}	
									 $query_project = mysqli_query($con, "select * from tbl_project order by nama_project ASC");
										while($data_project = mysqli_fetch_array($query_project)){
										?>	
											<option value="?pert=tbl_basis_aturan_add&kode_project=<?php echo $data_project['kode_project'];?>"><?php echo $data_project['nama_project'];?></option>
										<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA KEGIATAN UTAMA</label>
							<div class="col-lg-8">
								<select class="form-control chzn-select" name="kode_kegiatan">
									<option value="">Pilih Nama Kegiatan</option>
										<?php $query_kegiatan = mysqli_query($con, "select * from tbl_kegiatan where kode_project='$_GET[kode_project]' order by id_kegiatan ASC");
										while($data_kegiatan = mysqli_fetch_array($query_kegiatan)){
										?>	
											<option value="<?php echo $data_kegiatan['kode_kegiatan'];?>"><?php echo $data_kegiatan['nama_kegiatan'];?></option>
										<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">KEGIATAN SEBELUM KEGIATAN UTAMA</label>
							<div class="col-lg-8">
								<select class="form-control chzn-select" name="kegiatan_sebelumnya">
									<option value="">Tidak Ada</option>
										<?php $query_kegiatan = mysqli_query($con, "select * from tbl_kegiatan  where kode_project='$_GET[kode_project]' order by id_kegiatan ASC");
										while($data_kegiatan = mysqli_fetch_array($query_kegiatan)){
										?>	
											<option value="<?php echo $data_kegiatan['kode_kegiatan'];?>"><?php echo $data_kegiatan['nama_kegiatan'];?></option>
										<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">KEGIATAN SETELAH KEGIATAN UTAMA</label>
							<div class="col-lg-8">
								<select class="form-control chzn-select" name="kegiatan_setelahnya">
									<option value="">Tidak Ada</option>
										<?php $query_kegiatan = mysqli_query($con, "select * from tbl_kegiatan  where kode_project='$_GET[kode_project]' order by id_kegiatan ASC");
										while($data_kegiatan = mysqli_fetch_array($query_kegiatan)){
										?>	
											<option value="<?php echo $data_kegiatan['kode_kegiatan'];?>"><?php echo $data_kegiatan['nama_kegiatan'];?></option>
										<?php } ?>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-lg-4"></label>
							<div class="col-lg-7">
								<button class="btn btn-warning"><i class="icon-arrow-right icon-white"></i> Simpan </button>
							</div>
						</div>
					</div>
					<!--RIGHT SECTION -->
					</form>
                        </div>
                    </div>
                </div>
            </div>
			<?php include "footer.php";?>
            </div>
        </div>
       <!--END PAGE CONTENT -->
