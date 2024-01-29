<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/

class Backend_departement extends CI_Model {

	var $news_lang = array('title');
	//var $menuimage_lang = array('title', 'subtitle', 'url', 'button_label');

	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array('subtitle' => 'Index');

		$departement = db_entries('departement');
		$data['departement'] = $departement;

		// $menuimage = db_entries('menuimage');
		// $data['menuimages'] = $menuimage;

		return $data;
	}

	

	function prep_D(){
		Common_form_init('departement');

		Common_form_set_lang('title', 'Title', 'required');
		//Common_form_set_lang('email', 'Email', 'required');
	}

	function _new_departement($id_parent = 0){
		$data = array('subtitle' => 'New Department', 'multilanguage' => true, 'modal_size' => 'modal-lg');

		$row = db_insert_fill('departement', array(), $this->news_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_departement_save(){
			$this->prep_D();

			$db_id = Common_form_insert();
			//dd($db_id);
			if ($db_id){
				die('success');
			}
		}

	function _edit_departement($id){
		$data = array('subtitle' => 'Edit Department', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'departement_new_departement');

		$row = db_entry('departement', $id, null, $this->news_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_departement_save($id){
		$this->prep_D();

			$db_id = Common_form_update($id);
			//dd($db_id);
			if ($db_id){
				die('success');
			}
	}

	function _remove_departement($id){
		$data = [
			'subtitle' => 'Remove Department',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_departement_save($id){
		db_remove('departement', $id);
	}

}

/* End of file models/Backend_home.php */
