<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_attachment extends CI_Model {

	function prep(){
		Common_form_init('attachments');
		
		Common_form_set_lang('file', 'Image', 'image|300x300');
		Common_form_set_lang('description', 'Description', 'not_required');
	}

	function response($collection){
		$response = [
			'container' => '#attachment-body',
			'html' => $this->load->view('modules/attachment_backend_list', ['attachments' => attachments($collection)], true)
		];

		die(json_encode($response));
	}

	function _new($collection){
		$Title = uri_segment(5, 'Attachment');
		$data = array('subtitle' => 'New '.$Title);

		$row = db_insert_fill('attachments');
		$data['row'] = $row;// dd($row);

		return $data;
	}

		function _new_save($collection){
			$this->prep();

			$db_id = Common_form_insert(['collection' => $collection]);
			//dd($db_id);
			if ($db_id){
				$row = db_entry('attachments', $db_id);
				$this->response($row['collection']);
			}
		}

	function _edit($id){
		$Title = uri_segment(5, 'Attachment');
		$data = array('subtitle' => 'Edit '.$Title, 'view' => 'modules/attachment_backend_new');

		$row = db_entry('attachments', $id);
		$data['row'] = $row;

		return $data;
	}

		function _edit_save($id){
			$this->prep();

			$db_id = Common_form_update($id);
			//dd($db_id);
			if ($db_id){
				$row = db_entry('attachments', $db_id);
				$this->response($row['collection']);
			}
		}

	function _remove($id){
		$Title = uri_segment(5, 'Attachment');
		$data = [
			'subtitle' => 'Remove '.$Title,
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_save($id){
			$collection = uri_segment(6, '');
			
			$this->prep();

			Common_form_remove($id);

			$this->response($collection);
		}

}

/* End of file models/Backend_attachment.php */
