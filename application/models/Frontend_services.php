<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Develop by Seno Dwi Prasetyo
*/

class Frontend_services extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array();
		$this->db->order_by("sorting","asc");
		$this->db->where("is_publish", 1);
		$services = db_entries_lang('services', array('title', 'content'));
		$data['services'] = $services;

		return $data;
	}

	function _detail($url){
		$data = array();

		$row = db_entry('services', $url, 'url', array('title', 'content'));

		Common_crumb_push( $row['title'], null );

		$data['services'] = $row;

		// Common_crumb_push( $row['nama'], null );

		return $data;
	}
}