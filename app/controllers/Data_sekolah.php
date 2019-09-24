<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Data_sekolah extends CI_Controller {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Data_sekolah controller for administrator
    **/
 
    public $control = 'data-sekolah';
    public $konten  = 'pages_admin/pages_sekolah/';
    public $view    = 'pages_admin/v_dashboard';
 
    public function __construct()
    {
        parent::__construct();
        $this->model_other->_SessionCheck();
        $this->load->model('model_sekolah');
    }
    public function get()
    {
        $this->model_sekolah->_getData();
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
        $data['data']    = $this->model_sekolah->data_get($id)->row();
        $this->load->view($this->view, $data);
    }
    public function proses()
    {
        $act = $this->uri->segment(3);
        if ($act == 'i') {
            $data['nama_sekolah']    = $this->input->post('nama_sekolah', TRUE);
            $data['no_telp']         = $this->input->post('no_telp', TRUE);
            $data['provinsi']        = $this->input->post('provinsi', TRUE);
            $data['kabupaten']       = $this->input->post('kabupaten', TRUE);
            $data['kecamatan']       = $this->input->post('kecamatan', TRUE);
            $data['kelurahan']       = $this->input->post('kelurahan', TRUE);
            $this->model_sekolah->data_insert($data);
        } elseif ($act == 'e') {
            $id                      = $this->myfunction->_encdec('dec', $this->input->post('id'));
            $data['nama_sekolah']    = $this->input->post('nama_sekolah', TRUE);
            $data['no_telp']         = $this->input->post('no_telp', TRUE);
            $data['provinsi']        = $this->input->post('provinsi', TRUE);
            $data['kabupaten']       = $this->input->post('kabupaten', TRUE);
            $data['kecamatan']       = $this->input->post('kecamatan', TRUE);
            $data['kelurahan']       = $this->input->post('kelurahan', TRUE);
            $this->model_sekolah->data_update($data, $id);
        } elseif ($act == 'd') {
            $id = $this->myfunction->_encdec('dec', $this->uri->segment(4));
            $this->model_sekolah->data_delete($id);
        }
        redirect($this->control . '/');
    }
}
 
/* End of file Data_sekolah.php */
/* Location: ./application/controllers/Data_sekolah.php */