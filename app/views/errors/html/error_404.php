<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
$ci->load->database();
$app = $ci->db->get('app_config')->row();
?>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="<?=$app->description;?>">
        <meta name="author" content="<?=$app->author;?>">
        <title>404 Page Not Found</title>
        <link rel="shortcut icon" href="/lib/images/favicon.png">
        <link href="/lib/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/lib/css/core.css" rel="stylesheet" type="text/css">
        <link href="/lib/css/icons.css" rel="stylesheet" type="text/css">
        <link href="/lib/css/components.css" rel="stylesheet" type="text/css">
        <link href="/lib/css/pages.css" rel="stylesheet" type="text/css">
        <link href="/lib/css/menu.css" rel="stylesheet" type="text/css">
        <link href="/lib/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="/lib/css/color-primary.css" rel="stylesheet" type="text/css">
        <script src="/lib/css/modernizr.min.css"></script>
    </head>
    <body>
        <div class="ex-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <svg class="svg-box" width="380px" height="500px" viewBox="0 0 837 1045" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                               sketch:type="MSPage">
                                <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z"
                                      id="Polygon-1" stroke="#228bdf" stroke-width="6" sketch:type="MSShapeGroup"></path>
                                <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z"
                                      id="Polygon-2" stroke="#228bdf" stroke-width="6" sketch:type="MSShapeGroup"></path>
                                <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z"
                                      id="Polygon-3" stroke="#228bdf" stroke-width="6" sketch:type="MSShapeGroup"></path>
                                <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z"
                                      id="Polygon-4" stroke="#228bdf" stroke-width="6" sketch:type="MSShapeGroup"></path>
                                <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z"
                                      id="Polygon-5" stroke="#228bdf" stroke-width="6" sketch:type="MSShapeGroup"></path>
                            </g>
                        </svg>
                    </div>

                    <div class="col-sm-6">
                        <div class="message-box">
                            <h1 class="m-b-0">404</h1>
                            <p><?php echo $heading; ?></p>
                            <?php echo $message; ?>
                            <div class="buttons-con">
                                <div class="action-link-wrap">
                                    <a onclick="history.back(-1)" class="btn btn-primary waves-effect waves-light m-t-20">Kembali</a>
                                    <a href="/beranda/" class="btn btn-primary waves-effect waves-light m-t-20">Pergi ke beranda</a>
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

        <!-- Main  -->
        <script src="/lib/js/jquery.min.js"></script>
        <script src="/lib/js/bootstrap.min.js"></script>
        <script src="/lib/js/detect.js"></script>
        <script src="/lib/js/fastclick.js"></script>
        <script src="/lib/js/jquery.slimscroll.js"></script>
        <script src="/lib/js/jquery.blockUI.js"></script>
        <script src="/lib/js/waves.js"></script>
        <script src="/lib/js/wow.min.js"></script>
        <script src="/lib/js/jquery.nicescroll.js"></script>
        <script src="/lib/js/jquery.scrollTo.min.js"></script>

        <!-- Custom main Js -->
        <script src="/lib/js/jquery.core.js"></script>
        <script src="/lib/js/jquery.app.js"></script>
    
    </body>
</html>