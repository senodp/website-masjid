<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/

	Develop by Seno Dwi Prasetyo
*/

class Frontend_career extends CI_Model {

	var $limit = 10;

	function __construct(){
		parent::__construct();
	}

	function _index($pagenum=1, $Page_data){

		$data = array();

		$this->load->library('pagination');

		$config = pagination();

		$config['uri_segment'] = 3;
		$config['base_url'] = $Page_data['Page_url'].'/page';

		//$this->db->where('common_page', PAGE_ID);
		$config['total_rows'] = db_total_rows('events');
		
		$config['per_page'] = $this->limit;

		$this->pagination->initialize($config);

		if ($pagenum > 1){
			$offset = $this->limit*($pagenum-1);
			$this->db->limit($this->limit, $offset);
		} else {
			$this->db->limit($this->limit);
		}

		$data = array();

		$this->db->where("is_publish", 1);
		$this->db->where('DATE(start_date) <=', current_date_f());
		$this->db->where('DATE(end_date) >=', current_date_f());
		$this->db->order_by('sorting', 'asc');
		$vacancies = db_entries('vacancies');
		$data['vacancies'] = $vacancies;
		//dd($vacancies);

		return $data;
	}

	function _page($pagenum, $Page_data){
		$data = $this->_index($pagenum, $Page_data);

		$data['view'] = 'career_index';

		return $data;
	}

	function _detail($url){

		$data = array();
		$row = db_entry('vacancies', $url, 'url', ['title', 'content', 'tags']);
		Common_crumb_push( $row['title'], null );
		$data['career'] = $row;

		$this->db->where("is_publish", 1);
		$this->db->limit(3,0);
		$this->db->order_by('id', 'RANDOM');
		$carr = db_entries('vacancies');
		$data['vacancy'] = $carr;
		
		return $data;
	}
}

/* End of file models/Frontend_vacancy.php */
