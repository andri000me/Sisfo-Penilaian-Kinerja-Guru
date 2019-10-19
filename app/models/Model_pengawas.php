<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_pengawas extends CI_Model {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Model_pengawas model for administrator
    **/
 
    private $table       = 'tbl_pengawas';
    private $id_table    = 'id_pengawas';
    private $field_exist = 'nip_pengawas';
    private $data_notif  = 'pengawas';
    private $data_name   = 'nama_pengawas';
    private $_data_list  = array();
    
    public function __construct()
    {
        parent::__construct();
        $this->data_list();
    }
    public function _getData()
    {
        if ($this->input->post('type') == 'all') {
            echo json_encode($this->_data_list);
        }
    }
    public function data_select_form()
    {
        $data['nama_sekolah'] = $this->db->get('tbl_sekolah'); 
        return $data;
    }
    private function data_list()
    {
        $query  = $this->db->select('*')
                           ->from($this->table)
                           ->order_by('id_pengawas', 'ASC')
                           ->get();
        $total  = $query->num_rows();
        if ($total > 0) {
            $no = 1;
            foreach ($query->result() as $row) { 
                $aksi   = '<span data-toggle="tooltip" data-placement="top" title="Tambah sekolah / kepsek yang akan dinilai" ><a class="btn btn-sm btn-success" href="' . base_url('' . $this->uri->segment(1) . '/tambah-sekolah/' . $this->myfunction->_encdec('enc', $row->id_pengawas)) . '/" ><i class="fa fa-briefcase"></i></a></span>&nbsp;';
                $aksi  .= '<span data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><a class="btn btn-sm btn-warning" href="' . base_url('' . $this->uri->segment(1) . '/edit/' . $this->myfunction->_encdec('enc', $row->id_pengawas)) . '/" ><i class="fa fa-edit"></i></a></span>&nbsp;';
                $aksi  .= '<span data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus"><a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirm-delete" onClick="_get(\'' . $row->nip_pengawas . '\')" data-href="' . base_url('' . $this->uri->segment(1) . '/proses/d/' . $this->myfunction->_encdec('enc', $row->id_pengawas)) . '/" ><i class="fa fa-trash-o"></i></a></span>';
                $data[] = [
                    'no'      => $no,
                    'nip'     => $row->nip_pengawas,
                    'nama'    => $row->nama_pengawas, 
                    'aksi'    => $aksi
                ];
                $no++;
            }
            $this->_data_list['data']  = $data;
        } else {
            $this->_data_list['error'] = 'Tidak ada data dalam tabel !';
            $this->_data_list['data']  = '';
        }
    }
    public function data_get($id)
    {
        return $this->db->get_where($this->table, array($this->id_table => $id));
    }
    public function data_pengawas_i($action, $data)
    {
        $get = $this->data_get($data['id_pengawas'])->row_array();
        $this->db->insert("tbl_pengawas_kepsek", $data);
        $text = "berhasil di tambahkan";
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('notification', $this->myfunction->notification('success', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($get[$this->data_name]) . '</strong> '.$text.'.'));
        } else {
            $this->session->set_flashdata('notification', $this->myfunction->notification('danger', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($get[$this->data_name]) . '</strong> '.$text.'.'));
        }
    }
    public function data_pengawas_d($action, $data)
    {
        $get = $this->data_get($data['id_pengawas'])->row_array();
        $this->db->delete("tbl_pengawas_kepsek", array('id_pengawas' => $data['id_pengawas'] , 'id_sekolah' => $data['id_sekolah']));
        $text = "berhasil di kurang";
      
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('notification', $this->myfunction->notification('success', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($get[$this->data_name]) . '</strong> '.$text.'.'));
        } else {
            $this->session->set_flashdata('notification', $this->myfunction->notification('danger', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($get[$this->data_name]) . '</strong> '.$text.'.'));
        }
    }
    public function data_insert($data)
    {
        $check = $this->data_cek('input', $data, $id = "");
        if ($check['status'] == TRUE) {
            $this->db->insert($this->table, $data);
            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('notification', $this->myfunction->notification('success', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($data[$this->data_name]) . '</strong> berhasil di simpan.'));
            } else {
                $this->session->set_flashdata('notification', $this->myfunction->notification('danger', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($data[$this->data_name]) . '</strong> gagal di simpan.'));
            }
        } else {
            $this->session->set_flashdata('notification', $this->myfunction->notification('warning', 'Data ' . $this->data_notif . ' dengan nama ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($data[$this->data_name]) . '</strong> ini sudah ada.'));
        }
    }
    public function data_update($data, $id)
    {
        $check = $this->data_cek('edit', $data, $id);
        if ($check['status'] == TRUE) {
            $get = $this->data_get($id)->row_array();
            $this->db->update($this->table, $data, array($this->id_table => $id));
            if ($this->db->affected_rows()) {
                $this->session->set_flashdata('notification', $this->myfunction->notification('success', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($get[$this->data_name]) . '</strong> berhasil di update.'));
            } else {
                $this->session->set_flashdata('notification', $this->myfunction->notification('danger', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($get[$this->data_name]) . '</strong> gagal di update.'));
            }
        } else {
            $this->session->set_flashdata('notification', $this->myfunction->notification('warning', 'Data ' . $this->data_notif . ' dengan nama ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($data[$this->data_name]) . '</strong> ini sudah ada.'));
        }
    }
    public function data_delete($id)
    {
        $get = $this->data_get($id)->row_array();
        $this->db->delete($this->table, array($this->id_table => $id));
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('notification', $this->myfunction->notification('success', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($get[$this->data_name]) . '</strong> berhasil di hapus.'));
        } else {
            $this->session->set_flashdata('notification', $this->myfunction->notification('danger', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($get[$this->data_name]) . '</strong> gagal di hapus.'));
        }
    }
    protected function data_cek($action, $value, $id)
    {
        if ($action == "input") {
            $data = $this->data_exist($value);
        } elseif ($action == "edit") {
            $query  = $this->db->get_where($this->table, array($this->id_table => $id));
            $result = $query->row_array();
            if ($query->num_rows() > 0) {
                if ($result[$this->field_exist] == $value[$this->field_exist]) {
                    $data['status'] = TRUE;
                } else {
                    $data = $this->data_exist($value);
                }
            }
        } else {
            $data['status'] = FALSE;
        }
        return $data;
    }
    protected function data_exist($value)
    {
        $query = $this->db->get_where($this->table, array($this->field_exist => $value[$this->field_exist]));
        if ($query->num_rows() < 1) {
            $data['status'] = TRUE;
        } else {
            $data['status'] = FALSE;
        }
        return $data;
    }
}
 
/* End of file Model_pengawas.php */
/* Location: ./application/models/Model_pengawas.php */