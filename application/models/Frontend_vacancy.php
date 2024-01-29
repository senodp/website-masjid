<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Frontend_vacancy extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array();

		$this->db->where('DATE(start_date) <=', current_date_f());
		$this->db->where('DATE(end_date) >=', current_date_f());
		$this->db->order_by('end_date', 'ASC');
		$this->db->order_by('title', 'ASC');
		$vacancies = module_entries('vacancies');
		$data['vacancies'] = $vacancies;
		//dd($vacancies);

		return $data;
	}

	function _detail($id){
		$data = array();

		$row = db_entry('vacancies', $id);
		$data['job'] = $row;

		Common_crumb_push( $row['title'], null );

		return $data;
	}
}

/* End of file models/Frontend_vacancy.php */
