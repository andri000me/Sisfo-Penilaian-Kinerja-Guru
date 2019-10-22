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
    <div class="col-lg-12">
        <div class="panel panel-border panel-color-primary ">
            <div class="panel-heading">
                <h3 class="panel-title"> Kepala Sekolah Yang Akan Dinilai
                     </h3>
            </div>
            <div class="panel-body table-responsive">
            <?php 
                $get     = $this->db->get_where('tbl_pengawas',array('id_pengawas'=> $this->myfunction->_encdec('dec', $this->uri->segment(3))))->row();
                $sql_fto = $this->db->get_where('tbl_user',array('id_pengawas' => $get->id_pengawas));
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
                <div class="card-box widget-user bg-default">
                    <div>
                        <img src="<?php echo $file;?>" class="img-responsive img-circle" alt="user">
                        <div class="wid-u-info">
                            <h4 class="m-t-0 m-b-5"> <?=$get->nama_pengawas;?></h4>
                            <p class="text-muted m-b-5 font-13"> <?=$get->nip_pengawas;?></p>
                            <small class="text-warning"><b>Asesor Kepala Sekolah </b></small>
                        </div>
                    </div>
                </div> 
                <table class="table table-striped table-bordered dt-responsive nowrap table-tambah-sekolah">
                    <thead>
                        <tr>
                            <th width="1%" style="text-align: center; font-size:12px;">No</th> 
                            <th width="15%" style="text-align: center; font-size:12px;">Nama Sekolah</th>
                            <th width="15%" style="text-align: center; font-size:12px;">Nama Kepala Sekolah</th>  
                            <th width="10%" style="text-align: center; font-size:12px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                        <?php   
                        $sql = $this->db->select('*')
                                        ->from('tbl_sekolah')
                                        ->join('tbl_guru','tbl_sekolah.id_sekolah = tbl_guru.id_sekolah')
                                        ->where('level_guru','Kepala Sekolah')
                                        ->order_by('tbl_sekolah.id_sekolah', 'ASC')
                                        ->get();
                        $no = 1;
                        foreach ($sql->result() as $row) { 
                            $sql_1 = $this->db->get_where('tbl_pengawas_kepsek',array('id_sekolah' => $row->id_sekolah));
                            $row_1 = $sql_1->num_rows();
                            $dta_1 = $sql_1->row();
                             
                        ?>
                        <tr>
                            <td align="center"><?=$no;?></td>
                            <td align="center"><?=$row->nama_sekolah;?></td>
                            <td><?=$row->nama_guru;?></td> 
                            <td align="center">
                            <?php if($row_1 > 0){?> 
                                <?php if($get->id_pengawas !=  $dta_1->id_pengawas){ ?>
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Kurang" disabled class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a></td>
                                <?php }else{ ?>
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Kurang" href="<?=base_url('' . $this->uri->segment(1) . '/proses/g/d/'.$this->uri->segment(3). '/' . $this->myfunction->_encdec('enc',$row->id_sekolah));?>/" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a></td>
                                <?php } ?>
                            <?php }else{ ?>
                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah" href="<?=base_url('' . $this->uri->segment(1) . '/proses/g/i/'.$this->uri->segment(3). '/' . $this->myfunction->_encdec('enc',$row->id_sekolah));?>/" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></a></td>
                            <?php } ?>
                        </tr> 
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end row -->