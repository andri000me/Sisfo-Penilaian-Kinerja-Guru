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
                                    <label class="col-md-2 control-label">Tugas Pokok / Tambahan</label>
                                    <div class="col-md-3">
                                        <select name="id_tugas" class="form-control id_tugas" required>
                                            <option value="">Pilih--</option>
                                            <?php
                                            if ($this->uri->segment(2) == "edit") {
                                                foreach ($select['tugas']->result() as $row) {
                                                    if ($data->id_tugas == $row->id_tugas) {
                                                        echo "<option value='" . $row->id_tugas . "' selected>$row->tugas</option>";
                                                    } else {
                                                        echo "<option value='" . $row->id_tugas . "'>$row->tugas</option>";
                                                    }
                                                }
                                            } else {
                                                foreach ($select['tugas']->result() as $row) {
                                                    echo "<option value='" . $row->id_tugas . "'>$row->tugas</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Kompetensi</label>
                                    <div class="col-md-6">
                                        <select name="id_kompetensi" class="form-control id_kompetensi" required>
                                            <?php
                                            if ($this->uri->segment(2) == "edit") { 
                                                $qry = $this->db->get_where('tbl_kompetensi',['id_tugas' => $data->id_tugas]);
                                                foreach ($qry->result() as $row) {
                                                    if ($data->id_kompetensi == $row->id_kompetensi) {
                                                        echo "<option value='" . $row->id_kompetensi . "' selected>$row->nama_kompetensi</option>";
                                                    } else {
                                                        echo "<option value='" . $row->id_kompetensi . "'>$row->nama_kompetensi</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Indikator</label>
                                    <div class="col-md-5">
                                        <textarea class="form-control" name="nama_indikator" rows="4" placeholder="Nama Indikator" required><?= $this->uri->segment(2) == "edit" ? $data->nama_indikator : "" ?></textarea>
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