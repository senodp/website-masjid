<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
	C99 by Muhammad Dahri 
	http://commongoodguy.com/ 
*/

class Common_page extends CI_Model {	

	var $row = array();
	var $data = null;

	var $crumb_trails = array();
	var $html_head = [];
	
	function __construct(){
		parent::__construct();
	}

	function crumb_clear(){
		$this->crumb_trails = array();
	}

	function crumb_push($page_title, $page_url){
		$this->crumb_trails[] = [$page_title, $page_url];
	}

	function html_head_push($inline_html){
		$this->html_head[] = $inline_html;
	}

}

/* End of file models/Common_page.php */