<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Data_penghulu extends CI_Controller {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Data_penghulu controller for administrator
    **/
 
    public $control = 'data-penghulu';
    public $konten  = 'pages_admin/pages_penghulu/';
    public $view    = 'pages_admin/v_dashboard';
 
    public function __construct()
    {
        parent::__construct();
        $this->model_other->_SessionCheck();
        $this->model_other->_sendSaveDate();
        $this->load->model('model_penghulu');
    }
    public function get()
    {
        $this->model_penghulu->_getData();
    }
    public function index()
    {
        $data['konten']  = $this->konten . 'data';
        $this->load->view($this->view, $data);
    }
    public function input()
    {
        $data['konten']  = $this->konten . 'form';
        $this->load->view($this->view, $data);
    }
    public function edit()
    {
        $id              = $this->myfunction->_encdec('dec', $this->uri->segment(3));
        $data['konten']  = $this->konten . 'form';
        $data['data']    = $this->model_penghulu->data_get($id)->row();
        $this->load->view($this->view, $data);
    }
    public function proses()
    {
        $act = $this->uri->segment(3);
        if ($act == 'i') {
            $data['nama_penghulu']    = $this->input->post('nama_penghulu', TRUE);
            $data['jabatan_penghulu'] = $this->input->post('jabatan_penghulu', TRUE);
            $data['no_telp']          = $this->input->post('no_telp', TRUE);
            $this->model_penghulu->data_insert($data);
        } elseif ($act == 'e') {
            $id                       = $this->myfunction->_encdec('dec', $this->input->post('id'));
            $data['nama_penghulu']    = $this->input->post('nama_penghulu', TRUE);
            $data['jabatan_penghulu'] = $this->input->post('jabatan_penghulu', TRUE);
            $data['no_telp']          = $this->input->post('no_telp', TRUE);
            $this->model_penghulu->data_update($data, $id);
        } elseif ($act == 'd') {
            $id = $this->myfunction->_encdec('dec', $this->uri->segment(4));
            $this->model_penghulu->data_delete($id);
        }
        redirect($this->control . '/');
    }
}
 
/* End of file Data_penghulu.php */
/* Location: ./application/controllers/Data_penghulu.php */