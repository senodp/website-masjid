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

	var $services_lang = array('title', 'subtitle', 'content');
	var $testimonial_lang = array('title', 'position', 'content');
	var $logo_lang = array('title', 'subtitle');

	function __construct(){
		parent::__construct();
	}

	function _index(){
		
		$data = array('subtitle' => 'Index');
        
        $this->db->order_by('sorting', 'asc');
		$slides = db_entries('slides');
		$data['slides'] = $slides;

		$this->db->order_by('sorting', 'asc');
		$services = db_entries('services');
		$data['services'] = $services;

		$this->db->order_by('sorting', 'ASC');
		$this->db->select('listpages.*');
		$this->db->join('listpages', 'featured_showcase.id_listpages = listpages.id', 'left');
		$row = db_entries_fields('featured_showcase', 'featured_showcase.*, listpages.common_page as common_page');
		//$row = db_entries('featured');
		$data['rowing'] = $row;

		$this->db->order_by('sorting', 'asc');
		$testimonial = db_entries('testimonial');
		$data['testimonial'] = $testimonial;

		$this->db->order_by('sorting', 'asc');
		$logo = db_entries('logo');
		$data['logo'] = $logo;

		return $data;
	}

	//===========================================================//

	// --- SEO Meta home --- //

	function _meta(){

		options_save($this->meta_names, $this->meta_options, true);
		die('success');
	}

	function _edit_meta_save(){

		$meta_names = [
			'meta_title',
			'meta_description',
			'meta_keyword'
		];

		$meta_options = [
			[null, 'required'],
			[null, 'required'],
			[null, 'required']
		];

		options_save($meta_names, $meta_options, true);
		die('success');
	}

	// --- SEO Meta home end --- //

	//===========================================================//

	// --- Section About --- //

	function _sectionabout(){
		options_save($this->sectionabout_names, $this->sectionabout_options, true);

		die('success');
	}
	
	function _edit_sectionabout_save(){
		$sectionabout_names = [
			'about_title',
			'about_description',
			'about_text_profile',
			'about_text_ourteam',
			'about_text_profile_url',
			'about_text_ourteam_url',
			'about_image'
		];

		$sectionabout_options = [
			[null, 'not_required'],
			[null, 'not_required'],
			[null, 'not_required'],
			[null, 'not_required'],
			[null, 'not_required|valid_url'],
			[null, 'not_required|valid_url'],
			[null, 'image|960x1080']
		];

		options_save($sectionabout_names, $sectionabout_options, true);

		die('success');
	}

	// --- Section About End --- //

	//========================================================================================================//

	// --- Section Services --- //

	function _edit_backgroundservices_save(){
		$backgroundservices_names = [
			'backgroundservices_image'
		];
		$backgroundservices_options = [
			[null, 'image|1412x1445']
		];
		options_save($backgroundservices_names, $backgroundservices_options, true);

		die('success');
	}

	function _backgroundservices(){
		options_save($this->backgroundservices_names, $this->backgroundservices_options, true);

		die('success');
	}

	// ------------------------ //

	function _edit_titleservices_save(){
		$titleservices_names = [
			'title_services'
		];
		$titleservices_options = [
			[null, null]
		];
		options_save($titleservices_names, $titleservices_options, true);

		die('success');
	}

	function _titleservices(){
		options_save($this->titleservices_names, $this->titleservices_options, true);

		die('success');
	}

	// ------------------------ //

	function prep_services(){
		Common_form_init('services');
		
		Common_form_set('image', 'Image', 'image|600x600');
		//Common_form_set('icon', 'Image', 'image|64x60');
		Common_form_set_lang('title', 'Title', 'not_required');
		Common_form_set_lang('subtitle', 'Sub Title', 'not_required');
		Common_form_set('url', 'Button URL (optional)', 'not_required');
		Common_form_set('link', 'Link', 'not_required');
		Common_form_set_lang('content', 'Content', 'not_required');
		// Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Select Status', 'not_required');
	}

	function _services_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('services', $data);
		}

		die('success');
	}

	function _new_services($id_parent = 0){
		$data = array('subtitle' => 'New Services', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'services_new_services');

		$row = db_insert_fill('services', array(), $this->services_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_services_save(){
		$this->prep_services();

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

	function _edit_services($id){
		$data = array('subtitle' => 'Edit Services', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'services_new_services');

		$row = db_entry('services', $id, null, $this->services_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_services_save($id){
		$this->prep_services();

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

	function _remove_services($id){
		$data = [
			'subtitle' => 'Hapus Services',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_services_save($id){
		db_remove('services', $id);
	}

	// --- Section Services End --- //

	//========================================================================================================//

	// --- Section Showcase --- //

	function _sectionshowcase(){

		options_save($this->sectionshowcase_names, $this->sectionshowcase_options, true);
		die('success');
	}

	function _edit_sectionshowcase_save(){

		$sectionshowcase_names = [
			'sectionshowcase_title',
			'sectionshowcase_description',
			'sectionshowcase_label_button',
			'sectionshowcase_url',
		];

		$sectionshowcase_options = [
			[null, 'required'],
			[null, 'required'],
			[null, 'required'],
			[null, 'required|valid_url']
		];

		options_save($sectionshowcase_names, $sectionshowcase_options, true);
		die('success');
	}

	// ------------------------ //

	function prep_featuredshowcase(){

		Common_form_init('featured_showcase');

		Common_form_set('title', 'Title', 'not_required');
		Common_form_set('id_listpages', 'Select Showcase', 'required_select');
		//Common_form_set('sort', 'Sort', 'required');
	}

	function _featuredshowcase_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('featured_showcase', $data);
		}

		die('success');
	}

	function _new_featuredshowcase($id_parent = 0){
		$data = array('subtitle' => 'New Featured Showcase', 'multilanguage' => false, 'modal_size' => 'modal-lg', 'view' => 'home_new_featuredshowcase');

		$row = db_insert_fill('featured_showcase');
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_featuredshowcase_save(){
		$this->prep_featuredshowcase();

		$db_id = Common_form_insert();
		//dd($db_id);
		if ($db_id){
			die('success');
		}
	}

	function _edit_featuredshowcase($id){
		$data = array('subtitle' => 'Edit Featured Showcase', 'multilanguage' => false, 'modal_size' => 'modal-lg', 'view' => 'home_new_featuredshowcase');

		$row = db_entry('featured_showcase', $id);
		$data['row'] = $row;

		return $data;
	}

	function _edit_featuredshowcase_save($id){
		$this->prep_featuredshowcase();

		$db_id = Common_form_update($id);
		//dd($db_id);
		if ($db_id){
			die('success');
		}
	}

	function _remove_featuredshowcase($id){
		$data = [
			'subtitle' => 'Remove Featured Showcase',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_featuredshowcase_save($id){
		db_remove('featured_showcase', $id);
	}

	// ------------------------ //

	// --- Section Showcase End --- //

	//========================================================================================================//

	// --- Section Testimonial --- //

	function _edit_overviewpagetestimonial_save(){
		$overviewpagetestimonial_names = [
			'overviewpagetestimonial'
		];
		$overviewpagetestimonial_options = [
			[null, null]
		];
		options_save($overviewpagetestimonial_names, $overviewpagetestimonial_options, true);

		die('success');
	}

	function _overviewpagetestimonial(){
		options_save($this->overviewpagetestimonial_names, $this->overviewpagetestimonial_options, true);

		die('success');
	}

	// ------------------------ //

	function prep_testimonial(){
		Common_form_init('testimonial');
		
		//Common_form_set_lang('image', 'Image', 'image|300x300');
		Common_form_set('image', 'File', 'file');
		Common_form_set_lang('title', 'Name', 'required');
		Common_form_set_lang('position', 'Position', 'not_required');
		//Common_form_set_lang('linkedin', 'Linkedin', 'not_required');
		Common_form_set_lang('content', 'Content', 'not_required');
		// Common_form_set_lang('content', 'Content', 'max_length[280]');
		//Common_form_set('file', 'File', 'file');
		Common_form_set_lang('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Publish', 'not_required');
		//Common_form_set('sorting', 'Sorting', 'required|numeric');
	}
	
	function _testimonial_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('testimonial', $data);
		}

		die('success');
	}

	function _new_testimonial($id_parent = 0){
		$data = array('subtitle' => 'New Testimonial', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'testimonial_new_testimonial');

		$row = db_insert_fill('testimonial', array(), $this->testimonial_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_testimonial_save(){
		$this->prep_testimonial();

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

	function _edit_testimonial($id){
		$data = array('subtitle' => 'Edit Testimonial', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'testimonial_new_testimonial');

		$row = db_entry('testimonial', $id, null, $this->testimonial_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_testimonial_save($id){
		$this->prep_testimonial();

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

	function _remove_testimonial($id){
		$data = [
			'subtitle' => 'Remove Testimonial',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_testimonial_save($id){
		db_remove('testimonial', $id);
	}

	// --- Section Logo Clients --- //

	function _edit_overviewpagelogo_save(){
		$overviewpagelogo_names = [
			'overviewpagelogo'
		];
		$overviewpagelogo_options = [
			[null, null]
		];
		options_save($overviewpagelogo_names, $overviewpagelogo_options, true);

		die('success');
	}

	function _overviewpagelogo(){
		options_save($this->overviewpagelogo_names, $this->overviewpagelogo_options, true);

		die('success');
	}

	// ======================= LOGO HOME ======================== //

	function prep_logo(){
		Common_form_init('logo');
		
		//Common_form_set_lang('image', 'Image', 'image|172x141');
		Common_form_set('image', 'File', 'file');
		Common_form_set_lang('title', 'Title', 'required');
		Common_form_set_lang('subtitle', 'Sub Title', 'not_required');
		Common_form_set('url', 'Button URL (optional)', 'not_required');
		//Common_form_set('link', 'Link', 'not_required');
		//Common_form_set_lang('content', 'Content', 'not_required');
		Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Select Status', 'not_required');
	}

	function _logo_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('logo', $data);
		}

		die('success');
	}

	function _new_logo($id_parent = 0){
		$data = array('subtitle' => 'New Logo', 'multilanguage' => true, 'modal_size' => 'modal-lg',  'view' => 'logo_new_logo');

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
		$data = array('subtitle' => 'Edit Logo', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'logo_new_logo');

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
			'subtitle' => 'Remove Logo',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_logo_save($id){
		db_remove('logo', $id);
	}

	// ======================= LOGO HOME END======================== //

	// --- Section Testimonial End --- //

	// ============================================================= //

	// --- Section Contact --- //

	function _edit_sectioncontact_save(){
		$contact_names = [
			'contact_address',
			// 'contact_dua',
			'contact_phone',
			'contact_email'
		];

		$contact_options = [
			[null, 'not_required'],
			// [null, 'required'],
			[null, 'not_required'],
			[null, 'not_required|valid_email']
		];

		options_save($contact_names, $contact_options, true);

		die('success');
	}

	function _sectioncontact(){
		options_save($this->contact_names, $this->contact_options, true);

		die('success');
	}

	// ------------------------------------------------------------- //

	function _edit_overviewpagecontact_save(){
		$overviewpagecontact_names = [
			'overviewpagecontact'
		];
		$overviewpagecontact_options = [
			[null, null]
		];
		options_save($overviewpagecontact_names, $overviewpagecontact_options, true);

		die('success');
	}

	function _overviewpagecontact(){
		options_save($this->overviewpagecontact_names, $this->overviewpagecontact_options, true);

		die('success');
	}

	// ------------------------------------------------------------- //

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
			[null, 'image|505x246']
		];

		options_save($sosmed_names, $sosmed_options, true);

		die('success');
	}

	// ------------------------------------------------------------- //

	// --- Section Contact End --- //

	// ============================================================= //

	// function _edit_overviewpagetitlemap_save(){
	// 	$overviewpagetitlemap_names = [
	// 		'overviewpagetitlemap'
	// 	];
	// 	$overviewpagetitlemap_options = [
	// 		[null, null]
	// 	];
	// 	options_save($overviewpagetitlemap_names, $overviewpagetitlemap_options, true);

	// 	die('success');
	// }

	// function _overviewpagetitlemap(){
	// 	options_save($this->overviewpagetitlemap_names, $this->overviewpagetitlemap_options, true);

	// 	die('success');
	// }

	// ----------------------------------------------------- //

	// function _edit_overviewpagetitlecase_save(){
	// 	$overviewpagetitlecase_names = [
	// 		'overviewpagetitlecase'
	// 	];
	// 	$overviewpagetitlecase_options = [
	// 		[null, null]
	// 	];
	// 	options_save($overviewpagetitlecase_names, $overviewpagetitlecase_options, true);

	// 	die('success');
	// }

	// function _overviewpagetitlecase(){
	// 	options_save($this->overviewpagetitlecase_names, $this->overviewpagetitlecase_options, true);

	// 	die('success');
	// }

	// ----------------------------------------------------------------- //

	// function _download(){
	// 	options_save($this->download_names, $this->download_options, true);

	// 	die('success');
	// }
	
	// function _edit_download_save(){
	// 	$download_names = [
	// 		'download_title',
	// 		'download_description',
	// 		'download_image'
	// 	];

	// 	$download_options = [
	// 		[null, 'not_required'],
	// 		[null, 'not_required'],
	// 		[null, 'image|144x206']
	// 	];

	// 	options_save($download_names, $download_options, true);

	// 	die('success');
	// }

	// ----------------------------------------------------------------- //

	// ==================== FOOTER MENU START ==================== //

	// function _edit_footermenu_save(){
	// 	$footermenu_names = [
	// 		'menu_1',
	// 		'menu_2',
	// 		'menu_3',
	// 		'menu_4'
	// 	];

	// 	$footermenu_options = [
	// 		[null, 'required'],
	// 		[null, 'required'],
	// 		[null, 'required'],
	// 		[null, 'required']
	// 	];

	// 	options_save($footermenu_names, $footermenu_options, true);
	// 	die('success');
	// }

	// function _footermenu(){
	// 	options_save($this->footermenu_names, $this->footermenu_options, true);

	// 	die('success');
	// }

	// ==================== FOOTER MENU END ==================== //

	// ========================================================= //

	// function _news(){
	// 	option_save('home_news_limit', null, 'required|numeric');

	// 	die('success');
	// }

	// function _overview(){
	// 	$overview_names = [
	// 		'home_overview_title',
	// 		'home_overview',
	// 		'home_overview_url',
	// 		'home_overview_image'
	// 	];

	// 	$overview_options = [
	// 		[null, 'required'],
	// 		[null, 'required'],
	// 		[null, 'required|valid_url'],
	// 		[null, 'image|1280x900']
	// 	];

	// 	options_save($overview_names, $overview_options, true);

	// 	die('success');
	// }

}

/* End of file models/Backend_home.php */
