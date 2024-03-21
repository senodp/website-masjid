<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Develop by Seno Dwi Prasetyo
*/

class Frontend_jamaah extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array();
		$this->db->order_by("sorting","asc");
		$this->db->where("is_publish", 1);
		$ourjamaah = db_entries_lang('jamaah', array('title','content'));
		$data['ourjamaah'] = $ourjamaah;

		return $data;
	}

	function _detail($url){
		$data = array();

		$row = db_entry('ourjamaah', $url, 'url', array('title','content'));

		Common_crumb_push( $row['title'], null );

		$data['ourjamaah'] = $row;

		// Common_crumb_push( $row['nama'], null );

		return $data;
	}
}