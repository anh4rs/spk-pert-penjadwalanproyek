<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if($_GET['pert']=='' OR $_GET['pert']=='Home'){ $HOME = "active"; }else{ $HOME = ""; }

if($_GET['pert']=='tbl_basis_aturan'){ $BASIS = "active"; }else{ $BASIS = ""; }

if($_GET['pert']=='tbl_jaringankerja'){ $JARINGAN = "active"; }else{ $JARINGAN = ""; }

if($_GET['pert']=='tbl_jalurkritis'){ $PARAMETER = "active"; }else{ $PARAMETER = ""; }

if($_GET['pert']=='tbl_admin'){ $ADMIN = "active"; }else{ $ADMIN = ""; }

if($_GET['pert']=='tbl_kegiatan'){ $KEGIATAN = "active"; }else{ $KEGIATAN = ""; }

if($_GET['pert']=='tbl_project'){ $PROEJCT = "active"; }else{ $PROEJCT = ""; }

?>
<!-- MENU SECTION -->
       <div id="left" >
           
            <ul id="menu" class="collapse">               
                <li class="panel <?php echo $HOME;?>">
                    <a href="?pert=Home" >
                        <i class="icon-table"></i> HOME
	   
                       
                    </a>                   
                </li>
                <li class="panel <?php echo $PROEJCT;?>">
                    <a href="?pert=tbl_project">
                        <i class="icon-tasks"> </i> DAFTAR PROEJCT     
                        <span class="pull-right">
                          
                        </span>
                       &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                </li>
                <li class="panel <?php echo $KEGIATAN;?>">
                    <a href="?pert=tbl_kegiatan">
                        <i class=" icon-group"> </i> DAFTAR KEGIATAN     
                        <span class="pull-right">
                          
                        </span>
                       &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                </li>
                <li class="panel <?php echo $BASIS;?>">
                    <a href="?pert=tbl_basis_aturan">
                        <i class="icon-key"> </i> BASIS ATURAN     
                        <span class="pull-right">
                          
                        </span>
                       &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                </li>
				
                <li class="panel <?php echo $JARINGAN;?>">
                    <a href="?pert=tbl_jaringankerja">
                        <i class="icon-link"> </i> JARINGAN KERJA    
                        <span class="pull-right">
                          
                        </span>
                       &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                </li>
                <li class="panel <?php echo $PARAMETER;?>">
                    <a href="?pert=tbl_jalurkritis">
                        <i class="icon-warning-sign"> </i> JALUR KRITIS    
                        <span class="pull-right">
                          
                        </span>
                       &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                </li>
                <li class="panel <?php echo $ADMIN;?>">
                    <a href="?pert=tbl_admin">
                        <i class="icon-user-md"> </i> ADMIN     
                        <span class="pull-right">
                          
                        </span>
                       &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                </li>
                <li class="panel">
                    <a href="?pert=Logout">
                        <i class="icon-signout"> </i> LOGOUT     
                        <span class="pull-right">
                          
                        </span>
                       &nbsp; <span class="label label-default"></span>&nbsp;
                    </a>
                </li>
				
            </ul>

        </div>
        <!--END MENU SECTION -->