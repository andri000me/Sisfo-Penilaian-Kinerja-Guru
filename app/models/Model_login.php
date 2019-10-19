<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model{

	/**
	 * @author      : Rezky P. Budihartono
	 * @contact 	: rh3zky@gmail.com
	 * @description : Model login admin 
	**/

	private $table_1 = 'tbl_user';

	public function loginAdmin($user,$pass,$role)
	{
		$query = $this->db
					  ->where('username',$user)
					  ->where('password',$this->myfunction->_encdec('enc',$pass))
					  ->where('role',$role)
					  ->get($this->table_1);
		$total = $query->num_rows();
		if($total > 0){
			foreach($query->result() as $row) {
				$sess = array('logged_in' 		 	 => 'Yes', 
							  'sess_pkg_id' 	 	 => $row->id_user,
							  'sess_pkg_id_guru' 	 => $row->id_guru,
							  'sess_pkg_id_pengawas' => $row->id_pengawas,
							  'sess_pkg_role' 	 	 => $row->role);
				$this->session->set_userdata($sess);
			}
			$status = 'success';
		}else{
			$status = 'denied';
		}
		$result['status'] 	= $status;
		return $result;
	}
	
	public function unlockAdmin($pass)
	{
		$id    = $this->session->userdata('sess_pkg_id');
		$query = $this->db
					  ->where('id_user',$id)
					  ->where('password',$this->myfunction->_encdec('enc',$pass))
					  ->get($this->table_1);
		$total 	= $query->num_rows();
		if($total > 0){
			foreach ($query->result() as $row) {
				$sess = array('logged_in' 	     	 => 'Yes', 
							  'sess_pkg_id'   	 	 => $row->id_user,
							  'sess_pkg_id_guru' 	 => $row->id_guru,
							  'sess_pkg_id_pengawas' => $row->id_pengawas,
							  'sess_pkg_role' 	 	 => $row->role);
				$this->session->set_userdata($sess);
			}
			$status = 'success';
			unset($_SESSION['locked_in']);
		}else{
			$status = 'denied';
		}
		$result['status'] = $status;
		return $result;
	}
}

/* End of file Model_login.php */
/* Location: ./application/models/Model_login.php */