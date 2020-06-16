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
                            BASIS ATURAN
							</td>
							<td width="50%">
							<?php
							$filtername = "Filter Nama Project";
							$filter = "";
							if($_GET['filter']){
								$query_data_project = mysql_fetch_array(mysql_query("SELECT * FROM tbl_project where kode_project='$_GET[filter]'"));
								$filtername = "$query_data_project[nama_project]";
								$filter = "and tbl_kegiatan.kode_project='$query_data_project[kode_project]'";
							}
							?>
							
							<select name="formc" onchange="location = this.value;" class="form-control">
								<option value=""><?php echo $filtername;?></option>
								<?php 
								$query_project = mysql_query("SELECT * FROM tbl_project where kode_project!='$query_data_project[kode_project]' order by nama_project ASC");
								while($data_project = mysql_fetch_array($query_project)){
									echo "<option value='?pert=tbl_basis_aturan&filter=$data_project[kode_project]'>$data_project[nama_project]</option>";
								}
								?>
								<option value="?pert=tbl_basis_aturan">Semua</option>
								</select>
							</td>
							<td width="20%" align="right" >
								<a href="?pert=tbl_basis_aturan_add" target="_blank" title="Tambah Basis Aturan"><button class="btn btn-success btn-xs"><i class="icon-plus icon-white"></i></button></a>
							</td>
						</tr>
						</table>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="datatabel">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA PROJECT</th>
                                            <th>KEGIATAN</th>
                                            <th>KEGIATAN SEBELUMNYA</th>
                                            <th>KEGIATAN SETELAHNYA</th>
                                            <th>ACT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$query = mysql_query("SELECT * FROM tbl_basis_aturan, tbl_kegiatan where tbl_kegiatan.kode_kegiatan=tbl_basis_aturan.kode_kegiatan $filter order by id_basis ASC");
									$no = 1;
									while ($data = mysql_fetch_array($query)){
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no;?></td>
											<td><?php 
											$query_data_project_show = mysql_fetch_array(mysql_query("SELECT * FROM tbl_project where kode_project='$data[kode_project]'"));
												echo $query_data_project_show['nama_project'];
											?></td>
                                            <td><?php echo $data['nama_kegiatan'];?></td>
                                            <td><?php 
											$query_data = mysql_fetch_array(mysql_query("SELECT * FROM tbl_kegiatan where kode_kegiatan='$data[kegiatan_sebelumnya]'"));
												echo $query_data['nama_kegiatan'];
											?></td>
                                            <td><?php 
											$query_data = mysql_fetch_array(mysql_query("SELECT * FROM tbl_kegiatan where kode_kegiatan='$data[kegiatan_setelahnya]'"));
												echo $query_data['nama_kegiatan'];
											?></td>
                                            <td class="center" width="50px">
											<a href="?pert=tbl_basis_aturan_edit&id=<?php echo $data['id_basis'];?>" target="_blank"><button class="btn btn-info btn-xs"><i class="icon-pencil icon-white"></i></button></a>
											<a href="?pert=tbl_basis_aturan_proses&act=delete&id=<?php echo $data['id_basis'];?>" target="_blank"><button class="btn btn-danger btn-xs"><i class="icon-trash icon-white"></i></button></a>
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
        
