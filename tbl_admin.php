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
                            DAFTAR ADMIN
							</td>
							<td width="50%" align="right" >
								<a href="?pert=tbl_admin_add" target="_blank" title="Tambah Daftar Solusi"><button class="btn btn-success btn-xs"><i class="icon-plus icon-white"></i></button></a>
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
                                            <th>USERNAME</th>
                                            <th>STATUS</th>
                                            <th>ACT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$query = mysql_query("SELECT * FROM tbl_admin ");
									$no = 1;
									while ($data = mysql_fetch_array($query)){
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $data['username'];?></td>
                                            <td><?php if($data['status']=="1"){echo "Aktif";}else{echo "Non Aktif";};?></td>
                                            <td class="center" width="50px">
											<a href="?pert=tbl_admin_edit&id=<?php echo $data['id_admin'];?>" target="_blank"><button class="btn btn-info btn-xs"><i class="icon-pencil icon-white"></i></button></a>
											<a href="?pert=tbl_admin_proses&act=delete&id=<?php echo $data['id_admin'];?>" target="_blank"><button class="btn btn-danger btn-xs"><i class="icon-trash icon-white"></i></button></a>
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
        
