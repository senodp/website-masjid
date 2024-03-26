<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Develop by Seno Dwi Prasetyo
*/

class Frontend_video extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array();
		$this->db->order_by("sorting","asc");
		$this->db->where("is_publish", 1);
		$ourvideo = db_entries_lang('video', array('title'));
		$data['ourvideo'] = $ourvideo;

		return $data;
	}

	function _detail($url){
		$data = array();

		$row = db_entry('ourvideo', $url, 'url', array('title','position','content'));

		Common_crumb_push( $row['title'], null );

		$data['ourvideo'] = $row;

		// Common_crumb_push( $row['nama'], null );

		return $data;
	}
}