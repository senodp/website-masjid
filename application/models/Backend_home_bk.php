<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
include APPPATH.'/libraries/FooterCrud.php';
include APPPATH.'/libraries/HighlightCrud.php';
include APPPATH.'/libraries/SlideCrud.php';

class Backend_home extends CI_Model {

	use FooterCrud, HighlightCrud, SlideCrud;

	// var $announcement_lang = array('title', 'subtitle', 'content');
	// var $menuimage_lang = array('title', 'subtitle', 'url', 'button_label');
	var $logohome_lang = array('title', 'subtitle', 'content');
	var $articleinsights_lang = array('title', 'subtitle', 'highlight');

	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array('subtitle' => 'Index');
        
        $this->db->order_by('sorting', 'asc');
		$slides = db_entries('slides');
		$data['slides'] = $slides;

		$this->db->order_by('sorting', 'asc');
		$logohome = db_entries('logohome');
		$data['logohome'] = $logohome;

		$this->db->order_by('id', 'asc');
		$location = db_entries('country');
		$data['country'] = $location;

		// $highlights = db_entries('highlights');
		// $data['highlights'] = $highlights;

		return $data;
	}

	// --------------------------Title --------------------------- //

	function _edit_titlelogo_save(){
		$titlelogo_names = [
			'title_logos'
		];
		$titlelogo_options = [
			[null, null]
		];
		options_save($titlelogo_names, $titlelogo_options, true);

		die('success');
	}

	function _titlelogo(){
		options_save($this->titlelogo_names, $this->titlelogo_options, true);

		die('success');
	}

	// ----------------------------------------------------- //

	function _edit_buttoncasestudies_save(){
		$buttoncasestudies_names = [
			'casestudies_label',
			'casestudies_url'
		];
		$buttoncasestudies_options = [
			[null, null],
			[null, 'not_required|valid_url']
		];
		options_save($buttoncasestudies_names, $buttoncasestudies_options, true);

		die('success');
	}

	function _buttoncasestudies(){
		options_save($this->buttoncasestudies_names, $this->buttoncasestudies_options, true);

		die('success');
	}

	// ----------------------------------------------------- //

	function _edit_overviewpagetitlemap_save(){
		$overviewpagetitlemap_names = [
			'overviewpagetitlemap'
		];
		$overviewpagetitlemap_options = [
			[null, null]
		];
		options_save($overviewpagetitlemap_names, $overviewpagetitlemap_options, true);

		die('success');
	}

	function _overviewpagetitlemap(){
		options_save($this->overviewpagetitlemap_names, $this->overviewpagetitlemap_options, true);

		die('success');
	}

	// ----------------------------------------------------- //

	function _edit_overviewpagetitlecase_save(){
		$overviewpagetitlecase_names = [
			'overviewpagetitlecase'
		];
		$overviewpagetitlecase_options = [
			[null, null]
		];
		options_save($overviewpagetitlecase_names, $overviewpagetitlecase_options, true);

		die('success');
	}

	function _overviewpagetitlecase(){
		options_save($this->overviewpagetitlecase_names, $this->overviewpagetitlecase_options, true);

		die('success');
	}

	// ======================= LOGO HOME ======================== //

	function prep_logohome(){
		Common_form_init('logohome');
		
		Common_form_set_lang('image', 'Image', 'image|241x123');
		Common_form_set_lang('title', 'Title', 'not_required');
		Common_form_set_lang('subtitle', 'Sub Title', 'not_required');
		Common_form_set('url', 'Button URL (optional)', 'not_required');
		Common_form_set_lang('content', 'Content', 'not_required');
		// Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Select Status', 'not_required');
	}

	function _logohome_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('logohome', $data);
		}

		die('success');
	}

	function _new_logohome($id_parent = 0){
		$data = array('subtitle' => 'New Logo', 'multilanguage' => true, 'modal_size' => 'modal-lg');

		$row = db_insert_fill('logohome', array(), $this->logohome_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_logohome_save(){
		$this->prep_logohome();

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

	function _edit_logohome($id){
		$data = array('subtitle' => 'Edit Logo', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'home_new_logohome');

		$row = db_entry('logohome', $id, null, $this->logohome_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_logohome_save($id){
		$this->prep_logohome();

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

	function _remove_logohome($id){
		$data = [
			'subtitle' => 'Remove Battery or Attachment',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_logohome_save($id){
		db_remove('logohome', $id);
	}

	// ======================= LOGO HOME END======================== //

	// ----------------------------------------------------------------- //

	function _download(){
		options_save($this->download_names, $this->download_options, true);

		die('success');
	}
	
	function _edit_download_save(){
		$download_names = [
			'download_title',
			'download_description',
			'download_image'
		];

		$download_options = [
			[null, 'not_required'],
			[null, 'not_required'],
			[null, 'image|144x206']
		];

		options_save($download_names, $download_options, true);

		die('success');
	}

	// ----------------------------------------------------------------- //

	// ====================== Overview Orange ====================== //

	function _edit_overviewleft_save(){
		$overviewleft_names = [
			'overviewleft'
		];
		$overviewleft_options = [
			[null, null]
		];
		options_save($overviewleft_names, $overviewleft_options, true);

		die('success');
	}

	function _overviewleft(){
		options_save($this->overviewleft_names, $this->overviewleft_options, true);

		die('success');
	}

	function _edit_overviewright_save(){
		$overviewright_names = [
			'overviewright'
		];
		$overviewright_options = [
			[null, null]
		];
		options_save($overviewright_names, $overviewright_options, true);

		die('success');
	}

	function _overviewright(){
		options_save($this->overviewright_names, $this->overviewright_options, true);

		die('success');
	}

	// ==================== Overview Orange End ==================== //

	// ===================== LOCATION COUNTRY ====================== //

	function prep(){
		Common_form_init('country');

		Common_form_set('title', 'Title', 'required');
		Common_form_set('image', 'Image', 'image|200x150');
		// Common_form_set('subtitle', 'Sub Title', 'not_required');
		Common_form_set('description_short', 'Description', 'not_required');
		//Common_form_set('description_long', 'Description', 'not_required');
		Common_form_set('latitude', 'Latitude', 'not_required');
		// Common_form_set('link_map', 'Link MAP', 'not_required');
		// Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('longitude', 'Longitude', 'not_required');
		Common_form_set('status', 'Select Status', 'not_required');
	}

	function _new_location(){
		$data = array('subtitle' => 'New Location Country', 'view' => 'location_new_location', 'modal_size' => 'modal-lg');

		$row = db_insert_fill('country');
		$data['row'] = $row;

		return $data;
	}

	function _new_location_save(){ //dd($_POST);
		$this->prep();

		$db_id = Common_form_insert();
		//dd($db_id);
		if ($db_id){
			die('success');
		}
	}

	function _edit_location($id){
		$data = array('subtitle' => 'Edit Location Country', 'view' => 'location_new_location', 'modal_size' => 'modal-lg');

		$row = db_entry('country', $id);
		$data['row'] = $row;

		if (!empty($row)){
			//$data['subtitle'] = $data['subtitle'] . ' - ' . $row['title'];
		}

		return $data;
	}

	function _edit_location_save($id){
		$this->prep();

		$db_id = Common_form_update($id);
		//dd($db_id);
		if ($db_id){
			die('success');
		}
	}

	function _remove_location($id){
		$data = [
			'subtitle' => 'Remove Location country',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_location_save($id){
		db_remove('country', $id);
	}

	// ==================== LOCATION COUNTRY END ==================== //

	// ==================== FOOTER ADDRESS START ==================== //

	function _edit_footeraddress_save(){
		$address_names = [
			'address_satu',
			'address_dua',
			'address_contact_satu',
			'address_contact_dua'
		];

		$address_options = [
			[null, 'required'],
			[null, 'required'],
			[null, 'required'],
			[null, 'required']
		];

		options_save($address_names, $address_options, true);

		die('success');
	}

	function _footeraddress(){
		options_save($this->address_names, $this->address_options, true);

		die('success');
	}

	// ==================== FOOTER ADDRESS END ==================== //

	// ==================== FOOTER MENU START ==================== //

	function _edit_footermenu_save(){
		$footermenu_names = [
			'menu_1',
			'menu_2',
			'menu_3',
			'menu_4'
		];

		$footermenu_options = [
			[null, 'required'],
			[null, 'required'],
			[null, 'required'],
			[null, 'required']
		];

		options_save($footermenu_names, $footermenu_options, true);
		die('success');
	}

	function _footermenu(){
		options_save($this->footermenu_names, $this->footermenu_options, true);

		die('success');
	}

	// ==================== FOOTER MENU END ==================== //

	// --------------------------------Sosmed Start--------------------------------- //

	function _sosmed(){
		options_save($this->sosmed_names, $this->sosmed_options, true);

		die('success');
	}
	
	function _edit_sosmed_save(){
		$sosmed_names = [
			'sosmed_title',
			'sosmed_facebook',
			'sosmed_twitter',
			'sosmed_linkedin',
			'sosmed_youtube',
			'sosmed_instagram',
			'sosmed_image'
		];

		$sosmed_options = [
			[null, 'not_required'],
			[null, 'not_required|valid_url'],
			[null, 'not_required|valid_url'],
			[null, 'not_required|valid_url'],
			[null, 'not_required|valid_url'],
			[null, 'not_required|valid_url'],
			[null, 'image|373x62']
		];

		options_save($sosmed_names, $sosmed_options, true);

		die('success');
	}

	// --------------------------------Sosmed End--------------------------------- //

	// ========================== ARTICLE INSIGHTS END =========================== //

	// function _titlenews(){
	// 	options_save($this->title1_names, $this->title1_options, true);

	// 	die('success');
	// }
	
	// function _edit_titlenews_save(){
	// 	$title1_names = [
	// 		'title_news'
	// 	];

	// 	$title1_options = [
	// 		[null, 'required']
	// 	];

	// 	options_save($title1_names, $title1_options, true);

	// 	die('success');
	// }

	// ----------------------------------------------- //

	// =============================================== //

	function _news(){
		option_save('home_news_limit', null, 'required|numeric');

		die('success');
	}

	function _overview(){
		$overview_names = [
			'home_overview_title',
			'home_overview',
			'home_overview_url',
			'home_overview_image'
		];

		$overview_options = [
			[null, 'required'],
			[null, 'required'],
			[null, 'required|valid_url'],
			[null, 'image|1280x900']
		];

		options_save($overview_names, $overview_options, true);

		die('success');
	}
	
	

	

}

/* End of file models/Backend_home.php */
