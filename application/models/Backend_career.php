<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_career extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array('subtitle' => 'Index');
		
		$this->db->order_by('sorting', 'asc');
		$vacancies = db_entries('vacancies');
		$data['career'] = $vacancies;

		return $data;
	}

	//====================================================================================================//

	function _metacareer(){

		options_save($this->meta_names, $this->meta_options, true);
		die('success');
	}

	function _edit_metacareer_save(){

		$meta_names = [
			'meta_title',
			'meta_description_career',
			'meta_keyword'
		];

		$meta_options = [
			[null, 'not_required'],
			[null, 'required'],
			[null, 'not_required']
		];

		options_save($meta_names, $meta_options, true);
		die('success');
	}

	//========================================================================================================//

	// ----------------------------------------------------- //

	function _edit_overviewpagecareer_save(){
		$overviewpagecareer_names = [
			'overviewpagecareer'
		];
		$overviewpagecareer_options = [
			[null, null]
		];
		options_save($overviewpagecareer_names, $overviewpagecareer_options, true);

		die('success');
	}

	function _overviewpagecareer(){
		options_save($this->overviewpagecareer_names, $this->overviewpagecareer_options, true);

		die('success');
	}

	// ----------------------------------------------------- //

	function prep(){
		Common_form_init('vacancies');

		Common_form_set('title', 'Title', 'required');
		Common_form_set('departements', 'Departement', 'required');
		Common_form_set('content', 'Content', 'not_required');
		Common_form_set('type', 'Type', 'not_required');
		Common_form_set('location', 'Location', 'not_required');
		Common_form_set('start_date', 'Start Date', 'required');
		Common_form_set('end_date', 'End Date', 'required');
		Common_form_set('experience', 'Experience', 'required');
		Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Publish', 'not_required');
		Common_form_set('tags', 'Tags', 'not_required');
	}

	function _career_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('vacancies', $data);
		}

		die('success');
	}

	function _new_career($id_parent = 0){
		$data = array('subtitle' => 'New Vacancy', 'modal_size' => 'modal-lg');

		$row = db_insert_fill('vacancies');
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_career_save(){
		$this->prep();

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

	function _edit_career($id){
		$data = array('subtitle' => 'Edit Vacancy', 'modal_size' => 'modal-lg', 'view' => 'career_new_career');

		$row = db_entry('vacancies', $id);
		$data['row'] = $row;

		return $data;
	}

	function _edit_career_save($id){
		$this->prep();

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

	function _remove_career($id){
		$data = [
			'subtitle' => 'Remove Vacancy',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_career_save($id){
		db_remove('vacancies', $id);
	}
}

/* End of file models/Backend_career.php */
