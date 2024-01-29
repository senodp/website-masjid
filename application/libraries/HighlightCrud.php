<?php

trait HighlightCrud {
	var $highlight_lang = array('title', 'description');
	var $highlight_view = 'modules/highlights_backend_new';
	var $highlight_image_size = '80x80';

	function prep_highlight(){
		Common_form_init('highlights');
		
		Common_form_set_lang('title', 'Title', 'not_required');
		Common_form_set_lang('description', 'Description', 'not_required');
		Common_form_set_lang('image', 'Image', 'image|80x80');
	}

	function _new_highlight($id_parent = 0){
		$data = array('subtitle' => 'New Highlight', 'multilanguage' => true);
		$data['view'] = $this->highlight_view;

		$row = db_insert_fill('highlights', array(), $this->highlight_lang);
		$data['row'] = $row;// dd($row);
		
		$data['highlight_image_size'] = $this->highlight_image_size;

		return $data;
	}

		function _new_highlight_save(){
			$this->prep_highlight();

			$db_id = Common_form_insert();
			//dd($db_id);
			if ($db_id){
				die('success');
			}
		}

	function _edit_highlight($id){
		$data = array('subtitle' => 'Edit Highlight', 'multilanguage' => true);
		$data['view'] = $this->highlight_view;

		$row = db_entry('highlights', $id, null, $this->highlight_lang);
		$data['row'] = $row;

		$data['highlight_image_size'] = $this->highlight_image_size;

		return $data;
	}

		function _edit_highlight_save($id){
			$this->prep_highlight();

			$db_id = Common_form_update($id);
			//dd($db_id);
			if ($db_id){
				die('success');
			}
		}

	function _remove_highlight($id){
		$data = [
			'subtitle' => 'Remove Highlight',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_highlight_save($id){
			$this->prep_highlight();

			Common_form_remove($id);

			die('success');
		}
}