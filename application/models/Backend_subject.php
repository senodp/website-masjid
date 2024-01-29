<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_subject extends CI_Model {

	var $lang_fields = array( 'title' );
	var $options = [];
	var $db_table = '';
	var $name = '';
	var $Name = '';
	var $fillable = [
		//[Form Element Name, Form Element Label, Form Validation Rules, Field is Multilanguage]
		['title', 'Title', 'required'],
		['email', 'Email', 'required|valid_email']
	];

	function prep(){
		Common_form_init($this->db_table);

		if (isset($this->fillable)){
			foreach ($this->fillable as $fill){
				if (count($fill) == 3){
					extract(array_combine(['field_name', 'field_label', 'validation_rules'], $fill));

					$Field_is_multilanguage = false;

					if (isset($this->lang_fields)){
						if (is_array($this->lang_fields)){
							if (in_array($field_name, $this->lang_fields)){
								$Field_is_multilanguage = true;
							}
						}
					}

					Common_form_set($field_name, $field_label, $validation_rules, null, null, $Field_is_multilanguage);
				}
			}
		}
	}

	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array('subtitle' => 'Index');

		$rows = db_entries($this->db_table);
		$data['rows'] = $rows;

		return $data;
	}

	function _new($page_id){
		$data = array('subtitle' => 'New '.$this->Name, 'multilanguage' => true);

		$row = db_insert_fill($this->db_table, array(), $this->lang_fields);
		$data['row'] = $row;

		return $data;
	}

		function _new_save($page_id){
			$this->prep();

			$db_id = Common_form_insert();
			//dd($db_id);
			if ($db_id){
				die('success');
			}
		}

	function _edit($id){
		$data = array('subtitle' => 'Edit '.$this->Name, 'view' => $this->name.'_new', 'multilanguage' => true);

		$row = db_entry($this->db_table, $id, null, $this->lang_fields);
		$data['row'] = $row;

		return $data;
	}

		function _edit_save($id){
			$this->prep();

			$db_id = Common_form_update($id);
			//dd($db_id);
			if ($db_id){
				die('success');
			}
		}

	function _remove($id){
		$data = [
			'subtitle' => 'Remove '.$this->Name,
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_save($id){
			db_remove($this->db_table, $id);
		}
}

/* End of file models/Backend_subject.php */
