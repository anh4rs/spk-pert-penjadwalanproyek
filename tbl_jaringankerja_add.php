
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
							<td width="70%">
                            TAMBAH JARINGAN KERJA
							</td>
							<td width="30%" align="right">
                            ID : 
							<?php
							$query_data = mysqli_fetch_array(mysqli_query($con, "select id_jaringankerja from tbl_jaringankerja order by id_jaringankerja DESC limit 1"));
							$id_jaringankerja = $query_data['id_jaringankerja']+1;
							echo $id_jaringankerja;?>
							</td>
						</tr>
						</table>
                        </div>
                        <div class="panel-body">
					<form class="form-horizontal" action="?pert=tbl_jaringankerja_proses&act=add" method="POST" enctype="multipart/form-data">
					<!--LEFT SECTION -->
					<div class="col-lg-10">
						
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA PROJECT</label>
							<div class="col-lg-8">
								<input type="hidden" name="kode_project" value="<?php echo $_GET['kode_project'];?>">
								<input type="hidden" name="id_jaringankerja" value="<?php echo $id_jaringankerja;?>">
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
											<option value="?pert=tbl_jaringankerja_add&kode_project=<?php echo $data_project['kode_project'];?>"><?php echo $data_project['nama_project'];?></option>
										<?php } ?>
								</select>
							</div>
						</div>
						
						<?php if($_GET['kode_project']){?>
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA JALUR</label>
							<div class="col-lg-8">
								<select class="form-control chzn-select" name="nama_jalur">
								<?php
								$query_data_jalur = mysqli_fetch_array(mysqli_query($con, "select nama_jalur from tbl_jaringankerja order by nama_jalur DESC limit 1"));
								$nama_jalur = substr($query_data_jalur['nama_jalur'],-1)+1;
								echo "<option value='Jalur$nama_jalur'>Jalur$nama_jalur</option>";
								?>		
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-lg-4">URUTAN JARINGAN 1</label>
							<div class="col-lg-8">
								<select class="form-control chzn-select" name="jaringan_1">
										<?php $query_kegiatan = mysqli_query($con, "select * from tbl_basis_aturan, tbl_kegiatan where tbl_kegiatan.kode_kegiatan=tbl_basis_aturan.kode_kegiatan and kegiatan_sebelumnya='' and tbl_kegiatan.kode_project='$_GET[kode_project]' order by id_kegiatan ASC");
										while($data_kegiatan = mysqli_fetch_array($query_kegiatan)){
										?>	
											<option value="<?php echo ceil($data_kegiatan['waktuselesai_perkiraan']).",".$data_kegiatan['kode_kegiatan'];?>"><?php echo $data_kegiatan['nama_kegiatan'];?></option>
										<?php } ?>
								</select>
							</div>
						</div>
						<?php
							for ($jalur = 2; $jalur < $jumlahjaringan; $jalur++) {
						?>
						
						<div class="form-group">
							<label class="control-label col-lg-4">URUTAN JARINGAN <?php echo $jalur;?></label>
							<div class="col-lg-8">
								<select class="form-control chzn-select" name="jaringan_<?php echo $jalur;?>">
									<option value="">Pilih Nama Kegiatan <?php echo $jalur;?></option>
									<option value="">Langsung</option>
										<?php $query_kegiatan = mysqli_query($con, "select * from tbl_basis_aturan, tbl_kegiatan where tbl_kegiatan.kode_kegiatan=tbl_basis_aturan.kode_kegiatan and kegiatan_sebelumnya!='' and kegiatan_setelahnya!='' and tbl_kegiatan.kode_project='$_GET[kode_project]' order by id_kegiatan ASC");
										while($data_kegiatan = mysqli_fetch_array($query_kegiatan)){
										?>	
											<option value="<?php echo ceil($data_kegiatan['waktuselesai_perkiraan']).",".$data_kegiatan['kode_kegiatan'];?>"><?php echo $data_kegiatan['nama_kegiatan'];?></option>
										<?php } ?>
								</select>
							</div>
						</div>
						<?php } ?>
						
						
						<div class="form-group">
							<label class="control-label col-lg-4">URUTAN JARINGAN <?php echo $jumlahjaringan;?></label>
							<div class="col-lg-8">
								<select class="form-control chzn-select" name="jaringan_<?php echo $jumlahjaringan;?>">
										<?php $query_kegiatan = mysqli_query($con, "select * from tbl_basis_aturan, tbl_kegiatan where tbl_kegiatan.kode_kegiatan=tbl_basis_aturan.kode_kegiatan and kegiatan_setelahnya='' and tbl_kegiatan.kode_project='$_GET[kode_project]' order by id_kegiatan ASC");
										while($data_kegiatan = mysqli_fetch_array($query_kegiatan)){
										?>	
											<option value="<?php echo ceil($data_kegiatan['waktuselesai_perkiraan']).",".$data_kegiatan['kode_kegiatan'];?>"><?php echo $data_kegiatan['nama_kegiatan'];?></option>
										<?php } ?>
								</select>
							</div>
						</div>
						<?php } ?>
						<input type="hidden" name="jumlahjaringan" value="<?php echo $jumlahjaringan;?>">
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
