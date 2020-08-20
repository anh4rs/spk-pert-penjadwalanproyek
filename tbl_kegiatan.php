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
							<td width="30%">
                            DAFTAR KEGIATAN
							<td>
							<td width="50%">
							<?php
							$filtername = "Filter Nama Project";
							if($_GET['filter']){
								$query_project = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tbl_project where kode_project='$_GET[filter]'"));
								$filtername = "$query_project[nama_project]";
							}
							?>
							
							<select name="formc" onchange="location = this.value;" class="form-control">
								<option value=""><?php echo $filtername;?></option>
								<?php 
								$query_project = mysqli_query($con, "SELECT * FROM tbl_project order by nama_project ASC");
								while($data_project = mysqli_fetch_array($query_project)){
									echo "<option value='?pert=tbl_kegiatan&filter=$data_project[kode_project]'>$data_project[nama_project]</option>";
								}
								?>
								<option value="?pert=tbl_kegiatan">Semua</option>
								</select>
							</td>
							<td width="20%" align="right" >
								<a href="?pert=tbl_kegiatan_add" target="_blank" title="Tambah Kegiatan"><button class="btn btn-success btn-xs"><i class="icon-plus icon-white"></i></button></a>
							</td>
						</tr>
						</table>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="datatabel">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="vertical-align:middle;text-align:center;">NO</th>
                                            <th rowspan="2" style="vertical-align:middle;text-align:center;">NAMA PROJECT</th>
                                            <th rowspan="2" style="vertical-align:middle;text-align:center;">NAMA KEGIATAN</th>
                                            <th colspan="3" style="vertical-align:middle;text-align:center;">WAKTU SELESAI (HARI)</th>
                                            <th colspan="2" style="vertical-align:middle;text-align:center;">PERKIRAAN SELESAI<br>(HARI)</th>
                                            <th rowspan="2" style="vertical-align:middle;text-align:center;">ACT</th>
                                        </tr>
										<tr>
											<th style="vertical-align:middle;text-align:center;">OPTIMIS</th>
											<th style="vertical-align:middle;text-align:center;">REALISTIS</th>
											<th style="vertical-align:middle;text-align:center;">PESIMIS</th>
											<th style="vertical-align:middle;text-align:center;">PERT</th>
											<th style="vertical-align:middle;text-align:center;">CEIL</th>
										</tr>
                                    </thead>
                                    <tbody>
									<?php 
									$filter = "";
									if($_GET['filter']){
										$filter = "where tbl_kegiatan.kode_project='$_GET[filter]'";
									}
									$query = mysqli_query($con, "SELECT * FROM tbl_kegiatan left join tbl_project on tbl_project.kode_project=tbl_kegiatan.kode_project $filter order by id_kegiatan ASC");
									$no = 1;
									while ($data = mysqli_fetch_array($query)){
									?>
                                        <tr class="odd gradeX">
                                            <td style="vertical-align:middle;text-align:right;"><?php echo $no;?></td>
                                            <td><?php echo $data['nama_project'];?></td>
                                            <td><?php echo $data['nama_kegiatan'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['waktuselesai_optimis'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['waktuselesai_realistis'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['waktuselesai_pesimis'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['waktuselesai_perkiraan'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo ceil($data['waktuselesai_perkiraan']);?></td>
                                            <td class="center" width="50px">
											<a href="?pert=tbl_kegiatan_edit&id=<?php echo $data['kode_kegiatan'];?>" target="_blank"><button class="btn btn-info btn-xs"><i class="icon-pencil icon-white"></i></button></a>
											<a href="?pert=tbl_kegiatan_proses&act=delete&id=<?php echo $data['kode_kegiatan'];?>" target="_blank"><button class="btn btn-danger btn-xs"><i class="icon-trash icon-white"></i></button></a>
											</td>
                                        </tr>
									<?php 
									$no++;
									} ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
			<?php include "footer.php";?>
            </div>
        </div>
       <!--END PAGE CONTENT -->
<script src="assets/plugins/jquery-2.0.3.min.js"></script>
<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {
		$('#datatabel').DataTable();
	});
</script>
        
