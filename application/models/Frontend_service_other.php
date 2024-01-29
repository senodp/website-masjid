<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Frontend_service extends CI_Model {

	var $option_index_only;

	function __construct(){
		parent::__construct();
	}

	function _index($service_url, $Page){ //dd($subservice);
		$segment_array = $this->uri->segment_array();
		unset($segment_array[1]);// dd($segment_array);

		$row = array();

		foreach ($segment_array as $i => $url){
			if ($i > 3) break;

			$url = str_replace('_', '-', $url);
			
			$new_row = db_entry('services', $url, 'url');// dd($row);

			if (!empty($new_row)){
				$row = $new_row;

				$crumb_url = ($url == last_uri_segment())? null : $Page['Page']['url'].'/'.$url;

				Common_crumb_push( $row['title'], $crumb_url );
			}
		}
		
		$data = array('service' => $row);

		$data['service_projects'] = $this->service_projects($row, $Page['Sv_children']);
		$data['subservices'] = $this->subservices($row, $Page['Sv_children']);

		return $data;
	}

	function service_projects($service, $Sv_children){
		if ($service['id_parent'] == '0'){
			$services = $Sv_children[$service['id']];

			foreach ($services as $i => $sv){
				if ($i == 0) $this->db->like('service', '#'.$sv['id'].'#');
				else $this->db->or_like('service', '#'.$sv['id'].'#');
			}
		} else {
			$this->db->like('service', '#'.$service['id'].'#');
		}

		$rows = module_entries('projects', 2);
		//dd($rows);
		return $rows;
	}

	function subservices($service, $Sv_children){
		if ($service['id_parent'] == '0'){
			$subservices = $Sv_children[$service['id']];
		} else {
			$subservices = $Sv_children[$service['id_parent']];
		}

		return $subservices;
	}
}

/* End of file models/Frontend_service.php */
