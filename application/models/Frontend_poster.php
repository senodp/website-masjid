<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Develop by Seno Dwi Prasetyo
*/

class Frontend_poster extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array();
		$this->db->order_by("sorting","asc");
		$this->db->where("is_publish", 1);
		$ourposter = db_entries_lang('poster', array('title'));
		$data['ourposter'] = $ourposter;

		return $data;
	}

	function _detail($url){
		$data = array();

		$row = db_entry('ourposter', $url, 'url', array('title'));

		Common_crumb_push( $row['title'], null );

		$data['ourposter'] = $row;

		// Common_crumb_push( $row['nama'], null );

		return $data;
	}
}