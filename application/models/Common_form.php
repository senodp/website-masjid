<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
	C99 by Muhammad Dahri 
	http://commongoodguy.com/ 
*/

//Common Form Handler
class Common_form extends CI_Model {

	var $db_table = null;

	var $db_fields = array();
	
	var $exceptions = array( 
		'checkbox', 'checkbox_multiple', 'password', 
		'required_password', 'flag',
		'select_multiple'
	);

	var $fv_types = array(
		'required_select', 'not_required', 'unique_field', 'field_exists'
	);

	var $status = array(
		'pending', 'approved', 'discarded'
	);
	
	var $file_fields = 	array(
		'file', 'files', 'anyfile', 'image', 'imagedata', 'imagename', 'video'
	);
	
	var $form_validated = false;

	var $support_modular = false;
	var $support_draft = false;

	function __construct(){
		parent::__construct();

		$this->exceptions = array_merge($this->exceptions, $this->file_fields);
		$this->exceptions = array_merge($this->exceptions, $this->fv_types);
	}



	function row($value, $field='id', $db_table=null){
		if ($db_table === null)
			$db_table = $this->db_table;

		$row = db_entry($db_table, $value, $field);

		return $row;
	}

		function row_exists($value, $field='id'){
			$row = $this->row($value, $field);

			if (!empty($row))
				return true;
			else
				return false;
		}

	function rows(){
		$rows = db_entries($this->db_table);

		return $rows;
	}

		function rows_exists(){
			$rows = $this->rows();

			if (!empty($rows))
				return true;
			else
				return false;
		}

	function init($db_table, $upload_path='', $support_modular = null, $support_draft = null){
		$this->db_table = $db_table;
		$this->db_table_fields = $this->db->list_fields($db_table);
		
		$upload_path = (empty($upload_path))? $db_table : $upload_path;
		$this->upload_path = 'uploads/'.$upload_path;
		//dd($this->db_table_fields);
		$this->db_fields = array();
		$this->form_validated = false;

		if ($support_modular === null){
			if (is_numeric(Common_page_row('id'))){
				if ( in_array('common_page', $this->db_table_fields) ){
					$this->support_modular = true;
				}
			}
		}

		if ($support_draft === null){
			if ( in_array('common_origin', $this->db_table_fields) && in_array('common_status', $this->db_table_fields) && in_array('common_note', $this->db_table_fields) ){
				$this->support_draft = true;
			}
		}
	}

		// function clear_fields(){
		// 	$this->db_fields = array();
		// 	$this->form_validated = false;
		// }

		function set_field($name, $title, $rule, $field, $db_table=null, $multilanguage=false){
			$db_field = array(
				'name' => $name, 'title' => $title, 'rule' => $rule, 'field' => $field,
				'type' => 'post', 'props' => false, 'multilanguage' => $multilanguage
			);

			$rules = explode('|', $rule);

			if (in_array($rules[0], $this->exceptions)) {
				$db_field['type'] = $rules[0];

				if (count($rules)>1){
					$props = $rules;// var_dump($props);
					array_shift($props);// dd($props);
					$db_field['props'] = $props;
				}
			}

			if ($db_table === null) {
				$db_table = form_db_table($name);
			}

			$db_field['db_table'] = ($db_table === null)? $this->db_table : $db_table;

			$this->db_fields[] = $db_field;// dd($this->db_fields);
		}



	function form_validate($action=null){ //dd($this->db_fields, 'db_fields');
		if ($this->form_validated !== true){
			$counter = 0;
			
			foreach($this->db_fields as $f){ 
				extract($f);
				
				if (!in_array($type, $this->exceptions) && !empty($rule)){ //dd($f, 'form_item');
					form_set($name, $title, $rule, $multilanguage);
					$counter++;
				}

				if ($type == 'password'){ //die('ahoy! password'); 
					if ($action == 'update'){
						$this->form_validation->set_rules($name, $title, 'min_length[7]|matches[password_re]');
					} else {
						$this->form_validation->set_rules($name, $title, 'required|min_length[7]|matches[password_re]'); 
					}
					
					$counter++;
				}

				if ($type == 'required_password'){
					$this->form_validation->set_rules($name, $title, 'required|min_length[7]|matches[password_re]', ['matches' => 'The {field} field does not match the Repeat Password field.']); 
					
					$counter++;
				}

				if (in_array($type, $this->fv_types)){ //dd($type);
					form_set($name, $title, 'callback_fv_'.$type); 
				}
			} //dd($this->db_fields);

			if ($counter > 0){
				$this->form_validated = form_validate();
				//dd($this->form_validated, 'form_validate()');
			} else {
				$this->form_validated = true;
			} //dd($this->form_validated);
		}

		return $this->form_validated;
	}


	// SAVING

	function files($field_name, $db_field_name, $additional_data=array()){
		if (!empty($_FILES[$field_name])){
			$files = $_FILES[$field_name];
			//dd($files, '$_FILES_files');
			foreach ($files['name'] as $key => $fileObject) {
					$_FILES['file'] = array();
				//if (!empty($fileObject['name'])){ //dd($fileField, 'fileField');
					$_FILES['file']['name'] = $files['name'][$key];
					$_FILES['file']['type'] = $files['type'][$key];
					$_FILES['file']['tmp_name'] = $files['tmp_name'][$key];
					$_FILES['file']['error'] = $files['error'][$key];
					$_FILES['file']['size'] = $files['size'][$key];
					//dd($_FILES);
					$file = upload_file('file', false, ['upload_path' => 'uploads/pages']);
					//dd($file);
					if (is_array($file)){
						$data = $additional_data;

						$data[$db_field_name] = serialize($file);

						$data['updated_by'] = $this->ion_auth->get_user_id();
						$data['updated_on'] = current_date();
						$data['created_by'] = $this->ion_auth->get_user_id();
						$data['created_on'] = current_date();

						$this->db->insert($this->db_table, $data);
					}
				//}
			}
		}
	}

	function insert($additional_data=array()){
		return $this->save(null, null, $additional_data, false);
	}

	function update($id=null, $id_field='id', $additional_data=array()){
		return $this->save($id, $id_field, $additional_data, true);
	}

	function save($id=null, $id_field='id', $additional_data=array(), $force_update = false){
		$form_process = true;
		$form_update = false;
		$form_row = array();
		$form_id = false;
		$data = array();

		if (!empty($id)){
			$id = xss_clean($id);

			$form_row = $this->row($id, $id_field);

			if (!empty($form_row)){
				$form_update = true;
			} elseif (empty($form_row) && $force_update === true) {
				$form_process = false;
			}
		} //dd($this->db_fields, 'db_fields');
		//dd($form_process, 'form_process');
		$form_validated = $this->form_validate();
		//dd($form_validated, 'form_validated');
		if ($form_validated && $form_process) {
			$lang_data = array();
			$lang_db_table = $this->db_table.'_lang';
			
			//if ($this->db->table_exists($lang_db_table)
				//$lang_db_fields = $this->db->list_fields($lang_db_table);
			//dd($this->db_fields, 'db_fields');
			foreach($this->db_fields as $f){ //dd($f);
				$saved_data = false;
				$lang_saved_data = false;

				if ($f['db_table'] == $this->db_table) {

					$saved_data = $this->save_data($f, $form_row, $form_update);

					if ($saved_data !== false){
						$data[$f['field']] = $saved_data;
					}

					if ($f['multilanguage'] === true){
						foreach(languages(false) as $lang){
							if (!array_key_exists($lang, $lang_data))
								$lang_data[$lang] = array();

							$lang_name = $lang.'_'.$f['name'];
							//$lang_field = $lang.'_'.$f['field'];

							$lang_f = $f;
							$lang_f['name'] = $lang_name;
							//$lang_f['field'] = $lang_field;
							$lang_f['db_table'] = $lang_db_table;
							$lang_row = array();
							
							if (is_numeric($id)){
								$this->db->where('lang', $lang);
								$lang_row = $this->row($id, 'id', $lang_db_table);
							}

							$lang_update = false;

							if (!empty($lang_row)){
								$lang_update = true;
							}

							$lang_saved_data = $this->save_data($lang_f, $lang_row, $lang_update);
							//dd($lang_saved_data, 'lang_saved_data');
							if ($lang_saved_data !== false){
								$lang_data[$lang][$lang_f['field']] = $lang_saved_data;
							}
						}
					}
				}
			}

			$data = array_merge($data, $additional_data);
			//dd($_POST, 'save_data_post');
			//dd($data, 'save_data');
			//dd($this->ion_auth->get_user_id());
			if ($form_update){ //dd($data, 'save_data');
				$form_id = $form_row['id'];

				$data['updated_by'] = $this->ion_auth->get_user_id();
				$data['updated_on'] = current_date();

				if ($this->support_draft){
					$status = '0';

					if ( allow_draft_publish() ){
						$status = '1';
					}

					$this->save_draft($data, $form_id, $status);

					if ( allow_draft_publish() ){
						$this->db->where('id', $form_row['id']);
						$this->db->update($this->db_table, $data);
					}
				} else {
					$this->db->where('id', $form_row['id']);
					$this->db->update($this->db_table, $data);
				}
			} else {
				$Common_page_id = Common_page_row('id');

				if ( $this->support_modular && is_numeric($Common_page_id)){
					$data['common_page'] = $Common_page_id;
				}

				$data['updated_by'] = $this->ion_auth->get_user_id();
				$data['updated_on'] = current_date();
				$data['created_by'] = $this->ion_auth->get_user_id();
				
				if ( !array_key_exists('created_on', $data) ){
					$data['created_on'] = current_date();
				}

				if ($this->support_draft){
					$status = '0';

					if ( allow_draft_publish() ){
						$status = '1';
					}

					$data['common_status'] = $status;
				}

				$this->db->insert($this->db_table, $data);

				$form_id = $this->db->insert_id();
			}

			//dd($form_id, 'form_id');
			//dd($lang_data, 'lang_data');
			if (is_numeric($form_id)){
				if (!empty($lang_data)){
					//dd($lang_data, 'lang_data');

					foreach ($lang_data as $lang => $db_data){
						//var_dump($lang);
						//var_dump($db_data);
						if (!empty($db_data)){
							$this->db->where('lang', $lang);
							$lang_row = $this->row($form_id, 'id', $lang_db_table);

							if (!empty($lang_row)){
								$this->db->where('lang', $lang);
								$this->db->where('id', $form_id);
								$this->db->update($lang_db_table, $db_data);
							} else {
								$db_data['id'] = $form_id;
								$db_data['lang'] = $lang;
								//dd($db_data, 'lang_db_data');
								$this->db->insert($lang_db_table, $db_data);
							}
						}
					}

					//die();
				}
			}
		}

		return $form_id;
	}

		function save_draft($data, $id, $status){
			$data['created_by'] = $this->ion_auth->get_user_id();

			if ( !array_key_exists('created_on', $data) )
				$data['created_on'] = current_date();
			
			$data['updated_by'] = $this->ion_auth->get_user_id();
			$data['updated_on'] = current_date();

			$data['common_origin'] = $id;
			$data['common_status'] = $status;

			$this->db->insert($this->db_table, $data);

			$draft_id = $this->db->insert_id();

			return $draft_id;
		}

		function save_data($form_obj, $form_row, $form_update, $debug = false){
			$data = false;
			
			$file = null;

			$save_item = 'save_'.$form_obj['type'];
			//var_dump($save_item);

			if (method_exists($this, $save_item)){
				if (in_array($form_obj['type'], $this->file_fields)){
					if ( $form_update === true && is_serialized($form_row[$form_obj['field']]) )
						$file = $this->$save_item($form_obj['name'], $form_obj['props'], $form_row[$form_obj['field']]);
					else
						$file = $this->$save_item($form_obj['name'], $form_obj['props']);
				} else
					$data = $this->$save_item($form_obj);
			} else {
				if (in_array($form_obj['field'], $this->db_table_fields) && form_post($form_obj['name']) !== null)
					$data = form_post($form_obj['name']);
			}

			if ($file !== null && $data === false){
				if ($form_obj['type'] == 'files' && $form_update === true){
					if (!empty($form_row[$form_obj['field']]) && is_serialized($form_row[$form_obj['field']])){
						$files = unserialize($file);
						$row_files = unserialize($form_row[$form_obj['field']]);

						foreach ($files as $new_file) {
							$row_files[] = $new_file;
						}

						$file = serialize($row_files);
					}
				}

				$data = $file;
			}

			if ($debug === true) {
				var_dump($form_obj);
				var_dump($file);
				var_dump($data);
				die();
			}

			return $data;
		}

	function save_file($name, $filetype=false, $delete_file=false, $serialize=true){
		$params['upload_path'] = $this->upload_path;

		if (is_array($filetype)){
			$filetype = $filetype[0];
		}

		if ($delete_file !== false)
			$params['delete_file'] = $delete_file;
		//dd($filetype, 'FILETYPE');
		$file = upload_file($name, $filetype, $params);

		if (is_array($file))
			$file = serialize($file);

		return $file;
	}

	function save_files($name, $filetype=false, $delete_file=false){
		$saved_files = array();
		
		if (!empty($_FILES[$name])){
			$files = $_FILES[$name];
			//dd($files, '$_FILES_files');
			foreach ($files['name'] as $key => $fileObject) {
					$_FILES['file'] = array();
				//if (!empty($fileObject['name'])){ //dd($fileField, 'fileField');
					$_FILES['file']['name'] = $files['name'][$key];
					$_FILES['file']['type'] = $files['type'][$key];
					$_FILES['file']['tmp_name'] = $files['tmp_name'][$key];
					$_FILES['file']['error'] = $files['error'][$key];
					$_FILES['file']['size'] = $files['size'][$key];
					//dd($_FILES['file'], '$_FILES_file');
					$saved_files[] = $this->save_file('file', false, false, false);
				//}
			} //dd($saved_files, 'saved_files');
		}

		if (!empty($saved_files) && is_array($saved_files))
			$saved_files = serialize($saved_files);
		else
			$saved_files = null;

		return $saved_files;
	}

	function save_image($name, $thumb=false, $delete_file=false, $serialize_output=true){
		$params['upload_path'] = $this->upload_path;

		if ($delete_file !== false)
			$params['delete_file'] = $delete_file;
		
		if ($thumb !== false)
			$params['thumb'] = $thumb;

		$file = ($serialize_output === true)? upload_img_s($name, $params) : upload_img($name, $params);
		//dd($file, 'save_image');
		return $file;
	}

		// function save_cropped_thumb($name, $file){
		// 	$imagedata = form_post($name);

		// 	$upload_path = $this->upload_path;
		// 	$upload_dir = trim_slashes($upload_path).'/';

		// 	$type = 'jpg';

		// 	$img = str_replace('data:image/jpeg;base64,', '', $imagedata);
			
		// 	$img = str_replace(' ', '+', $img);
		// 	$data = base64_decode($img);
		// 	$raw_name = uniqid();
		// 	$file_name = $file['raw_name'] . '_thumb.'.$type;
		// 	$file = $upload_dir . $file_name;
		// 	$success = file_put_contents($file, $data);

		// 	if ($success){
		// 		$image = array('file_name'=>$file_name, 'raw_name'=>$raw_name, 'file_ext'=>'.'.$type,'is_image'=>'1');
		// 		$image = serialize($image);
		// 	}
		// }

	function save_imagedata($name, $type='png', $delete_file=false, $thumb=null, $upload_path=null){
		$imagedata = form_post($name);
		$image = null;
		$upload_path = (is_string($upload_path))? $upload_path : $this->upload_path;

		$type = (is_array($type))? $type[0] : $type;

		$type = ($type === false || $type === null)? 'jpg' : $type;

		if (!empty($imagedata)){ //var_dump($imagedata); dd($type);
			$upload_dir = trim_slashes($upload_path).'/';

			if ($type == 'png') $img = str_replace('data:image/png;base64,', '', $imagedata);
			elseif ($type == 'jpg') $img = str_replace('data:image/jpeg;base64,', '', $imagedata);
			
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$raw_name = uniqid();
			$file_name = $raw_name . '.'.$type;
			$file = $upload_dir . $file_name;
			$success = file_put_contents($file, $data);

			if ($success){
				$image = array('file_name'=>$file_name, 'raw_name'=>$raw_name, 'file_ext'=>'.'.$type,'is_image'=>'1');
				$image = serialize($image);

				if (is_string($thumb)) {
					create_thumb($image, $thumb, $upload_dir);
				}

				if ($delete_file !== false && !empty($delete_file)){
					$delete_file = unserialize($delete_file);
					delete_uploaded_file($upload_path, $delete_file);
				}
			}
		}

		return $image;
	}

	function save_video($name, $type="mp4", $delete_file=false){
		$file = $this->save_file($name, "mp4", $delete_file);
		//dd($file);
		return $file;
	}

	function save_checkbox($form){
		if (form_post($form['name']) === null)
			return '0';
		else
			return form_post($form['name']);
	}

		function save_checkbox_multiple($form){
			$items = (is_array(form_post($form['name'])))? form_post($form['name']) : array();
			
			foreach ($items as $i => $item){
				$items[$i] = '#'.$item.'#';
			}

			$items = implode(',', $items);

			return $items;
		}

	function save_select_multiple($form){
		return $this->save_checkbox_multiple($form);
	}

	function save_password($form){
		$password = form_post($f['name']);

		if ($password !== null && !empty($password))
			return encrypt_password($password);
		else
			return '';
	}

		function save_password_required($form){
			return $this->save_password($form);
		}

	// END of SAVING


	// REMOVAL

	function remove($id){
		$data = array();
		$row = db_entry($this->db_table, $id);

		$halt = ($this->db_table == 'user' && $id == '1')? true : false;
		$halt = ($this->db_table == 'user_role')? true : false;

		if (count($row)>0 && $halt !== true){
			$this->remove_file($row);

			$this->db->where('id', $id);
			//dd($this->db_table_fields);
			
			if ((in_array('deleted_on', $this->db_table_fields) || in_array('deleted', $this->db_table_fields)) && in_array('deleted_by', $this->db_table_fields)){// die('remove');
				
				if (in_array('deleted_on', $this->db_table_fields))
					$data['deleted_on'] = current_date();
				else
					$data['deleted'] = current_date();

				$data['deleted_by'] = logged_in_user_('id'); //dd($data);
				//dd($data);
				$this->db->update($this->db_table, $data);
			} else {// die('delete');
				$this->db->delete($this->db_table);
			}
		}
	}

		function remove_file($row){
			foreach($this->db_fields as $f){
				if ($this->db_table === $f['db_table']){
					if ( in_array($f['type'], $this->file_fields) && array_key_exists($f['name'], $row) && isset($this->upload_path) ){
						$image = unserialize($row[$f['name']]);
						delete_uploaded_file($this->upload_path, $image);
					}
				}
			}
		}


	// DRAFTS & REVISIONS

	function _status($id, $status){
		$row = array();

		if ($this->support_draft && $status <= 2){
			$row = db_entry($this->db_table, $id);

			if (!empty($row)){
				$this->db->where('id', $id);
				$this->db->update( $this->db_table, array('common_status'=>$status) );
			}
		}

		return $row;
	}

	function draft_unapprove($id){
		$row = $this->_status($id, '0');
	}

	function draft_approve($id){
		$row = $this->_status($id, '1');
	}

	function draft_reject($id){
		$row = $this->_status($id, '2');
	}

	function revision_approve($id){
		$updated = false;

		$row = $this->_status($id, '1');

		if (!empty($row)){
			if ($row['common_origin'] > 0){
				$origin = db_entry($this->db_table, $row['common_origin']);

				if (!empty($origin)){
					$updated = true;

					$data = $row;

					unset($data['id']);
					unset($data['common_page']);
					unset($data['common_origin']);
					unset($data['common_status']);
					unset($data['created_on']);
					unset($data['created_by']);
					unset($data['deleted_on']);
					unset($data['deleted_by']);

					$data['updated_on'] = current_date();
					$data['updated_by'] = $this->ion_auth->get_user_id();

					$this->db->where('id', $origin['id']);
					$this->db->update($this->db_table, $data);
				}
			}

			if (!$updated){
				$row = $this->_status($id, '2');
			}
		}
	}

	function revision_reject($id){
		$row = $this->_status($id, '2');
	}



	// END of DRAFTS & REVISIONS

}

/* End of file models/Common_form.php */