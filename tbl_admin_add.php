
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
                            TAMBAH DAFTAR ADMIN
							</td>
						</tr>
						</table>
                        </div>
                        <div class="panel-body">
					<form class="form-horizontal" action="?pert=tbl_admin_proses&act=add" method="POST" enctype="multipart/form-data">
					<!--LEFT SECTION -->
					<div class="col-lg-10">
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA LENGKAP</label>
							<div class="col-lg-8">
								<input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control" />
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-lg-4">USERNAME</label>
							<div class="col-lg-8">
								<input type="text" name="username" placeholder="Username" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">PASSWORD</label>
							<div class="col-lg-8">
								<input type="password" name="password" placeholder="Password" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4" for="dp2">STATUS</label>
							<div class="col-lg-8">
								<select class="form-control chzn-select" name="status">
									<option value="">Pilih Status Admin</option>
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
