<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Data_golongan extends CI_Controller {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Data_golongan controller for administrator
    **/
 
    public $control = 'data-golongan';
    public $konten  = 'pages_admin/pages_golongan/';
    public $view    = 'pages_admin/v_dashboard';
 
    public function __construct()
    {
        parent::__construct();
        $this->model_other->_SessionCheck();
        $this->load->model('model_golongan');
    }
    public function get()
    {
        $this->model_golongan->_getData();
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
        $data['data']    = $this->model_golongan->data_get($id)->row();
        $this->load->view($this->view, $data);
    }
    public function proses()
    {
        $act = $this->uri->segment(3);
        if ($act == 'i') {
            $data['kenaikan_ke'] = $this->input->post('kenaikan_ke', TRUE);
            $data['akk']         = $this->input->post('akk', TRUE);
            $data['pd']          = $this->input->post('pd', TRUE);
            $data['pi']          = $this->input->post('pi', TRUE);
            $data['ki']          = $this->input->post('ki', TRUE);
            $data['akp']         = $this->input->post('akp', TRUE);
            $this->model_golongan->data_insert($data);
        } elseif ($act == 'e') {
            $id                  = $this->myfunction->_encdec('dec', $this->input->post('id'));
            $data['kenaikan_ke'] = $this->input->post('kenaikan_ke', TRUE);
            $data['akk']         = $this->input->post('akk', TRUE);
            $data['pd']          = $this->input->post('pd', TRUE);
            $data['pi']          = $this->input->post('pi', TRUE);
            $data['ki']          = $this->input->post('ki', TRUE);
            $data['akp']         = $this->input->post('akp', TRUE);
            $this->model_golongan->data_update($data, $id);
        } elseif ($act == 'd') {
            $id = $this->myfunction->_encdec('dec', $this->uri->segment(4));
            $this->model_golongan->data_delete($id);
        }
        redirect($this->control . '/');
    }
}
 
/* End of file Data_golongan.php */
/* Location: ./application/controllers/Data_golongan.php */