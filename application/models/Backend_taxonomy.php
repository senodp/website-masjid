<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_taxonomy extends CI_Model {

	var $lang_fields = array( 'name', 'description' );
	var $options = [];

	function __construct(){
		parent::__construct();
	}

	function _index(){ //dd(Common_page_row('template_options'));
		$data = array('subtitle' => 'Index');

		$rows = db_entries('taxonomies');
		$data['rows'] = $rows;

		return $data;
	}

	function prep(){
		Common_form_init('taxonomies');

		Common_form_set('page_id', 'Page ID', 'required');
		Common_form_set('cluster', 'Cluster', 'required');
		Common_form_set_lang('name', 'Title', 'required');
		Common_form_set_lang('description', 'Description', 'not_required');
	}

	function _new($page_id){
		if (db_entry_exists('pages', $page_id)){
			$Cluster = uri_segment(5, 'Category');

			$data = array('subtitle' => 'New '.$Cluster, 'multilanguage' => true);

			$row = db_insert_fill('taxonomies', array(), $this->lang_fields);
			$row['cluster'] = $Cluster;
			$row['page_id'] = $page_id;
			$data['row'] = $row;

			return $data;
		} else {
			return ['is_404' => true];
		}
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
		$Cluster = uri_segment(5, 'Category');
		$data = array('subtitle' => 'Edit '.$Cluster, 'view' => 'taxonomy_new', 'multilanguage' => true);

		$row = db_entry('taxonomies', $id, null, $this->lang_fields);
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
			'subtitle' => 'Remove Taxonomy',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_save($id){
			db_remove('taxonomies', $id);
		}
}

/* End of file models/Backend_taxonomy.php */
