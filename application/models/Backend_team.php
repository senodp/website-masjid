<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Backend_team extends CI_Model {

	var $team_lang = array('title', 'position', 'content', 'ups');

	function __construct(){
		parent::__construct();
	}

	function _index(){

		$data = array('subtitle' => 'Index');
        
  		$this->db->order_by('sorting', 'asc');
		$team = db_entries('team');
		$data['team'] = $team;

		return $data;
	}

	// ----------------------------------------------------- //
	
	// --- Section team --- //

	function _edit_overviewpageteam_save(){
		$overviewpageteam_names = [
			'overviewpageteam_title',
			'overviewpageteam_summary'
		];
		$overviewpageteam_options = [
			[null, 'required'],
			[null, null]
		];
		options_save($overviewpageteam_names, $overviewpageteam_options, true);

		die('success');
	}

	function _overviewpageteam(){
		options_save($this->overviewpageteam_names, $this->overviewpageteam_options, true);

		die('success');
	}

	// ------------------------ //

	function prep_team(){
		Common_form_init('team');
		
		Common_form_set_lang('image', 'Image', 'image|800x799');
		Common_form_set_lang('title', 'Name', 'required');
		Common_form_set_lang('position', 'Position', 'not_required');
		// Common_form_set_lang('linkedin', 'Linkedin', 'not_required');
		// Common_form_set_lang('instagram', 'Instagram', 'not_required');
		Common_form_set_lang('ups', 'Unique Personality Sentence', 'max_length[87]');
		Common_form_set_lang('content', 'Content', 'max_length[227]');
		//Common_form_set('file', 'File', 'file');
		Common_form_set_lang('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Publish', 'not_required');
		//Common_form_set('sorting', 'Sorting', 'required|numeric');
	}
	
	function _team_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('team', $data);
		}

		die('success');
	}

	function _new_team($id_parent = 0){
		$data = array('subtitle' => 'New Team', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'team_new_team');

		$row = db_insert_fill('team', array(), $this->team_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_team_save(){
		$this->prep_team();

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

	function _edit_team($id){
		$data = array('subtitle' => 'Edit Team', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'team_new_team');

		$row = db_entry('team', $id, null, $this->team_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_team_save($id){
		$this->prep_team();

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

	function _remove_team($id){
		$data = [
			'subtitle' => 'Remove Team',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_team_save($id){
		db_remove('team', $id);
	}

	// --- Section team End --- //

	// ----------------------------------------------------- //

}