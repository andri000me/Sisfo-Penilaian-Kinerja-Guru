<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_penilaian_guru extends CI_Model {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Model_penilaian_guru model for administrator
    **/
 
    private $table       = 'tbl_guru';
    private $id_table    = 'id_guru';
    private $field_exist = 'nip';
    private $data_notif  = 'guru';
    private $data_name   = 'nama_guru';
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
    private function data_list()
    {
        $query = $this->db->select('*')
                          ->from($this->table) 
                          ->join('tbl_guru_dinilai','tbl_guru.id_guru = tbl_guru_dinilai.id_guru_nilai')
                          ->where('tbl_guru_dinilai.id_guru_asesor', $this->session->userdata('sess_pkg_id_guru'))
                          ->order_by('tbl_guru.id_guru', 'ASC')
                          ->get();
        $total  = $query->num_rows();
        if ($total > 0) {
            $no = 1;
            foreach ($query->result() as $row) {
                $qry_1 = $this->db->select('*')
                                  ->from("tbl_tugas_guru") 
                                  ->join('tbl_tugas','tbl_tugas_guru.id_tugas = tbl_tugas.id_tugas')
                                  ->where('tbl_tugas_guru.id_guru', $row->id_guru)
                                  ->where('tbl_tugas.jenis_tugas', 'Pokok')
                                  ->get() ;
                $row_1 = $qry_1->num_rows();
                $dta_1 = $qry_1->row();
                $qry_2 = $this->db->select('*')
                                  ->from("tbl_tugas_guru") 
                                  ->join('tbl_tugas','tbl_tugas_guru.id_tugas = tbl_tugas.id_tugas')
                                  ->where('tbl_tugas_guru.id_guru', $row->id_guru)
                                  ->where('tbl_tugas.jenis_tugas', 'Tambahan')
                                  ->get() ;
                $row_2 = $qry_2->num_rows();
                $dta_2 = $qry_2->row();
                $aksi   = '<span data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><a class="btn btn-sm btn-success" href="' . base_url('' . $this->uri->segment(1) . '/daftar-tugas/' . $this->myfunction->_encdec('enc', $row->id_guru)) . '/" >Nilai PKG</a></span>&nbsp;';
                $data[] = [
                    'no'             => $no, 
                    'nip'            => $row->nip,
                    'nama'           => $row->nama_guru, 
                    'tugas_pokok'    => $row_1 > 0 ? $dta_1->tugas : "-",
                    'tugas_tambahan' => $row_2 > 0 ? $dta_2->tugas : "-",
                    'aksi'           => $aksi
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
    public function data_insert($data)
    {
        $this->db->insert_batch('tbl_penilaian_guru', $data); 
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('notification', $this->myfunction->notification('success', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($data[$this->data_name]) . '</strong> berhasil di simpan.'));
        } else {
            $this->session->set_flashdata('notification', $this->myfunction->notification('danger', 'Data ' . $this->data_notif . ' <strong>' . $this->myfunction->_xss($data[$this->data_name]) . '</strong> gagal di simpan.'));
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
 
/* End of file Model_penilaian_guru.php */
/* Location: ./application/models/Model_penilaian_guru.php */