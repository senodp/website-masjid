<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_profile extends CI_Model {

	var $lang_fields = array( 'name', 'position', 'description' );
	var $options = [];

	function __construct(){
		parent::__construct();
	}

	function _index(){ //dd(Common_page_row('template_options'));
		$data = array('subtitle' => 'Index');

		$this->db->order_by('id', 'ASC');
		$rows = page_entries();
		$data['rows'] = $rows;

		return $data;
	}

	function prep(){
		Common_form_init('profiles');

		Common_form_set_lang('name', 'Name', 'required');
		Common_form_set_lang('position', 'Position', 'required');
		Common_form_set_lang('description', 'Description', 'required');
		Common_form_set('photo', 'Photo', 'image|290x375');
	}

	function _new($id, $Page_data){
		$data = array('subtitle' => 'New Person', 'modal_size' => 'modal-lg', 'multilanguage' => true);

		$row = db_insert_fill('profiles', array(), $this->lang_fields);
		$data['row'] = $row;

		return $data;
	}

		function _new_save($id, $Page_data){
			$this->prep();

			$title = form_post('title');
			$url = form_post('url');

			$db_id = Common_form_insert();

			//dd($db_id);
			if ($db_id){
				if (is_ajax()){
					die('success');
				} else {
					redirect($Page_data['Page_url']);
				}
			}
		}

	function _edit($id, $Page_data){
		$data = array('subtitle' => 'Edit Person', 'view' => 'modules/profile_backend_new', 'modal_size' => 'modal-lg', 'multilanguage' => true);

		$row = db_entry('profiles', $id, null, $this->lang_fields);
		$data['row'] = $row;

		if (!empty($row)){
			$data['subtitle'] = $data['subtitle'] . ' - ' . $row['title'];
		}

		return $data;
	}

		function _edit_save($id, $Page_data){
			$this->prep();

			$db_id = Common_form_update($id, 'id');
			//dd($db_id);
			if ($db_id){
				if (is_ajax()){
					die('success');
				} else {
					redirect($Page_data['Page_url']);
				}
			}
		}

	function _remove($id){
		$data = [
			'subtitle' => 'Remove Person',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_save($id){
			$this->prep();

			Common_form_remove($id);

			die('success');
		}
}

/* End of file models/Backend_profile.php */
