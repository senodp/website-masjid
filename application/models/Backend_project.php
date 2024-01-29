<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_project extends CI_Model {

	var $lang_fields = array( 'title', 'location', 'description', 'association', 'duration' );

	function __construct(){
		parent::__construct();
		//die('Backend_Page');
	}

	function countrier(){
		$rows = module_entries('projects');

		$countries = array();

		foreach ($rows as $row){
			$row_countries = $row['country'];//str_replace('#', '', $row['country']);
			$row_countries = explode(',', $row_countries);

			foreach ($row_countries as $rc){
				if (!in_array($rc, $countries)){
					$countries[] = $rc;
				}
			}
		}

		$countries = implode(',', $countries);

		option_set('project_global_countries', $countries);
	}

	// function _countrier(){
	// 	$this->countrier();

	// 	die('Option set!');
	// }

	function _index(){// dd(Common_page_row('id'));
		$data = array('subtitle' => 'Index');

		$this->db->order_by('start_date', 'DESC');
		$rows = module_entries('projects', false, $this->lang_fields);
		$data['rows'] = $rows;

		return $data;
	}

	function data_Sv_children(&$data){
		$this->db->where('id_parent !=', '0');
		$this->db->order_by('title', 'ASC');
		$rows = db_entries('services');
		
		$Sv_children = array();
		foreach ($rows as $r){
			if (!array_key_exists($r['id_parent'], $Sv_children)){
				$Sv_children[$r['id_parent']] = array();
			}

			$Sv_children[$r['id_parent']][] = $r;
		}

		$data['Sv_children'] = $Sv_children;
	}

	function prep_project(){
		Common_form_init('projects');

		Common_form_set_lang('title', 'Project Name', 'required');
		Common_form_set('status', 'Project Status', 'checkbox');
		Common_form_set('service', 'Services Provided', 'select_multiple');
		Common_form_set('country', 'Countries', 'select_multiple');
		Common_form_set_lang('location', 'Locations', 'required');
		Common_form_set('client', 'Clients', 'required');
		Common_form_set_lang('association', 'Association', 'not_required');
		Common_form_set_lang('duration', 'Duration of Assignment', 'not_required');
		Common_form_set('start_date', 'Project Start Date', 'not_required');
		Common_form_set('end_date', 'Project Completion Date', 'not_required');
		Common_form_set('value_currency', 'Approx. Value Currency', 'not_required');
		Common_form_set('value', 'Approx. Value of the Contract', 'not_required');
		Common_form_set('thumb', 'Thubmnail Image', 'image|520x350');
		Common_form_set_lang('description', 'Description', 'required');
	}

	function _new_project(){
		$data = array('subtitle' => 'New Project');

		$row = db_insert_fill('projects', ['status' => '0'], $this->lang_fields);
		$data['row'] = $row;

		$this->data_Sv_children($data);

		return $data;
	}

		function _new_project_save($Page_id, $Page_data){
			$this->prep_project();

			$db_id = Common_form_insert();
			//dd($db_id);
			if ($db_id){
				$this->countrier();
				redirect($Page_data['Page_url'].'/edit-project/'.$db_id);
			} else {
				return false;
			}
		}

	function _edit_project($id){
		$data = array('subtitle' => 'Edit Project', 'view' => 'project_new_project', 'modal_size' => 'modal-lg', 'multilanguage' => false);

		$row = db_entry('projects', $id, null, $this->lang_fields);
		$data['row'] = $row;

		if (!empty($row)){
			$data['subtitle'] = $data['subtitle'] . ' - ' . $row['title'];
		}

		$this->data_Sv_children($data);

		return $data;
	}

		function _edit_project_save($id, $Page_data){
			$this->prep_project();

			$db_id = Common_form_update($id);
			//dd($db_id);
			if ($db_id){
				$this->countrier();
				redirect($Page_data['Page_url']);
			} else {
				return false;
			}
		}

	function _remove_project($id){
		$data = [
			'subtitle' => 'Remove Project',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_project_save($id){
			db_remove('projects', $id);
		}
}

/* End of file models/Backend_project.php */
