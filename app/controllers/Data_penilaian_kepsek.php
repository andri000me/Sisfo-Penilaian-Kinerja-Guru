<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Data_penilaian_kepsek extends CI_Controller {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Data_penilaian_kepsek controller for administrator
    **/
 
    public $control = 'data-penilaian-kepsek';
    public $konten  = 'pages_admin/pages_penilaian_kepsek/';
    public $view    = 'pages_admin/v_dashboard';
 
    public function __construct()
    {
        parent::__construct();
        $this->model_other->_SessionCheck();
        $this->load->model('model_penilaian_kepsek');
    }
    public function get()
    {
        $this->model_penilaian->_getData();
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
        $data['data']    = $this->model_penilaian_kepsek->data_get($id)->row();
        $this->load->view($this->view, $data);
    }
    public function proses()
    {
        $act = $this->uri->segment(3);
        if ($act == 'i') {
            $data['id_pengawas']    = $this->input->post('id_pengawas', TRUE);
            $data['id_tugas']       = $this->input->post('id_tugas', TRUE);
            $data['id_kompetensi']  = $this->input->post('id_kompetensi', TRUE);
            $data['id_indikator']   = $this->input->post('id_indikator', TRUE);
            $data['skor_1']         = $this->input->post('skor_1', TRUE);
            $data['skor_2']         = $this->input->post('skor_2', TRUE);
            $data['skor_3']         = $this->input->post('skor_3', TRUE);
            $data['skor_4']         = $this->input->post('skor_4', TRUE);
            $this->model_penilaian_kepsek->data_insert($data);
        } elseif ($act == 'e') {
            $id                     = $this->myfunction->_encdec('dec', $this->input->post('id'));
            $data['id_pengawas']    = $this->input->post('id_pengawas', TRUE);
            $data['id_tugas']       = $this->input->post('id_tugas', TRUE);
            $data['id_kompetensi']  = $this->input->post('id_kompetensi', TRUE);
            $data['id_indikator']   = $this->input->post('id_indikator', TRUE);
            $data['skor_1']         = $this->input->post('skor_1', TRUE);
            $data['skor_2']         = $this->input->post('skor_2', TRUE);
            $data['skor_3']         = $this->input->post('skor_3', TRUE);
            $data['skor_4']         = $this->input->post('skor_4', TRUE);
            $this->model_penilaian_kepsek->data_update($data, $id);
        } elseif ($act == 'd') {
            $id = $this->myfunction->_encdec('dec', $this->uri->segment(4));
            $this->model_penilaian_kepsek->data_delete($id);
        }
        redirect($this->control . '/');
    }
}
 
/* End of file Data_penilaian_kepsek.php */
/* Location: ./application/controllers/Data_penilaian_kepsek.php */