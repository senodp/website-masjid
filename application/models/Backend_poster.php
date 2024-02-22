<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Backend_poster extends CI_Model {

	var $poster_lang = array('title');

	function __construct(){
		parent::__construct();
	}

	function _index(){

		$data = array('subtitle' => 'Index');
        
  		$this->db->order_by('sorting', 'asc');
		$poster = db_entries('poster');
		$data['poster'] = $poster;

		return $data;
	}

	// ----------------------------------------------------- //
	
	// --- Section poster --- //

	function _edit_overviewpageposter_save(){
		$overviewpageposter_names = [
			'overviewpageposter_title',
			'overviewpageposter_summary'
		];
		$overviewpageposter_options = [
			[null, 'required'],
			[null, null]
		];
		options_save($overviewpageposter_names, $overviewpageposter_options, true);

		die('success');
	}

	function _overviewpageposter(){
		options_save($this->overviewpageposter_names, $this->overviewpageposter_options, true);

		die('success');
	}

	// ------------------------ //

	function prep_poster(){
		Common_form_init('poster');
		
		Common_form_set_lang('image', 'Image', 'image|1080x1080');
		Common_form_set_lang('title', 'Name', 'required');
		//Common_form_set_lang('position', 'Position', 'not_required');
		// Common_form_set_lang('linkedin', 'Linkedin', 'not_required');
		// Common_form_set_lang('instagram', 'Instagram', 'not_required');
		//Common_form_set_lang('ups', 'Unique Personality Sentence', 'max_length[87]');
		//Common_form_set_lang('content', 'Content', 'max_length[227]');
		//Common_form_set('file', 'File', 'file');
		Common_form_set_lang('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Publish', 'not_required');
		//Common_form_set('sorting', 'Sorting', 'required|numeric');
	}
	
	function _poster_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('poster', $data);
		}

		die('success');
	}

	function _new_poster($id_parent = 0){
		$data = array('subtitle' => 'New Poster', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'poster_new_poster');

		$row = db_insert_fill('poster', array(), $this->poster_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_poster_save(){
		$this->prep_poster();

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

	function _edit_poster($id){
		$data = array('subtitle' => 'Edit Poster', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'poster_new_poster');

		$row = db_entry('poster', $id, null, $this->poster_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_poster_save($id){
		$this->prep_poster();

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

	function _remove_poster($id){
		$data = [
			'subtitle' => 'Remove Poster',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_poster_save($id){
		db_remove('poster', $id);
	}

	// --- Section poster End --- //

	// ----------------------------------------------------- //

}