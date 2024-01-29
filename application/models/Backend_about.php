<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Backend_about extends CI_Model {

	//var $about_lang = array('title', 'subtitle', 'highlight');
	var $logosubsidiaries_lang = array('title', 'subtitle');
	var $ourvalues_lang = array('title', 'content');
	var $solution_lang = array('title', 'subtitle', 'content');

	function __construct(){
		parent::__construct();
	}

	function _index(){

		$data = array('subtitle' => 'Index');
		
		// $this->db->order_by("created_on", "DESC");
		// $abouts = db_entries('about');
		// $data['abouts'] = $abouts;
        
  		$this->db->order_by('sorting', 'asc');
		$logosubsidiaries = db_entries('logosubsidiaries');
		$data['logosubsidiaries'] = $logosubsidiaries;

		$this->db->order_by('sorting', 'asc');
		$ourvalues = db_entries('ourvalues');
		$data['ourvalues'] = $ourvalues;

		$this->db->order_by('sorting', 'asc');
		$solution = db_entries('solution');
		$data['solution'] = $solution;

		return $data;
	}

	// ----------------------------------------------------- //
	
	// ------------------------ //

	function _edit_titleabout_save(){
		$titleabout_names = [
			'title_about'
		];
		$titleabout_options = [
			[null, null]
		];
		options_save($titleabout_names, $titleabout_options, true);

		die('success');
	}

	function _titleabout(){
		options_save($this->titleabout_names, $this->titleabout_options, true);

		die('success');
	}

	// ------------------------ //

	// ------------------------ //

	function _edit_contentimage_save(){
		$contentimage_names = [
			'content_image'
		];
		$contentimage_options = [
			[null, null]
		];
		options_save($contentimage_names, $contentimage_options, true);

		die('success');
	}

	function _contentimage(){
		options_save($this->contentimage_names, $this->contentimage_options, true);

		die('success');
	}

	// ------------------------ //

	// ------------------------ //

	function _edit_webelieve_save(){
		$webelieve_names = [
			'we_believe'
		];
		$webelieve_options = [
			[null, null]
		];
		options_save($webelieve_names, $webelieve_options, true);

		die('success');
	}

	function _webelieve(){
		options_save($this->webelieve_names, $this->webelieve_options, true);

		die('success');
	}

	// ------------------------ //

	// --- Section About --- //

	function _sectionabout(){
		options_save($this->sectionabout_names, $this->sectionabout_options, true);

		die('success');
	}
	
	function _edit_sectionabout_save(){
		$sectionabout_names = [
			// 'about_title',
			'about_history_description',
			// 'about_text_profile',
			// 'about_text_ourteam',
			// 'about_text_profile_url',
			// 'about_text_ourteam_url',
			'about_history_image'
		];

		$sectionabout_options = [
			// [null, 'not_required'],
			[null, 'not_required'],
			// [null, 'not_required'],
			// [null, 'not_required'],
			// [null, 'not_required|valid_url'],
			// [null, 'not_required|valid_url'],
			[null, 'image|820x487']
		];

		options_save($sectionabout_names, $sectionabout_options, true);

		die('success');
	}

	// --- Section About End --- //

	// ======================= LOGO SUBSIDIARIES ======================== //

	function prep_logosubsidiaries(){
		Common_form_init('logosubsidiaries');
		
		Common_form_set_lang('image', 'Image', 'image|172x141');
		Common_form_set_lang('title', 'Title', 'required');
		Common_form_set_lang('subtitle', 'Sub Title', 'not_required');
		Common_form_set('url', 'Button URL (optional)', 'not_required');
		Common_form_set('link', 'Link', 'not_required');
		Common_form_set('phone', 'Phone', 'not_required');
		Common_form_set('email', 'Email', 'not_required');
		Common_form_set_lang('content', 'Content', 'not_required');
		Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Select Status', 'not_required');
	}

	function _logosubsidiaries_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('logosubsidiaries', $data);
		}

		die('success');
	}

	function _new_logosubsidiaries($id_parent = 0){
		$data = array('subtitle' => 'New Subsidiaries', 'multilanguage' => true, 'modal_size' => 'modal-lg',  'view' => 'logosubsidiaries_new_logosubsidiaries');

		$row = db_insert_fill('logosubsidiaries', array(), $this->logosubsidiaries_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_logosubsidiaries_save(){
		$this->prep_logosubsidiaries();

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

	function _edit_logosubsidiaries($id){
		$data = array('subtitle' => 'Edit Subsidiaries', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'logosubsidiaries_new_logosubsidiaries');

		$row = db_entry('logosubsidiaries', $id, null, $this->logosubsidiaries_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_logosubsidiaries_save($id){
		$this->prep_logosubsidiaries();

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

	function _remove_logosubsidiaries($id){
		$data = [
			'subtitle' => 'Remove Subsidiaries',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_logosubsidiaries_save($id){
		db_remove('logosubsidiaries', $id);
	}

	// ======================= LOGO SUBSIDIARIES END======================== //

	// ------------our values------------ //

	function prep_ourvalues(){
		Common_form_init('ourvalues');
		
		Common_form_set_lang('image', 'Image', 'image|512x512');
		Common_form_set_lang('title', 'Name', 'required');
		Common_form_set_lang('position', 'Position', 'not_required');
		//Common_form_set_lang('linkedin', 'Linkedin', 'not_required');
		Common_form_set_lang('content', 'Content', 'max_length[109]');
		//Common_form_set('file', 'File', 'file');
		Common_form_set_lang('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Publish', 'not_required');
		//Common_form_set('sorting', 'Sorting', 'required|numeric');
	}
	
	function _ourvalues_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('ourvalues', $data);
		}

		die('success');
	}

	function _new_ourvalues($id_parent = 0){
		$data = array('subtitle' => 'New Our Values', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'ourvalues_new_ourvalues');

		$row = db_insert_fill('ourvalues', array(), $this->ourvalues_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_ourvalues_save(){
		$this->prep_ourvalues();

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

	function _edit_ourvalues($id){
		$data = array('subtitle' => 'Edit Our Values', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'ourvalues_new_ourvalues');

		$row = db_entry('ourvalues', $id, null, $this->ourvalues_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_ourvalues_save($id){
		$this->prep_ourvalues();

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

	function _remove_ourvalues($id){
		$data = [
			'subtitle' => 'Remove Our Values',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_ourvalues_save($id){
		db_remove('ourvalues', $id);
	}

	// ======================= Solution ======================== //

	function prep_solution(){
		Common_form_init('solution');
		
		Common_form_set_lang('image', 'Image', 'image|981x692');
		Common_form_set_lang('title', 'Title', 'required');
		Common_form_set_lang('subtitle', 'Sub Title', 'not_required');
		Common_form_set('url', 'Button URL (optional)', 'not_required');
		Common_form_set('link', 'Link', 'not_required');
		Common_form_set('labelbutton_1', 'Button Left', 'not_required');
		Common_form_set('labelbutton_2', 'Button Right', 'not_required');
		Common_form_set('linkbutton_1', 'Link Button', 'not_required');
		Common_form_set('linkbutton_2', 'Link Button', 'not_required');
		Common_form_set_lang('content', 'Content', 'not_required');
		// Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Select Status', 'not_required');
	}

	function _solution_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('solution', $data);
		}

		die('success');
	}

	function _new_solution($id_parent = 0){
		$data = array('subtitle' => 'New Solution', 'multilanguage' => true, 'modal_size' => 'modal-lg',  'view' => 'solution_new_solution');

		$row = db_insert_fill('solution', array(), $this->solution_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_solution_save(){
		$this->prep_solution();

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

	function _edit_solution($id){
		$data = array('subtitle' => 'Edit Solution', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'solution_new_solution');

		$row = db_entry('solution', $id, null, $this->solution_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_solution_save($id){
		$this->prep_solution();

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

	function _remove_solution($id){
		$data = [
			'subtitle' => 'Remove Solution',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_solution_save($id){
		db_remove('solution', $id);
	}

	// ======================= Solution End ======================== //

	// --- Section About --- //

	function _sectiondown(){
		options_save($this->sectiondown_names, $this->sectiondown_options, true);

		die('success');
	}
	
	function _edit_sectiondown_save(){
		$sectiondown_names = [
			// 'about_title',
			'sectiondown_description',
			// 'about_text_profile',
			'sectiondown_label',
			'sectiondown_link'
			// 'about_text_ourteam_url',
			// 'about_history_image'
		];

		$sectiondown_options = [
			// [null, 'not_required'],
			[null, 'not_required'],
			// [null, 'not_required'],
			[null, 'not_required'],
			[null, 'not_required|valid_url']
			// [null, 'not_required|valid_url'],
			// [null, 'image|820x487']
		];

		options_save($sectiondown_names, $sectiondown_options, true);

		die('success');
	}

	// --- Section About End --- //

}