<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Data_guru extends CI_Controller {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Data_guru controller for administrator
    **/
 
    public $control = 'data-guru';
    public $konten  = 'pages_admin/pages_guru/';
    public $view    = 'pages_admin/v_dashboard';
 
    public function __construct()
    {
        parent::__construct();
        $this->model_other->_SessionCheck();
        $this->load->model('model_guru');
    }
    public function get()
    {
        $this->model_guru->_getData();
    }
    public function index()
    {
        $data['konten']  = $this->konten . 'data';
        $this->load->view($this->view, $data);
    }
    public function input()
    {
        $data['konten'] = $this->konten . 'form';
        $data['select'] = $this->model_guru->data_select_form();
        $this->load->view($this->view, $data);
    }
    public function edit()
    {
        $id             = $this->myfunction->_encdec('dec', $this->uri->segment(3));
        $data['konten'] = $this->konten . 'form';
        $data['data']   = $this->model_guru->data_get($id)->row();
        $data['select'] = $this->model_guru->data_select_form();
        $this->load->view($this->view, $data);
    }
    public function tambah_guru()
    {
        $id             = $this->myfunction->_encdec('dec', $this->uri->segment(3));
        $data['konten'] = $this->konten . 'form_guru';
        $data['data']   = $this->model_guru->data_get($id)->row(); 
        $this->load->view($this->view, $data);
    }
    public function proses()
    {
        $act = $this->uri->segment(3);
        if ($act == 'i') {
            $data['id_sekolah']                 = $this->input->post('id_sekolah', TRUE);
            $data['nip']                        = $this->input->post('nip', TRUE);
            $data['nama_guru']                  = $this->input->post('nama_guru', TRUE);
            $data['jenis_kelamin']              = $this->input->post('jenis_kelamin', TRUE);
            $data['tempat_lahir']               = $this->input->post('tempat_lahir', TRUE);
            $data['tgl_lahir']                  = $this->input->post('tgl_lahir', TRUE);
            $data['nomor_seri']                 = $this->input->post('nomor_seri', TRUE);
            $data['nuptk']                      = $this->input->post('nuptk', TRUE);
            $data['nrg']                        = $this->input->post('nrg', TRUE);
            $data['jabatan']                    = $this->input->post('jabatan', TRUE);
            $data['tmt_pangkat_golongan']       = $this->input->post('tmt_pangkat_golongan', TRUE);
            $data['tmt_sebagai_guru']           = $this->input->post('tmt_sebagai_guru', TRUE);
            $data['masa_kerja_sebagai_guru']    = $this->input->post('masa_kerja_sebagai_guru', TRUE);
            $data['tmt_tugas_tambahan']         = $this->input->post('tmt_tugas_tambahan', TRUE) == "" ? NULL : $this->input->post('tmt_tugas_tambahan', TRUE);
            $data['masa_kerja_tugas_tambahan']  = $this->input->post('masa_kerja_tugas_tambahan', TRUE) == "" ? NULL : $this->input->post('masa_kerja_tugas_tambahan', TRUE);
            $data['pendidikan']                 = $this->input->post('pendidikan', TRUE);
            $data['guru_mapel']                 = $this->input->post('guru_mapel', TRUE);
            $data['level_guru']                 = $this->input->post('level_guru', TRUE);
            $this->model_guru->data_insert($data);
            $id_guru                            = $this->db->insert_id();
            $tugas_pokok                        = $this->input->post('tugas_pokok', TRUE);
            $tugas_tambahan                     = $this->input->post('tugas_tambahan', TRUE);
            $data_1                             = [];
            for($i=0;$i<count($tugas_pokok);$i++){
                $data_1[] = ['id_guru' => $id_guru, 'id_tugas' => $tugas_pokok[$i]];
            }
            for($i=0;$i<count($tugas_tambahan);$i++){
                $data_1[] = ['id_guru' => $id_guru, 'id_tugas' => $tugas_tambahan[$i]];
            }
            $this->db->insert_batch('tbl_tugas_guru',$data_1);
        } elseif ($act == 'e') {
            $id                                 = $this->myfunction->_encdec('dec', $this->input->post('id'));
            $data['id_sekolah']                 = $this->input->post('id_sekolah', TRUE);
            $data['nip']                        = $this->input->post('nip', TRUE);
            $data['nama_guru']                  = $this->input->post('nama_guru', TRUE);
            $data['jenis_kelamin']              = $this->input->post('jenis_kelamin', TRUE);
            $data['tempat_lahir']               = $this->input->post('tempat_lahir', TRUE);
            $data['tgl_lahir']                  = $this->input->post('tgl_lahir', TRUE);
            $data['nomor_seri']                 = $this->input->post('nomor_seri', TRUE);
            $data['nuptk']                      = $this->input->post('nuptk', TRUE);
            $data['nrg']                        = $this->input->post('nrg', TRUE);
            $data['jabatan']                    = $this->input->post('jabatan', TRUE);
            $data['tmt_pangkat_golongan']       = $this->input->post('tmt_pangkat_golongan', TRUE);
            $data['tmt_sebagai_guru']           = $this->input->post('tmt_sebagai_guru', TRUE);
            $data['masa_kerja_sebagai_guru']    = $this->input->post('masa_kerja_sebagai_guru', TRUE);
            $data['tmt_tugas_tambahan']         = $this->input->post('tmt_tugas_tambahan', TRUE)  == "" ? NULL : $this->input->post('tmt_tugas_tambahan', TRUE);
            $data['masa_kerja_tugas_tambahan']  = $this->input->post('masa_kerja_tugas_tambahan', TRUE)  == "" ? NULL : $this->input->post('masa_kerja_tugas_tambahan', TRUE);
            $data['pendidikan']                 = $this->input->post('pendidikan', TRUE);
            $data['guru_mapel']                 = $this->input->post('guru_mapel', TRUE);
            $data['level_guru']                 = $this->input->post('level_guru', TRUE);
 
            $this->model_guru->data_update($data, $id);
            $tugas_pokok = $this->input->post('tugas_pokok', TRUE);
            for($i=0;$i<count($tugas_pokok);$i++){
                $data_1['id_guru']  = $id;
                $data_1['id_tugas'] = $tugas_pokok[$i];
                $array = array('id_guru' => $id, 'id_tugas'=> $this->input->post('id_tugas_p', TRUE));
                $this->model_guru->data_update_tugas('tbl_tugas_guru',$data_1, $array, $id);
            }
            $tugas_tambahan = $this->input->post('tugas_tambahan', TRUE);
            for($i=0;$i<count($tugas_tambahan);$i++){
                $data_1['id_guru']  = $id;
                $data_1['id_tugas'] = $tugas_tambahan[$i];
                $array = array('id_guru' => $id, 'id_tugas'=> $this->input->post('id_tugas_t', TRUE));
                $this->model_guru->data_update_tugas('tbl_tugas_guru',$data_1, $array, $id);
            }
        }elseif ($act == "a") {
			$id	        = $this->myfunction->_encdec('dec', $this->uri->segment(5));
			$set_asesor	= $this->uri->segment(4);
			$this->model_guru->data_set($act,$set_asesor,$id);
		}elseif ($act == "g") {
            $action	= $this->uri->segment(4);
            if($action == "i"){
                $data['id_guru_nilai']	= $this->myfunction->_encdec('dec', $this->uri->segment(6));
                $data['id_guru_asesor']	= $this->myfunction->_encdec('dec', $this->uri->segment(5));
                $this->model_guru->data_guru_i($action,$data);
            }elseif($action == "d"){
                $data['id_guru_nilai']	= $this->myfunction->_encdec('dec', $this->uri->segment(6));
                $data['id_guru_asesor']	= $this->myfunction->_encdec('dec', $this->uri->segment(5));
                
                $this->model_guru->data_guru_d($action,$data);
            }            
            redirect($this->agent->referrer());
		}elseif ($act == 'd') {
            $id = $this->myfunction->_encdec('dec', $this->uri->segment(4));
            $this->model_guru->data_delete($id);
        }
        redirect($this->control . '/');
    }
}
 
/* End of file Data_guru.php */
/* Location: ./application/controllers/Data_guru.php */