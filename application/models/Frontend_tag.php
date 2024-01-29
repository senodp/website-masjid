<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Frontend_tag extends CI_Model {

	var $index_only = true;

	function __construct(){
		parent::__construct();
	}

	function _index($query, $Page_data){ //dd(Common_page_row('id'));
		$data = array();

		$query = xss_clean($query);
		// $query = urldecode($query);

		if ($query != strip_tags($query)){
		    return ['is_404' => true];
		}

		$data['query'] = $query;

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

		// $this->db->where('DATE(start_date) <=', current_date_f());
		// $this->db->where('DATE(end_date) >=', current_date_f());
		//$this->db->order_by('end_date', 'ASC');
		// $this->db->order_by('title', 'ASC');
		// $this->db->where('common_page', '117');
		// $korporasi = db_search_entries('korporasi', ['title', 'content'], $query);
		// $data['korpo'] = $korporasi; //dd($this->db->last_query());

		// $this->db->order_by('title', 'ASC');
		// $this->db->where('common_page', '118');
		// $individu = db_search_entries('individu', ['title', 'content'], $query);
		// $data['indi'] = $individu; //dd($this->db->last_query());

		// $this->db->order_by('title', 'ASC');
		// $this->db->where('common_page', '119');
		// $komunitas = db_search_entries('komunitas', ['title', 'content'], $query);
		// $data['komu'] = $komunitas; //dd($this->db->last_query());

		
		//dd($data['pages']);
		return $data;
	}

		function _index_save(){
			$query = form_post('search_query', true);
			// $query = urlencode($query);

			redirect_site('tag/'.$query);
		}
}

/* End of file models/Frontend_search.php */
