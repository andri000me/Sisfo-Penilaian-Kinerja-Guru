<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	/**
	 * @author      : Rezky P. Budihartono
	 * @contact 	: rh3zky@gmail.com
	 * @description : Controller Beranda
	**/

	private $konten  = 'pages_admin/pages_beranda/';
	private $view    = 'pages_admin/v_dashboard';

	public function __construct()
	{
		parent::__construct();
		$this->model_other->_SessionCheck();
		$this->load->model('model_beranda');
	}

	public function index()
	{
		$data['rows_1']	  = $this->model_beranda->_count_1();
		$data['rows_2']	  = $this->model_beranda->_count_2();
		$data['rows_3']	  = $this->model_beranda->_count_3();
		$data['rows_4']	  = $this->model_beranda->_count_4();
		$data['datauser'] = $this->model_beranda->_dataUser();
		$data['konten']   = $this->konten.'data';
		$this->load->view($this->view,$data);
	}
}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */