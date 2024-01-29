<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/
class Frontend_news extends CI_Model {	

	var $limit = 5;

	function __construct(){
		parent::__construct();
	}

	// function _index(){
		
	// 	$data = array();

	// 	$this->db->order_by("created_on","desc");
	// 	$pers = db_entries_lang('news', array('title', 'subtitle') );
	// 	$data['pers'] = $pers;

		
	// 	// $this->db->where('collaborate_id', 16);
	// 	// $this->db->or_where('listpages.tags', 'bisnis');
	// 	// $this->db->or_where('listpages.tags', 'corporation');
	// 	// $this->db->where('common_page', 62);
	// 	// $this->db->order_by('id', 'DESC');
	// 	// $this->db->limit(3);
	// 	// $news = db_entries_lang('listpages', array('title','content') );
	// 	// $data['news'] = $news;

	// 	return $data;
	// }

	function _index($pagenum=1, $Page_data){ //dd(Common_page_row('id'));
		$data = array();

		$this->load->library('pagination');

		$config = pagination();

		$config['uri_segment'] = 6;
		$config['base_url'] = lang_url($Page_data['Page']['parent_url'].'/'.$Page_data['Page']['url'].'/page');

		//$this->db->where('common_page', PAGE_ID);
		$config['total_rows'] = db_total_rows('news');
		
		$config['per_page'] = $this->limit;

		$this->pagination->initialize($config);

		if ($pagenum > 1){
			$offset = $this->limit*($pagenum-1);
			$this->db->limit($this->limit, $offset);
		} else {
			$this->db->limit($this->limit);
		}
    
        $this->db->order_by("sorting","asc");
		//$this->db->order_by("created_on","desc");
		$this->db->where("is_publish", 1);
		$list = db_entries_lang('news', array('title', 'subtitle', 'highlight'));
		//$list = module_entries('news', PAGE_ID, ['title', 'subtitle']);
		$data['news_list'] = $list;

		// $this->db->order_by('created_on', 'DESC');
		// $this->db->limit(5);
		// $list = module_entries('listpages');
		// $data['recent'] = $recent;
		//dd($data);
		return $data;
	}

	function _page($pagenum, $Page_data){
		$data = $this->_index($pagenum, $Page_data);

		$data['view'] = 'news_index';

		return $data;
	}

	function _detail($url){
		$data = array();

		// $data['title'] = 'Fokus';
		$row = db_entry('news', $url, 'url', array('title','subtitle','content'));
		
		Common_crumb_push( $row['title'], null );
		$data['new'] = $row;

		// list news
		$this->db->limit(3,0);
		$this->db->order_by("created_on", "desc");
		$newss = db_entries('news', array('title', 'subtitle', 'image') );
		$data['newss'] = $newss;
		
		return $data;
	}
}

/* End of file models/Frontend_news.php */
