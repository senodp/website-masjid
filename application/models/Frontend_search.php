<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Developed by Seno Dwi Prasetyo
*/

class Frontend_search extends CI_Model {

	var $index_only = true;

	function __construct(){
		parent::__construct();
	}

	function _index($query, $Page_data){ //dd(Common_page_row('id'));
		$data = array();

		$query = xss_clean($query);
		//$query = urldecode($query);

		if ($query != strip_tags($query)){
		    return ['is_404' => true];
		}

		$data['query'] = $query;

		$this->db->order_by('title', 'ASC');
		$this->db->where('common_page', '35');
		$article = db_search_entries('listpages', ['title', 'content', 'tags'], $query);
		$data['article'] = $article; //dd($this->db->last_query());

		$this->db->order_by('created_on', 'DESC');
		$this->db->where('common_page', '45');
		$insights = db_search_entries('listpages', ['title', 'content', 'tags'], $query);
		$data['insights'] = $insights; //dd($this->db->last_query());

		$this->db->order_by('id', 'DESC');
		$this->db->where('common_page', '29');
		$case = db_search_entries('listpages', ['title', 'content', 'tags'], $query);
		$data['case'] = $case; //dd($this->db->last_query());

		// $this->db->order_by('created_on', 'DESC');
		// $this->db->where('common_page', Page_finder(Pages(), 'news', 'url', 'id'));
		// $news = db_search_entries('listpages', ['title', 'content'], $query);
		// $data['news'] = $news;

		$this->db->order_by('title', 'ASC');
		//$this->db->where('common_page', '119');
		$this->db->where('DATE(start_date) <=', current_date_f());
		$this->db->where('DATE(end_date) >=', current_date_f());
		$carr = db_search_entries('vacancies', ['title', 'content', 'tags'], $query);
		$data['career'] = $carr; //dd($this->db->last_query());

		$this->db->order_by('title', 'ASC');
		//$this->db->where('common_page', '119');
		$this->db->where('DATE(start_date) <=', current_date_f());
		$this->db->where('DATE(end_date) >=', current_date_f());
		$job = db_search_entries('jobopening', ['title', 'content', 'tags'], $query);
		$data['jobopening'] = $job; //dd($this->db->last_query());

		$this->db->order_by('title', 'ASC');
		//$this->db->where('common_page', '119');
		$this->db->where('DATE(start_date) <=', current_date_f());
		$past = db_search_entries('events', ['title', 'content', 'tags'], $query);
		$data['events'] = $past; //dd($this->db->last_query());

		$this->db->order_by('title', 'ASC');
		//$this->db->where('common_page', '119');
		$this->db->where('DATE(start_date) >=', current_date_f());
		$upcom = db_search_entries('events', ['title', 'content', 'tags'], $query);
		$data['upcomingevents'] = $upcom; //dd($this->db->last_query());

		// -------- Singlepage -------- //
		$this->db->where('template', 'singlepage');
		$this->db->where('url !=', 'site-map');
		$this->db->order_by('depth', 'ASC');
		$this->db->order_by('sorting', 'ASC');
		$this->db->join('singlepages', 'pages.id = singlepages.common_page');
		$singlepages = db_search_entries('pages', ['pages.title', 'singlepages.content'], $query);
		$data['singlepages'] = $singlepages; //dd($this->db->last_query());

		// $this->db->where_in('template', ['singlepage', '']);
		// $this->db->where('url !=', 'sitemap');
		// $this->db->where('url !=', 'privacy-policy');
		// $this->db->where('url !=', 'terms-conditions');
		// $this->db->order_by('depth', 'ASC');
		// $this->db->order_by('sorting', 'ASC');
		// $this->db->join('singlepages', 'pages.id = singlepages.common_page');
		// $singlepages = db_search_entries('pages', ['pages.title', 'singlepages.content'], $query);
		// $data['singlepages'] = $singlepages; 
		//dd($data['singlepages']);
		return $data;
	}

		function _index_save(){
			$query = form_post('search', true);
			//	$query = urlencode($query); //dd($query);

			redirect_site('search/'.$query);
		}
}

/* End of file models/Frontend_search.php */
