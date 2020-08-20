
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
                            UBAH BASIS ATURAN
							</td>
							<td width="50%" align="right" >
                            ID : 
							<?php
							$id_basis = $_GET['id'];
							$query_data = mysqli_fetch_array(mysqli_query($con, "select * from tbl_basis_aturan where id_basis='$id_basis'"));
							$id_basis = $query_data['id_basis'];
							echo $id_basis;?>
							</td>
						</tr>
						</table>
                        </div>
                        <div class="panel-body">
					<form class="form-horizontal" action="?pert=tbl_basis_aturan_proses&act=edit" method="POST" enctype="multipart/form-data">
					<!--LEFT SECTION -->
					<div class="col-lg-10">
					<input type="hidden" name="id_basis" value="<?php echo $query_data['id_basis'];?>"/>	
						
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA KEGIATAN UTAMA</label>
							<div class="col-lg-8">
								<select class="form-control chzn-select" name="kode_kegiatan">
									<?php $query_data_kegiatan = mysqli_fetch_array(mysqli_query($con, "select * from tbl_kegiatan where kode_kegiatan='$query_data[kode_kegiatan]'"));?>
									<option value="<?php echo $query_data_kegiatan['kode_kegiatan'];?>"><?php echo $query_data_kegiatan['nama_kegiatan'];?></option>
										<?php $query_kegiatan = mysqli_query($con, "select * from tbl_kegiatan where kode_kegiatan !='$query_data[kode_kegiatan]' and kode_project='$query_data_kegiatan[kode_project]' order by id_kegiatan ASC");
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
									<?php $query_data_kegiatan_sebelumnya = mysqli_fetch_array(mysqli_query($con, "select * from tbl_kegiatan where kode_kegiatan='$query_data[kegiatan_sebelumnya]'"));?>
									<option value="<?php echo $query_data_kegiatan_sebelumnya['kode_kegiatan'];?>"><?php echo $query_data_kegiatan_sebelumnya['nama_kegiatan'];?></option>
										<?php $query_kegiatan = mysqli_query($con, "select * from tbl_kegiatan where kode_kegiatan !='$query_data[kegiatan_sebelumnya]' and kode_project='$query_data_kegiatan[kode_project]' order by id_kegiatan ASC");
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
									<?php $query_data_kegiatan_sebelumnya = mysqli_fetch_array(mysqli_query($con, "select * from tbl_kegiatan where kode_kegiatan='$query_data[kegiatan_setelahnya]'"));?>
									<option value="<?php echo $query_data_kegiatan_sebelumnya['kode_kegiatan'];?>"><?php echo $query_data_kegiatan_sebelumnya['nama_kegiatan'];?></option>
										<?php $query_kegiatan = mysqli_query($con, "select * from tbl_kegiatan where kode_kegiatan !='$query_data[kegiatan_setelahnya]' and kode_project='$query_data_kegiatan[kode_project]' order by id_kegiatan ASC");
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

