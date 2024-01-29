<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Frontend_about extends CI_Model {	


	function __construct(){
		parent::__construct();
	}


	function _index(){ 

		$data = array();

		$this->db->where("is_publish", 1);
		$this->db->order_by('sorting', 'asc');
		$logosubsidiaries = db_entries_lang('logosubsidiaries', array('title', 'content'));
		$data['logosubsidiaries'] = $logosubsidiaries;

		$this->db->where("is_publish", 1);
		$this->db->order_by('sorting', 'asc');
		$ourvalues = db_entries_lang('ourvalues', array('title', 'content'));
		$data['ourvalues'] = $ourvalues;

		$this->db->where("is_publish", 1);
		$this->db->order_by('sorting', 'asc');
		$solution = db_entries_lang('solution', array('title', 'content'));
		$data['solution'] = $solution;

		return $data;
	}

	function _subsidiaries($url){
		$data = array();

		// $data['title'] = 'Fokus';
		$row = db_entry('logosubsidiaries', $url, 'url', array('title','titlehead','content'));
		Common_crumb_push( $row['title'], null );
		$data['logosubsidiaries'] = $row;

		return $data;
	}

}

/* End of file models/Frontend_news.php */
