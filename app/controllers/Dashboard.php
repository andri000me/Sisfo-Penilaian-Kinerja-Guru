<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * @author      : Rezky P. Budihartono
	 * @contact 	: rh3zky@gmail.com
	 * @description : Controller dahsboard
	**/

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == 'Yes'){
			redirect('beranda/'); 
			$this->load->view('pages_admin/v_dashboard');
		}elseif($this->session->userdata('locked_in') == 'Yes'){
			$this->load->view('pages_admin/v_lock');
		}else{
			$this->load->view('pages_admin/v_login');
		}
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */