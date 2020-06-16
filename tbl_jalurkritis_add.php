
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
                            TAMBAH JALUR KRITIS
							</td>
							<td width="50%" align="right" >
                           ID : 
							<?php
							$query_data = mysql_fetch_array(mysql_query("select id_jalurkritis from tbl_jalurkritis order by id_jalurkritis DESC limit 1"));
							$id_jalurkritis = $query_data['id_jalurkritis']+1;
							echo $id_jalurkritis;
							$query_data_jaringan = mysql_fetch_array(mysql_query("SELECT nama_jalur,urutan_kegiatan,jaringan_1+jaringan_2+jaringan_3+jaringan_4+jaringan_5+jaringan_6+jaringan_7+jaringan_8+jaringan_9+jaringan_10 as Summary FROM tbl_jaringankerja where kode_project='$_GET[kode_project]' order by Summary DESC limit 1"));
							$urutan_kegiatan_explode = explode(',',$query_data_jaringan['urutan_kegiatan']); 
							$urutan_kegiatan_implode = "'".implode("','",$urutan_kegiatan_explode)."'";
							$query_data_kegiatan = mysql_fetch_array(mysql_query("select sum(waktuselesai_optimis) as earliest_start, sum(waktuselesai_pesimis) as latest_finish from tbl_kegiatan where kode_kegiatan IN($urutan_kegiatan_implode)"));
							?>
							</td>
						</tr>
						</table>
                        </div>
                        <div class="panel-body">
					<form class="form-horizontal" action="?pert=tbl_jalurkritis_proses&act=add" method="POST" enctype="multipart/form-data">
					<!--LEFT SECTION -->
					<div class="col-lg-10">
						<input type="hidden" name="id_jalurkritis" value="<?php echo $id_jalurkritis;?>" class="form-control" readonly />
						
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA PROJECT</label>
							<div class="col-lg-8">
								<input type="hidden" name="kode_project" value="<?php echo $_GET['kode_project'];?>">
								<input type="hidden" name="id_jaringankerja" value="<?php echo $id_jaringankerja;?>">
								<select name="formc" onchange="location = this.value;" class="form-control">
									<?php 
									if($_GET['kode_project']){
										$query_data_project = mysql_fetch_array(mysql_query("select * from tbl_project where kode_project='$_GET[kode_project]'"));
										$hitung_jumlah_kegiatan = mysql_fetch_array(mysql_query("select count(*) as counter from tbl_basis_aturan,tbl_kegiatan where tbl_basis_aturan.kode_kegiatan=tbl_kegiatan.kode_kegiatan and kode_project='$_GET[kode_project]'"));
										$hitung_jumlah_kegiatan_double = mysql_fetch_array(mysql_query("select count(*) as counter from tbl_basis_aturan where id_basis IN(select id_basis from tbl_basis_aturan,tbl_kegiatan where tbl_basis_aturan.kode_kegiatan=tbl_kegiatan.kode_kegiatan and kode_project='$_GET[kode_project]' group by kegiatan_sebelumnya HAVING COUNT(kegiatan_sebelumnya) >1)"));
										$jumlahjaringan = $hitung_jumlah_kegiatan['counter']-$hitung_jumlah_kegiatan_double['counter'];
										echo "<option value=''>$query_data_project[nama_project]</option>";
									}else{
										echo "<option value=''>Pilih Nama Project</option>";
									}	
									 $query_project = mysql_query("select * from tbl_project where kode_project!='$_GET[kode_project]' order by nama_project ASC");
										while($data_project = mysql_fetch_array($query_project)){
										?>	
											<option value="?pert=tbl_jalurkritis_add&kode_project=<?php echo $data_project['kode_project'];?>"><?php echo $data_project['nama_project'];?></option>
										<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA JALUR KRITIS</label>
							<div class="col-lg-8">
								<input type="text" name="nama_jalur" value="<?php echo $query_data_jaringan['nama_jalur'];?>" class="form-control" readonly />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">WAKTU SELESAI TERCEPAT</label>
							<div class="col-lg-8">
								<input type="text" name="earliest_start" value="<?php echo $query_data_kegiatan['earliest_start'];?>" class="form-control" readonly />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">WAKTU SELESAI TERLAMBAT</label>
							<div class="col-lg-8">
								<input type="text" name="latest_finish" value="<?php echo $query_data_kegiatan['latest_finish'];?>" class="form-control" readonly />
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
