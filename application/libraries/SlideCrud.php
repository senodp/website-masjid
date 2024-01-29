<?php

trait SlideCrud {
	var $slide_lang = array('title', 'subtitle', 'url_left', 'url_right', 'button_label_left', 'button_label_right');

	function prep_slide(){
		Common_form_init('slides');
		
		// Common_form_set_lang('image', 'Image', 'image|2900x1500');
		Common_form_set('image', 'File', 'file');
		Common_form_set_lang('title', 'Title', 'not_required');
		Common_form_set_lang('subtitle', 'Sub Title', 'not_required');
		Common_form_set_lang('button_label_left', 'Button Label (optional)', 'not_required');
		Common_form_set_lang('url_left', 'Button URL (optional)', 'not_required');
		Common_form_set_lang('button_label_right', 'Button Label (optional)', 'not_required');
		Common_form_set_lang('url_right', 'Button URL (optional)', 'not_required');
		//Common_form_set('warna', 'Select Warna', 'required');
		//Common_form_set('position', 'Select Posisi', 'not_required');
		//Common_form_set('font_type', 'Font Type', 'not_required');
		//Common_form_set('font_size', 'Font Size', 'not_required');
		Common_form_set('is_publish', 'Publish', 'not_required');
		Common_form_set('background_text', 'No', 'not_required');
		//Common_form_set('background_full_text', 'No', 'not_required');
		//Common_form_set('sorting', 'Sorting', 'required|numeric');
	}
	
	function _slide_sorter(){
		$sorted = form_post('sorted');
		$sorted = explode(',', $sorted);

		foreach ($sorted as $index => $id){
			$data['sorting'] = $index;
			$this->db->where('id', $id);
			$this->db->update('slides', $data);
		}

		die('success');
	}

	function _new_slide($id_parent = 0){
		$data = array('subtitle' => 'New Slide', 'multilanguage' => true, 'modal_size' => 'modal-lg');

		$row = db_insert_fill('slides', array(), $this->slide_lang);
		$data['row'] = $row;// dd($row);

		return $data;
	}

		function _new_slide_save(){
			$this->prep_slide();

			$db_id = Common_form_insert();
			//dd($db_id);
			if ($db_id){
				die('success');
			}
		}

	function _edit_slide($id){
		$data = array('subtitle' => 'Edit Slide', 'multilanguage' => true, 'modal_size' => 'modal-lg', 'view' => 'home_new_slide');

		$row = db_entry('slides', $id, null, $this->slide_lang);
		$data['row'] = $row;

		return $data;
	}

		function _edit_slide_save($id){
			$this->prep_slide();

			$db_id = Common_form_update($id);
			//dd($db_id);
			if ($db_id){
				die('success');
			}
		}

	function _remove_slide($id){
		$data = [
			'subtitle' => 'Remove Slide',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_slide_save($id){
			$this->prep_slide();

			Common_form_remove($id);

			die('success');
		}
}