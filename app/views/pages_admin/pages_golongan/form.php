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
                                    <label class="col-md-2 control-label">Kenaikan Ke</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="kenaikan_ke"  placeholder="Kenaikan Ke" value="<?= $this->uri->segment(2) == "edit" ? $data->kenaikan_ke : "" ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">AKK</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control"  placeholder="AKK" name="akk" value="<?= $this->uri->segment(2) == "edit" ? $data->akk : "" ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">PD</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control" placeholder="PD" name="pd" value="<?= $this->uri->segment(2) == "edit" ? $data->pd : "" ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">PI</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control"  placeholder="PI" name="pi" value="<?= $this->uri->segment(2) == "edit" ? $data->pi : "" ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">KI</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control"  placeholder="KI" name="ki" value="<?= $this->uri->segment(2) == "edit" ? $data->ki : "" ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">AKP</label>
                                    <div class="col-md-2">
                                        <input type="number" class="form-control"  placeholder="AKP" name="akp" value="<?= $this->uri->segment(2) == "edit" ? $data->akp : "" ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-9">
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