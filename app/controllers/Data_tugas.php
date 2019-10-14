<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Data_tugas extends CI_Controller {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Data_tugas controller for administrator
    **/
 
    public $control = 'data-tugas';
    public $konten  = 'pages_admin/pages_tugas/';
    public $view    = 'pages_admin/v_dashboard';
 
    public function __construct()
    {
        parent::__construct();
        $this->model_other->_SessionCheck();
        $this->load->model('model_tugas');
    }
    public function get()
    {
        $this->model_tugas->_getData();
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
        $data['data']    = $this->model_tugas->data_get($id)->row();
        $this->load->view($this->view, $data);
    }
    public function proses()
    {
        $act = $this->uri->segment(3);
        if ($act == 'i') {
            $data['tugas']       = $this->input->post('tugas', TRUE);
            $data['jenis_tugas'] = $this->input->post('jenis_tugas', TRUE);
            $this->model_tugas->data_insert($data);
        } elseif ($act == 'e') {
            $id                  = $this->myfunction->_encdec('dec', $this->input->post('id'));
            $data['tugas']       = $this->input->post('tugas', TRUE);
            $data['jenis_tugas'] = $this->input->post('jenis_tugas', TRUE);
            $this->model_tugas->data_update($data, $id);
        } elseif ($act == 'd') {
            $id = $this->myfunction->_encdec('dec', $this->uri->segment(4));
            $this->model_tugas->data_delete($id);
        }
        redirect($this->control . '/');
    }
}
 
/* End of file Data_tenaga_pendidik.php */
/* Location: ./application/controllers/Data_tenaga_pendidik.php */