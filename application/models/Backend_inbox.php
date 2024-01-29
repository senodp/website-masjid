<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_inbox extends CI_Model {

	var $limit = 20;

	function __construct(){
		parent::__construct();

		Common_form_init('inbox');
	}

	//====================================================================================================//

	function _description(){

		options_save($this->description_names, $this->description_options, true);
		die('success');
	}

	function _edit_description_save(){

		$description_names = [
			
			'description_description'
			
		];

		$description_options = [
			[null, 'required']
			
		];

		options_save($description_names, $description_options, true);
		die('success');
	}

	//========================================================================================================//

	function _index($pagenum=1, $Page_data){
		$data = array('subtitle' => 'Index', 'view'=>'inbox_index');

		$this->load->library('pagination');

		$config = pagination();

		$config['uri_segment'] = 4;
		$config['base_url'] = $Page_data['Page_url'].'/page';

		$config['total_rows'] = db_total_rows('inbox');
		
		$config['per_page'] = $this->limit;

		$this->pagination->initialize($config);

		$pagenum = (int) $pagenum;
		$offset = ($pagenum-1)*$this->limit;

		if ($pagenum > 1)
			$this->db->limit($this->limit, $offset); 
		else
			$this->db->limit($this->limit);

		$this->db->order_by('created_on', 'DESC');
		$rows = $this->Common_form->rows();
		$data['rows'] = $rows;

		return $data;
	}

		function _page($pagenum, $Page_data){
			return $this->_index($pagenum, $Page_data);
		}

	function _read($inbox_id){ //dd(Common_page_row('id'));
		$data = array('modal_size' => 'modal-lg', 'subtitle' => 'Read Mail');

		$row = $this->Common_form->row($inbox_id);
		$data['row'] = $row;

		return $data;
	}

		function _read_save($inbox_id){ //dd($_POST);
			$data = [];

			if (form_post('mark_as_read')){
				$data['is_unread'] = '0';
			}

			if (form_post('mark_as_unread')){
				$data['is_unread'] = '1';
			}

			Common_form_update($inbox_id, 'id', $data);

			die('success');
		}

	function _remove($id){
		$data = [
			'subtitle' => 'Remove Mail from Inbox',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_save($id){
			db_remove('inbox', $id);
		}
}

/* End of file models/Backend_inbox.php */
