
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
                            UBAH PROJECT
							</td>
							<td width="50%" align="right" >
                            ID : 
							<?php
							$kode_project = $_GET['id'];
							$query_data = mysql_fetch_array(mysql_query("select * from tbl_project where kode_project='$kode_project'"));
							$kode_project = $query_data['kode_project'];
							echo $kode_project;?>
							</td>
						</tr>
						</table>
                        </div>
                        <div class="panel-body">
					<form class="form-horizontal" action="?pert=tbl_project_proses&act=edit" method="POST" enctype="multipart/form-data">
					<!--LEFT SECTION -->
					<div class="col-lg-10">
						<div class="form-group">
							<label class="control-label col-lg-4">KODE PROJECT</label>
							<div class="col-lg-8">
								<input type="text" name="kode_project" value="<?php echo $kode_project;?>" class="form-control" readonly />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">NAMA PROJECT</label>
							<div class="col-lg-8">
								<input type="text" name="nama_project" value="<?php echo $query_data['nama_project'];?>" class="form-control" />
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
