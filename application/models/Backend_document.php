<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_document extends CI_Model {

	var $lang_fields = array( 'title' );
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
		Common_form_init('documents');

		Common_form_set_lang('title', 'Title', 'required');
		Common_form_set('file', 'File', 'file');
		Common_form_set('cover', 'Cover', 'image|300x400');
	}

	function _new($id, $Page_data){
		$data = array('subtitle' => 'New Document', 'modal_size' => 'modal-lg', 'multilanguage' => true);

		$row = db_insert_fill('documents', array(), $this->lang_fields);
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
		$data = array('subtitle' => 'Edit Document', 'view' => 'modules/document_backend_new', 'modal_size' => 'modal-lg', 'multilanguage' => true);

		$row = db_entry('documents', $id, null, $this->lang_fields);
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
			'subtitle' => 'Remove Document',
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

/* End of file models/Backend_document.php */
