<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Frontend_select extends CI_Model {

	//var $index_only = true;

	function __construct(){
		parent::__construct();
		$this->load->model('Subsector_model');
	}

	public function _subsector($idsector){
		

		$data = $this->Subsector_model->getDatasubsector($idsector);
		$this->output->set_content_type('application/json')->set_output(json_encode($data))->_display();

		exit;
	}	

	// function _search(){
	// 	$data = array('subtitle' => '', 'view' => 'select_search');
	// 	$provinces = $this->input->post('provinces');
	// 	$sectors = $this->input->post('sectors');
	// 	$subsectors = $this->input->post('subsectors');
	// 	$primaryaddress = $this->input->post('primaryaddress');
	// 	$ticketsizes = $this->input->post('ticketsizes');
	// 	$marketsizes = $this->input->post('marketsizes');
	// 	//$data['result'] = db_search_entries()
	// 	$data['ioa'] = $this->Subsector_model->searching($provinces,$sectors,$subsectors,$primaryaddress,$ticketsizes,$marketsizes)->result_array();
	// 	//$this->load->view("frontend/select_index.php",$data);
	// 	//exit;
	// }

	function _search(){
		//$data['query'] = $query;

		$data = array('subtitle' => '', 'view' => 'select_search');

		$provinces = $this->input->post('provinces');
		$sectors = $this->input->post('sectors');
		$subsectors = $this->input->post('subsectors');
		$primaryaddress = $this->input->post('primaryaddress');
		$ticketsizes = $this->input->post('ticketsizes');
		$marketsizes = $this->input->post('marketsizes');

		// $ioa = db_search_entries('ioa',['id_subsector','primaryaddress','provinces','ticketsizes','marketsizes'], $primaryaddress);
		// $data['ioa'] = $ioa; //dd($this->db->last_query());

		if ($provinces) 
			$this->db->like('provinces','#'.$provinces.'#');

		if ($sectors) 
			$this->db->where('id_sector',$sectors);

		if ($subsectors) 
			$this->db->where('id_subsector',$subsectors);

		if ($primaryaddress) 
			$this->db->where('primaryaddress',$primaryaddress);

		if ($ticketsizes) 
			$this->db->where('ticketsizes',$ticketsizes);
		
		if ($marketsizes) 
			$this->db->where('marketsizes',$marketsizes);
		
		$this->db->join('subsector', 'ioa.id_subsector = subsector.id');
		$this->db->join('sector', 'subsector.id_sector = sector.id');
		$data['ioa'] = db_entries_fields('ioa', 'ioa.*, subsector.id_sector as id_sector, subsector.title as subsector, sector.title as sector');

		//dd($data['ioa']);
		//dd($this->db->last_query());
		return $data;
		//$this->load->view('frontend/select_search', $data);
	}

}

/* End of file models/Frontend_select.php */
