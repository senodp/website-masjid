<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Backend_contact extends CI_Model {

	// ----------------------------------------------------- //

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
		//Common_form_set('content', 'Content', 'required');
		//Common_form_set('type', 'Type', 'not_required');
		//Common_form_set('location', 'Location', 'required');
		//Common_form_set('start_date', 'Start Date', 'required');
		//Common_form_set('end_date', 'End Date', 'required');
	}

	function _new_vacancy(){
		$data = array('subtitle' => 'New Recipient', 'modal_size' => 'modal-sm', 'view' => 'vacancy_new_vacancy');

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
		$data = array('subtitle' => 'Edit Recipient', 'view' => 'vacancy_new_vacancy', 'modal_size' => 'modal-sm');

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
			'subtitle' => 'Remove Recipient',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_vacancy_save($id){
		db_remove('vacancies', $id);
	}

	// ----------------------------------------------------- //

	function _edit_sectioncontact_save(){
		$contact_names = [
			'contact_address',
			// 'contact_dua',
			'contact_phone',
			'contact_email',
			'contact_map'
		];

		$contact_options = [
			[null, 'not_required'],
			// [null, 'required'],
			[null, 'not_required'],
			[null, 'not_required|valid_email'],
			[null, 'not_required']
		];

		options_save($contact_names, $contact_options, true);

		die('success');
	}

	function _sectioncontact(){
		options_save($this->contact_names, $this->contact_options, true);

		die('success');
	}

	// ------------------------------------------------------------- //

	function _edit_overviewpagecontact_save(){
		$overviewpagecontact_names = [
			'overviewpagecontact'
		];
		$overviewpagecontact_options = [
			[null, null]
		];
		options_save($overviewpagecontact_names, $overviewpagecontact_options, true);

		die('success');
	}

	function _overviewpagecontact(){
		options_save($this->overviewpagecontact_names, $this->overviewpagecontact_options, true);

		die('success');
	}

	// ----------------------------------------------------- //

	function _penerima(){
		options_save($this->penerima_names, $this->penerima_options, true);

		die('success');
	}

	function _edit_penerima_save(){
		$penerima_names = [
			'penerima',
			// 'secretpenerima'
		];

		$penerima_options = [
			[null, 'not_required']
		];

		options_save($penerima_names, $penerima_options, true);

		die('success');
	}
	
	// ----------------------------------------------------- //
}

/* End of file models/Backend_contact.php */
