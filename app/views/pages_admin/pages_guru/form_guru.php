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
                <h3 class="panel-title"> Guru Yang Akan dinilai
                     </h3>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap table-tambah-guru">
                    <thead>
                        <tr>
                            <th width="1%" style="text-align: center; font-size:12px;">No</th> 
                            <th width="15%" style="text-align: center; font-size:12px;">NIP</th>
                            <th width="15%" style="text-align: center; font-size:12px;">Nama Guru</th> 
                            <th width="15%" style="text-align: center; font-size:12px;">Level Guru</th>
                            <th width="10%" style="text-align: center; font-size:12px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                        <?php 
                        $get = $this->db->get_where('tbl_guru',array('id_guru'=> $this->myfunction->_encdec('dec', $this->uri->segment(3))))->row();
                        if($get->level_guru == "Kepala Sekolah"){
                            $sql = $this->db->get_where('tbl_guru',array('id_sekolah' => $get->id_sekolah, 'level_guru !=' => 'Kepala Sekolah'));
                        }
                        $no = 1;
                        foreach ($sql->result() as $row) {
                            $sql_1 = $this->db->get_where('tbl_guru_dinilai',array('id_guru_nilai' => $row->id_guru));
                            $row_1 = $sql_1->num_rows();
                            $dta_1 = $sql_1->row();
                        ?>
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$row->nip;?></td>
                            <td><?=$row->nama_guru;?></td>
                            <td><?=$row->level_guru;?></td>
                            <td align="center">
                            <?php if($row_1 > 0){?>
                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Kurang" href="<?=base_url('' . $this->uri->segment(1) . '/proses/g/d/'.$this->uri->segment(3). '/' . $this->myfunction->_encdec('enc',$row->id_guru));?>/" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a></td>
                            <?php }else{ ?>
                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah" href="<?=base_url('' . $this->uri->segment(1) . '/proses/g/i/'.$this->uri->segment(3). '/' . $this->myfunction->_encdec('enc',$row->id_guru));?>/" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></a></td>
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