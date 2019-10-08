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
<style>
/* I suggest to hide  all selected tags from drop down list */
.select2-results__option[aria-selected="true"] {
  display: none;
}
</style>
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
                                    <label class="col-md-3 control-label">Nama Sekolah</label>
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
                                    <label class="col-md-3 control-label">Tenaga Pendidik</label>
                                    <div class="col-md-6">
                                        <select name="id_tenaga_pendidik[]" multiple="multiple" readonly class="form-control select2 tenaga-pendidik" required> 
                                            <?php
                                            if ($this->uri->segment(2) == "edit") {
                                                $explode = explode(',',$data->id_tenaga_pendidik);
                                                 
                                                $qry = $this->db->select("*")
                                                                ->from('tbl_guru_pendidik')
                                                                ->join('tbl_tenaga_pendidik','tbl_guru_pendidik.id_tenaga_pendidik = tbl_tenaga_pendidik.id_tenaga_pendidik')
                                                                ->where('tbl_guru_pendidik.id_guru', $data->id_guru)
                                                                ->get();
                                                foreach ($qry->result() as $row) {
                                                    echo "<option value='" . $row->id_tenaga_pendidik . "' selected  locked='locked'>$row->jenis_tenaga_pendidik</option>";
                                                }
                                            } else {
                                                foreach ($select['jenis_tp']->result() as $row) {
                                                    if ($row->jenis_tenaga_pendidik == "Guru Mata Pelajaran") {
                                                        echo "<option value='" . $row->id_tenaga_pendidik . "' selected locked='locked' disable>$row->jenis_tenaga_pendidik</option>";
                                                    }else{
                                                        echo "<option value='" . $row->id_tenaga_pendidik . "'>$row->jenis_tenaga_pendidik</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">NIP</label>
                                    <div class="col-md-3">
                                        <input type="number" name="nip" class="form-control" data-parsley-maxlength="18" data-parsley-minlength="18" placeholder="NIP" required value="<?= $this->uri->segment(2) == "edit" ? $data->nip : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Guru</label>
                                    <div class="col-md-5">
                                        <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru" required value="<?= $this->uri->segment(2) == "edit" ? $data->nama_guru : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jenis Kelamin</label>
                                    <div class="col-md-2">
                                        <select name="jenis_kelamin" class="form-control " required>
                                            <option value="">Pilih--</option>
                                            <?php
                                            if ($this->uri->segment(2) == "edit") {
                                                $this->myfunction->_editGender($data->jenis_kelamin);
                                            } else {
                                                $this->myfunction->_inputGender();
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tempat Lahir</label>
                                    <div class="col-md-3">
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required value="<?= $this->uri->segment(2) == "edit" ? $data->tempat_lahir : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tanggal Lahir</label>
                                    <div class="col-md-2">
                                        <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required value="<?= $this->uri->segment(2) == "edit" ? $data->tgl_lahir : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nomor Seri</label>
                                    <div class="col-md-4">
                                        <input type="text" name="nomor_seri" class="form-control" placeholder="Nomor Seri" required value="<?= $this->uri->segment(2) == "edit" ? $data->nomor_seri : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">NUPTK</label>
                                    <div class="col-md-3">
                                        <input type="text" name="nuptk" class="form-control" placeholder="NUPTK" required value="<?= $this->uri->segment(2) == "edit" ? $data->nuptk : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">NRG</label>
                                    <div class="col-md-3">
                                        <input type="text" name="nrg" class="form-control" placeholder="NRG" required value="<?= $this->uri->segment(2) == "edit" ? $data->nrg : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Pangkat/Jabatan/Gol </label>
                                    <div class="col-md-3">
                                        <input type="text" name="jabatan" class="form-control" placeholder="Pangkat/Jabatan/Gol" required value="<?= $this->uri->segment(2) == "edit" ? $data->jabatan : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">TMT Pangkat/Golongan</label>
                                    <div class="col-md-3">
                                        <input type="text" name="tmt_pangkat_golongan" class="form-control" placeholder="TMT Pangkat/Golongan" required value="<?= $this->uri->segment(2) == "edit" ? $data->tmt_pangkat_golongan : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">TMT Sebagai Guru</label>
                                    <div class="col-md-3">
                                        <input type="text" name="tmt_sebagai_guru" class="form-control" placeholder="TMT Sebagai Guru" required value="<?= $this->uri->segment(2) == "edit" ? $data->tmt_sebagai_guru : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Masa Kerja Sebagai Guru</label>
                                    <div class="col-md-4">
                                        <input type="text" name="masa_kerja_sebagai_guru" class="form-control" placeholder="0 Tahun 0 Bulan" required value="<?= $this->uri->segment(2) == "edit" ? $data->masa_kerja_sebagai_guru : "" ?>">
                                    </div>
                                </div>
                                <?php if($this->uri->segment(2) == "input"){?>
                                <div class="tugas-tambahan" style="display:none;">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">TMT Tugas Tambahan</label>
                                        <div class="col-md-3">
                                            <input type="text" name="tmt_tugas_tambahan" class="form-control tmt_tugas_tambahan" placeholder="TMT Tugas Tambahan" value="<?= $this->uri->segment(2) == "edit" ? $data->tmt_tugas_tambahan : "" ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Masa Kerja Tugas Tambahan</label>
                                        <div class="col-md-4">
                                            <input type="text" name="masa_kerja_tugas_tambahan" class="form-control masa_kerja_tugas_tambahan" placeholder="0 Tahun 0 Bulan" value="<?= $this->uri->segment(2) == "edit" ? $data->masa_kerja_tugas_tambahan : "" ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php }elseif($this->uri->segment(2) == "edit" && $data->tmt_tugas_tambahan != NULL){ ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">TMT Tugas Tambahan</label>
                                    <div class="col-md-3">
                                        <input type="text" name="tmt_tugas_tambahan" class="form-control tmt_tugas_tambahan" placeholder="TMT Tugas Tambahan" value="<?= $this->uri->segment(2) == "edit" ? $data->tmt_tugas_tambahan : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Masa Kerja Tugas Tambahan</label>
                                    <div class="col-md-4">
                                        <input type="text" name="masa_kerja_tugas_tambahan" class="form-control masa_kerja_tugas_tambahan" placeholder="0 Tahun 0 Bulan" value="<?= $this->uri->segment(2) == "edit" ? $data->masa_kerja_tugas_tambahan : "" ?>">
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Pendidikan Terakhir</label>
                                    <div class="col-md-4">
                                        <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan Terakhir" required value="<?= $this->uri->segment(2) == "edit" ? $data->pendidikan : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Guru Mapel</label>
                                    <div class="col-md-4">
                                        <input type="text" name="guru_mapel" class="form-control" placeholder="Guru Mapel" required value="<?= $this->uri->segment(2) == "edit" ? $data->guru_mapel : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Level Guru</label>
                                    <div class="col-md-3">
                                        <select name="level_guru" class="form-control " required>
                                            <option value="">Pilih--</option>
                                            <?php
                                            if ($this->uri->segment(2) == "edit") {
                                                $this->myfunction->_editLevel($data->level_guru);
                                            } else {
                                                $this->myfunction->_inputLevel();
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
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