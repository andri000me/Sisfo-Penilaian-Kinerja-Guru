<!DOCTYPE html>
<html>
    <head>
        <title><?=$this->app->_item('site_title');?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="<?=$this->app->_item('description');?>">
        <meta name="author" content="<?=$this->app->_item('author');?>">
        <meta name="theme-color" content="#0091ea">
        <link href="/lib/images/favicon.png" rel="shortcut icon" >

        <!-- Fonts -->
        <link href="/lib/css/Nunito.css" rel="stylesheet" >
        <link href="/lib/css/Chilanka.css" rel="stylesheet" >
        <link href="/lib/css/Roboto.css" rel="stylesheet" >
        <link href="/lib/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="/lib/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="/lib/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
        <link href="/lib/plugins/custombox/dist/custombox.min.css" rel="stylesheet">
        <link href="/lib/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <!-- DataTables -->
        <link href="/lib/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="/lib/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
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
        <link href="/lib/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <script src="/lib/js/jquery.min.js"></script>
    </head>
    <body>
        <div class="background"></div>
        <div class="wrapper-page  panel panel-default panel-body" style="border-radius:3px; padding:30px; position: relative;">
            <div class="text-center">
                 <a href="./"  class="logo logo-lg"><i class="fe-lock"></i>Login</a>
                 <br>
                <span class="app-name"> <?=$this->app->_item('app_name');?></span> 
                <hr>
            </div>
            <form class="form-horizontal m-t-20 formLogin" method="post" action="javascript:void(0);" data-parsley-validate novalidate>
                <div class="form-group">
                    <div class="col-xs-12">
                       <select name="role" class="form-control" id="role" required required="">
                            <option value="">Level User</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Tim Penilai">Tim Penilai</option>
                            <option value="Pengawas">Pengawas</option> 
                        </select>
                        <i class="fe-layers form-control-feedback l-h-34"></i>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" id="username" name="username" placeholder="Nama User">
                        <i class="fe-user form-control-feedback l-h-34"></i>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" id="password" name="password" placeholder="Kata Sandi">
                        <i class="fe-lock form-control-feedback l-h-34"></i>
                    </div>
                </div>
                <div class="form-group " align="center">
                    <button class="btn btn-color-primary w-md waves-effect waves-light logIn" type="submit">Masuk</button>
                </div>
            </form>
        </div>
    </body>
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
        <script src="/lib/plugins/switchery/switchery.min.js"></script>
        <script src="/lib/plugins/select2/select2.js" type="text/javascript"></script>
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

        <script type="text/javascript" src="/lib/plugins/multiselect/js/jquery.multi-select.js"></script>
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
        <!-- Validation js (Parsleyjs) -->
        <script type="text/javascript" src="/lib/plugins/parsleyjs/dist/parsley.min.js"></script>
        <!-- Counter Up  -->
        <script src="/lib/plugins/counterup/jquery.counterup.min.js"></script>
        <!-- App js -->
        <script src="/lib/js/jquery.core.js"></script>
        <script src="/lib/js/jquery.app.js"></script>
        <script src="/lib/js/script.js"></script> 
</body>
</html>