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
                            DAFTAR PROJECT
							<td>
							<td width="20%" align="right" >
								<a href="?pert=tbl_project_add" target="_blank" title="Tambah Project"><button class="btn btn-success btn-xs"><i class="icon-plus icon-white"></i></button></a>
							</td>
						</tr>
						</table>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="datatabel">
                                    <thead>
										<tr>
											<th style="vertical-align:middle;text-align:center;">NO</th>
											<th style="vertical-align:middle;text-align:center;">KODE PROJECT</th>
											<th style="vertical-align:middle;text-align:center;">NAMA PROJECT</th>
											<th style="vertical-align:middle;text-align:center;">ACT</th>
										</tr>
                                    </thead>
                                    <tbody>
									<?php 
									$query = mysql_query("SELECT * FROM tbl_project order by id_project ASC");
									$no = 1;
									while ($data = mysql_fetch_array($query)){
									?>
                                        <tr class="odd gradeX">
                                            <td style="vertical-align:middle;text-align:right;"><?php echo $no;?></td>
                                            <td><?php echo $data['kode_project'];?></td>
                                            <td><?php echo $data['nama_project'];?></td>
                                            <td class="center" width="50px">
											<a href="?pert=tbl_project_edit&id=<?php echo $data['kode_project'];?>" target="_blank"><button class="btn btn-info btn-xs"><i class="icon-pencil icon-white"></i></button></a>
											<a href="?pert=tbl_project_proses&act=delete&id=<?php echo $data['kode_project'];?>" target="_blank"><button class="btn btn-danger btn-xs"><i class="icon-trash icon-white"></i></button></a>
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
        
