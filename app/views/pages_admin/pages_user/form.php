<div class="row">
    <div class="col-sm-12">
        <?php 
            if($this->session->flashdata('notification')) { 
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
                <h3 class="panel-title"><?php echo $this->uri->segment(2);?> <?php echo $this->myfunction->hapus_underscore($this->uri->segment(1));?></h3>
            </div>
            <div class="panel-body">
            <form action="<?php echo base_url($this->uri->segment(1).'/proses/'.$get.'/'.$this->myfunction->_encdec('enc',rand()).'/');?>" method="post" enctype="multipart/form-data" data-parsley-validate novalidate autocomplete="off">
            <?php if($this->uri->segment(2) == "edit"){ ?>
            <input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="id">
            <input type="hidden" value="<?php echo $data->foto;?>" name="foto_lama">
            <?php } ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Nama Relawan</label>
                                <div class="col-md-3">
                                   <select name="id_relawan" class="form-control id_relawan" required>
                                        <option value="">Pilih--</option>
                                        <?php
                                          if($this->uri->segment(2) == "edit"){
                                            foreach ($select['nama_relawan']->result() as $row) {
                                                if ($data->id_relawan == $row->id_relawan) {
                                                    echo "<option value='" . $row->id_relawan . "' selected>$row->nama_lengkap</option>";
                                                } else {
                                                    echo "<option value='" . $row->id_relawan . "'>$row->nama_lengkap</option>";
                                                }
                                            }
                                          }else{
                                             foreach ($select['nama_relawan']->result() as $row) {
                                                echo "<option value='".$row->id_relawan."'>$row->nama_lengkap</option>";
                                            }
                                          }
                                        ?>
                                    </select>     
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Nama Lengkap</label>
                                <div class="col-md-5">
                                   <input type="text" name="nama_lengkap" class="form-control nama_lengkap" placeholder="Nama Lengkap" value="<?=$this->uri->segment(2) == "edit" ? $data->nama_lengkap : ""?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Username</label>
                                <div class="col-md-3">
                                   <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$this->uri->segment(2) == "edit" ? $data->username : ""?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Password</label>
                                <div class="col-md-4">
                                   <input type="password" class="form-control" <?php if($this->uri->segment(2) == "input"){ ?>required<?php } ?> placeholder="<?=$this->uri->segment(2) == "edit" ? $data->password : "Password"?>" name="password" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Foto</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" accept="image/jpeg" <?php if($this->uri->segment(2) == "input"){ ?>required<?php } ?> name="foto">
                                </div>
                            </div>
                            <?php if($this->uri->segment(2) == "edit"){ ?>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Foto Sekarang</label>
                                <div class="col-md-3">
                                    <?php
                                      $foto = $data->foto != NULL ? $data->foto : 'null.jpg';
                                      if((file_exists('lib/assets/images/user/'.$foto) == FALSE) || $data->foto == NULL ){
                                          $file = base_url('lib/assets/images/user/null.jpg'); 
                                      }else{
                                          $file = base_url('lib/assets/images/user/'.$data->foto); 
                                      }
                                    ?>
                                    <img src="<?php echo $file;?>" class="img-square"style="width:150px; height: 150px;" alt="...">
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <label class="col-md-2 control-label"></label>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-gambar btn-color-primary waves-effect waves-light">Simpan</button>
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
     