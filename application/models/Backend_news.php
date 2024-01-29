<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Backend_news extends CI_Model {

	var $news_lang = array('title', 'subtitle', 'highlight');

	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array('subtitle' => 'Index');
		$this->db->order_by("created_on", "DESC");
		$newss = db_entries('news');
		$data['newss'] = $newss;
        
  		// $this->db->order_by('sorting', 'ASC');
		// $korporasikatamereka = db_entries('korporasikatamereka');
		// $data['katamereka_korporasi'] = $korporasikatamereka;

		return $data;
	}

	// ----------------------------------------------------- //

	function _edit_newsheader_save(){
		$newsheader_names = [
			'newsheader_image'
		];
		$newsheader_options = [
			[null, 'image|1800x440']
		];
		options_save($newsheader_names, $newsheader_options, true);

		die('success');
	}

	function _newsheader(){
		options_save($this->newsheader_names, $this->newsheader_options, true);

		die('success');
	}

	// ----------------------------------------------------- //

	function prep_news(){
		Common_form_init('news');
		
		Common_form_set_lang('image', 'Image', 'image|500x300');
		Common_form_set_lang('title', 'Title', 'required');
		Common_form_set_lang('highlight', 'Highlight', 'required');
		Common_form_set_lang('subtitle', 'Sub Title', 'required');
		Common_form_set('file', 'File', 'file');
		// Common_form_set('created_on', 'Date', 'required');
		Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Publish', 'not_required');
		// Common_form_set_lang('content', 'Content', 'required');
		// Common_form_set_lang('tags', 'Tags', 'not_required');
	}

	function _new_news($id_parent = 0){
		$data = array('subtitle' => 'New News', 'multilanguage' => true, 'modal_size' => 'modal-lg');

		$row = db_insert_fill('news', array(), $this->news_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_news_save(){
		$this->prep_news();

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

	function _edit_news($id){
		$data = array('subtitle' => 'Edit News', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'news_new_news');

		$row = db_entry('news', $id, null, $this->news_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_news_save($id){
		$this->prep_news();

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

	function _remove_news($id){
		$data = [
			'subtitle' => '<p style="text-align: center;">Remove Data News</p>',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_news_save($id){
		db_remove('news', $id);
	}

	function _titleheadnews(){
		options_save($this->title3_names, $this->title3_options, true);

		die('success');
	}
	
	function _edit_titleheadnews_save(){
		$title3_names = [
			'title_head_news'
		];

		$title3_options = [
			[null, 'required']
		];

		options_save($title3_names, $title3_options, true);

		die('success');
	}

}