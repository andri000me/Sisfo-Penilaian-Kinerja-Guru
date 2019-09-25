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
                                    <div class="col-md-2">
                                        <select name="id_sekolah" class="form-control id_sekolah" required>
                                            <option value="">Pilih--</option>
                                            <?php
                                            if ($this->uri->segment(2) == "edit") {
                                                foreach ($select['nama_sekolah']->result() as $row) {
                                                    if ($data->id_sekolah == $row->id_sekolah) {
                                                        echo "<option value='" . $row->id_sekolah . "' selected>$row->nama_sekolah</option>";
                                                    } else {
                                                        echo "<option value='" . $row->id_sekolah . "'>$row->nama_sekolah</option>";
                                                    }
                                                }
                                            } else {
                                                foreach ($select['nama_sekolah']->result() as $row) {
                                                    echo "<option value='" . $row->id_sekolah . "'>$row->nama_sekolah</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tenaga Pendidik</label>
                                    <div class="col-md-4">
                                        <select name="id_tenaga_pendidik[]" multiple="multiple" class="form-control select2" required> 
                                            <?php
                                            if ($this->uri->segment(2) == "edit") {
                                                foreach ($select['jenis_tp']->result() as $row) {
                                                    if ($data->id_sekolah == $row->id_sekolah) {
                                                        echo "<option value='" . $row->id_sekolah . "' selected>$row->jenis_tenaga_pendidik</option>";
                                                    } else {
                                                        echo "<option value='" . $row->id_sekolah . "'>$row->jenis_tenaga_pendidik</option>";
                                                    }
                                                }
                                            } else {
                                                foreach ($select['jenis_tp']->result() as $row) {
                                                    if ($row->jenis_tenaga_pendidik == "Guru Mata Pelajaran") {
                                                        echo "<option value='" . $row->id_sekolah . "' selected>$row->jenis_tenaga_pendidik</option>";
                                                    }else{
                                                        echo "<option value='" . $row->id_sekolah . "'>$row->jenis_tenaga_pendidik</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">NIP</label>
                                    <div class="col-md-2">
                                        <input type="number" name="nip" class="form-control" data-parsley-maxlength="18" data-parsley-minlength="18" placeholder="NIP" required value="<?= $this->uri->segment(2) == "edit" ? $data->nip : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Guru</label>
                                    <div class="col-md-3">
                                        <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru" required value="<?= $this->uri->segment(2) == "edit" ? $data->nama_guru : "" ?>">
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