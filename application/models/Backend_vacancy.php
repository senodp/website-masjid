<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_vacancy extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array('subtitle' => 'Index');
		
		$this->db->order_by('created_on', 'DESC');
		$vacancies = db_entries('vacancies');
		$data['vacancies'] = $vacancies;

		return $data;
	}

	function prep(){
		Common_form_init('vacancies');

		Common_form_set('title', 'Title', 'required');
		Common_form_set('content', 'Content', 'required');
		Common_form_set('type', 'Type', 'not_required');
		Common_form_set('location', 'Location', 'required');
		Common_form_set('start_date', 'Start Date', 'required');
		Common_form_set('end_date', 'End Date', 'required');
	}

	function _new_vacancy(){
		$data = array('subtitle' => 'New Vacancy', 'modal_size' => 'modal-lg');

		$row = db_insert_fill('vacancies');
		$data['row'] = $row;

		return $data;
	}

		function _new_vacancy_save(){ //dd($_POST);
			$this->prep();

			$db_id = Common_form_insert();
			//dd($db_id);
			if ($db_id){
				die('success');
			}
		}

	function _edit_vacancy($id){
		$data = array('subtitle' => 'Edit Vacancy', 'view' => 'vacancy_new_vacancy', 'modal_size' => 'modal-lg');

		$row = db_entry('vacancies', $id);
		$data['row'] = $row;

		if (!empty($row)){
			//$data['subtitle'] = $data['subtitle'] . ' - ' . $row['title'];
		}

		return $data;
	}

		function _edit_vacancy_save($id){
			$this->prep();

			$db_id = Common_form_update($id);
			//dd($db_id);
			if ($db_id){
				die('success');
			}
		}

	function _remove_vacancy($id){
		$data = [
			'subtitle' => 'Remove Vacancy',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_vacancy_save($id){
			db_remove('vacancies', $id);
		}
}

/* End of file models/Backend_vacancy.php */
