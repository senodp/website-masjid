<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Develop by Seno Dwi Prasetyo
*/

class Frontend_testimonial extends CI_Model {

	var $limit = 6;

	function __construct(){
		parent::__construct();
	}

	function _index($pagenum=1, $Page_data){
		$data = array();

		$this->load->library('pagination');

		$config = pagination();

		$config['uri_segment'] = 3;
		$config['base_url'] = $Page_data['Page_url'].'/page';

		//$this->db->where('common_page', PAGE_ID);
		$config['total_rows'] = db_total_rows('testimonial');
		
		$config['per_page'] = $this->limit;

		$this->pagination->initialize($config);

		if ($pagenum > 1){
			$offset = $this->limit*($pagenum-1);
			$this->db->limit($this->limit, $offset);
		} else {
			$this->db->limit($this->limit);
		}

		$this->db->where("is_publish", 1);
		$this->db->order_by('sorting', 'asc');
		$testimonial = db_entries_lang('testimonial', array('title', 'content'));
		$data['testimonial'] = $testimonial;

		$this->db->where("is_publish", 1);
		$this->db->order_by('sorting', 'asc');
		$logo = db_entries_lang('logo', array('title', 'content'));
		$data['logo'] = $logo;

		return $data;
	}

	function _page($pagenum, $Page_data){
		$data = $this->_index($pagenum, $Page_data);

		$data['view'] = 'testimonial_index';

		return $data;
	}

	// function _index(){
	// 	$data = array();
	// 	$this->db->order_by("sorting","asc");
	// 	$this->db->where("is_publish", 1);
	// 	$testimonial = db_entries_lang('testimonial', array('title', 'content'));
	// 	$data['testimonial'] = $testimonial;

	// 	return $data;
	// }

	// function _detail($url){
	// 	$data = array();

	// 	$row = db_entry('testimonial', $url, 'url', array('title','jabatan','content','file') );

	// 	Common_crumb_push( $row['title'], null );

	// 	$data['testimonial'] = $row;

	// 	Common_crumb_push( $row['nama'], null );

	// 	return $data;
	// }

	function _detail($url){
		$data = array();

		// $data['title'] = 'Fokus';
		$row = db_entry('logo', $url, 'url', array('title','titlehead','content'));
		Common_crumb_push( $row['title'], null );
		$data['logo'] = $row;

		return $data;
	}
}