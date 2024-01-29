<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Backend_testimonial extends CI_Model {

	var $testimonial_lang = array('title', 'position', 'content');
	var $logo_lang = array('title', 'subtitle');

	function __construct(){
		parent::__construct();
	}

	function _index(){

		$data = array('subtitle' => 'Index');
        
  		$this->db->order_by('sorting', 'asc');
		$testimonial = db_entries('testimonial');
		$data['testimonial'] = $testimonial;

		$this->db->order_by('sorting', 'asc');
		$logo = db_entries('logo');
		$data['logo'] = $logo;

		return $data;
	}

	// ----------------------------------------------------- //
	
	// --- Section Testimonial --- //

	function _edit_overviewpagetestimonial_save(){
		$overviewpagetestimonial_names = [
			'overviewpagetestimonial'
		];
		$overviewpagetestimonial_options = [
			[null, null]
		];
		options_save($overviewpagetestimonial_names, $overviewpagetestimonial_options, true);

		die('success');
	}

	function _overviewpagetestimonial(){
		options_save($this->overviewpagetestimonial_names, $this->overviewpagetestimonial_options, true);

		die('success');
	}

	// ------------------------ //

	function prep_testimonial(){
		Common_form_init('testimonial');
		
		Common_form_set_lang('image', 'Image', 'image|300x300');
		Common_form_set_lang('title', 'Name', 'required');
		Common_form_set_lang('position', 'Position', 'not_required');
		//Common_form_set_lang('linkedin', 'Linkedin', 'not_required');
		Common_form_set_lang('content', 'Content', 'not_required');
		// Common_form_set_lang('content', 'Content', 'max_length[280]');
		//Common_form_set('file', 'File', 'file');
		Common_form_set_lang('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Publish', 'not_required');
		//Common_form_set('sorting', 'Sorting', 'required|numeric');
	}
	
	function _testimonial_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('testimonial', $data);
		}

		die('success');
	}

	function _new_testimonial($id_parent = 0){
		$data = array('subtitle' => 'New Testimonial', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'testimonial_new_testimonial');

		$row = db_insert_fill('testimonial', array(), $this->testimonial_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_testimonial_save(){
		$this->prep_testimonial();

		$title = form_post('title');
		$url = form_post('url');

		if ($title && empty($url)){
			$db_data['url'] = url_title_lowercase($title);
		}

		$db_id = Common_form_insert($db_data);
		//dd($db_id);
		if ($db_id){
			die('success');
		}
	}

	function _edit_testimonial($id){
		$data = array('subtitle' => 'Edit Testimonial', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'testimonial_new_testimonial');

		$row = db_entry('testimonial', $id, null, $this->testimonial_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_testimonial_save($id){
		$this->prep_testimonial();

		$title = form_post('title');
		$url = form_post('url');

		$db_data = array();

		if ($title && empty($url)){
			$_POST['url'] = $title;
		}

		$db_id = Common_form_update($id, 'id', $db_data);
		//dd($db_id);
		if ($db_id){
			die('success');
		}
	}

	function _remove_testimonial($id){
		$data = [
			'subtitle' => 'Remove Testimonial',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_testimonial_save($id){
		db_remove('testimonial', $id);
	}

	// ======================= LOGO HOME ======================== //

	function prep_logo(){
		Common_form_init('logo');
		
		Common_form_set_lang('image', 'Image', 'image|172x141');
		Common_form_set_lang('title', 'Title', 'not_required');
		Common_form_set_lang('subtitle', 'Sub Title', 'not_required');
		Common_form_set('url', 'Button URL (optional)', 'not_required');
		Common_form_set('link', 'Link', 'not_required');
		Common_form_set_lang('content', 'Content', 'not_required');
		Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Select Status', 'not_required');
	}

	function _logo_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('logo', $data);
		}

		die('success');
	}

	function _new_logo($id_parent = 0){
		$data = array('subtitle' => 'New Logo', 'multilanguage' => true, 'modal_size' => 'modal-lg',  'view' => 'logo_new_logo');

		$row = db_insert_fill('logo', array(), $this->logo_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_logo_save(){
		$this->prep_logo();

		$title = form_post('title');
		$url = form_post('url');

		if ($title && empty($url)){
			$db_data['url'] = url_title_lowercase($title);
		}

		$db_id = Common_form_insert($db_data);
		//dd($db_id);
		if ($db_id){
			die('success');
		}
	}

	function _edit_logo($id){
		$data = array('subtitle' => 'Edit Logo', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'logo_new_logo');

		$row = db_entry('logo', $id, null, $this->logo_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_logo_save($id){
		$this->prep_logo();

		$title = form_post('title');
		$url = form_post('url');

		$db_data = array();

		if ($title && empty($url)){
			$_POST['url'] = $title;
		}

		$db_id = Common_form_update($id, 'id', $db_data);
		//dd($db_id);
		if ($db_id){
			die('success');
		}
	}

	function _remove_logo($id){
		$data = [
			'subtitle' => 'Remove Battery or Attachment',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_logo_save($id){
		db_remove('logo', $id);
	}

	// ======================= LOGO HOME END======================== //

	// --- Section Testimonial End --- //

	// ----------------------------------------------------- //

}