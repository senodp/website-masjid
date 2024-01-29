<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Backend_logo extends CI_Model {

	var $logo_lang = array('title', 'subtitle', 'highlight');

	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array('subtitle' => 'Index');
		$this->db->order_by("created_on", "DESC");
		$logos = db_entries('logo');
		$data['logos'] = $logos;
        
  		// $this->db->order_by('sorting', 'ASC');
		// $korporasikatamereka = db_entries('korporasikatamereka');
		// $data['katamereka_korporasi'] = $korporasikatamereka;

		return $data;
	}

	// ----------------------------------------------------- //

	function _edit_logoheader_save(){
		$logoheader_names = [
			'logoheader_image'
		];
		$logoheader_options = [
			[null, 'image|1800x440']
		];
		options_save($logoheader_names, $logoheader_options, true);

		die('success');
	}

	function _logoheader(){
		options_save($this->logoheader_names, $this->logoheader_options, true);

		die('success');
	}

	// ----------------------------------------------------- //

	function prep_logo(){
		Common_form_init('logo');
		
		Common_form_set_lang('image', 'Image', 'image|170x70');
		Common_form_set_lang('title', 'Title', 'required');
		// Common_form_set_lang('highlight', 'Highlight', 'required');
		// Common_form_set_lang('subtitle', 'Sub Title', 'required');
		// Common_form_set('file', 'File', 'file');
		// Common_form_set('created_on', 'Date', 'required');
		Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		//Common_form_set('is_publish', 'Publish', 'not_required');
		// Common_form_set_lang('content', 'Content', 'required');
		// Common_form_set_lang('tags', 'Tags', 'not_required');
	}

	function _new_logo($id_parent = 0){
		$data = array('subtitle' => 'New Logo Partners', 'multilanguage' => true, 'modal_size' => 'modal-lg');

		$row = db_insert_fill('logo', array(), $this->logo_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_logo_save(){
		$this->prep_logo();

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

	function _edit_logo($id){
		$data = array('subtitle' => 'Edit Logo Partners', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'logo_new_logo');

		$row = db_entry('logo', $id, null, $this->logo_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_logo_save($id){
		$this->prep_logo();

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

	function _remove_logo($id){
		$data = [
			'subtitle' => '<p style="text-align: center;">Remove Data Logo Partners</p>',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_logo_save($id){
		db_remove('logo', $id);
	}

	function _titleheadlogo(){
		options_save($this->title3_names, $this->title3_options, true);

		die('success');
	}
	
	function _edit_titleheadlogo_save(){
		$title3_names = [
			'title_head_logo'
		];

		$title3_options = [
			[null, 'required']
		];

		options_save($title3_names, $title3_options, true);

		die('success');
	}

}