<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dropdown extends CI_Controller {
 
    /**
        * @author      	: Rezky P. Budihartono
        * @contact 		: rh3zky@gmail.com
        * @description 	: Dropdown controller for administrator
    **/
 
    /**
     * Dropdown All Form 
     * @access public
     */

    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('model_dropdown');
    }
    public function kompetensi()
    {
        $term = $this->input->get('search');
        $id   = $this->uri->segment(2); 
        $this->model_dropdown->_getKompetensi($term,$id);
    }
    public function guru()
    {
        $term = $this->input->get('search');
        $this->model_dropdown->_getGuru($term);
    }
    public function pengawas()
    {
        $term = $this->input->get('search');
        $this->model_dropdown->_getPengawas($term);
    }
}
 
/* End of file Dropdown.php */
/* Location: ./application/controllers/Dropdown.php */