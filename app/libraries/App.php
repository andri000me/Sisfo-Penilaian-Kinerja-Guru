<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class App {

    private $CI = NULL;
    private $_app = array();
 
    public function __construct()
	{
        $this->CI=&get_instance();
        $this->app();
    }
    private function app()
    {
        $qry = $this->CI->db->get('app_config');
        $row = $qry->num_rows();
        $dta = $qry->row();
            $this->_app['author']      = $dta->author;
            $this->_app['description'] = $dta->description;
            $this->_app['developer']   = $dta->developer;
            $this->_app['app_name']    = $dta->app_name;
            $this->_app['site_title']  = $dta->site_title;
    }
    public function _item($key = 'author')
    {
        return $this->_app[$key];
    }
}
 
/* End of file Config.php */
/* Location: ./application/libraries/Config.php */