<div class="row">
    <?php 
        $kompetensi   = $this->db->get_where('tbl_kompetensi',array('id_kompetensi'=> $this->myfunction->_encdec('dec', $this->uri->segment(4))))->row();
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
            <h4 class="m-t-0 header-title"><b>DAFTAR INDIKATOR </b></h4>
            <p class="text-muted font-13 m-b-25">
                Nama Kompetensi  : <span class="text-danger"><?=$kompetensi->nama_kompetensi;?></span>
            </p> 
            <table class="table table-bordered m-0" > 
                <thead>
                    <tr>
                    <th style="width: 1%; text-align: center;" rowspan="2">No</th>
                    <th style="width: 35%; text-align: center;" rowspan="2">Nama Indikator</th>
                    <th style="width: 15%; text-align: center;" colspan="3">Skor</th>
                    </tr>
                    <tr>
                    <th style="width: 1%; text-align: center;">0</th>
                    <th style="width: 1%; text-align: center;">1</th>
                    <th style="width: 1%; text-align: center;">2</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    $qry_1 = $this->db->get_where('tbl_indikator',['id_kompetensi' => $this->myfunction->_encdec('dec',$this->uri->segment(4))]);
                    foreach ($qry_1->result() as $row) {
                ?>
                    <tr>
                        <td style="text-align:center;" width="1%"><?=$no;?></td>
                        <td><?=$row->nama_indikator;?></td>
                        <td style="text-align:center;">
                            <div class="radio radio-primary">
                                <input type="radio" name="skor_<?=$no;?>" id="skor_<?=$no;?>" value="0">
                                <label for="skor_<?=$no;?>"></label>
                            </div>
                        </td>
                        <td style="text-align:center;">
                            <div class="radio radio-primary">
                                <input type="radio" name="skor_<?=$no;?>" id="skor_<?=$no;?>" value="1">
                                <label for="skor_<?=$no;?>"></label>
                            </div>
                        </td>
                        <td style="text-align:center;">
                            <div class="radio radio-primary">
                                <input type="radio" name="skor_<?=$no;?>" id="skor_<?=$no;?>" value="2">
                                <label for="skor_<?=$no;?>"></label>
                            </div>
                        </td>
                         </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>