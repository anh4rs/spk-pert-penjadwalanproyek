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
                            JALUR KRITIS
							</td>
							<td width="50%" align="right" >
								<a href="?pert=tbl_jalurkritis_add" target="_blank" title="Tambah Daftar Kelulusan"><button class="btn btn-success btn-xs"><i class="icon-plus icon-white"></i></button></a>
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
                                            <th style="vertical-align:middle;text-align:center;">NAMA PROJECT</th>
                                            <th style="vertical-align:middle;text-align:center;">NAMA JALUR</th>
                                            <th style="vertical-align:middle;text-align:center;">WAKTU SELESAI TERCEPAT</th>
                                            <th style="vertical-align:middle;text-align:center;">WAKTU SELESAI TERLAMBAT</th>
                                            <th>ACT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$query = mysql_query("SELECT * FROM tbl_jalurkritis left join tbl_project on tbl_project.kode_project=tbl_jalurkritis.kode_project order by id_jalurkritis ASC");
									$no = 1;
									while ($data = mysql_fetch_array($query)){
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $data['nama_project'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['nama_jalur'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['earliest_start'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['latest_finish'];?></td>
                                            <td class="center" width="50px">
											<a href="?pert=tbl_jalurkritis_proses&act=delete&id=<?php echo $data['id_jalurkritis'];?>" target="_blank"><button class="btn btn-danger btn-xs"><i class="icon-trash icon-white"></i></button></a>
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
        
