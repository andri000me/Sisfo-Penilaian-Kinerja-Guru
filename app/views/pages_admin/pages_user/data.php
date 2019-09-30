<div class="row">
    <div class="col-sm-12">
        <?php 
            if($this->session->flashdata('notification')) { 
                echo $this->session->flashdata('notification');
            }
        ?>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
        <div class="panel panel-border panel-color-primary table-responsive">
            <div class="panel-heading">
                <h3 class="panel-title"> <?php echo $this->myfunction->hapus_underscore($this->uri->segment(1));?>
                <div class="btn-group pull-right"><a href="<?php echo base_url(''.$this->uri->segment(1).'/input/');?>" class="btn btn-color-primary btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="" data-original-title="Input" style="text-transform:capitalize;"><i class="fa fa-pencil"></i></a></div>
                </h3>
            </div>
            <div class="panel-body">
               <table class="table table-striped table-bordered table-user">
                <thead>
                    <tr>
                        <th width="1%" style="text-align: center; font-size:12px;">No</th> 
                        <th width="25%" style="text-align: center; font-size:12px;">Nama Lengkap</th>
                        <th width="15%" style="text-align: center; font-size:12px;">Username</th>
                        <th width="10%" style="text-align: center; font-size:12px;">Foto</th>
                        <th width="10%" style="text-align: center; font-size:12px;">Role</th>
                        <th width="10%"  style="text-align: center; font-size:12px;">Aksi</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px;"></tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
