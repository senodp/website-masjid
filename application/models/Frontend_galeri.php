<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Develop by Seno Dwi Prasetyo
*/

class Frontend_galeri extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array();
		$this->db->order_by("sorting","asc");
		$this->db->where("is_publish", 1);
		$ourgaleri = db_entries_lang('galeri', array('title'));
		$data['ourgaleri'] = $ourgaleri;

		return $data;
	}

	function _detail($url){
		$data = array();

		$row = db_entry('galeri', $url, 'url', array('title','position','content'));

		Common_crumb_push( $row['title'], null );
		$data['ourgaleri'] = $row;

		// Common_crumb_push( $row['nama'], null );

		return $data;
	}
}