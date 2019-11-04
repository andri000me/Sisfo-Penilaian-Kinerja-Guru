<div class="row">
    <div class="col-sm-12">
        <?php
        if ($this->session->flashdata('notification')) {
            echo $this->session->flashdata('notification');
        }
        $sql_level = $this->db->get_where('tbl_guru',['id_guru' => $this->session->userdata('sess_pkg_id_guru')])->row();
        ?>
    </div>
    <div class="col-sm-3">
        <div class=" panel panel-border panel-color-primary" style="height: 308px;">
            <div class="panel-heading">
                <h3 class="panel-title">Foto Profil</h3>
            </div>
            <div class="panel-body table-responsive" align="center">
                <?php
                $foto = $userdata['foto'] != NULL ? $userdata['foto'] : 'null.jpg';
                if ((file_exists('lib/images/user/' . $foto) == FALSE) || $userdata['foto'] == NULL) {
                    $file = base_url('lib/images/user/null.jpg');
                } else {
                    $file = base_url('lib/images/user/' . $userdata['foto']);
                }
                ?>
                <img src="<?php echo $file; ?>" alt="user-img" class="img-square" height="160px" width="160px" alt="">
                <br>
                <h3 class="font-400" style="padding-top: 8px;"><?= $this->session->userdata('sess_pkg_role'); ?></h3>
                <?php if($this->session->userdata('sess_pkg_role') != "Administrator"){ ?>
                <h5 class="font-400" ><?=$sql_level->level_guru;?></h4>
                <?php } ?>
            </div>
        </div><!-- end col -->
    </div>
    <div class="col-sm-9">
        <div class="panel panel-border panel-color-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Form Data <?php echo $this->uri->segment(1); ?></h3>
            </div>
            <div class="panel-body table-responsive">
                <form method="post" action="<?php echo base_url('profil/update/'); ?>" enctype="multipart/form-data" data-parsley-validate novalidate>
                    <input type="hidden" value="<?php echo  $this->session->userdata('sess_pkg_id'); ?>" name="id">
                    <input type="hidden" value="<?php echo $userdata['foto']; ?>" name="foto_lama">
                    <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo $userdata['username']; ?>" required name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" required value="<?php echo $userdata['nama_lengkap']; ?>" name="nama_lengkap" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="<?php echo $userdata['password']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="foto" accept="image/jpeg">
                    </div>
                    <div class="form-group text-left m-b-0">
                        <button type="submit" class="btn  btn-color-primary waves-effect waves-light">
                            Update
                        </button>
                    </div>

                </form>
            </div>
        </div><!-- end col -->
    </div>
</div>
<!-- end row -->