
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
                            UBAH DAFTAR ADMIN
							</td>
							<td width="50%" align="right" >
                            ID : 
							<?php
							$id_admin = $_GET['id'];
							$query_data = mysqli_fetch_array(mysqli_query($con, "select * from tbl_admin where id_admin='$id_admin'"));
							$id_admin = $query_data['id_admin'];
							echo $id_admin;?>
							</td>
						</tr>
						</table>
                        </div>
                        <div class="panel-body">
					<form class="form-horizontal" action="?pert=tbl_admin_proses&act=edit" method="POST" enctype="multipart/form-data">
					<!--LEFT SECTION -->
					<div class="col-lg-10">
					<input type="hidden" name="id_admin" value="<?php echo $query_data['id_admin'];?>"/>
						
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA LENGKAP</label>
							<div class="col-lg-8">
								<input type="text" name="nama_lengkap" value="<?php echo $query_data['nama_lengkap'];?>" class="form-control" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-lg-4">USERNAME</label>
							<div class="col-lg-8">
								<input type="text" name="username" value="<?php echo $query_data['username'];?>" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">PASSWORD</label>
							<div class="col-lg-8">
								<input type="password" name="password" value="<?php echo $query_data['password'];?>" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4" for="dp2">STATUS</label>
							<div class="col-lg-8">
								<select class="form-control chzn-select" name="status">
									<option value="<?php echo $query_data['status'];?>"><?php if($query_data['status']=='1'){echo "Aktif";}else{echo "Non Aktif";}?></option>
									<option value="1">Aktif</option>
									<option value="0">Non Aktif</option>
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

