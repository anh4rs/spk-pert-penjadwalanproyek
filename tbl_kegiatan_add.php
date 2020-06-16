
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
                            TAMBAH KEGIATAN
							</td>
							<td width="50%" align="right" >
                            ID : 
							<?php
							$query_data = mysql_fetch_array(mysql_query("select kode_kegiatan from tbl_kegiatan order by kode_kegiatan DESC limit 1"));
							$kode_kegiatan = sprintf("%09d",(substr($query_data['kode_kegiatan'],-9))+1);
							echo $kode_kegiatan;?>
							</td>
						</tr>
						</table>
                        </div>
                        <div class="panel-body">
					<form class="form-horizontal" action="?pert=tbl_kegiatan_proses&act=add" method="POST" enctype="multipart/form-data">
					<!--LEFT SECTION -->
					<div class="col-lg-10">
						<div class="form-group">
							<label class="control-label col-lg-4">KODE KEGIATAN</label>
							<div class="col-lg-8">
								<input type="text" name="kode_kegiatan" value="KEG<?php echo $kode_kegiatan;?>" class="form-control" readonly />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA PROJECT</label>
							<div class="col-lg-8">
								<select class="form-control chzn-select" name="kode_project">
									<option value="">Pilih Nama Project</option>
										<?php $query_project = mysql_query("select * from tbl_project order by nama_project ASC");
										while($data_project = mysql_fetch_array($query_project)){
										?>	
											<option value="<?php echo $data_project['kode_project'];?>"><?php echo $data_project['nama_project'];?></option>
										<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA KEGIATAN</label>
							<div class="col-lg-8">
								<input type="text" name="nama_kegiatan" placeholder="Nama Kegiatan" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">WAKTU OPTIMIS</label>
							<div class="col-lg-8">
								<input type="text" name="waktuselesai_optimis" placeholder="Waktu Dalam Hari" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">WAKTU MEMUNGKINKAN</label>
							<div class="col-lg-8">
								<input type="text" name="waktuselesai_realistis" placeholder="Waktu Dalam Hari" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">WAKTU PESIMIS</label>
							<div class="col-lg-8">
								<input type="text" name="waktuselesai_pesimis" placeholder="Waktu Dalam Hari" class="form-control" />
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
