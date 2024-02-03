<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_singlepage extends CI_Model {
	function __construct(){
		parent::__construct(); 
		//die('Backend_singlepage');
	}

	// ----------------------------------------------------- //

	function _edit_overviewpagesitemap_save(){
		$overviewpagesitemap_names = [
			'overviewpagesitemap'
		];
		$overviewpagesitemap_options = [
			[null, null]
		];
		options_save($overviewpagesitemap_names, $overviewpagesitemap_options, true);

		die('success');
	}

	function _overviewpagesitemap(){
		options_save($this->overviewpagesitemap_names, $this->overviewpagesitemap_options, true);

		die('success');
	}

	// ----------------------------------------------------- //

	function prep(){
		Common_form_init('singlepages');

		Common_form_set('header', 'Header Image', 'image|1920x1080');
		Common_form_set_lang('titlehead', 'Title', 'not_required');
		Common_form_set_lang('content', 'Content', 'required');
		Common_form_set('is_publish', 'Publish', 'not_required');
	}

	function _index($id=null, $Page_data=null){
		$data = array('subtitle' => 'Contents');

		$row = db_entry_fill('singlepages', Common_page_row('id'), 'common_page', [], ['content','titlehead']);// dd($row);
		$data['row'] = $row;

		//dd($data);

		return $data;
	}

		function _index_save($id=null, $Page_data=null){
			$this->prep();

			$Page_url = $Page_data['Page_url'];

			$db_id = Common_form_save(Common_page_row('id'), 'common_page');
			//dd($db_id);
			if ($db_id){
				redirect($Page_url);
				//die('success');
			} else {
				return false;
			}
		}
}

/* End of file models/Backend_singlepage.php */
