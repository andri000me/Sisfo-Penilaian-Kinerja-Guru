<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_other extends CI_Model {
	
	/**
	 * @author      : Rezky P. Budihartono
	 * @contact 	: rh3zky@gmail.com
	 * @description : Model other etc
	**/

	public function __construct()
    {
        parent::__construct();
    }
	public function _SessionCheck()
	{
		if(empty($this->session->userdata('logged_in'))){
			redirect('');
		}
	}
}

/* End of file Model_other.php */
/* Location: ./application/models/Model_other.php */