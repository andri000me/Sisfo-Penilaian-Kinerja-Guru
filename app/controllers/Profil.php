<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	/**
	 * @author      : Rezky P. Budihartono
	 * @contact 	: rh3zky@gmail.com
	 * @description : Controller profil
	 **/

	protected $table   = 'tbl_user';
	protected $id_name = 'id_user';
	private   $konten  = 'pages_admin/pages_profil/';
	private   $view    = 'pages_admin/v_dashboard';

	public function __construct()
	{
		parent::__construct();
		$this->model_other->_SessionCheck();
	}
	public function index()
	{
		$data['konten'] 	= $this->konten.'data';
		$data['userdata']   = $this->db->get_where($this->table,array($this->id_name =>  $this->session->userdata('sess_pkg_id')))->row_array();
		$this->load->view($this->view,$data);
	}
	public function update()
	{
		$id 		= $this->input->post('id');
		$foto_lama	= $this->input->post('foto_lama',TRUE);
		$password 	= $this->input->post('password',TRUE);
		$this->db->set('nama_lengkap', $this->input->post('nama_lengkap'));
		if(!empty($password)){
			$this->db->set('password',$this->myfunction->_encdec('enc',$password));
		}
		if(!empty($_FILES['foto']['name'])){
			$this->db->set('foto', $this->myfunction->_uploadAvatar($_FILES['foto']['name'],$_FILES['foto']['tmp_name'],$foto_lama));
		}
		$this->db->where($this->id_name,$id)->update($this->table);
		if($this->db->affected_rows()){
			$this->session->set_flashdata('notification', $this->myfunction->notification('success','Data profil anda berhasil di update.'));
		}else{
			$this->session->set_flashdata('notification', $this->myfunction->notification('danger','Data profil anda gagal di update.'));
		}
		redirect('profil/');
	}
}

/* End of file C_profil.php */
/* Location: ./application/controllers/C_profil.php */