<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_listpage extends CI_Model {

	var $lang_fields = array( 'title', 'title_content', 'tags', 'summary', 'content');
	var $options = [];

	function __construct(){
		parent::__construct(); 
	}

	function _index(){ //dd(Common_page_row('template_options'));
		$data = array('subtitle' => 'Index');

		$this->db->where('common_page', Common_page_row('id'));

		if($this->uri->segment(2) == 'case-studies'){
			$this->db->order_by('id', 'DESC');
		}else if($this->uri->segment(2) == 'articles'){
			$this->db->order_by('sorting', 'asc');
		}else{
			$this->db->order_by('id', 'DESC');
		}
		
		$rows = db_entries('listpages');
		$data['rows'] = $rows;

		return $data;
	}

	// ----------------------------------------------------- //

	function _edit_articleheader_save(){
		$articleheader_names = [
			'articleheader_image'
		];
		$articleheader_options = [
			[null, 'image|1920x876']
		];
		options_save($articleheader_names, $articleheader_options, true);

		die('success');
	}

	function _articleheader(){
		options_save($this->articleheader_names, $this->articleheader_options, true);

		die('success');
	}

	// ----------------------------------------------------- //

	function _edit_overviewpagearticle_save(){
		$overviewpagearticle_names = [
			'overviewpagearticle'
		];
		$overviewpagearticle_options = [
			[null, null]
		];
		options_save($overviewpagearticle_names, $overviewpagearticle_options, true);

		die('success');
	}

	function _overviewpagearticle(){
		options_save($this->overviewpagearticle_names, $this->overviewpagearticle_options, true);

		die('success');
	}

	function _edit_overviewpageinsights_save(){
		$overviewpageinsights_names = [
			'overviewpageinsights'
		];
		$overviewpageinsights_options = [
			[null, null]
		];
		options_save($overviewpageinsights_names, $overviewpageinsights_options, true);

		die('success');
	}

	function _overviewpageinsights(){
		options_save($this->overviewpageinsights_names, $this->overviewpageinsights_options, true);

		die('success');
	}

	function _edit_overviewpagecasestudies_save(){
		$overviewpagecasestudies_names = [
			'overviewpagecasestudies'
		];
		$overviewpagecasestudies_options = [
			[null, null]
		];
		options_save($overviewpagecasestudies_names, $overviewpagecasestudies_options, true);

		die('success');
	}

	function _overviewpagecasestudies(){
		options_save($this->overviewpagecasestudies_names, $this->overviewpagecasestudies_options, true);

		die('success');
	}

	// ----------------------------------------------------- //

	function prep($Page_options){ //dd($Page_options);
		Common_form_init('listpages');

		if (in_array('topic', $Page_options))
			Common_form_set('topic_id', 'Topic', 'required_select');
		
		if (in_array('category', $Page_options))
			Common_form_set('category_id', 'Category', 'not_required');

		if (in_array('image-gallery', $Page_options))
			Common_form_set('attachment_collection', 'Attachment Collection', 'not_required');
		
		Common_form_set_lang('title', 'Title', 'required');
		Common_form_set_lang('summary', 'Summary', 'max_length[126]');
		Common_form_set_lang('content', 'Content', 'required');
		Common_form_set('creator', 'Select Creator', 'not_required');

		if($this->uri->segment(2) == 'insights'){
			Common_form_set('url', 'URL Slug (Optional)', 'required');
		}else{
			Common_form_set('url', 'URL Slug (Optional)', 'url_title_lowercase');
		}

		Common_form_set('created_on', 'Date', 'required');

		
		if($this->uri->segment(2) == 'article' || $this->uri->segment(2) == 'insights' || $this->uri->segment(2) == 'case-studies'){
			Common_form_set('cover', 'Cover Image', 'image|466x326');
		}else{
			//Common_form_set('cover', 'Cover Image', 'image|800x600');
			Common_form_set('cover', 'File', 'file');
		}

		Common_form_set_lang('title_content', 'Title Content', 'required');

		Common_form_set('background_image', 'Background Image Header', 'image|1920x1080');
		Common_form_set('icon_image', 'Icon Image', 'image|300x300');
		Common_form_set('other_one', 'Other Showcase 1', 'not_required');
		Common_form_set('other_two', 'other Showcase 2', 'not_required');
		
		Common_form_set_lang('tags', 'Tags', 'not_required');
		//Common_form_set('file', 'File', 'file');
	}

	function _listpage_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('listpages', $data);
		}

		die('success');
	}

	function _new($id, $Page_data){
		$data = array('subtitle' => 'New List', 'modal_size' => 'modal-xl', 'multilanguage' => true);

		$row = db_insert_fill('listpages', array(), $this->lang_fields);
		$data['row'] = $row;

		if (in_array('image-gallery', $Page_data['Page_options'])){
			$data['view'] = 'modules/listpage_backend_new_with_image_gallery';
			$data['row']['attachment_collection'] = time().'-'.random_string();
		}

		return $data;
	}

		function _new_save($id, $Page_data){
			$this->prep($Page_data['Page_options']);

			if($this->uri->segment(2) == 'insights'){

				$db_id = Common_form_insert();

			}else{

				$title = form_post('title');
				$url = form_post('url');

				if ($title && empty($url)){
					$db_data['url'] = url_title_lowercase($title);
				}

				$db_id = Common_form_insert($db_data);
				
			}

			

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
		$data = array('subtitle' => 'Edit List', 'view' => 'modules/listpage_backend_new', 'modal_size' => 'modal-xl', 'multilanguage' => true);

		$row = db_entry('listpages', $id, null, $this->lang_fields);
		$data['row'] = $row;

		if (!empty($row)){
			$data['subtitle'] = $data['subtitle'] . ' - ' . $row['title'];
		}

		if (in_array('image-gallery', $Page_data['Page_options'])){
			$data['view'] = 'modules/listpage_backend_new_with_image_gallery';

			if (empty($row['attachment_collection'])){
				$data['row']['attachment_collection'] = time().'-'.random_string();
			}
		}

		return $data;
	}

		function _edit_save($id, $Page_data){
			$this->prep($Page_data['Page_options']);

			$title = form_post('title');
			$url = form_post('url');

			$db_data = array();

			if ($title && empty($url)){
				$_POST['url'] = $title;
			}

			$db_id = Common_form_update($id, 'id', $db_data);
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
			'subtitle' => 'Remove Post',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_save($id){
			db_remove('listpages', $id);
		}
}

/* End of file models/Backend_listpage.php */
