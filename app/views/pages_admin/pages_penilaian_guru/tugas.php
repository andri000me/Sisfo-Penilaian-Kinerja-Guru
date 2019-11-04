<div class="row">
    <?php 
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
    <?php
    $qry_1 = $this->db->select('*')
                    ->from('tbl_tugas_guru') 
                    ->join('tbl_tugas','tbl_tugas_guru.id_tugas = tbl_tugas.id_tugas')
                    ->where('id_guru',$this->myfunction->_encdec('dec',$this->uri->segment(3)))
                    ->get();
    foreach ($qry_1->result() as $row) {
        
    ?>
    <div class="col-sm-6 col-lg-6">
        <div class="widget-simple-chart text-right card-box">
            <div class="circliful-chart" data-dimension="90" data-text="35%" data-width="5" data-fontsize="14" data-percent="35" data-fgcolor="#5fbeaa" data-bgcolor="#ebeff2"></div>
            <h3 class="text-primary  ">Tugas <?=$row->jenis_tugas;?></h3>
            <p class="text-muted"><?=$row->tugas;?></p> 
            <a class="text-muted btn btn-xs btn-success" href="/<?=$this->uri->segment(1) . '/daftar-kompetensi/' . $this->myfunction->_encdec('enc', $row->id_guru) . '/'. $this->myfunction->_encdec('enc', $row->id_tugas) ;?>">Daftar Kompetensi</a> 

        </div>
    </div>
    <?php } ?>
     
</div>