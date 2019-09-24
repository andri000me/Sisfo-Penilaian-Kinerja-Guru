<?php
if ($jenis_laporan == "Akta Nikah") {
  $sql_1 = $this->db
                ->select('*')
                ->from("tbl_akta")
                ->join('tbl_registrasi', 'tbl_akta.id_registrasi = tbl_registrasi.id_registrasi')
                ->join('tbl_penghulu', 'tbl_akta.id_penghulu = tbl_penghulu.id_penghulu')
                ->where('date_format(tbl_akta.created_at,"%Y-%m-%d") BETWEEN "' . $tgl1 . '" AND "' . $tgl2 . '"')
                ->order_by('tbl_akta.created_at', 'ASC')
                ->get();
  $title = 'AKTA NIKAH';
}elseif ($jenis_laporan == "Pendaftar") {
  $sql_1 = $this->db
                ->select('*')
                ->from("tbl_registrasi")
                ->where('date_format(tbl_registrasi.created_at,"%Y-%m-%d") BETWEEN "' . $tgl1 . '" AND "' . $tgl2 . '"')
                ->order_by('id_registrasi', 'ASC')
                ->get();
  $title = 'PENDAFTAR';
}
$row_1 = $sql_1->num_rows();
$dta_1 = $sql_1->row();
if ($row_1 > 0) {
  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Data Laporan Sistem Informasi Pencatatan Nikah</title>
    <meta name="description" content="Sistem Informasi Pencatatan Nikah">
    <meta name="author" content="Rezky P. Budihartono">
    <link href="/lib/assets/images/favicon.png" rel="shortcut icon">
    <link href="/lib/assets/css/Nunito.css" rel="stylesheet" >
    <link href="/lib/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/lib/assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/custombox/dist/custombox.min.css" rel="stylesheet">
    <link href="/lib/assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
    <!--venobox lightbox-->
    <link href="/lib/assets/plugins/magnific-popup/dist/magnific-popup.css" rel="stylesheet" type="text/css" />

    <link href="/lib/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="/lib/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="/lib/assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" />

    <!-- DataTables -->
    <link href="/lib/assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="/lib/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="/lib/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/pages.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/color-primary.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/menu.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/lib/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <script src="/lib/assets/js/jquery.min.js"></script>

  </head>

  <body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
      <div class="container">
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="card-box">
              <!-- <div class="panel-heading">
                                                <h4>Invoice</h4>
                                            </div> -->
              <div class="panel-body">
                <div class="clearfix">
                  <div class="pull-left">
                    <h1 class="text-right" style="font-family: 'Nunito', sans-serif"><img src="/lib/assets/images/logo.svg" width="70"> Sistem Informasi Pencatatan Nikah</h1>
                    <p> Jumlah Data : <strong><?= $row_1; ?></strong></p>
                  </div>
                  <div class="pull-right">
                    
                    <p>Tanggal Hari Ini : <?= $this->myfunction->format_tgl3(date('Y-m-d')); ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <h3 align="center" style="text-decoration:underline; font-family: 'Nunito' , sans-serif">DATA LAPORAN <?= $title; ?></h3>
                    <div class="table-responsive">
                      <?php if ($jenis_laporan == "Akta Nikah") { ?>
                        <table class="table m-t-30 table-bordered">
                          <thead>
                            <tr>
                              <th style="text-align: center;">No</th>
                              <th style="text-align: center;">Nama Pendaftar</th>
                              <th style="text-align: center;">Nama Penghulu</th>
                              <th style="text-align: center;">No Akta</th>
                              <th style="text-align: center;">Tanggal Nikah</th>
                              <th style="text-align: center;">Tempat Nikah</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($sql_1->result() as $row) {
                              ?>
                              <tr>
                                <td width="1%" align="center"><?=$no; ?></td>
                                <td width="20%" align="left"><?=$row->nama_lengkap; ?> </td>
                                <td width="20%" align="left"><?=$row->nama_penghulu; ?> </td>
                                <td width="10%" align="center"><?=$row->no_akta; ?> </td>
                                <td width="15%" align="center"><?=$row->tgl_nikah; ?> </td>
                                <td width="20%" align="left"><?=$row->tempat_nikah; ?> </td>
                              </tr>
                              <?php $no++;
                            } ?>
                          </tbody>
                        </table>
                      <?php } elseif ($jenis_laporan == "Pendaftar") { ?>
                        <table class="table m-t-30 table-bordered">
                          <thead>
                            <tr>
                              <th style="text-align: center;">No</th>
                              <th style="text-align: center;">NIK</th>
                              <th style="text-align: center;">Nama Lengkap</th>
                              <th style="text-align: center;">Alamat</th>
                              <th style="text-align: center;">No Telp</th>
                              <th style="text-align: center;">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            foreach ($sql_1->result() as $row) {
                              ?>
                              <tr>
                                <td width="1%" align="center"><?= $no; ?></td>
                                <td width="16%" align="center"><?= $row->nik; ?> </td>
                                <td width="25%" align="left"><?= $row->nama_lengkap; ?> </td>
                                <td width="20%" align="left"><?= $row->alamat; ?> </td> 
                                <td width="10%" align="center"><?= $row->no_telp; ?> </td>
                                <td width="10%" align="center"><?= $row->status == "Y" ? "<span class='label label-success'>Aktif</span>" : "<span class='label label-danger'>Tidak Aktif</span>"; ?> </td>
                              </tr>
                              <?php $no++;
                            } ?>
                          </tbody>
                        </table>
                      <?php } ?>
                      <br>
                      <br>
                      <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:12px; font-weight: bold; font-family: 'Tahoma';">
                        <tr style="border-spacing: 10px">
                          <td width="29%" align="center">&nbsp;</td>
                          <td width="29%" align="center">&nbsp;</td>
                          <td width="50%" align="center" style="color:#000;">Kepala KUA</td>
                        </tr>
                        <tr style="border-spacing: 10px">
                          <td width="29%" align="center">&nbsp;</td>
                          <td width="29%" align="center">&nbsp;</td>
                          <td width="50%" align="center" style="color:#000;"> &nbsp;</td>
                        </tr>
                        <tr style="border-spacing: 10px">
                          <td>&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td width="50%">&nbsp;</td>
                        </tr>
                        <tr style="border-spacing: 10px">
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td width="50%" align="center">&nbsp;</td>
                        </tr>
                        <tr style="border-spacing: 10px">
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td width="50%" align="center">&nbsp;</td>
                        </tr>
                        <tr style="border-spacing: 10px">
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td width="50%" align="center">&nbsp;</td>
                        </tr>
                        <?php $pimpinan = $this->db->get_where('tbl_user', ['role' => 'Kepala KUA'])->row(); ?>
                        <tr>
                          <td align="center"> </td>
                          <td align="center">&nbsp;</td>
                          <td width="50%" align="center" style="text-decoration: underline; color:#000;"> <?php echo $pimpinan->nama_lengkap; ?></span></td>
                        </tr>
                        <tr>
                          <td align="center"> </td>
                          <td align="center" valign="middle">&nbsp;</td>
                          <td width="50%" align="center" valign="middle"> </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="hidden-print">
                  <div class="pull-right">
                    <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                    <a href="#" onClick="javascript:window.close();" class="btn btn-color-primary waves-effect waves-light">Keluar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script>
      var resizefunc = [];
    </script>
    <script src="/lib/assets/js/modernizr.min.js"></script>
    <script src="/lib/assets/js/bootstrap.min.js"></script>
    <script src="/lib/assets/js/detect.js"></script>
    <script src="/lib/assets/js/fastclick.js"></script>
    <script src="/lib/assets/js/jquery.slimscroll.js"></script>
    <script src="/lib/assets/js/jquery.blockUI.js"></script>
    <script src="/lib/assets/js/waves.js"></script>
    <script src="/lib/assets/js/wow.min.js"></script>
    <script src="/lib/assets/js/jquery.nicescroll.js"></script>
    <script src="/lib/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/lib/assets/plugins/switchery/switchery.min.js"></script>
    <script src="/lib/assets/plugins/select2/select2.js" type="text/javascript"></script>
    <script src="/lib/assets/plugins/switchery/switchery.min.js"></script>
    <script src="/lib/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/lib/assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="/lib/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/lib/assets/plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="/lib/assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="/lib/assets/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="/lib/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/lib/assets/plugins/datatables/responsive.bootstrap.min.js"></script>
    <script src="/lib/assets/plugins/datatables/dataTables.scroller.min.js"></script>
    <script src="/lib/assets/plugins/moment/moment.js"></script>
    <script src="/lib/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script src="/lib/assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/lib/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/lib/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="/lib/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/lib/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <!-- Datatable init js -->
    <script src="/lib/assets/pages/datatables.init.js"></script>
    <!-- Modal-Effect -->
    <script src="/lib/assets/plugins/custombox/dist/custombox.min.js"></script>
    <script src="/lib/assets/plugins/custombox/dist/legacy.min.js"></script>
    <!-- Notification js -->
    <script src="/lib/assets/plugins/notifyjs/dist/notify.min.js"></script>
    <script src="/lib/assets/plugins/notifications/notify-metro.js"></script>
    <!-- Validation js (Parsleyjs) -->
    <script src="/lib/assets/plugins/parsleyjs/dist/parsley.min.js" type="text/javascript"></script>
    <!-- Counter Up  -->
    <script src="/lib/assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
    <script src="/lib/assets/plugins/counterup/jquery.counterup.min.js"></script>
    <script src="/lib/assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

    <!-- App js -->
    <script src="/lib/assets/js/jquery.core.js"></script>
    <script src="/lib/assets/js/jquery.app.js"></script>
    <script src="/lib/assets/js/script.js?version=1.0"></script>

  </body>


  </html>
<?php } else { ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Rezky P. Budihartono">
    <meta name="author" content="Rezky P. Budihartono">
    <title>Data Laporan Tidak Ditemukan</title>
    <link rel="shortcut icon" href="/lib/assets/images/favicon.png">
    <link href="/lib/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/lib/assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/custombox/dist/custombox.min.css" rel="stylesheet">
    <link href="/lib/assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- DataTables -->
    <link href="/lib/assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="/lib/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="/lib/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/lib/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/pages.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/color-magenta.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/menu.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="/lib/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/lib/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="/lib/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="/lib/assets/js/jquery.min.js"></script>
  </head>

  <body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
      <div class="container">

      </div>
    </div>
  </body>
  <!-- Sweet-Alert  -->
  <script src="/lib/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
  <script src="/lib/assets/pages/jquery.sweet-alert.init.js"></script>

  </html>
  <script type="text/javascript">
    swal({
      title: "Tidak Ditemukan !",
      text: "Data Laporan Tidak Ditemukan :(",
      type: "error",
      showCancelButton: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Keluar",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function(isConfirm) {
      if (isConfirm) {
        window.close();
      }
    });
  </script>
<?php } ?>