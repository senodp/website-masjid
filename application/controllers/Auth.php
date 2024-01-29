<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
	C99 by Muhammad Dahri 
	http://commongoodguy.com/ 
*/

class Auth extends Base_Controller {

	var $authorize = true;

	function __construct(){
		parent::__construct();

		$this->load->helper('control');
	}

	protected function _authorize(){
		if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()){
			redirect('control', 'refresh');
		} elseif ($this->ion_auth->logged_in() && !$this->ion_auth->is_admin()){
			show_404();
		}
	}

	function index(){
		redirect_site('login');
	}


	function logout($url=null){
		$logout = $this->ion_auth->logout();

		$this->session->set_flashdata('message', $this->ion_auth->messages());
		
		redirect_site('login');
	}


	function login($url=null){
		$this->restrict_access();

		$url = (empty($url))? base64('control') : $url;

		if (is_submit()){
			$this->login_it($url);
		} else {
			$this->login_view($url);
		}
	}

		protected function login_it($url=null){ //dd($_POST);
			form_set('email', 'Email', 'required|valid_email');
			form_set('password', 'Password', 'required');
			
			if ($this->form_validation->run()){ //dd($_POST);
				$email = form_post('email');
				$password = form_post('password');
				$remember = (bool) $this->input->post('remember'); //dd($remember);
				
				if ($this->ion_auth->login($email, $password, $remember)){
					redirect_site(base64_decode($url));
				} else {
					$this->session->set_flashdata('errors', $this->ion_auth->errors());
					//dd(validation_errors());
					redirect('login/'.$url, 'refresh');
				}

			} else { //dd(validation_errors());
				$this->session->set_flashdata('errors', validation_errors());
				//dd(validation_errors());
				redirect('login/'.$url, 'refresh');
			}
		}

		protected function login_view(){
			$data['title'] = 'Login'; //dd($data);
			
			$this->load->view('login', $data);
		}
}

/* End of file controllers/Auth.php */