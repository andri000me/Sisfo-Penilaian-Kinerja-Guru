<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_laporan extends CI_Controller {

	/**
	 * @author      : Rezky P. Budihartono
	 * @contact 	: rh3zky@gmail.com
	 * @description : Controller data laporan for administrator
	**/

	public $control = 'data-laporan';
	public $konten  = 'pages_admin/pages_laporan/';
	public $view    = 'pages_admin/v_dashboard';

	public function __construct()
	{
		parent::__construct();
		$this->model_other->_SessionCheck();
	}
	public function index()
	{
		$data['konten'] 	= $this->konten.'data';
		$data['add_js_app'] = '<script>$(".select2").select2();</script>';
		$this->load->view($this->view,$data);
	}
	public function result()
	{
		$data['jenis_laporan'] 	= $this->input->post('jenis_laporan',TRUE);
		$data['tgl1'] 	  		= $this->input->post('tgl1',TRUE);
		$data['tgl2'] 	  		= $this->input->post('tgl2',TRUE);
		$this->load->view($this->konten.'result',$data);
	}

}

/* End of file data_laporan.php */
/* Location: ./application/controllers/data_laporan.php */