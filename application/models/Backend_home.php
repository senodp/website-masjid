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

	var $program_lang = array('title', 'subtitle', 'content');
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
		$program = db_entries('program');
		$data['program'] = $program;

		$this->db->limit(3);
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
			'about_text_profile_url',
			'about_image'
		];

		$sectionabout_options = [
			[null, 'not_required'],
			[null, 'not_required'],
			[null, 'not_required'],
			[null, 'not_required|valid_url'],
			[null, 'image|800x800']
		];

		options_save($sectionabout_names, $sectionabout_options, true);

		die('success');
	}

	// --- Section About End --- //

	//===========================================================//

	function _edit_overviewprogramkegiatan_save(){
		$overview_program_kegiatan_names = [
			'overview_program_kegiatan'
		];
		$overview_program_kegiatan_options = [
			[null, null]
		];
		options_save($overview_program_kegiatan_names, $overview_program_kegiatan_options, true);

		die('success');
	}

	function _overview_program_kegiatan(){
		options_save($this->overview_program_kegiatan_names, $this->overview_program_kegiatan_options, true);

		die('success');
	}

	// --- Section Program Start --- //

	function prep_program(){
		Common_form_init('program');
		
		//Common_form_set('image', 'Image', 'image|600x600');
		//Common_form_set('icon', 'Image', 'image|64x60');
		Common_form_set_lang('title', 'Title', 'not_required');
		Common_form_set_lang('subtitle', 'Sub Title', 'not_required');
		// Common_form_set('url', 'Button URL (optional)', 'not_required');
		Common_form_set('link', 'Link', 'not_required');
		Common_form_set_lang('content', 'Content', 'not_required');
		// Common_form_set('url', 'Button URL (optional)', 'url_title_lowercase');
		Common_form_set('is_publish', 'Select Status', 'not_required');
	}

	function _program_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('program', $data);
		}

		die('success');
	}

	function _new_program($id_parent = 0){
		$data = array('subtitle' => 'New Program', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'program_new_program');

		$row = db_insert_fill('program', array(), $this->program_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_program_save(){
		$this->prep_program();

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

	function _edit_program($id){
		$data = array('subtitle' => 'Edit Program', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'program_new_program');

		$row = db_entry('program', $id, null, $this->program_lang);
		$data['row'] = $row;

		return $data;
	}

	function _edit_program_save($id){
		$this->prep_program();

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

	function _remove_program($id){
		$data = [
			'subtitle' => 'Hapus Program',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_program_save($id){
		db_remove('program', $id);
	}

	// --- Section Program End --- //

	//============================================================//

	// --- Section Artikel --- //

	function _sectionartikel(){

		options_save($this->sectionartikel_names, $this->sectionartikel_options, true);
		die('success');
	}

	function _edit_sectionartikel_save(){

		$sectionartikel_names = [
			'sectionartikel_title',
			// 'sectionartikel_label_button',
			// 'sectionartikel_url',
		];

		$sectionartikel_options = [
			[null, 'required'],
			// [null, 'required'],
			// [null, 'required|valid_url']
		];

		options_save($sectionartikel_names, $sectionartikel_options, true);
		die('success');
	}

	// ------------------------ //

	function prep_featuredartikel(){

		Common_form_init('featured_showcase');

		Common_form_set('title', 'Title', 'not_required');
		Common_form_set('id_listpages', 'Select Showcase', 'required_select');
		//Common_form_set('sort', 'Sort', 'required');
	}

	function _featuredartikel_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('featured_showcase', $data);
		}

		die('success');
	}

	function _new_featuredartikel($id_parent = 0){
		$data = array('subtitle' => 'New Featured Artikel', 'multilanguage' => false, 'modal_size' => 'modal-lg', 'view' => 'home_new_featuredartikel');

		$row = db_insert_fill('featured_showcase');
		$data['row'] = $row;// dd($row);

		return $data;
	}

	function _new_featuredartikel_save(){
		$this->prep_featuredartikel();

		$db_id = Common_form_insert();
		//dd($db_id);
		if ($db_id){
			die('success');
		}
	}

	function _edit_featuredartikel($id){
		$data = array('subtitle' => 'Edit Featured Artikel', 'multilanguage' => false, 'modal_size' => 'modal-lg', 'view' => 'home_new_featuredartikel');

		$row = db_entry('featured_showcase', $id);
		$data['row'] = $row;

		return $data;
	}

	function _edit_featuredartikel_save($id){
		$this->prep_featuredartikel();

		$db_id = Common_form_update($id);
		//dd($db_id);
		if ($db_id){
			die('success');
		}
	}

	function _remove_featuredartikel($id){
		$data = [
			'subtitle' => 'Remove Featured Artikel',
			'view' => '_remove'
		];

		return $data;
	}

	function _remove_featuredartikel_save($id){
		db_remove('featured_showcase', $id);
	}

	// ------------------------ //

	// --- Section Showcase End --- //

	//============================================================//

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
		$data = array('subtitle' => 'New Tanggapan Jamaah Masjid', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'testimonial_new_testimonial');

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
		$data = array('subtitle' => 'Edit Tanggapan Jamaah Masjid', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'testimonial_new_testimonial');

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
			'subtitle' => 'Remove Tanggapan Jamaah',
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

	// --- Section Testimonial End --- //

	// ============================================================= //

	// --- Section Contact --- //

	function _edit_sectioncontact_save(){
		$contact_names = [
			'contact_title',
			'contact_address',
			// 'contact_dua',
			'contact_phone_title',
			'contact_phone_number'
		];

		$contact_options = [
			[null, 'not_required'],
			[null, 'not_required'],
			// [null, 'required'],
			[null, 'not_required'],
			[null, 'not_required']
			// [null, 'not_required|valid_email']
		];

		options_save($contact_names, $contact_options, true);

		die('success');
	}

	function _sectioncontact(){
		options_save($this->contact_names, $this->contact_options, true);

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

	function _edit_footercontact_save(){
		$footercontact_names = [
			'menu_1',
			'menu_2',
			'menu_3',
			'menu_4'
		];

		$footercontact_options = [
			[null, 'required'],
			[null, 'required'],
			[null, 'required'],
			[null, 'required']
		];

		options_save($footercontact_names, $footercontact_options, true);
		die('success');
	}

	// function _footercontact(){
	// 	options_save($this->footercontact_names, $this->footercontact_options, true);

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
