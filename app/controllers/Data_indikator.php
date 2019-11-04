<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Data_indikator extends CI_Controller {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Data_indikator controller for administrator
    **/
 
    public $control = 'data-indikator';
    public $konten  = 'pages_admin/pages_indikator/';
    public $view    = 'pages_admin/v_dashboard';
 
    public function __construct()
    {
        parent::__construct();
        $this->model_other->_SessionCheck();
        $this->load->model('model_indikator');
    }
    public function get()
    {
        $this->model_indikator->_getData();
    }
    public function index()
    {
        $data['konten']  = $this->konten . 'data';
        $this->load->view($this->view, $data);
    }
    public function input()
    {
        $data['konten']  = $this->konten . 'form';
        $data['select']  = $this->model_indikator->data_select_form();
        $this->load->view($this->view, $data);
    }
    public function edit()
    {
        $id              = $this->myfunction->_encdec('dec', $this->uri->segment(3));
        $data['konten']  = $this->konten . 'form';
        $data['data']    = $this->model_indikator->data_get($id)->row();
        $data['select']  = $this->model_indikator->data_select_form();
        $this->load->view($this->view, $data);
    }
    public function proses()
    {
        $act = $this->uri->segment(3);
        if ($act == 'i') {
            $data['id_tugas']           = $this->input->post('id_tugas', TRUE);
            $data['id_kompetensi']      = $this->input->post('id_kompetensi', TRUE);
            $data['nama_indikator']     = trim($this->input->post('nama_indikator', TRUE));
            $this->model_indikator->data_insert($data);
        } elseif ($act == 'e') {
            $id                         = $this->myfunction->_encdec('dec', $this->input->post('id'));
            $data['id_tugas']           = $this->input->post('id_tugas', TRUE);
            $data['id_kompetensi']      = $this->input->post('id_kompetensi', TRUE);
            $data['nama_indikator']     = trim($this->input->post('nama_indikator', TRUE));
            $this->model_indikator->data_update($data, $id);
        } elseif ($act == 'd') {
            $id = $this->myfunction->_encdec('dec', $this->uri->segment(4));
            $this->model_indikator->data_delete($id);
        }
        redirect($this->control . '/');
    }
}
 
/* End of file Data_indikator.php */
/* Location: ./application/controllers/Data_indikator.php */