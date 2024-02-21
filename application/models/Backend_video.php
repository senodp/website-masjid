<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Backend_video extends CI_Model {

	var $video_lang = array('title', 'embed');

	function __construct(){
		parent::__construct();
	}

	function _index(){

		$data = array('subtitle' => 'Index');
        
  		$this->db->order_by('sorting', 'asc');
		$video = db_entries('video');
		$data['video'] = $video;

		return $data;
	}

	// ----------------------------------------------------- //
	
	// --- Section video --- //

	function _edit_overviewpagevideo_save(){
		$overviewpagevideo_names = [
			'overviewpagevideo_title',
			'overviewpagevideo_summary'
		];
		$overviewpagevideo_options = [
			[null, 'required'],
			[null, null]
		];
		options_save($overviewpagevideo_names, $overviewpagevideo_options, true);

		die('success');
	}

	function _overviewpagevideo(){
		options_save($this->overviewpagevideo_names, $this->overviewpagevideo_options, true);

		die('success');
	}

	// ------------------------ //

	function prep_video(){
		Common_form_init('video');
		
		//Common_form_set_lang('image', 'Image', 'image|800x799');
		Common_form_set_lang('title', 'Name', 'required');
		Common_form_set_lang('embed', 'Embed Youtube', 'required');
		// Common_form_set_lang('linkedin', 'Linkedin', 'not_required');
		// Common_form_set_lang('instagram', 'Instagram', 'not_required');
		//Common_form_set_lang('ups', 'Unique Personality Sentence', 'max_length[87]');
		//Common_form_set_lang('content', 'Content', 'max_length[227]');
		//Common_form_set('file', 'File', 'file');
		Common_form_set_lang('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Publish', 'not_required');
		//Common_form_set('sorting', 'Sorting', 'required|numeric');
	}
	
	function _video_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('video', $data);
		}

		die('success');
	}

	function _new_video($id_parent = 0){
		$data = array('subtitle' => 'New Video', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'video_new_video');

		$row = db_insert_fill('video', array(), $this->video_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_video_save(){
		$this->prep_video();

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

	function _edit_video($id){
		$data = array('subtitle' => 'Edit Video', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'video_new_video');

		$row = db_entry('video', $id, null, $this->video_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_video_save($id){
		$this->prep_video();

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

	function _remove_video($id){
		$data = [
			'subtitle' => 'Remove Video',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_video_save($id){
		db_remove('video', $id);
	}

	// --- Section video End --- //

	// ----------------------------------------------------- //

}