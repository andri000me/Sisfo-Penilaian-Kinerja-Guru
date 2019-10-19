<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Data_user extends CI_Controller {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Data_user controller for administrator
    **/
 
    public $control = 'data-user';
	public $konten  = 'pages_admin/pages_user/';
	public $view    = 'pages_admin/v_dashboard';

	public function __construct()
	{
		parent::__construct();
		$this->model_other->_SessionCheck();
		$this->load->model('model_user');
	}
	public function get()
	{
		$this->model_user->_getData();
	}
	public function index()
	{
		$data['konten'] = $this->konten.'data';
		$this->load->view($this->view,$data);
	}
	public function input()
	{
		$data['konten'] = $this->konten.'form';
		$data['select']	= $this->model_user->data_select_form();
		$this->load->view($this->view,$data);
	}
	public function edit()
	{
		$id 			= $this->myfunction->_encdec('dec',$this->uri->segment(3));
		$data['konten'] = $this->konten.'form';
		$data['data']  	= $get = $this->model_user->data_get($id)->row();
		$data['select']	= $this->model_user->data_select_form();
		$this->load->view($this->view,$data);
	}
	public function proses()
	{
		$act = $this->uri->segment(3);
		if($act == "i"){ 
			$data['id_guru']   	  = $this->input->post('id_guru',TRUE) == NULL ? NULL : $this->input->post('id_guru',TRUE);
			$data['id_pengawas']  = $this->input->post('id_pengawas',TRUE) == NULL ? NULL : $this->input->post('id_pengawas',TRUE);
			$data['nama_lengkap'] = $this->input->post('nama_lengkap',TRUE);
			$data['username'] 	  = $this->input->post('username',TRUE);
			$data['password'] 	  = $this->myfunction->_encdec('enc',$this->input->post('password',TRUE));
			if(!empty($_FILES['foto']['name'])){
				$data['foto']     = $this->myfunction->_uploadAvatar($_FILES['foto']['name'],$_FILES['foto']['tmp_name'],$foto_lama="");
			}
			$data['role']  	  	  = $this->input->post('role',TRUE);
			$this->model_user->data_insert($data);
		}elseif($act == "e"){
			$id					  = $this->myfunction->_encdec('dec',$this->input->post('id')); 
			$data['id_guru']   	  = $this->input->post('id_guru',TRUE) == NULL ? NULL : $this->input->post('id_guru',TRUE);
			$data['id_pengawas']  = $this->input->post('id_pengawas',TRUE) == NULL ? NULL : $this->input->post('id_pengawas',TRUE);
			$data['nama_lengkap'] = $this->input->post('nama_lengkap',TRUE);
			$data['username'] 	  = $this->input->post('username',TRUE);
			if(!empty($_POST['password'])){
				$data['password'] = $this->myfunction->_encdec('enc',$this->input->post('password',TRUE));
			}
			$foto_lama	  	  	  = $this->input->post('foto_lama');
			if(!empty($_FILES['foto']['name'])){
				$data['foto']     = $this->myfunction->_uploadAvatar($_FILES['foto']['name'],$_FILES['foto']['tmp_name'],$foto_lama);
			}
			$data['role']  	  	  = $this->input->post('role',TRUE);
			$this->model_user->data_update($data,$id);
		}elseif($act == "d"){
			$id = $this->myfunction->_encdec('dec',$this->uri->segment(4));
			$this->model_user->data_delete($id);
		}
		redirect($this->control.'/');
	}
}
 
/* End of file Data_user.php */
/* Location: ./application/controllers/Data_user.php */