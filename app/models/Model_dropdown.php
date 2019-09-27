<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_dropdown extends CI_Model {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Model_dropdown model for administrator
    **/
 
    public function _getKompetensi($term, $id)
    {
        $query = $this->db->select('*')
                          ->from('tbl_kompetensi')
                          ->like('nama_kompetensi', $term)
                          ->where('id_tenaga_pendidik', $id)
                          ->order_by('id_kompetensi', 'ASC')
                          ->get();
        $total = $query->num_rows();
        $data  = [];
        if ($total > 0) {
            foreach ($query->result() as $row) {
                $data[] = [
                    'id'    => $row->id_kompetensi,
                    'name_' => $row->nama_kompetensi
                ];
            }
        }
        echo json_encode($data);
    }
}
 
/* End of file Model_dropdown.php */
/* Location: ./application/models/Model_dropdown.php */