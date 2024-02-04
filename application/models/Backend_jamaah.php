<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Backend_jamaah extends CI_Model {

	var $jamaah_lang = array('title', 'phone', 'address');

	function __construct(){
		parent::__construct();
	}

	function _index(){

		$data = array('subtitle' => 'Index');
        
  		$this->db->order_by('sorting', 'asc');
		$jamaah = db_entries('jamaah');
		$data['jamaah'] = $jamaah;

		return $data;
	}

	// ----------------------------------------------------- //
	
	// --- Section jamaah --- //

	function _edit_overviewpagejamaah_save(){
		$overviewpagejamaah_names = [
			'overviewpagejamaah_title',
			// 'overviewpagejamaah_summary'
		];
		$overviewpagejamaah_options = [
			[null, 'required'],
			[null, null]
		];
		options_save($overviewpagejamaah_names, $overviewpagejamaah_options, true);

		die('success');
	}

	function _overviewpageteam(){
		options_save($this->overviewpagejamaah_names, $this->overviewpagejamaah_options, true);

		die('success');
	}

	// ------------------------ //

	function prep_jamaah(){
		Common_form_init('jamaah');
		
		//Common_form_set_lang('image', 'Image', 'image|800x799');
		Common_form_set_lang('title', 'Name', 'required');
		Common_form_set_lang('phone', 'Phone', 'not_required');
		Common_form_set_lang('address', 'Address', 'not_required');
		// Common_form_set_lang('instagram', 'Instagram', 'not_required');
		//Common_form_set_lang('ups', 'Unique Personality Sentence', 'max_length[87]');
		//Common_form_set_lang('content', 'Content', 'max_length[227]');
		//Common_form_set('file', 'File', 'file');
		Common_form_set_lang('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Publish', 'not_required');
		//Common_form_set('sorting', 'Sorting', 'required|numeric');
	}
	
	function _jamaah_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('jamaah', $data);
		}

		die('success');
	}

	function _new_jamaah($id_parent = 0){
		$data = array('subtitle' => 'New Jamaah', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'jamaah_new_jamaah');

		$row = db_insert_fill('jamaah', array(), $this->jamaah_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_jamaah_save(){
		$this->prep_jamaah();

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

	function _edit_jamaah($id){
		$data = array('subtitle' => 'Edit Jamaah', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'jamaah_new_jamaah');

		$row = db_entry('jamaah', $id, null, $this->jamaah_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_jamaah_save($id){
		$this->prep_jamaah();

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

	function _remove_jamaah($id){
		$data = [
			'subtitle' => 'Remove Jamaah',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_jamaah_save($id){
		db_remove('jamaah', $id);
	}

	// --- Section team End --- //

	// ----------------------------------------------------- //

}