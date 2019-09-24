<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	/**
	 * @author      : Rezky P. Budihartono
	 * @contact 	: rh3zky@gmail.com
	 * @description : Controller authentication login
	 **/

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_login');
	}
	public function index()
	{
		if ($this->input->post('auth') == "isLogin") {
			$this->_login_admin();
		} elseif ($this->input->post('auth') == "isLogout") {
			$this->_logout_admin();
		} elseif ($this->input->post('auth') == "isLock") {
			$this->_locked_admin();
		} elseif ($this->input->post('auth') == "isUnlock") {
			$this->_unlocked_admin();
		} elseif($this->input->post('auth') == "loginUser"){
			$this->_login_user();
		} elseif($this->input->post('auth') == "logoutUser"){
			$this->_logout_user();
		} else {
			redirect('');
		}
	}
	//Authenticated Login Admin
	protected function _login_admin()
	{
		$user = $this->input->post('username', TRUE);
		$pass = $this->input->post('password', TRUE);
		$role = $this->input->post('role', TRUE);
		$data = $this->model_login->loginAdmin($user, $pass, $role);
		echo json_encode($data);
	}
	
	protected function _locked_admin()
	{
		unset($_SESSION['logged_in']);
		if (empty($this->session->userdata('logged_in'))) {
			$sess = array('locked_in' => 'Yes');
			$this->session->set_userdata($sess);
			$data['status'] = 'success';
		} else {
			$data['status'] = 'denied';
		}
		echo json_encode($data);
	}
	protected function _unlocked_admin()
	{
		$pass = $this->input->post('password', TRUE);
		$data = $this->model_login->unlockAdmin($pass);
		echo json_encode($data);
	}
	protected function _logout_admin()
	{
		$this->session->sess_destroy();
		if ($this->session->userdata('logged_in') != "") {
			$data['status'] = 'success';
		} else {
			$data['status'] = 'denied';
		}
		echo json_encode($data);
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
