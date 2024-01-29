<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Select extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Subsector_model');
	}

	public function index(){
		
	}

	public function getSubsector(){
		$idsector = $this->input->post('id');
		$data = $this->Subsector_model->getDatasubsector($idsector);
		foreach($data as $row){
			$output = '<option value="' . $row->id . '"> ' . $row->title . '</option>';
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	
	
}
