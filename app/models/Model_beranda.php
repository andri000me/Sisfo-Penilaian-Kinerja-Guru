<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_beranda extends CI_Model {

	/**
	 * @author      : Rezky P. Budihartono
	 * @contact 	: rh3zky@gmail.com
	 * @description : Model main menu beranda
	**/
	
	private $tbl_1 	= 'tbl_sekolah';
	private $tbl_2  = 'tbl_guru';
	private $tbl_3 	= 'tbl_kompetensi';
	private $tbl_4	= 'tbl_indikator';

	public function _count_1()
	{
		return $this->db->count_all($this->tbl_1);
	}
	public function _count_2()
	{
		return $this->db->count_all($this->tbl_2);
	}
	public function _count_3()
	{
		return $this->db->count_all($this->tbl_3);
	}
	public function _count_4()
	{
		return $this->db->count_all($this->tbl_4);
	}
	public function _dataUser()
	{
		return $this->db->get_where('tbl_user', array('id_user' =>  $this->session->userdata('sess_pkg_id')))->row();
	}
}

/* End of file model_beranda.php */
/* Location: ./application/models/model_beranda.php */