<div class="row">
    <div class="col-sm-12">
        <?php
        if ($this->session->flashdata('notification')) {
            echo $this->session->flashdata('notification');
        }
        $get = $this->uri->segment(2) == "edit" ? 'e' : 'i';
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="informasi"></div>
        <div class="panel panel-border panel-color-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->uri->segment(2); ?> <?php echo $this->myfunction->hapus_underscore($this->uri->segment(1)); ?></h3>
            </div>
            <div class="panel-body">
                <form action="/<?php echo $this->uri->segment(1) . '/proses/' . $get . '/' . $this->myfunction->_encdec('enc', rand()) . '/'; ?>" method="post" enctype="multipart/form-data" data-parsley-validate novalidate autocomplete="off">
                    <?php if ($this->uri->segment(2) == "edit") { ?>
                        <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="id">
                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Sekolah</label>
                                    <div class="col-md-5">
                                        <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah" required value="<?= $this->uri->segment(2) == "edit" ? $data->nama_sekolah : "" ?>">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-md-2 control-label">No Telp</label>
                                    <div class="col-md-2">
                                        <input type="number" name="no_telp" class="form-control" data-parsley-maxlength="12" data-parsley-minlength="11" placeholder="No Telp" required value="<?= $this->uri->segment(2) == "edit" ? $data->no_telp : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Provinsi</label>
                                    <div class="col-md-3">
                                        <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" required value="<?= $this->uri->segment(2) == "edit" ? $data->provinsi : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Kabupaten</label>
                                    <div class="col-md-3">
                                        <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten" required value="<?= $this->uri->segment(2) == "edit" ? $data->kabupaten : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Kecamatan</label>
                                    <div class="col-md-3">
                                        <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required value="<?= $this->uri->segment(2) == "edit" ? $data->kecamatan : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Kelurahan</label>
                                    <div class="col-md-3">
                                        <input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan" required value="<?= $this->uri->segment(2) == "edit" ? $data->kelurahan : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-color-primary waves-effect waves-light">Simpan</button>
                                        <button onClick="javascript:history.go(-1);" type="button" class="btn btn btn-inverse waves-effect waves-light">Batal</button>
                                    </div>
                                </div>

                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </form>
            </div>
        </div>
    </div>
</div>