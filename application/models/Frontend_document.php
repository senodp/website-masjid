<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Frontend_document extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array();

		$data['documents'] = page_entries();
		
		return $data;
	}
}

/* End of file models/Frontend_document.php */
