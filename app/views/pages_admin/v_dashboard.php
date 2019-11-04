<!DOCTYPE html>
<html>

<head>
    <title><?=$this->app->_item('site_title');?> - <?=$this->uri->segment(2) != "" ? $this->myfunction->hapus_underscore_min1($this->uri->segment(2)) : "";?> <?=$this->myfunction->hapus_underscore_min1($this->uri->segment(1));?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="<?=$this->app->_item('description');?>">
    <meta name="author" content="<?=$this->app->_item('author');?>">
    <meta content="no-cache, no-store, must-revalidate" http-equiv="Cache-Control"/>
    <meta content="0" http-equiv="Expires"/>
    <meta name="theme-color" content="#0091ea"> 

    <!-- Fonts -->
    <link href="/lib/css/Nunito.css" rel="stylesheet" >
    <link href="/lib/css/Chilanka.css" rel="stylesheet" >
    <link href="/lib/css/Roboto.css" rel="stylesheet" >

    <link href="/lib/images/favicon.png" rel="shortcut icon">
    <link href="/lib/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/lib/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="/lib/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="/lib/plugins/custombox/dist/custombox.min.css" rel="stylesheet">
    <link href="/lib/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
    <!--venobox lightbox-->
    <link href="/lib/plugins/magnific-popup/dist/magnific-popup.css" rel="stylesheet" type="text/css" />

    <link href="/lib/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="/lib/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="/lib/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    <link href="/lib/plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="/lib/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/lib/css/core.css" rel="stylesheet" type="text/css">
    <link href="/lib/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/lib/css/components.css" rel="stylesheet" type="text/css">
    <link href="/lib/css/pages.css" rel="stylesheet" type="text/css">
    <link href="/lib/css/color-primary.css" rel="stylesheet" type="text/css">
    <link href="/lib/css/menu.css" rel="stylesheet" type="text/css">
    <link href="/lib/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="/lib/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/lib/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <script src="/lib/js/jquery.min.js"></script>
    <?= !empty($link_js) ? $link_js : ""; ?>
</head>
<?php $datauser = $this->db->get_where('tbl_user', array('id_user' =>  $this->session->userdata('sess_pkg_id')))->row_array(); ?>

<body class="fixed-left" onload="<?= !empty($load_js) ? $load_js : ""; ?>">
    <!-- Begin page -->
    <div id="wrapper">
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="./" class="logo" style="font-size:27px;"><i class="fe-file-text"></i> <span>SI-PKG</span> </a>
                </div>
            </div>
            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="ti ti-menu"></i>
                            </button>
                            <span class="text-header" style="font-size:16px; color:#FFF;"> <?=$this->app->_item('app_name');?></span>
                            <span class="clearfix"></span>
                        </div>

                        <ul class="nav navbar-nav navbar-right pull-right">           
                            <li class="dropdown">
                                <?php
                                $foto = $datauser['foto'] != NULL ? $datauser['foto'] : 'null.jpg';
                                if ((file_exists('lib/images/user/' . $foto) == FALSE) || $datauser['foto'] == NULL) {
                                    $file = base_url('lib/images/user/null.jpg');
                                } else {
                                    $file = base_url('lib/images/user/' . $datauser['foto']);
                                }
                                ?>
                                <a href="#" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?=$file;?>" alt="user-img" class=" user-img">
                                    <span class="name">
                                        <?= $datauser['nama_lengkap']; ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/profil/"><i class="ti-user m-r-5"></i> Profil</a></li>
                                    <li><a data-toggle="modal" href="#confirmLockscreen"><i class="ti-lock m-r-5"></i> Kunci Layar</a></li>
                                    <li class="divider"></li>
                                    <li><a data-toggle="modal" href="#confirmLogout"><i class="ti-power-off m-r-5 text-danger"></i> <span class="text-danger">Keluar</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <div id="sidebar-menu">
                    <ul>
                        <li class="text-muted menu-title">Main Menu</li>
                        <li>
                            <a href="/beranda/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "beranda" ? "active" : ""; ?>">
                                <i class="fe-home"></i><span> Beranda </span></a>
                        </li>
                        <?php if ($this->session->userdata('sess_pkg_role') == "Administrator") { ?>
                        <li>
                            <a href="/data-sekolah/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "data-sekolah" ? "active" : ""; ?>">
                                <i class="fe-briefcase"></i><span> Data Sekolah</span></a>
                        </li>
                        <li>
                            <a href="/data-tugas/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "data-tugas" ? "active" : ""; ?>">
                                <i class="fe-user-plus"></i><span> Data Tugas</span></a>
                        </li>
                        <li>
                            <a href="/data-guru/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "data-guru" ? "active" : ""; ?>">
                                <i class="fe-users"></i><span> Data Guru</span></a>
                        </li>
                        <li>
                            <a href="/data-pengawas/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "data-pengawas" ? "active" : ""; ?>">
                                <i class="fe-user-check"></i><span> Data Pengawas</span></a>
                        </li>
                        
                        
                        <li>
                            <a href="/data-kompetensi/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "data-kompetensi" ? "active" : ""; ?>">
                                <i class="fe-box"></i><span> Data Kompetensi</span></a>
                        </li>
                        <li>
                            <a href="/data-indikator/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "data-indikator" ? "active" : ""; ?>">
                                <i class="fe-layers"></i><span> Data Indikator</span></a>
                        </li>
                        <li>
                            <a href="/data-golongan/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "data-golongan" ? "active" : ""; ?>">
                                <i class="fe-grid"></i><span> Data Golongan</span></a>
                        </li>
                        
                        <li>
                            <a href="/data-user/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "data-user" ? "active" : ""; ?>">
                                <i class="fe-user"></i><span> Data User</span></a>
                        </li>
                        <?php } elseif ($this->session->userdata('sess_pkg_role') == "Guru") { ?>
                        <li>
                            <a href="/data-penilaian-guru/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "data-penilaian-guru" ? "active" : ""; ?>">
                                <i class="fe-award"></i><span> Data Penilaian Guru</span></a>
                        </li>
                        <li>
                            <a href="/data-laporan/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "data-laporan" ? "active" : ""; ?>">
                                <i class="fe-printer"></i><span> Data Laporan</span></a>
                        </li>
                        <?php } elseif ($this->session->userdata('sess_pkg_role') == "Pengawas") { ?>
                        <li>
                            <a href="/data-penilaian-kepsek/" class="waves-effect waves-primary <?php echo $this->uri->segment(1) == "data-penilaian-kepsek" ? "active" : ""; ?>">
                                <i class="fe-award"></i><span> Data Penilaian Kepsek</span></a>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="page-title-box">
                                <ol class="breadcrumb pull-right hidden-xs">
                                    <?php if ($this->uri->segment(1) != "beranda") { ?>
                                        <li class="K"><a href="/beranda/">Beranda</a></li>
                                        <li><a href="<?php echo base_url($this->uri->segment(1)); ?>/"><?php echo $this->myfunction->hapus_underscore($this->uri->segment(1)); ?></a></li>
                                    <?php } ?>
                                    <?php if (!empty($this->uri->segment(2))) { ?>
                                        <li class="K"><?php echo $this->myfunction->hapus_underscore($this->uri->segment(2)) ?></li>
                                    <?php } ?>
                                </ol>
                                <h4 class="page-title"><?php echo $this->myfunction->hapus_underscore($this->uri->segment(1)); ?></h4>
                            </div>
                        </div>
                    </div>
                    <noscript>
                        <div class="alert alert-danger"><strong>Sorry</strong>, your browser does not support <strong>JavaScript!</strong></div>
                    </noscript>
                    <?php !empty($konten) ? $this->load->view($konten) : ""; ?>
                </div>
                <!-- end container -->
            </div>
            <!-- end content -->
            <footer class="footer text-right">
                <div class="container">
                    <div class="row">
                        <div class="footer-width-max">
                            <div class="col-xs-12">
                                © <?php echo date('Y');?> <?=$this->app->_item('app_name');?>. All right reserved <div class="pull-right"> Powered by <a href><?=$this->app->_item('developer');?></a></div>
                            </div>
                        </div>
                        <div class="footer-width-min" style="display: none;">
                            <div class="col-xs-12">
                                © <?php echo date('Y');?> <div class="pull-right"> Powered by <a href><?=$this->app->_item('developer');?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
        <div id="confirmLogout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content p-0 b-0">
                    <div class="panel panel-color panel-color-primary">
                        <div class="panel-heading">
                            <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="panel-title">Konfirmasi Keluar</h3>
                        </div>
                        <div class="panel-body">
                            Anda yakin untuk keluar dari administrator <?=$this->app->_item('app_name');?> ?
                        </div>
                        <div class="modal-footer" style="padding:10px;">
                            <button class="btn btn-color-primary waves-effect waves-light btnExit logOut"><i class="fa fa-sign-out"></i> Keluar</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div id="confirmLockscreen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog ">
                <div class="modal-content p-0 b-0">
                    <div class="panel panel-color panel-color-primary">
                        <div class="panel-heading">
                            <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="panel-title">Konfirmasi Kunci Layar</h3>
                        </div>
                        <div class="panel-body">
                            Anda yakin untuk mengunci layar administrator <?=$this->app->_item('app_name');?> ?
                        </div>
                        <div class="modal-footer" style="padding:10px;">
                            <a href="javascript:void(0)" class="btn btn-warning waves-effect waves-light lockscreen"><i class="fa fa-lock"></i> Kunci</a>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div id="confirm-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content p-0 b-0">
                    <div class="panel panel-color panel-color-primary">
                        <div class="panel-heading">
                            <button type="button" class="close  " data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="panel-title" id="myModalLabel">Konfirmasi Hapus</h3>
                        </div>
                        <div class="panel-body">
                            <p>Anda akan menghapus satu baris dari data tabel. Anda yakin untuk menghapus? <br><span class="debug-data"></span></p>
                        </div>
                        <div class="modal-footer" style="padding:10px;">
                            <button type="button" class="btn btn-inverse waves-effect" data-dismiss="modal">Batal</button>
                            <a class="btn btn-danger waves-effect waves-light btn-ok">Hapus</a>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div id="confirm-asesor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content p-0 b-0">
                    <div class="panel panel-color panel-color-primary">
                        <div class="panel-heading">
                            <button type="button" class="close  " data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="panel-title" id="myModalLabel">Konfirmasi <span  class="asesor-value"></span> Asesor</h3>
                        </div>
                        <div class="panel-body">
                            <p>Anda akan <span style="font-weight:bold;" class="asesor-value"></span> nama guru <span style="font-weight:bold;" class="data-get"></span> sebagai asesor. Apakah anda yakin ?</p>
                        </div>
                        <div class="modal-footer" style="padding:10px;">
                            <a class="btn btn-primary waves-effect waves-light btn-asesor">Submit</a>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
    </div>
    <!-- END wrapper -->
    <script>
        var resizefunc = [];
    </script>
    <!-- Plugins  -->
    <script src="/lib/js/modernizr.min.js"></script>
    <script src="/lib/js/bootstrap.min.js"></script>
    <script src="/lib/js/detect.js"></script>
    <script src="/lib/js/fastclick.js"></script>
    <script src="/lib/js/jquery.slimscroll.js"></script>
    <script src="/lib/js/jquery.blockUI.js"></script>
    <script src="/lib/js/waves.js"></script>
    <script src="/lib/js/wow.min.js"></script>
    <script src="/lib/js/jquery.nicescroll.js"></script>
    <script src="/lib/js/jquery.scrollTo.min.js"></script>
    <script src="/lib/plugins/switchery/switchery.min.js"></script>
    <script src="/lib/plugins/select2/select2.js" type="text/javascript"></script>
    <script src="/lib/plugins/switchery/switchery.min.js"></script>
    <script src="/lib/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/lib/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="/lib/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/lib/plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="/lib/plugins/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="/lib/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="/lib/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/lib/plugins/datatables/responsive.bootstrap.min.js"></script>
    <script src="/lib/plugins/datatables/dataTables.scroller.min.js"></script>
    <script src="/lib/plugins/moment/moment.js"></script>
    <script src="/lib/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script src="/lib/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/lib/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/lib/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="/lib/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/lib/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <!-- Datatable init js -->
    <script src="/lib/pages/datatables.init.js"></script>
    <!-- Modal-Effect -->
    <script src="/lib/plugins/custombox/dist/custombox.min.js"></script>
    <script src="/lib/plugins/custombox/dist/legacy.min.js"></script>
    <!-- Notification js -->
    <script src="/lib/plugins/notifyjs/dist/notify.min.js"></script>
    <script src="/lib/plugins/notifications/notify-metro.js"></script>
    <!-- Validation js (Parsleyjs) -->
    <script src="/lib/plugins/parsleyjs/dist/parsley.min.js" type="text/javascript"></script>
    <!-- Counter Up  -->
    <script src="/lib/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="/lib/plugins/counterup/jquery.counterup.min.js"></script>
    <script src="/lib/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    
    <!-- Circliful -->
    <script src="/lib/plugins/jquery-circliful/js/jquery.circliful.min.js"></script>
    
    <!-- App js -->
    <script src="/lib/js/jquery.core.js"></script>
    <script src="/lib/js/jquery.app.js"></script>
    <script src="/lib/js/script.js?version=1.0"></script>
    <?= !empty($add_js_app) ? $add_js_app : ""; ?>

    <!-- Gallery js -->
    <script src="/lib/plugins/isotope/dist/isotope.pkgd.min.js"></script>
    <script src="/lib/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
</body>

</html>
