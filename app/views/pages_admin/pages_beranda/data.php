<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box" style="background-color: #fff; border-radius: 0px;">
            <h5 class="text-success"><?php echo $this->myfunction->format_tgl5(date('Y-m-d')); ?></h5>
            <h3 class='welcome-text'>Selamat Datang <strong class="text-pink"><?= $datauser->nama_lengkap; ?></strong> di <?=$this->app->_item('app_name');?></h3>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card-box widget-icon">
            <div>
                <i class="fe-file-text text-primary"></i>
                <div class="wid-icon-info">
                    <p class="text-muted m-b-5 font-13 text-uppercase">Total</p>
                    <h4 class="m-t-0 m-b-5 counter"><?= $rows_1; ?></h4>
                    <p class="text-primary" title="Data Sekolah" style="white-space:nowrap;text-overflow:ellipsis;overflow:hidden;display:hidden; font-size: 12px;"><b>Data Sekolah</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card-box widget-icon">
            <div>
                <i class="fe-user text-warning"></i>
                <div class="wid-icon-info">
                    <p class="text-muted m-b-5 font-13 text-uppercase">Total</p>
                    <h4 class="m-t-0 m-b-5 counter"><?= $rows_2; ?></h4>
                    <p class="text-warning" title="Data Guru" style="white-space:nowrap;text-overflow:ellipsis;overflow:hidden;display:hidden; font-size: 12px;"><b>Data Guru</b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card-box widget-icon">
            <div>
                <i class="fe-box text-pink"></i>
                <div class="wid-icon-info">
                    <p class="text-muted m-b-5 font-13 text-uppercase">Total</p>
                    <h4 class="m-t-0 m-b-5 counter"><?= $rows_3; ?></h4>
                    <p class="text-pink" title="Data Kompetensi" style="white-space:nowrap;text-overflow:ellipsis;overflow:hidden;display:hidden; font-size: 12px;"><b>Data Kompetensi</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card-box widget-icon">
            <div>
                <i class="fe-layers text-danger"></i>
                <div class="wid-icon-info">
                    <p class="text-muted m-b-5 font-13 text-uppercase">Total</p>
                    <h4 class="m-t-0 m-b-5 counter"><?= $rows_3; ?></h4>
                    <p class="text-danger" title="Data Indikator" style="white-space:nowrap;text-overflow:ellipsis;overflow:hidden;display:hidden; font-size: 12px;"><b>Data Indikator</b></p>
                </div>
            </div>
        </div>
    </div>
     
</div>