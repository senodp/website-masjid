<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
	C99 by Muhammad Dahri 
	http://commongoodguy.com/ 
*/



//	================================================================================================
//  ADMIN USER

if (!function_exists('backend_page_title')){
	function backend_page_title($Page, $Page_name){
		$title = (!empty($Page['title']))? $Page['title'] : ucfirst($Page_name);

		return $title;
	}
}

if (!function_exists('is_allowed')){
	function is_allowed($action){
		$CI =& get_instance();

		$super_admin_only = [ 'user', 'users' ];

		if ( in_array($action, $super_admin_only) ){
			if (!is_admin()){
				return false;
			}
		}

		$authorizations	= [
			// 'dashboard'		=>	array('editor')
		];

		$allowed = false;
		$group = ['admin','editor'];

		if (array_key_exists($action, $authorizations)){
			$group = array_merge($group, $authorizations[$action]);
		}

		//dd($CI->ion_auth->get_users_groups()->result(), 'users_group');
		//dd($group);
		$allowed = $CI->ion_auth->in_group($group);

		return $allowed;
	}
}

if (!function_exists('is_logged_in')){
	function is_logged_in($html=false){
		$CI =& get_instance();
		//$CI->load->model('ion_auth');

		$is_logged_in = $CI->ion_auth->logged_in();

		if (is_string($html) && $is_logged_in === true){
			return $html;
		} else
			return $is_logged_in;
	}
}

if (!function_exists('in_user_group')){
	function in_user_group($group){
		$CI =& get_instance();

		return $CI->ion_auth->in_group($group);
	}
}

	if (!function_exists('is_super_admin')){
		function is_super_admin($login=null){
			$group = ['admin'];

			$is_super_admin = in_user_group($group);

			if ($is_super_admin){
				$is_super_admin = (logged_in_user_('id') == '1')? true : false;
			}

			return $is_super_admin;
		}
	}

	if (!function_exists('is_admin')){
		function is_admin(){
			$group = ['admin'];

			$is_admin = in_user_group($group);

			return $is_admin;
		}
	}

	if (!function_exists('is_editor')){
		function is_editor(){
			$group = ['editor'];

			$is_editor = in_user_group($group);

			return $is_editor;
		}
	}

	if (!function_exists('allow_draft_publish')){
		function allow_draft_publish(){
			$is_allowed = in_user_group('admin');

			return $is_allowed;
		}
	}

if (!function_exists('logged_in_user')){
	function logged_in_user($return_array=true){
		$CI =& get_instance();

		$user = false;

		if (is_logged_in()){
			if ($return_array === true)
				$user = $CI->ion_auth->user()->row_array();
			else
				$user = $CI->ion_auth->user()->row();
		}

		return $user;
	}
}

	if (!function_exists('logged_in_user_')){
		function logged_in_user_($field){
			$user = logged_in_user(true);

			$data = false;

			if (is_array($user)){
				$data = array_key_exists($field, $user)? $user[$field] : false;
			}

			return $data;
		}
	}

if (!function_exists('last_url')){
	function last_url($site_url){
		$CI =& get_instance();

		$url = ($CI->session->userdata('last_page'))? $CI->session->userdata('last_page') : site_url($site_url);

		return $url;
	}
}

if (!function_exists('last_control_url')){
	function last_control_url($site_url){
		$CI =& get_instance();

		$url = ($CI->session->userdata('last_page'))? $CI->session->userdata('last_page') : control_url($site_url);

		return $url;
	}
}



//	================================================================================================



/* End of file helper/control_helper.php */