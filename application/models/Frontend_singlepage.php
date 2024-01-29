<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Frontend_singlepage extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function _index(){ //dd(Common_page_row('id'));
		$data = array();
		$this->db->where("is_publish", 1);
		$page = db_entry_fill('singlepages', Common_page_row('id'), 'common_page', [], ['content','titlehead']);
		$data['page'] = $page;

		// if (!empty($page['header'])){
		// 	Common_html_head_push('
		// 		<style type="text/css">
		// 			.wrapper.mod-singlepage {
		// 				background-image: url('.img_thumb_url($page['header'], 'singlepages').');
		// 			}
		// 		</style>
		// 	');
		// }

		return $data;
	}
}

/* End of file models/Frontend_singlepage.php */
