<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Backend_galeri extends CI_Model {

	var $galeri_lang = array('title', 'position');

	function __construct(){
		parent::__construct();
	}

	function _index(){

		$data = array('subtitle' => 'Index');
        
  		$this->db->order_by('sorting', 'asc');
		$galeri = db_entries('galeri');
		$data['galeri'] = $galeri;

		return $data;
	}

	// ----------------------------------------------------- //
	
	// --- Section galeri --- //

	function _edit_overviewpagegaleri_save(){
		$overviewpagegaleri_names = [
			'overviewpagegaleri_title',
			'overviewpagegaleri_summary'
		];
		$overviewpagegaleri_options = [
			[null, 'required'],
			[null, null]
		];
		options_save($overviewpagegaleri_names, $overviewpagegaleri_options, true);

		die('success');
	}

	function _overviewpagegaleri(){
		options_save($this->overviewpagegaleri_names, $this->overviewpagegaleri_options, true);

		die('success');
	}

	// ------------------------ //

	function prep_galeri(){
		Common_form_init('galeri');
		
		Common_form_set('image', 'Image', 'image|800x799');
		Common_form_set('image_1', 'Image', 'image|800x799');
		Common_form_set('image_2', 'Image', 'image|800x799');
		Common_form_set('image_3', 'Image', 'image|800x799');
		Common_form_set('image_4', 'Image', 'image|800x799');
		Common_form_set('image_5', 'Image', 'image|800x799');
		Common_form_set('image_6', 'Image', 'image|800x799');
		Common_form_set('image_7', 'Image', 'image|800x799');
		//Common_form_set('image_8', 'Image', 'image|800x799');
		Common_form_set_lang('title', 'Name', 'required');
		Common_form_set_lang('position', 'Position', 'not_required');
		// Common_form_set_lang('linkedin', 'Linkedin', 'not_required');
		// Common_form_set_lang('instagram', 'Instagram', 'not_required');
		//Common_form_set_lang('ups', 'Unique Personality Sentence', 'max_length[87]');
		//Common_form_set_lang('content', 'Content', 'max_length[227]');
		//Common_form_set('file', 'File', 'file');
		Common_form_set_lang('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Publish', 'not_required');
		//Common_form_set('sorting', 'Sorting', 'required|numeric');
	}
	
	function _galeri_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('galeri', $data);
		}

		die('success');
	}

	function _new_galeri($id_parent = 0){
		$data = array('subtitle' => 'New Galeri', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'galeri_new_galeri');

		$row = db_insert_fill('galeri', array(), $this->galeri_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_galeri_save(){
		$this->prep_galeri();

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

	function _edit_galeri($id){
		$data = array('subtitle' => 'Edit Galeri', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'galeri_new_galeri');

		$row = db_entry('galeri', $id, null, $this->galeri_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_galeri_save($id){
		$this->prep_galeri();

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

	function _remove_galeri($id){
		$data = [
			'subtitle' => 'Remove Galeri',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_galeri_save($id){
		db_remove('galeri', $id);
	}

	// --- Section team End --- //

	// ----------------------------------------------------- //

}