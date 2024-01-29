<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lang extends Base_controller {

	public function __construct(){
		parent::__construct();
	}

	public function change($lang_code, $url=''){
		$lang_code = xss_clean($lang_code);
		$url = xss_clean($url);
		$url_exists = false;

		if (in_array($lang_code, languages()) && !strpos($url, '.')){
			$this->session->set_userdata('language_preference', $lang_code);
			$url_exists = true;// dd($lang_code);
		}

		//echo '<br><br><br>'; dd($url_exists);

		if ($url_exists === true){
			redirect_site(base64_decode($url));
		} else {
			show_404();
		}
	}
}
