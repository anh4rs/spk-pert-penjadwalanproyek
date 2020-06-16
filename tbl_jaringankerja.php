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
                            JARINGAN KERJA
							</td>
							<td width="50%" align="right" >
								<a href="?pert=tbl_jaringankerja_add" target="_blank" title="Tambah Basis Aturan"><button class="btn btn-success btn-xs"><i class="icon-plus icon-white"></i></button></a>
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
                                            <th rowspan="2" style="vertical-align:middle;text-align:center;">NAMA JALUR</th>
                                            <th rowspan="2" style="vertical-align:middle;text-align:center;">URUTAN KERJA</th>
                                            <th colspan="11" style="vertical-align:middle;text-align:center;">JARINGAN KERJA (HARI)</th>
                                            <th rowspan="2" style="vertical-align:middle;text-align:center;">ACT</th>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align:middle;text-align:center;">A</th>
                                            <th style="vertical-align:middle;text-align:center;">B</th>
                                            <th style="vertical-align:middle;text-align:center;">C</th>
                                            <th style="vertical-align:middle;text-align:center;">D</th>
                                            <th style="vertical-align:middle;text-align:center;">E</th>
                                            <th style="vertical-align:middle;text-align:center;">F</th>
                                            <th style="vertical-align:middle;text-align:center;">G</th>
                                            <th style="vertical-align:middle;text-align:center;">H</th>
                                            <th style="vertical-align:middle;text-align:center;">I</th>
                                            <th style="vertical-align:middle;text-align:center;">J</th>
                                            <th style="vertical-align:middle;text-align:center;">JUMLAH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$query = mysql_query("SELECT * FROM tbl_jaringankerja left join tbl_project on tbl_project.kode_project=tbl_jaringankerja.kode_project order by id_jaringankerja ASC");
									$no = 1;
									while ($data = mysql_fetch_array($query)){
									?>
                                        <tr class="odd gradeX">
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $no;?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['nama_project'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['nama_jalur'];?></td>
                                            <td>
											<ol>
											<?php 
											$urutan_kegiatan_explode = explode(',',$data['urutan_kegiatan']); 
											$urutan_kegiatan_implode = "'".implode("','",$urutan_kegiatan_explode)."'";
											$query_kegiatan = mysql_query("SELECT * FROM tbl_kegiatan where kode_kegiatan IN($urutan_kegiatan_implode)");
											while ($data_kegiatan = mysql_fetch_array($query_kegiatan)){
												echo "<li>$data_kegiatan[nama_kegiatan]</li>";
											}
											?>
											</ol>
											</td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['jaringan_1'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['jaringan_2'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['jaringan_3'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['jaringan_4'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['jaringan_5'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['jaringan_6'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['jaringan_7'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['jaringan_8'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['jaringan_9'];?></td>
                                            <td style="vertical-align:middle;text-align:center;"><?php echo $data['jaringan_10'];?></td>
                                            <td style="vertical-align:middle;text-align:center;">
											<?php echo $data['jaringan_1']+$data['jaringan_2']+$data['jaringan_3']+$data['jaringan_4']+
											$data['jaringan_5']+$data['jaringan_6']+$data['jaringan_7']+$data['jaringan_8']+$data['jaringan_9']+$data['jaringan_10'];?>
											</td>
                                            <td class="center" width="50px">
											<a href="?pert=tbl_jaringankerja_edit&id=<?php echo $data['id_jaringankerja'];?>" target="_blank"><button class="btn btn-info btn-xs"><i class="icon-pencil icon-white"></i></button></a>
											<a href="?pert=tbl_jaringankerja_proses&act=delete&id=<?php echo $data['id_jaringankerja'];?>" target="_blank"><button class="btn btn-danger btn-xs"><i class="icon-trash icon-white"></i></button></a>
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
        
