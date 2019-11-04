<div class="row">
    <?php 
        $tugas   = $this->db->get_where('tbl_tugas',array('id_tugas'=> $this->myfunction->_encdec('dec', $this->uri->segment(4))))->row();
        $get     = $this->db->get_where('tbl_guru',array('id_guru'=> $this->myfunction->_encdec('dec', $this->uri->segment(3))))->row();
        $sql_fto = $this->db->get_where('tbl_user',array('id_guru' => $get->id_guru));
        $row_fto = $sql_fto->num_rows();
        $dta_fto = $sql_fto->row();
        if($row_fto > 0){
            $foto = $dta_fto->foto != NULL ? $dta_fto->foto : 'null.jpg';
            if((file_exists('lib/images/user/'.$foto) == FALSE) || $dta_fto->foto == NULL ){
                $file = base_url('lib/images/user/null.jpg'); 
            }else{
                $file = base_url('lib/images/user/'.$dta_fto->foto); 
            }
        }else{
            $file = base_url('lib/images/user/null.jpg'); 
        }
    ?> 
    <div class="col-sm-12 col-lg-12">
        <div class="card-box widget-user bg-default">
            <div>
                <img src="<?php echo $file;?>" class="img-responsive img-circle" alt="user">
                <div class="wid-u-info">
                    <h4 class="m-t-0 m-b-5"> <?=$get->nama_guru;?></h4>
                    <p class="text-muted m-b-5 font-13"> <?=$get->nip;?></p>
                    <small class="text-warning"><b> <?=$get->level_guru;?></b></small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>DAFTAR KOMPETENSI </b></h4>
            <p class="text-muted font-13 m-b-25">
                Daftar Kompetensi untuk Tugas <?=$tugas->jenis_tugas;?> : <?=$tugas->tugas;?>
            </p> 
            <table class="table table-bordered m-0" > 
                <thead>
                    <tr>
                        <th style="text-align:center; font-size:14px;" width="1%">No</th>
                        <th style="text-align:center; font-size:14px;" width="35%">Nama Kompetensi</th>
                        <th style="text-align:center; font-size:14px;" width="5%">Nilai</th>
                        <th style="text-align:center; font-size:14px;" width="5%">Status</th>
                        <th style="text-align:center; font-size:14px;" width="5%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    $qry_1 = $this->db->get_where('tbl_kompetensi',['id_tugas' => $this->myfunction->_encdec('dec',$this->uri->segment(4))]);
                    foreach ($qry_1->result() as $row) {
                ?>
                    <tr>
                        <td style="text-align:center;"><?=$no;?></td>
                        <td><?=$row->nama_kompetensi;?></td>
                        <td style="text-align:center;"><strong class="text-primary">4</strong></td>
                        <td style="text-align:center;"><i class="fa fa-times text-danger"></i></td>
                        <td style="text-align:center;"><a href="/<?=$this->uri->segment(1) . '/daftar-nilai/' . $this->uri->segment(3). '/'. $this->myfunction->_encdec('enc', $row->id_kompetensi) ;?>" class="btn btn-success btn-sm btn-block">Isi Nilai</a></td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>