<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Backend_services extends CI_Model {

	var $services_lang = array('title', 'subtitle', 'content');

	function __construct(){
		parent::__construct();
	}

	function _index(){

		$data = array('subtitle' => 'Index');
        
  		$this->db->order_by('sorting', 'asc');
		$services = db_entries('services');
		$data['services'] = $services;

		return $data;
	}

	// ----------------------------------------------------- //
	
	// --- Section Services --- //

	function _edit_backgroundservices_save(){
		$backgroundservices_names = [
			'backgroundservices_image'
		];
		$backgroundservices_options = [
			[null, 'image|1412x1445']
		];
		options_save($backgroundservices_names, $backgroundservices_options, true);

		die('success');
	}

	function _backgroundservices(){
		options_save($this->backgroundservices_names, $this->backgroundservices_options, true);

		die('success');
	}

	// ------------------------ //

	function _edit_titleservices_save(){
		$titleservices_names = [
			'title_services'
		];
		$titleservices_options = [
			[null, null]
		];
		options_save($titleservices_names, $titleservices_options, true);

		die('success');
	}

	function _titleservices(){
		options_save($this->titleservices_names, $this->titleservices_options, true);

		die('success');
	}

	// ------------------------ //

	function prep_services(){
		Common_form_init('services');
		
		Common_form_set('image', 'Image', 'image|600x600');
		//Common_form_set('icon', 'Image', 'image|64x60');
		Common_form_set_lang('title', 'Title', 'not_required');
		Common_form_set_lang('subtitle', 'Sub Title', 'not_required');
		Common_form_set('url', 'Button URL (optional)', 'not_required');
		Common_form_set('link', 'Link', 'not_required');
		Common_form_set_lang('content', 'Content', 'not_required');
		// Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Select Status', 'not_required');
	}

	function _services_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('services', $data);
		}

		die('success');
	}

	function _new_services($id_parent = 0){
		$data = array('subtitle' => 'New Services', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'services_new_services');

		$row = db_insert_fill('services', array(), $this->services_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_services_save(){
		$this->prep_services();

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

	function _edit_services($id){
		$data = array('subtitle' => 'Edit Services', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'services_new_services');

		$row = db_entry('services', $id, null, $this->services_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_services_save($id){
		$this->prep_services();

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

	function _remove_services($id){
		$data = [
			'subtitle' => 'Hapus Services',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_services_save($id){
		db_remove('services', $id);
	}

	// --- Section Services End --- //

	// ----------------------------------------------------- //

}