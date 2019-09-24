<div class="row">
    <div class="col-sm-12">
        <?php
        if ($this->session->flashdata('notification')) {
            echo $this->session->flashdata('notification');
        }
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="informasi"></div>
        <div class="panel panel-border panel-color-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->uri->segment(2); ?> <?php echo $this->myfunction->hapus_underscore($this->uri->segment(1)); ?>

                </h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url($this->uri->segment(1) . '/result/'); ?>" target="_blank" method="post" enctype="multipart/form-data" data-parsley-validate novalidate autocomplete="off">
                    <?php if ($this->uri->segment(2) == "edit") { ?>
                        <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="id">
                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-horizontal">
                                <div class="form-group  ">
                                    <label class="col-md-2 control-label">Jenis Laporan</label>
                                    <div class="col-md-3">
                                        <select name="jenis_laporan" class="form-control jenis_laporan" required>
                                            <option value="">Pilih--</option>
                                            <option value="Akta Nikah">Akta Nikah</option>
                                            <option value="Pendaftar">Pendaftar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2 control-label">Tanggal Daftar </label>
                                    <div class="col-sm-4">
                                        <div class="input-daterange input-group" id="date-range">
                                            <input type="text" class="form-control required" required name="tgl1" id="" placeholder="Dari tanggal" />
                                            <span class="input-group-addon bg-primary b-0 text-white">s/d</span>
                                            <input type="text" class="form-control required" required name="tgl2" id="" placeholder="Sampai tanggal" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-color-primary waves-effect waves-light">Proses</button>
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