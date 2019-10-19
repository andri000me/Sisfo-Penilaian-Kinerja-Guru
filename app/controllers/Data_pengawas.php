<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Data_pengawas extends CI_Controller {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Data_pengawas controller for administrator
    **/
 
    public $control = 'data-pengawas';
    public $konten  = 'pages_admin/pages_pengawas/';
    public $view    = 'pages_admin/v_dashboard';
 
    public function __construct()
    {
        parent::__construct();
        $this->model_other->_SessionCheck();
        $this->load->model('model_pengawas');
    }
    public function get()
    {
        $this->model_pengawas->_getData();
    }
    public function index()
    {
        $data['konten']  = $this->konten . 'data';
        $this->load->view($this->view, $data);
    }
    public function input()
    {
        $data['konten']  = $this->konten . 'form';
        $data['select']  = $this->model_pengawas->data_select_form();
        $this->load->view($this->view, $data);
    }
    public function edit()
    {
        $id              = $this->myfunction->_encdec('dec', $this->uri->segment(3));
        $data['konten']  = $this->konten . 'form';
        $data['data']    = $this->model_pengawas->data_get($id)->row();
        $data['select']  = $this->model_pengawas->data_select_form();
        $this->load->view($this->view, $data);
    }
    public function tambah_sekolah()
    {
        $id             = $this->myfunction->_encdec('dec', $this->uri->segment(3));
        $data['konten'] = $this->konten . 'form_sekolah';
        $data['data']   = $this->model_pengawas->data_get($id)->row(); 
        $this->load->view($this->view, $data);
    }
    public function proses()
    {
        $act = $this->uri->segment(3);
        if ($act == 'i') {
            $data['nip_pengawas']   = $this->input->post('nip_pengawas', TRUE);
            $data['nama_pengawas']  = $this->input->post('nama_pengawas', TRUE);
            $this->model_pengawas->data_insert($data);
        } elseif ($act == 'e') {
            $id                     = $this->myfunction->_encdec('dec', $this->input->post('id'));
            $data['nip_pengawas']   = $this->input->post('nip_pengawas', TRUE);
            $data['nama_pengawas']  = $this->input->post('nama_pengawas', TRUE); 
            $this->model_pengawas->data_update($data, $id);
        } elseif ($act == "g") {
            $action	= $this->uri->segment(4);
            if($action == "i"){
                $data['id_sekolah']	    = $this->myfunction->_encdec('dec', $this->uri->segment(6));
                $data['id_pengawas']	= $this->myfunction->_encdec('dec', $this->uri->segment(5));
                $this->model_pengawas->data_pengawas_i($action,$data);
            }elseif($action == "d"){
                $data['id_sekolah']	    = $this->myfunction->_encdec('dec', $this->uri->segment(6));
                $data['id_pengawas']	= $this->myfunction->_encdec('dec', $this->uri->segment(5));
                
                $this->model_pengawas->data_pengawas_d($action,$data);
            }            
            redirect($this->agent->referrer());
		} elseif ($act == 'd') {
            $id = $this->myfunction->_encdec('dec', $this->uri->segment(4));
            $this->model_pengawas->data_delete($id);
        }
        redirect($this->control . '/');
    }
}
 
/* End of file Data_pengawas.php */
/* Location: ./application/controllers/Data_pengawas.php */