<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Frontend_project extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function filters(){
		$filters = array();

		$filters['countries'] = ['national'=>'National', 'international'=>'International'];

		$filters['status'] = ['ongoing'=>'On Going', 'completed'=>'Project Experience'];

		return $filters;
	}

	function _index(){ 
		$data = array();

		$opt_countries = option_value('project_global_countries');

		$countries = str_replace('#', '', $opt_countries);
		$countries = explode(',', $countries); //dd($countries);

		$data['countries'] = $countries;

		$data['filters'] = $this->filters();
		$data['active_filters'] = array();

		$this->db->order_by('start_date', 'DESC');
		$data['projects'] = module_entries('projects');

		return $data;
	}

		function _index_save($id, $Page_data){
			$filter_country = form_post('filter-country', true);
			$filter_status = form_post('filter-status', true);
			$filter_service = form_post('filter-service', true);

			$filter_url = $Page_data['Page_url'].'/filter/'.$filter_country.'/'.$filter_status.'/'.$filter_service;
			//dd($filter_url);

			redirect($filter_url);
		}

	function _filter($id, $Page_data){
		$do_filter = false;
		$do_filter_country = false;
		$do_filter_status = false;
		$do_filter_service = false;

		$filters = $this->filters();

		$filter_country = uri_segment(3);
		$filter_status = uri_segment(4);
		$filter_service = uri_segment(5);

		$country_id = 0;
		$status_id = 0;
		$service_id = 0;

		if ($filter_country != '0'){
			if (array_key_exists($filter_country, $filters['countries'])){
				$country_id = $filter_country;
				$do_filter = true;
				$do_filter_country = true;
			}
		}

		if ($filter_service != '0' && is_numeric($filter_service)){
			$service_row = db_entry('services', $filter_service);

			if (!empty($service_row)){
				$service_id = $service_row['id'];
				$do_filter = true;
				$do_filter_service = true;
			}
		}

		if ($filter_status != '0'){
			if (array_key_exists($filter_status, $filters['status'])){
				// $status_id = $filter_status;
				$status_id = ($filter_status == 'ongoing')? '1' : '2';
				$do_filter = true;
				$do_filter_status = true;
			}
		}

		if ($do_filter){
			$data = array('view' => 'project_index');

			$data['filters'] = $filters;

			//--------------------------------------------------------------
			// FILTERING

			$active_filters = array();

			if ($do_filter_country){
				if ($country_id == 'national'){
					$this->db->like('country', '#ID#');
				} else {
					$this->db->not_like('country', '#ID#');
				} //dd($country_id);

				$active_filters['country'] = [$country_id, $filters['countries'][$country_id]];
			}

			if ($do_filter_status){
				$this->db->where('status', $status_id);
				$active_filters['status'] = [$filter_status, $filters['status'][$filter_status]];
			}

			if ($do_filter_service){
				$this->db->like('service', '#'.$service_id.'#');
				$active_filters['service'] = [$service_id, $service_row['title']];
			} //dd($active_filters);

			$this->db->order_by('start_date', 'DESC');
			$data['projects'] = module_entries('projects'); //dd($this->db->last_query());
			$data['active_filters'] = $active_filters;

			//--------------------------------------------------------------

			$opt_countries = option_value('project_global_countries');

			$countries = str_replace('#', '', $opt_countries);
			$countries = explode(',', $countries); //dd($countries);

			$data['countries'] = $countries;

			return $data;
		} else {
			redirect($Page_data['Page_url']);
		}
	}

	function _detail($id){
		$data = array();

		$row = module_entry('projects', $id);
		$data['row'] = $row;

		$services = project_services_rows($row);// dd($services);
		foreach ($services as $sv){
			$this->db->like('service', '#'.$sv['id'].'#');
		}
		$this->db->order_by('value', 'DESC');
		$this->db->limit(3);
		$related = module_entries('projects');
		$data['related'] = $related; //dd($related);

		Common_crumb_push( $row['title'], null );

		return $data;
	}
}

/* End of file models/Frontend_project.php */
