<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

// FRONTEND CONTROLLER
class Base_Controller extends CI_Controller {

	protected $authorize = false;
	protected $display_limit = 10;

	protected $limit_access = false;
	protected $limit_access_to_ip_addresses = [
		
	];

	function __construct(){
		parent::__construct();

		$this->load->add_package_path(APPPATH.'third_party/ion_auth/');
		
		$this->load->library('ion_auth');
		
		$this->load->model('Site');
		$this->Site->Cache_pages();
	}

	protected function _authorize(){
		if (!$this->ion_auth->logged_in())
			redirect('login/'.base64_uri(), 'refresh');
	}

	protected function restrict_access(){
		if (is_production() && $this->limit_access){
			if (!isset($_SERVER['REMOTE_ADDR']) || !in_array($_SERVER['REMOTE_ADDR'], $this->limit_access_to_ip_addresses)) {
			   $this->show_404();
			}
		}
	}

	protected function show_404(){
		show_404();
		die();
	}

}



/* End of file core/MY_Controller.php */