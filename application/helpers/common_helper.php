<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

if (!function_exists('Common_error_handler')){
	function Common_error_handler()
	{
		
	}
}

if (!function_exists('CI')){
	function CI(){
		return get_instance();
	}
}

if (!function_exists('dd')){
	function dd($var,$title='DEBUG'){
		echo $title.': ';
		var_dump($var); 
		die();
	}
}

if (!function_exists('app_name')){
	function app_name($strip_tags=true){
		$app_name = ($strip_tags === true)? strip_tags(config_item('app_name')) : config_item('app_name');

		return $app_name;
	}
}

if (!function_exists('app_icon')){
	function app_icon($strip_tags=true){
		$app_icon = ($strip_tags === true)? strip_tags(config_item('app_icon')) : config_item('app_icon');

		return mdi($app_icon);
	}
}


if (!function_exists('notify')){
	function notify($notifications){
		$CI =& get_instance();
		$CI->session->set_flashdata('notify', $notifications);
	}
}

if (!function_exists('menu_html')){
	function menu_html($page, $selected_id, $children, $prefix='', $use_optgroup=false){ 
		if ($use_optgroup == false || $page['template'] !== 'menu'):
	?>
		<option value="<?=$page['id']?>" <?=set_select_ext('id_parent', $selected_id, $page['id'])?>>
			<?=$prefix?> <?=$page['title']?>
		</option>
	<?php else: ?>
		<optgroup label="<?=$page['title']?>" />
	<?php endif;
		if (array_key_exists( $page['id'], $children)){
			foreach ($children[$page['id']] as $child){
				menu_html($child, $selected_id, $children, $prefix.'-', false);
			}
		}
	}
}

if (!function_exists('pageman_class')){
	function pageman_class($page, $depth){
		$classes = '';//'m-b-10 ';

		if ($depth == 1){
			$classes .= 'm-b-10 col-12';

			if ($page['template'] == 'menu'){
				$classes .= ' pageman-menu page-is-menu';
			}

		} else {
			$classes .= 'pageman-child col-12';

			if ($page['template'] == 'menu'){
				$classes .= ' page-is-menu';
			}
		}

		return $classes;
	}
}

//----------------------------------------------------------------------------------------------------
//FORMS

if (!function_exists('Common_form_init')){
	function Common_form_init($table){
		$CI =& get_instance();
		$CI->Common_form->init($table);
	}
}

if (!function_exists('Common_form_save')){
	function Common_form_save($id=null, $id_field='id', $additional_data=array()){
		$CI =& get_instance();
		return $CI->Common_form->save($id, $id_field, $additional_data);
	}
}

	if (!function_exists('Common_form_insert')){
		function Common_form_insert($additional_data=array()){
			$CI =& get_instance();
			return $CI->Common_form->insert($additional_data);
		}
	}

	if (!function_exists('Common_form_update')){
		function Common_form_update($id=null, $id_field='id', $additional_data=array()){
			$CI =& get_instance();
			return $CI->Common_form->update($id, $id_field, $additional_data);
		}
	}

	if (!function_exists('Common_form_remove')){
		function Common_form_remove($id=null){
			$CI =& get_instance();
			return $CI->Common_form->remove($id);
		}
	}

if (!function_exists('Common_form_validate')){
	function Common_form_validate($action=null){
		$CI =& get_instance();
		return $CI->Common_form->form_validate($action);
	}
}

if (!function_exists('Common_form_set')){
	function Common_form_set($name, $title, $rule='', $field=null, $db_table=null, $multilanguage=false){
		if ($field === null)
			$field = form_field_name($name);

		// Load CodeIgniter Instance
		$CI =& get_instance();

		// Load Common Form Model
		//$CI->load->model('Common_form');

		// Set Field Name in Common Form
		$CI->Common_form->set_field($name, $title, $rule, $field, $db_table, $multilanguage);
	}
}

	if (!function_exists('Common_form_set_lang')){
		function Common_form_set_lang($name, $title, $rule='', $field=null, $db_table=null){
			Common_form_set($name, $title, $rule, $field, $db_table, true);
		}
	}

	if (!function_exists('form_post')){
		function form_post($name, $xss_clean=false){
			$CI =& get_instance();
			$data = $CI->input->post($name);

			if ($xss_clean === true)
				$data = xss_clean($data);

			return $data;
		}
	}

	if (!function_exists('form_post_checkbox')){
		function form_post_checkbox($name, $xss_clean=false){
			$CI =& get_instance();
			$data = $CI->input->post($name);

			if ($xss_clean === true)
				$data = xss_clean($data);

			$data = ($data === false)? '0' : $data;

			return $data;
		}
	}

	if (!function_exists('form_get')){
		function form_get($name, $xss_clean=false){
			$CI =& get_instance();
			$data = $CI->input->get($name);

			if ($xss_clean === true)
				$data = xss_clean($data);

			return $data;
		}
	}

	if (!function_exists('form_request')){
		function form_request($name){
			$CI =& get_instance();
			$data = $CI->input->get_post($name);

			return $data;
		}
	}

	if (!function_exists('form_validate')){
		function form_validate(){
			$CI =& get_instance();
			$validation = $CI->form_validation->run();

			return $validation;
		}
	}

	if (!function_exists('form_set')){
		function form_set($name, $title, $rule='', $multilanguage=false){ //dd($rule, 'form_set_rule');
			$CI =& get_instance();
			$CI->form_validation->set_rules($name, $title, $rule);

			if ($multilanguage === true){
				$languages = languages(false);

				foreach ($languages as $lang){
					$field_name = $lang.'_'.$name;

					$rule = str_replace('required', 'callback_fv_not_required', $rule);
					$rule = str_replace('not_not_required', 'callback_fv_not_required', $rule);

					$CI->form_validation->set_rules($field_name, $title.' ('.lang_name($lang).')', $rule);
				}
			}
		}
	}

	if (!function_exists('form_db_table')){
		function form_db_table($name){
			$table = null;

			if (strpos($name, '-') !== false){
				$names = explode('-', $name);

				if (count($names)>0){
					if (is_string($names[0]))
						$table = $names[0];
				}
			}

			return $table;
		}
	}

	if (!function_exists('form_field_name')){
		function form_field_name($name){
			if (strpos($name, '-') !== false){
				$names = explode('-', $name);

				if (count($names)>0){
					if (is_string($names[1]))
						$name = $names[1];
				}
			}

			return $name;
		}
	}

	if (!function_exists('set_row_value')){
		function set_row_value($field_name, $row, $type=null){
			$index = form_field_name($field_name);
			$value = $row[$index];

			switch ($type) {
				case 'date':
					$value = (empty($value))? date('d/m/Y') : date_f($value,'d/m/Y');
					break;
				case 'date_db':
					$value = (empty($value))? date('Y/m/d') : date_f($value,'Y/m/d');
					break;
				case 'date_sql':
					$value = (empty($value))? date('Y-m-d') : date_f($value,'Y-m-d');
					break;
			}


			return set_value($field_name, $value);
		}
	}

// END of FORMS
//----------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
//DATABASE

if (!function_exists('is_draft')){
	function is_draft($row){
		if (array_key_exists('common_status', $row)){
			if ($row['common_status'] == '0'){
				return true;
			}
		}

		return false;
	}
}

	if (!function_exists('is_draft_editor')){
		function is_draft_editor($row){
			if (array_key_exists('created_by', $row)){
				$CI =& get_instance();

				if ($row['created_by'] == $CI->ion_auth->get_user_id()){
					return true;
				}
			}

			return false;
		}
	}

if (!function_exists('common_entries')){
	function common_entries($table, $also_fetch_draft=false){
		$CI =& get_instance();

		$CI->db->where($table.'.deleted_by', '0');
		$CI->db->where($table.'.common_origin', '0');

		if ($also_fetch_draft === false){
			$CI->db->where($table.'.common_status', '1');
		}

		$CI->db->where($table.'.common_status !=', '2');
		
		$query = $CI->db->get($table);
		$rows = $query->result_array();
		
		return $rows;
	}
}

if (!function_exists('common_entry')){
	function common_entry($table, $id, $field='id', $also_fetch_draft=false){
		$CI =& get_instance();

		$CI->db->where($table.'.'.$field, $id);
		$CI->db->where($table.'.deleted_by', '0');
		$CI->db->where($table.'.common_origin', '0');

		if ($also_fetch_draft === false){
			$CI->db->where($table.'.common_status', '1');
		}

		$CI->db->where($table.'.common_status !=', '2');
		
		$query = $CI->db->get($table);
		$row = $query->row_array();

		return $row;
	}
}

if (!function_exists('common_drafts')){
	function common_drafts($table, $origin=null, $status=0){
		$CI =& get_instance();

		$CI->db->where($table.'.deleted_by', '0');

		if ($status <= 2 && is_numeric($status)){
			$CI->db->where($table.'.common_status', $status);
		}

		if (is_numeric($origin)){
			$CI->db->where($table.'.common_origin', $origin);
		} else {
			$CI->db->where($table.'.common_origin !=', '0');
		}
		
		$query = $CI->db->get($table);
		$result = $query->result_array();

		$rows = array();

		foreach ($result as $i => $row){ $origin = $row['common_origin'];
			if (!array_key_exists($origin, $rows)){
				$rows[$origin] = array();
			}

			$rows[$origin][] = $row;
		}
		
		return $rows;
	}
}

if (!function_exists('common_remove')){
	function common_remove($table, $id, $id_field='id', $die=true){
		$CI =& get_instance();
		
		$data = array();

		$row = common_entry($table, $id, $id_field);

		if (is_submit() && !empty($row)){
			$data['deleted_by'] = $CI->ion_auth->get_user_id();
			$data['deleted_on'] = current_date();
			
			db_save($table, $data, $id, $id_field);

			if ($die){
				die('success');
			}
		}

		return $row;
	}
}

if (!function_exists('module_table_name')){
	function module_table_name($module_id=false){
		$CI =& get_instance();

		if (!is_numeric($module_id)){
			$module_id = PAGE_ID;
		}

		$Page = Page_finder(Pages(), $module_id);
		//dd(db_entry('pages', $module_id));
		if (!empty($Page['template'])){ //dd($Page['template']);
			$template = $Page['template'];
		} else {
			$template = $Page['url'];
		}

		$tables = [
			'listpage' => 'listpages'
		];

		$table = (array_key_exists($template, $tables))? $tables[$template] : plural($template);

		return $table;
	}
}

if (!function_exists('page_entries')){
	function page_entries($page_id=null, $multilanguage_fields=null){
		if (!is_numeric($page_id)){
			$page_id = PAGE_ID;
		}

		$table = module_table_name($page_id);

		return module_entries($table, $page_id, $multilanguage_fields);
	}
}

if (!function_exists('module_entries')){
	function module_entries($table, $module_id=false, $multilanguage_fields=null){
		$CI =& get_instance();

		if (!is_numeric($module_id)){
			$module_id = PAGE_ID;
		}

		$CI->db->where('common_page', $module_id);
		
		if (is_array($multilanguage_fields)){
			$rows = db_entries_lang($table, $multilanguage_fields);
		} else {
			$rows = db_entries($table);
		}

		return $rows;
	}
}

	if (!function_exists('module_entries_fields')){
		function module_entries_fields($table, $fields, $module_id=false){
			$CI =& get_instance();

			if (!is_numeric($module_id)){
				$module_id = Common_page_row('id');
			}

			$CI->db->where('common_page', $module_id);
			$rows = db_entries_fields($table, $fields);

			return $rows;
		}
	}

	if (!function_exists('module_entry')){
		function module_entry($table, $id, $field='id', $module_id=false){
			$CI =& get_instance();

			if (!is_numeric($module_id)){
				$module_id = Common_page_row('id');
			}

			$CI->db->where('common_page', $module_id);
			$rows = db_entry($table, $id, $field);

			return $rows;
		}
	}

if (!function_exists('db_entries')){
	function db_entries($table, $options=array()){
		$CI =& get_instance();

		extract(db_options($options));
		$db = db_props($table);

		if (is_array($lang_fields)){
			$fields = db_select_lang($table, $lang_fields);
		}

		if (in_array('deleted_by', $db['fields_array']))
			$CI->db->where($table.'.deleted_by', '0');

		if ($total_rows === true) {
			$result = $CI->db->count_all_results($table); //dd($CI->db->last_query());
		} elseif ($return_query === true) {
			$result = $CI->db->get($table);
		} else {
			$q = $CI->db->get($table);
			$result = $q->result_array();
		}

		return $result;
	}
}

	if (!function_exists('db_entries_in')){
		function db_entries_in($table, $values, $field = 'id'){
			$CI =& get_instance();
			$CI->db->where_in($field, $values);
			$rows = db_entries($table);

			return $rows;
		}
	}

	if (!function_exists('db_select_lang')){
		function db_select_lang($table, $lang_fields=array(), $fields='', $return_fields = false){
			if (!empty($lang_fields)){ //dd($lang_fields);
				$CI =& get_instance();


				if (empty($fields))
					$fields = "$table.*";

				$lang_table = $table.'_lang';

				foreach (languages(false) as $i=>$lang){
					$alias = $table.'_'.$lang;

					$condition = "$table.id = $alias.id AND $alias.lang = '$lang'";
					//dd($condition);
					$CI->db->join("$lang_table AS $alias", $condition, 'left');

					foreach ($lang_fields as $c => $lang_field) {
						$lf = $lang.'_'.$lang_field;
						$fields .= ", $alias.$lang_field as $lf";
					}
				} //dd($fields);

				if ($return_fields === true){
					return $fields;
				} else { 
					$CI->db->select($fields);
				}
			}
		}
	}

	if (!function_exists('db_entries_exists')){
		function db_entries_exists($table){
			$rows = db_entries($table);
			$exists = (empty($rows))? false : true;

			return $exists;
		}
	}

	if (!function_exists('db_entries_lang')){
		function db_entries_lang($table, $lang_fields){
			$rows = db_entries($table, array('lang_fields'=>$lang_fields));

			$rows = db_lang_rows($rows, $lang_fields);

			return $rows;
		}
	}

	if (!function_exists('db_entries_fields')){
		function db_entries_fields($table, $fields, $options=array(), $lang_fields = null){
			$CI =& get_instance(); //dd($fields);
			$CI->db->select($fields);

			$result = db_entries($table, $options);

			return $result;
		}
	}

	if (!function_exists('db_entry_fields')){
		function db_entry_fields($table, $fields, $options=array()){ //dd($fields);
			$CI =& get_instance();

			$CI->db->limit(1);
			$result = db_entries_fields($table, $fields, $options);
			$row = (count($result)>0)? $result[0] : array();

			return $row;
		}
	}

if (!function_exists('db_entry')){
	function db_entry($table, $id, $field=null, $lang_fields=null, $fill_empty_lang_fields=true){
		$CI =& get_instance();

		$db = db_props($table);

		$select = "$table.*";
		$field = ($field === null)? $db['field_id'] : $field;
		//if ($table == 'content') dd($lang_fields);

		if (is_array($lang_fields)){
			$table_lang = $table.'_lang'; //dd($table_lang);

			foreach (languages(false) as $i=>$lang){
				$alias = $table.'_'.$lang;

				$condition = "$table.id = $alias.id AND $alias.lang = '$lang'";
				//dd($condition);
				$CI->db->join("$table_lang AS $alias", $condition, 'left');

				foreach ($lang_fields as $c => $lang_field) {
					$lf = $lang.'_'.$lang_field;
					$select .= ", $alias.$lang_field as $lf";
				}
			}
		} //if ($lang_fields == ['value']) dd($select);

		$CI->db->select($select);
		$CI->db->where("$table.$field", $id);

		if (in_array('deleted_by', $db['fields_array']))
			$CI->db->where($table.'.deleted_by', '0');

		$query = $CI->db->get($db['table']);
		//if ($lang_fields == ['value']) dd($CI->db->last_query());
		$row = $query->row_array();

		if ($row === null)
			$row = array();
		//if ($lang_fields == ['value']) dd($row);
		if (!is_array($lang_fields)){
			return $row;
		} else {
			if ($fill_empty_lang_fields)
				return db_lang_row($row, $lang_fields);
			else
				return $row;
		}
	}
}

	if (!function_exists('db_entry_exists')){
		function db_entry_exists($table, $id, $field=null){
			$row = db_entry($table, $id, $field);

			if (!empty($row)){
				return true;
			} else {
				return false;
			}
		}
	}

	if (!function_exists('db_entry_fill')){
		function db_entry_fill($table, $id, $field=null, $data=array(), $lang_fields=null, $fill_empty_lang_fields=true){
			$row = db_entry($table, $id, $field, $lang_fields, $fill_empty_lang_fields);

			if (empty($row)){
				$row = db_insert_fill($table, $data, $lang_fields);
			}// elseif (!empty($row) && is_array($lang_fields)){
				//$row = db_lang_row($row, $lang_fields);
			//}

			return $row;
		}
	}


if (!function_exists('db_save')){
	function db_save($table, $data, $id=null, $id_field='id'){
		$CI =& get_instance();

		$return_id = null;

		if (db_entry_exists($table, $id, $id_field)){
			$data['updated_by'] = $CI->ion_auth->get_user_id();
			$data['updated_on'] = current_date();

			unset($data[$id_field]); // remove $id_field from data

			$CI->db->where($id_field,$id);
			$CI->db->update($table, $data);

			$return_id = $id;
		} else {
			$data['updated_by'] = $CI->ion_auth->get_user_id();
			$data['updated_on'] = current_date();
			$data['created_by'] = $CI->ion_auth->get_user_id();
			$data['created_on'] = current_date();
			
			$CI->db->insert($table, $data);

			$return_id = $CI->db->insert_id();
		}

		return $return_id;
	}
}


if (!function_exists('db_remove')){
	function db_remove($table, $id, $id_field='id', $die=true){
		$CI =& get_instance();
		
		$data = array();

		$row = db_entry($table, $id, $id_field);

		if (is_submit() && !empty($row)){
			$data['deleted_by'] = $CI->ion_auth->get_user_id();
			$data['deleted_on'] = current_date();
			
			db_save($table, $data, $id, $id_field);

			if ($die){
				die('success');
			}
		}

		return $row;
	}
}



// < SEARCH FUNCTIONS

if (!function_exists('db_search')){
	function db_search($db_fields, $op="OR", $do_xss_clean=true){
		if (is_array($db_fields)){
			$CI =& get_instance();

			$like = "";

			if (count($db_fields)>1)
				$like .= '(';

			foreach($db_fields as $i=>$f){ $field = $f[0]; $value = $f[1];
				if ($do_xss_clean){
					$field = xss_clean($field);
					$value = xss_clean($value);
				}

				$value = $CI->db->escape_like_str($value);
				if ($i === 0) $like .= "$field LIKE '%$value%'";
				else $like .= " $op $field LIKE '%$value%'";
			}

			if (count($db_fields)>1)
				$like .= ')';

			return $like;
		} else {
			return '';
		}
	}
}

	if (!function_exists('db_search_val')){
		function db_search_val($fields, $value, $op="OR", $do_xss_clean=true){
			$db_fields = array();

			if (is_array($fields)){
				foreach($fields as $f){
					$db_fields[] = array($f, $value);
				}
			} else
				$db_fields[0] = array($fields, $value);

			$query = db_search($db_fields, $op, $do_xss_clean);

			return $query;
		}
	}

	if (!function_exists('db_search_where')){
		function db_search_where($fields, $value, $op="OR", $do_xss_clean=true){
			$CI =& get_instance();

			if (!empty($value)){
				$query = db_search_val($fields, $value, $op, $do_xss_clean);
				$CI->db->where($query);
			} else
				$CI->db->limit(0);
		}
	}

	if (!function_exists('db_search_entries')){
		function db_search_entries($table, $fields, $value, $op="OR", $do_xss_clean=true){
			db_search_where($fields, $value, $op, $do_xss_clean);

			$rows = db_entries($table);

			return $rows;
		}
	}

	if (!function_exists('db_search_entries_adv')){
		function db_search_entries_adv($table, $fields, $value, $op="OR", $do_xss_clean=true){
			db_search_where($fields, $value, $op, $do_xss_clean);

			$rows = db_entries($table,array('set_fields'=>false));

			return $rows;
		}
	}

	if (!function_exists('db_search_total_rows')){
		function db_search_total_rows($table, $fields, $value, $op="OR", $do_xss_clean=true){
			db_search_where($fields, $value, $op, $do_xss_clean);

			$total_rows = db_total_rows($table);

			return $total_rows;
		}
	}

// </ SEARCH FUNCTIONS



// < DB OPTIONS
if (!function_exists('db_options')){
	function db_options($options){
		if (!is_array($options)) $options = array();

		if (!array_key_exists('total_rows', $options)) $options['total_rows'] = false;
		if (!array_key_exists('return_query', $options)) $options['return_query'] = false;
		if (!array_key_exists('lang_fields', $options)) $options['lang_fields'] = null;
		if (!array_key_exists('lang_table', $options)) $options['lang_table'] = null;

		return $options;
	}
}

	if (!function_exists('db_props')){
		function db_props($db_table, $field_data=false){ //echo ($db_table . '...');
			$CI =& get_instance();

			$db['table'] = $db_table;
			$db['fields_array'] = db_fields($db_table);
			$db['field_id'] = $db['fields_array'][0];
			$db['fields'] = implode(', ', $db['fields_array']);

			if ($field_data === true) $db['field_data'] = $CI->db->field_data($db_table);
			//var_dump($db); die("\n\n something");
			return $db;
		}
	}

		if (!function_exists('db_fields')){
			function db_fields($db_table, $insert=false){ //die('db_fields');
				$CI =& get_instance();

				$fields = $CI->db->list_fields($db_table);
				if ($insert) array_shift($fields);
				//$fields = implode(', ', $fields);

				return $fields;
			}
		}
// </ DB OPTIONS



if (!function_exists('db_total_rows')){
	function db_total_rows($table, $options=array()){
		$options['total_rows'] = true;
		$rows = db_entries($table, $options);

		return $rows;
	}
}

	if (!function_exists('db_lang_row')){
		function db_lang_row($row, $lang_fields){
			$lang = lang_preferred();

			if (!is_default_language_preferred()){
				foreach ($lang_fields as $lf){
					$field = $lang.'_'.$lf;

					if (array_key_exists($field, $row)){
						if (!empti($row[$field])){
							$row[$lf] = $row[$field];
						}
					}
				}
			}

			return $row;
		}
	}

	if (!function_exists('db_lang_rows')){
		function db_lang_rows($rows, $lang_fields){ //dd($rows);
			foreach($rows as $i=>$r){
				$rows[$i] = db_lang_row($r, $lang_fields);
			} //dd($rows);

			return $rows;
		}
	}



// <
if (!function_exists('db_insert_fill')){
	function db_insert_fill($table,$row=array(),$lang_fields=null){
		$CI =& get_instance();

		$fields = $CI->db->list_fields($table);

		foreach($fields as $f){
			if (!array_key_exists($f,$row))
				$row[$f] = '';
		}

		if (is_array($lang_fields)){
			$table_lang = $table.'_lang';

			foreach (languages(false) as $i=>$lang){
				foreach ($lang_fields as $c => $lang_field) {
					$lf = $lang.'_'.$lang_field;

					if (!array_key_exists($lf, $row))
						$row[$lf] = '';
				}
			}
		}

		return $row;
	}
}

if (!function_exists('db_update_entry')){
	function db_update_entry($db_table, $data, $id, $field='id'){
		$CI =& get_instance();
		$CI->db->where($field, $id);
		$CI->db->update($db_table, $data);
		//$CI->db->close();
	}
}

	if (!function_exists('db_increment_field')){
		function db_increment_field($db_table, $int_field, $id, $key_field='id'){
			$CI =& get_instance();
			$CI->db->set($int_field, $int_field.'+1', false);
			$CI->db->where($key_field, $id);
			$CI->db->update($db_table);
			//dd($CI->db->last_query(), 'db_increment_field_query');
			//$CI->db->close();
		}
	}
// />

// END of DATABASE
//----------------------------------------------------------------------------------------------------



// IMAGES

if (!function_exists('img_thumb')){
	function img_thumb($file, $folder, $attr="", $noimage="holder.js/200x200?auto=yes&text=Image Not Found", $fullsize=false){
		$options = (is_array($fullsize))? $fullsize : array('fullsize'=>$fullsize);
		$path= 'uploads/'. $folder;

		extract(options_img_thumb($options));

		//dd($marker);

		if (file_exists('uploads/'.$folder.'/') === false){
			$folder = explode('_', $folder);
			$folder = $folder[0];
		}

		if (is_serialized($file))
			$file = @unserialize($file);
		elseif (is_string($file))
			$file = img_data($file, $path, null);
		//dd($file);
		//dd($fullsize);
		if (is_array($file)){
			$file_path = $path .'/' . $file['file_name'];
			$thumb_path = $path .'/' . $file['raw_name'] . $marker . $file['file_ext'];

			$thumb_default = base_url($file_path);

			$base_thumb_path = config_item('base_path') . $thumb_path;

			if ($fullsize === true) $thumb_url = $thumb_default;
			else $thumb_url = (file_exists($base_thumb_path))? base_url($thumb_path) : base_url($file_path);

			//dd(file_exists($base_thumb_path));

			$thumb_html = '<img '.$attr.' src="'. $thumb_url . '" />';
		} else {
			$thumb_html = '';

			if (!empty($noimage)){
				$noimage_html = (strpos($noimage, 'holder.js/') !== false)? 'data-src="'.$noimage.'"' : 'src="'.$noimage.'"';
				$thumb_html = '<img '.$attr.' '.$noimage_html.' />';
			}
		}

		return $thumb_html;
	}
}

	if (!function_exists('img_tag')){
		function img_tag($file, $folder, $attr="", $noimage=""){
			$html = img_thumb($file, $folder, $attr, $noimage="", true);

			return $html;
		}
	}

	if (!function_exists('img_tag_thumb')){
		function img_tag_thumb($file, $folder, $attr, $noimage, $fullsize=false){
			$noimage = img_thumb_url($noimage, $folder);
			$html = img_thumb($file, $folder, $attr, $noimage, $fullsize);
			return $html;
		}
	}

	if (!function_exists('img_exists')){
		function img_exists($file, $folder, $attr="", $noimage=""){
			$html = img_thumb($file, $folder, $attr, $noimage="", false, true);

			return $html;
		}
	}

if (!function_exists('img_url')){
	function img_url($file, $folder, $fallback=false, $use_thumbnail=false){
		$url = "";

		if (!empty($file)){
			$file = @unserialize($file);

			if (is_array($file)){ //dd($file);
				if ($use_thumbnail === true)
					$file_path = 'uploads/'.$folder.'/'.$file['raw_name'] . '_thumb' . strtolower($file['file_ext']);
				else
					$file_path = 'uploads/'. $folder . '/' . $file['file_name'];

				$url = base_url().$file_path;

				if ($fallback !== false){ //dd($file_path);
					$url = (file_exists($file_path))? $url : $fallback;
				}
			} elseif ($fallback !== false)
				$url = $fallback;
		} elseif ($fallback !== false)
			$url = $fallback;

		return $url;
	}
}

	if (!function_exists('img_thumb_url')){
		function img_thumb_url($file, $folder, $fallback=false){
			$url = img_url($file, $folder, $fallback, true);

			return $url;
		}
	}

// /IMAGES



//FILES

if (!function_exists('file_does_exist')){
	function file_does_exist($file, $folder){
		$does_exist = false;

		if (is_serialized($file)){
			$file = unserialize($file);
		}

		if (is_array($file)){ //dd($file);
			$does_exist = (array_key_exists('file_name', $file))? true : false;
		}

		if ($does_exist){
			$path =  'uploads/'. $folder . '/' . $file['file_name'];

			if (file_exists($path)){ //dd($path, 'path');
				$file['url'] = base_url('uploads/'.$folder.'/'.$file['file_name']);
				$file['path'] = $path;
				$file['ctime'] = filectime($path);

				if (!array_key_exists('name', $file))
					$file['name'] = $file['file_name'];

				if (!array_key_exists('title', $file))
					$file['title'] = $file['file_name'];

				if (!array_key_exists('ext', $file))
					$file['ext'] = strrchr($file['file_name'], '.');

				$does_exist = $file;
			} else {
				$does_exist = false;
			}
		}

		return $does_exist;
	}
}


if (!function_exists('file_tag')){
	function file_tag($file, $folder, $link_text="", $attr=""){
		$file_html = '';

		$file = file_does_exist($file, $folder);
		
		if ($file !== false){
			$link_text = (empty($link_text))? $file['file_name'] : $link_text;
			$file_html = '<a href="'.$file['url'].'" '.$attr.'>'.$link_text.'</a>';
		}

		return $file_html;
	}
}

if (!function_exists('file_size')){
	function file_size($file)
	{
		$size = ceil(filesize($file) / 1024);
		if($size > 1024) $size = number_format(($size / 1024),2)." MB";
		else $size .= " KB";
		return $size;
	}
}

	if (!function_exists('file_url')){
		function file_url($file, $folder, $fallback_url='#'){
			$file = file_does_exist($file, $folder);
			
			if ($file !== false){
				$url = $file['url'];
			} else {
				$url = $fallback_url;
			}

			return $url;
		}
	}

if (!function_exists('file_attr')){
	function file_attr($file, $attr=null){
		$file_attr = '';

		if (!empty($file) && is_serialized($file)){
			$file = unserialize($file);

			if (!empty($file)){
				if (is_string($attr)){
					if (array_key_exists($attr, $file)){
						$file_attr = $file[$attr];
					} else {
						$file_attr = '';
					}
				} else {
					$file_attr = $file;
				}
			}
		}

		return $file_attr;
	}
}


if (!function_exists('dir_list')){
	function dir_list($dir){
		$CI =& get_instance();
		$CI->load->helper('directory');

		$files = array();

		$base_url = trim_slashes(site_url($dir)).'/';
		$base_dir = trim_slashes($dir).'/';

		$dirmap = directory_map($base_dir);

		//var_dump($dirmap); die();

		foreach($dirmap as $file_name){
			$file_ext = strrchr($file_name, '.');
			$file_thumb = '_thumb' . $file_ext;

			if (!strpos($file_name, $file_thumb)) {
				$file['name'] = substr($file_name, 0, '-' . strlen($file_ext));
				$file['url'] = $base_url . $file_name;

				$file['thumb'] = $file['name'] . '_thumb';
				$file['thumb_url'] = (is_image($file_ext))? $base_url.$file['thumb'].$file_ext : assets_url().'images/not_image.png';
				$file['attr'] = (is_image($file_ext))? 'imagefile' : 'otherfile';
				$file['is_image'] = (is_image($file_ext))? '1' : '0';

				$file['fullname'] = $file_name;
				$file['file_name'] = $file_name;
				$file['ext'] = $file_ext;
				$file['size'] = round(filesize($base_dir . $file_name) * 0.001, 2);
				$file['date'] = date('d-m-Y H:i', filemtime($base_dir . $file_name));

				$file['dir'] = $base_dir;

				$index = filemtime($base_dir . $file_name);

				do {
					$index++;
				} while (array_key_exists($index, $files) === true);

				$files[$index] = $file;
			}
		}

		krsort($files);

		//var_dump($files); die();

		return $files;
	}
}

if (!function_exists('files_list')){
	function files_list($files, $folder){
		$list = array();
		//dd($files, 'files');
		if (!empty($files) && is_serialized($files)){
			$files = unserialize($files); 

			if (!empty($files)){
				foreach ($files as $i => $file) {
					$file = file_does_exist($file, $folder);

					if (is_array($file)){
						$list[] = $file;
					}
				}
			} //dd($list, 'list');
		}

		return $list;
	}
}

if (!function_exists('file_marker')){
	function file_marker($file, $marker){
		$file_ext = strrchr($file, '.');
		$file_marker = $marker . $file_ext;
		$file_name = substr($file, 0, '-' . strlen($file_ext));
		$file = $file_name.$file_marker;

		return $file;
	}
}

// /FILES



//BASES

if (!function_exists('assets_url')){
	function assets_url($extend=''){
		$extend = (empti($extend))? '' : trim($extend);

		$path = base_url() . 'assets/' . $extend;
		
		return $path;
	}
}

	if (!function_exists('assets_css')){
		function assets_css($css){
			$path = assets_url($css);
			$html = '<link rel="stylesheet" href="'.$path.'">';

			return $html;
		}
	}

	if (!function_exists('assets_js')){
		function assets_js($js){
			$path = assets_url($js);
			$html = '<script src="'.$path.'" type="text/javascript"></script>';

			return $html;
		}
	}

	if (!function_exists('assets_img')){
		function assets_img($img,$attr=""){
			$path = assets_url($img);
			$html = '<img src="'.$path.'" '.$attr.'>';

			return $html;
		}
	}

if (!function_exists('uploads')){
	function uploads($extend=''){
		$extend = (empti($extend))? '' : trim_slashes($extend);
		$path = base_url() . 'uploads/'. $extend;
		return $path;
	}
}

	if (!function_exists('uploads_img')){
		function uploads_img($img,$attr=""){
			$path = uploads($img);
			$html = '<img src="'.$path.'" '.$attr.'>';

			return $html;
		}
	}



	if (!function_exists('upload_path')){
		function upload_path($folder=""){
			$path_all = config_item('file_upload');
			$path = base_path();

			if (!empty($folder) && array_key_exists($folder, $path_all)) {
				$path = (array_key_exists('upload_path', $path_all[$folder]))? $path_all[$folder]['upload_path'] : $path;
			}

			return $path;
		}
	}

	if (!function_exists('redirect_site')){
		function redirect_site($path=''){
			redirect(site_url($path));
		}
	}

		if (!function_exists('redirect_lang')){
			function redirect_lang($path=''){
				redirect(lang_url($path));
			}
		}

	if (!function_exists('redirect_control')){
		function redirect_control($path=''){
			redirect(control_url($path));
		}
	}


//UTILITIES

if (!function_exists('method_exec')){
	function method_exec($object, $method, $params=""){
		if (method_exists($object, $method)) $object->$method($params);
	}
}

//deprecated
//if (!function_exists('csegment')){ function csegment($segment){ $data = uri_segment($segment);return $data;}}
//if (!function_exists('csegment_uri')){function csegment_uri($num){ $uri = uri_segments($num); return $uri; }}


//new functions
if (!function_exists('uri_segment')){
	function uri_segment($segment, $default=false, $do_xss_clean=true){
		$CI =& get_instance();
		$URI = $CI->uri->segment($segment, $default);

		if (function_exists('xss_clean') && $do_xss_clean !== false){
			$URI = xss_clean($URI);
		}

		return $URI;
	}
}

	if (!function_exists('uri_segments')){
		function uri_segments($num){
			$uri = '';

			for ($i = 1; $i <= $num; $i++) {
				if (uri_segment($i)) $uri .= uri_segment($i) . '/';
			}

			return $uri;
		}
	}

	if (!function_exists('last_uri_segment')){
		function last_uri_segment(){
			$CI =& get_instance();

			$segment_array = $CI->uri->segment_array();
			$last_segment = end($segment_array);

			return $last_segment;
		}
	}

if (!function_exists('get_page_offset')){
	function get_page_offset($var_name, $limit_per_page){
		$CI =& get_instance();
		$uri_segment = $CI->input->get_post($var_name);
		$offset = ($uri_segment > 1)? (($uri_segment-1)*$limit_per_page) : 0;

		return $offset;
	}
}

if (!function_exists('uri_page_offset')){
	function uri_page_offset($segment, $limit_per_page){
		$uri_segment = uri_segment($segment, 0);
		$offset = ($uri_segment > 1)? (($uri_segment-1)*$limit_per_page) : 0;

		return $offset;
	}
}

	if (!function_exists('uri_get_offset')){
		function uri_get_offset($get, $limit_per_page){
			$CI =& get_instance();

			$get = $CI->input->get($get);
			$page = ($get === false)? 1 : $get;

			$offset = ($page > 1)? (($page-1)*$limit_per_page) : 0;

			return $offset;
		}
	}

if (!function_exists('db_page_offset')){
	function db_page_offset($segment,$limit_per_page){
		if (is_numeric($segment) && is_numeric($limit_per_page)){
			$CI =& get_instance();
			$CI->db->limit($limit_per_page,uri_page_offset($segment,$limit_per_page));
		}
	}
}



//STRING

/**
 * Find the position of the Xth occurrence of a substring in a string
 * @param $haystack
 * @param $needle
 * @param $number integer > 0
 * @return int
 */
function strposX($haystack, $needle, $number){
    if ($number == '1'){
        return strpos($haystack, $needle);
    } elseif($number > '1'){
        return strpos($haystack, $needle, strposX($haystack, $needle, $number - 1) + strlen($needle));
    }
}

function empti($var){
	$var = str_replace("&nbsp;", "", $var);
	$var = str_replace(" ", "", $var);
	$var = str_replace("<br>", "", $var);
	$var = str_replace("<br />", "", $var);
	$var = str_replace("<br/>", "", $var);
	$var = str_replace("<p></p>", "", $var);
	$var = trim($var);
	return empty($var);
}

	function text_after($var, $ext="", $empty="", $position='after'){
		if (is_numeric($var)){
			$is_empty = ($var > 0)? false: true;
		} else {
			$is_empty = empti($var);
		}

		if ($is_empty)
			$var = $empty;
		else
			$var = ($position == 'before')? $ext.$var : $var.$ext;

		return $var;
	}

	function text_before($var, $ext='', $empty=''){
		$text = text_after($var, $ext, $empty, 'before');

		return $text;
	}

	function emptag($var, $open, $close, $empty=""){
		$var = (empti($var))? $empty : $open.$var.$close;

		return $var;
	}

	if (!function_exists('textholder')){
		function textholder($string, $placeholder='-', $prefix='', $suffix=''){
			if (is_numeric($string)){
				$is_empty = ($string > 0)? false : true;
			} else {
				$is_empty = empti($string);
			}

			$return_string = $placeholder;

			if (!$is_empty){
				$return_string = $prefix.$string.$suffix;
			}

			return $return_string;
		}
	}


if (!function_exists('str_shorten')){
	function str_shorten($string, $length=75, $more="...", $show_full_text=false){
		$s = strip_tags($string);
		if (strlen($s) > $length) $s = substr($s, 0, $length) . $more;
		$s = ($show_full_text === false)? $s : '<abbr title="'.$string.'">'.$s.'</abbr>';

		return $s;
	}
}

if (!function_exists('str_shortag')){
	function str_shortag($string, $open="", $close="", $length=75, $more="..."){
		$s = $open . str_shorten($string, $length, $more, false) . $close;

		return $s;
	}
}

if (!function_exists('text_preview')){
	function text_preview($text, $limit){
		$text = strip_tags($text);
		$text = word_limiter($text, $limit);

		return $text;
	}
}


if (!function_exists('base64')){
	function base64($string){
		return str_replace('=', '', base64_encode($string));
	}
}

if (!function_exists('base64_uri')){
	function base64_uri($uri_string=null){
		if ($uri_string===null)
			$uri_string = uri_string();

		$uri = base64($uri_string);

		return $uri;
	}
}

if (!function_exists('$short_name')){
	function month_name($monthNum, $format='F'){ // change format to M for short 3-letter name
		return date($format, mktime(0, 0, 0, $monthNum, 10));
	}
}

if (!function_exists('nama_bulan')){
	function nama_bulan($month_code, $short_name=false){
		$month_code = str_pad($month_code, 2, '0', STR_PAD_LEFT);
		
		$month_name['01'] = 'Januari';
		$month_name['02'] = 'Februari';
		$month_name['03'] = 'Maret';
		$month_name['04'] = 'April';
		$month_name['05'] = 'Mei';
		$month_name['06'] = 'Juni';
		$month_name['07'] = 'Juli';
		$month_name['08'] = 'Agustus';
		$month_name['09'] = 'September';
		$month_name['10'] = 'Oktober';
		$month_name['11'] = 'November';
		$month_name['12'] = 'Desember';

		$name = ($short_name == true)? substr($month_name[$month_code],0,3) : $month_name[$month_code];

		return $name;
	}
}

function nama_uang($number){
	if (strlen($number)>12){
		$num = $number/1000000000000;
		$num = cshorten($num, 4, '');
		$num = $num . ' trilyun';
	} elseif (strlen($number)>9) {
		$num = $number/1000000000;
		$num = cshorten($num, 4, '');
		$num = $num . ' milyar';
	} elseif (strlen($number)>6) {
		$num = $number/1000000;
		$num = cshorten($num, 4, '');
		$num = $num . ' juta';
	} else {
		$num = $number;
	}


	return $num;
}

function c99_currency($number, $currency="Rp "){
	$currency = (!empty($currency))? $currency : "";
	$digit = $currency . number_format( $number , 0 , '' , '.' );

	return $digit;
}

if (!function_exists('is_negative')){
	function is_negative($number){
		$is_negative = ($number < 0)? true : false;
		return $is_negative;
	}
}


// DATETIME
if (!function_exists('current_date')){
	function current_date(){
		return date('Y-m-d H:i:s');
	}
}

	if (!function_exists('current_date_f')){
		function current_date_f($format="Y-m-d"){
			$date_str = date_f(current_date(), $format);

			return $date_str;
		}
	}

	if (!function_exists('date_validate')){
		function date_validate($date){ //dd(strtotime('2014-09-15'));
			if (checkdate(date('m',$date), date('d',$date), date('Y',$date)))
				return true;
			else
				return false;
		}
	}

	if (!function_exists('date_f')){
		function date_f($date,$format="d M Y"){
			$date = strtotime($date);

			if (date_validate($date))
				$date = date($format, $date);
			else
				$date = date($format);

			return $date;
		}
	}

	if (!function_exists('date_f_ina')){
		function date_f_ina($date,$format="%A, %e %B %Y"){
			setlocale(LC_TIME, "id_ID.UTF-8");

			$date = strtotime($date);

			if (date_validate($date))
				$date = strftime($format, $date);
			else
				$date = strftime($format);

			return $date;
		}
	}

	if (!function_exists('date_fs')){
		function date_fs($date){
			$date = date_f($date,'d-m-Y H:i');

			return $date;
		}
	}

	if (!function_exists('is_in_the_future')){
		function is_in_the_future($date){
			$date = strtotime($date);

			$is_in_the_future = ($date > time())? true : false;

			return $is_in_the_future;
		}
	}

if (!function_exists('days_diff')){
	function days_diff($start, $end, $use_strtotime=true){
		if ($use_strtotime === true){
			$start = strtotime($start);
			$end = strtotime($end);
		}

		$diff = $start - $end;
		$days_diff = floor($diff/(60*60*24));

		return $days_diff;
	}
}

if (!function_exists('months_diff')){
	function months_diff($start, $end){
		$diff = 0;

		$start_year = date('Y', strtotime($start));
		$end_year = date('Y', strtotime($end));
		$year_diff = $end_year - $start_year;

		$start_month = date('n', strtotime($start));
		$end_month = date('n', strtotime($end));

		if ($year_diff < 1){
			$diff = $end_month - $start_month;
		} else {
			if ($year_diff > 1) $diff = $diff + (($year_diff-1) * 12);

			$diff = $diff + (12 - $start_month);
			$diff = $diff + $end_month;
		}

		return $diff;
	}
}

if (!function_exists('months_count')){
	function months_count($start, $end){
		$count = months_diff($start, $end) + 1;

		return $count;
	}
}

if (!function_exists('starting_month')){
	function starting_month($date_end, $duration){
		$date_end = date('Y-m-01 00:00:00', strtotime($date_end));

		$duration_0 = $duration-1;

		$date_start = date('Y-m-01 00:00:00', strtotime($date_end.' -'.$duration_0.' month'));
		//$date_start = date('Y-m-01 00:00:00', strtotime($date_start.' +1 month'));

		return $date_start;
	}
}

if (!function_exists('last_day_of_the_month')){
	function last_day_of_the_month($date=false){
		$date = ($date === false)? date('Y-m-01 00:00:00') : date('Y-m-01 00:00:00', strtotime($date));

		$date = date('Y-m-01 00:00:00', strtotime($date.' +1 month'));
		$date = date('Y-m-d 23:59:59', strtotime($date.' -1 day'));

		//var_dump($date); die();

		return $date;
	}
}

if (!function_exists('date_min')){
	function date_min($d, $date='1970-00-00 00:00:00'){
		$date = ($d == '0000-00-00 00:00:00')? $date : $d;

		return $date;
	}
}

if (!function_exists('default_db_date')){
	function default_db_date($value, $format="Y-m-d"){
		$date = current_date_f($format);

		if (!empty($value)){
			$value = explode('-', $value);

			if (count($value) === 3){
				$date = $value;
			}
		}

		return $date;
	}
}



//CODEIGNITER

if (!function_exists('CI_controller_name')){
	function CI_controller_name(){
		$CI =& get_instance();
		$name = $CI->router->fetch_class();

		return $name;
	}
}

if (!function_exists('CI_file_exists')){
	function CI_file_exists($folder, $file){
		$path = APPPATH . $folder . '/' . $file .'.php';// dd($path);
		$model_exists = file_exists($path);

		return $model_exists;
	}
}

	if (!function_exists('CI_library_exists')){
		function CI_library_exists($file){
			return CI_file_exists('libraries',$file);
		}
	}

	if (!function_exists('CI_model_exists')){
		function CI_model_exists($file){
			return CI_file_exists('models',$file);
		}
	}

	if (!function_exists('CI_view_exists')){
		function CI_view_exists($file){
			return CI_file_exists('views',$file);
		}
	}



if (!function_exists('is_submit')){
	function is_submit(){
		$CI =& get_instance();
		//$is_submit = ($CI->input->post('is_submit'))? true : false;
		$is_submit = ($_SERVER['REQUEST_METHOD'] === "POST")? true : false;

		if (is_ajax() === true){
			$is_submit = ($CI->input->get_post('is_submit'))? true : false;
		}

		return $is_submit;
	}
}

	if (!function_exists('is_ajax')){
		function is_ajax(){
			$CI =& get_instance();
			$is_ajax = ($CI->input->get_post('is_ajax'))? true : false;
			return $is_ajax;
		}
	}

		if (!function_exists('json_ajax')){
			function json_ajax($array){
				header('Content-Type: application/json');
				echo json_encode($array);
			}
		}

	if (!function_exists('is_image')){
		function is_image($file_ext){
			$is_image = false;
			$file_exts = array('.jpeg', '.jpg', '.png', '.gif');

			foreach($file_exts as $ext){
				if (strtolower($file_ext) == $ext) $is_image = true;
			}

			return $is_image;
		}
	}



//IP ADDRESS
function get_ip_address() {
	return (empty($_SERVER['REMOTE_ADDR'])?(empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_CLIENT_IP']:$_SERVER['HTTP_X_FORWARDED_FOR']):$_SERVER['REMOTE_ADDR']);
}


// SECURITY/ENCRYPTION

if (!function_exists('encrypt_password')){
	function encrypt_password($password){
		$key = config_item('encryption_key');
		$password = sha1($password.$key);
		return $password;
	}
}

if (!function_exists('encrypt_token')){
	function encrypt_token($salt){
		$encryption_key = config_item('encryption_key');

		$token = md5($salt.current_date().$encryption_key);

		return $token;
	}
}


// ... Added 2014-05-27
if (!function_exists('str_compval')){
	function str_compval($str,$compstr,$val,$default=''){
		$string = ($str == $compstr)? $val : $default;
		return $string;
	}
}

if (!function_exists('str_compval_inv')){
	function str_compval_inv($str,$compstr,$val){
		$string = ($str != $compstr)? $val : '';
		return $string;
	}
}

if (!function_exists('class_active')){
	function class_active($id,$active_id=null,$classes='active',$inactive_classes=''){
		if ($active_id === null) $active_id = CI_controller_name();

		if (is_array($id))
			$class = (in_array($active_id, $id))? $classes : $inactive_classes;
		else
			$class = str_compval($id, $active_id, $classes, $inactive_classes);

		return $class;
	}
}

if (!function_exists('set_select_ext')){
	function set_select_ext($field_name, $str, $compstr){
		$compbool = ($str == $compstr)? TRUE : FALSE;

		$set_select = set_select($field_name, $str, $compbool);

		return $set_select;
	}
}

if (!function_exists('is_checked')){
	function is_checked($name, $val, $cur){ 
		if (is_array($cur))
			$checked = (in_array($val, $cur))? true : false;
		else
			$checked = ($cur == $val)? true : false;
		//var_dump($checked);
		$is_checked = ($checked)? ' checked' : '';

		return $is_checked;
	}
}


// ... Added 2014-06-09
if (!function_exists('arr_lastr')){
	function arr_lastr($array,$array_pos,$str){
		$array_last_pos = count($array) - 1;
		$arr_lastr = ($array_last_pos == $array_pos)? $str : '';

		return $arr_lastr;
	}
}

if (!function_exists('arr_postr')){ // Return string if $post is a factor of $postr
	function arr_postr($postr,$pos,$str){
		$pos++;
		$arr_postr = (($pos%$postr)==0)? $str : '';

		return $arr_postr;
	}
}

if (!function_exists('is_even')){
	function is_even($n){
		$is_even = false;

		if ($n % 2 == 0 && is_numeric($n))
			$is_even = true;

		return $is_even;
	}
}

if (!function_exists('is_odd')){
	function is_odd($n){
		$is_odd = (is_even($n))? false : true;

		return $is_odd;
	}
}


// ... Added 2014-08
if (!function_exists('control_url')){
	function control_url($url_string=''){
		$url_string = (!empty($url_string))? '/'.$url_string : $url_string;

		$url = site_url('control'.$url_string);

		return $url;
	}
}

if (!function_exists('array_in_array')){
	function array_in_array($needles, $haystack) {
		if (is_array($needles)){
			foreach ($needles as $needle) {
				if ( in_array($needle, $haystack) )
					return true;
			}
		} else
			return in_array($needles, $haystack);

		return false;
	}
}


// ... Added 2014-10-02
if (!function_exists('loop_str')){
	function loop_str($modulus,$i,$str,$zero=true){
		if ($zero === true && $i === 0)
			return $str;
		else {
			$loop_str = '';

			if (is_array($zero))
				$loop_str = arr_lastr($zero,$i,$str);

			$i++;

			if (empty($loop_str))
				$loop_str = ($i%$modulus === 0)? $str : '';

			return $loop_str;
		}
	}
}

// ... Added 2014-10-05 - Idul Adha Nasional

// source: http://stackoverflow.com/questions/7409512/new-line-to-paragraph-function
function nl2p($string, $line_breaks = true, $xml = true) {
	$string = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $string);

	// It is conceivable that people might still want single line-breaks
	// without breaking into a new paragraph.
	if ($line_breaks == true)
		return '<p>'.preg_replace(array("/([\n]{2,})/i", "/([^>])\n([^<])/i"), array("</p>\n<p>", '$1<br'.($xml == true ? ' /' : '').'>$2'), trim($string)).'</p>';
	else
		return '<p>'.preg_replace(
		array("/([\n]{2,})/i", "/([\r\n]{3,})/i","/([^>])\n([^<])/i"),
		array("</p>\n<p>", "</p>\n<p>", '$1<br'.($xml == true ? ' /' : '').'>$2'),

		trim($string)).'</p>';
}

// ... Added 2014-11-20

function glyphicon($name){
	$html = '<span class="glyphicon glyphicon-'.$name.'"></span>';

	return $html;
}

function glyph($name){
	return glyphicon($name);
}

function ti($name){ $name = url_title_lowercase($name);
	$html = '<i class="ti-'.$name.'"></i>';

	return $html;
}

function mdi($name){ $name = url_title_lowercase($name);
	$html = '<i class="zmdi zmdi-'.$name.'"></i>';

	return $html;
}

// .. Added 2015-01-15

function startsWith($haystack, $needle)
{
	 $length = strlen($needle);
	 return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
	$length = strlen($needle);
	if ($length == 0) {
		return true;
	}

	return (substr($haystack, -$length) === $needle);
}

// .. Added 2015-04-21

function mkdir_upload_path($upload_path){
	if (!is_dir($upload_path)) mkdir($upload_path);
}


// .. Added 2015-05-91

function url_title_lowercase($title, $and='dan'){
	if (CI_controller_name() == 'menu'){
		$title = str_replace('&', $and, $title);
	}

	return url_title(strtolower($title));
}


// .. Added 2015-05-10

function endsWith_remove($haystack, $needle){
	// The length of the needle as a negative number is where it would appear in the haystack
	$needle_position = strlen($needle) * -1;

	// If the last N letters match $needle
	if (substr($haystack, $needle_position) == $needle) {
		 // Then remove the last N letters from the string
		 $haystack = substr($haystack, 0, $needle_position);
	}

	return $haystack;
}

function endsWith_replace($search, $replace, $subject){
	$pos = strrpos($subject, $search);

	if($pos !== false)
	{
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}

	return $subject;
}

// .. Added 2015-08-24

/**
 * Replace language-specific characters by ASCII-equivalents.
 * @param string $s
 * @return string
 */
function normalizeChars($s) {
	$replace = array(
		'ъ'=>'-', 'Ь'=>'-', 'Ъ'=>'-', 'ь'=>'-',
		'Ă'=>'A', 'Ą'=>'A', 'À'=>'A', 'Ã'=>'A', 'Á'=>'A', 'Æ'=>'A', 'Â'=>'A', 'Å'=>'A', 'Ä'=>'Ae',
		'Þ'=>'B',
		'Ć'=>'C', 'ץ'=>'C', 'Ç'=>'C',
		'È'=>'E', 'Ę'=>'E', 'É'=>'E', 'Ë'=>'E', 'Ê'=>'E',
		'Ğ'=>'G',
		'İ'=>'I', 'Ï'=>'I', 'Î'=>'I', 'Í'=>'I', 'Ì'=>'I',
		'Ł'=>'L',
		'Ñ'=>'N', 'Ń'=>'N',
		'Ø'=>'O', 'Ó'=>'O', 'Ò'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'Oe',
		'Ş'=>'S', 'Ś'=>'S', 'Ș'=>'S', 'Š'=>'S',
		'Ț'=>'T',
		'Ù'=>'U', 'Û'=>'U', 'Ú'=>'U', 'Ü'=>'Ue',
		'Ý'=>'Y',
		'Ź'=>'Z', 'Ž'=>'Z', 'Ż'=>'Z',
		'â'=>'a', 'ǎ'=>'a', 'ą'=>'a', 'á'=>'a', 'ă'=>'a', 'ã'=>'a', 'Ǎ'=>'a', 'а'=>'a', 'А'=>'a', 'å'=>'a', 'à'=>'a', 'א'=>'a', 'Ǻ'=>'a', 'Ā'=>'a', 'ǻ'=>'a', 'ā'=>'a', 'ä'=>'ae', 'æ'=>'ae', 'Ǽ'=>'ae', 'ǽ'=>'ae',
		'б'=>'b', 'ב'=>'b', 'Б'=>'b', 'þ'=>'b',
		'ĉ'=>'c', 'Ĉ'=>'c', 'Ċ'=>'c', 'ć'=>'c', 'ç'=>'c', 'ц'=>'c', 'צ'=>'c', 'ċ'=>'c', 'Ц'=>'c', 'Č'=>'c', 'č'=>'c', 'Ч'=>'ch', 'ч'=>'ch',
		'ד'=>'d', 'ď'=>'d', 'Đ'=>'d', 'Ď'=>'d', 'đ'=>'d', 'д'=>'d', 'Д'=>'d', 'ð'=>'d',
		'є'=>'e', 'ע'=>'e', 'е'=>'e', 'Е'=>'e', 'Ə'=>'e', 'ę'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'Ē'=>'e', 'Ė'=>'e', 'ė'=>'e', 'ě'=>'e', 'Ě'=>'e', 'Є'=>'e', 'Ĕ'=>'e', 'ê'=>'e', 'ə'=>'e', 'è'=>'e', 'ë'=>'e', 'é'=>'e',
		'ф'=>'f', 'ƒ'=>'f', 'Ф'=>'f',
		'ġ'=>'g', 'Ģ'=>'g', 'Ġ'=>'g', 'Ĝ'=>'g', 'Г'=>'g', 'г'=>'g', 'ĝ'=>'g', 'ğ'=>'g', 'ג'=>'g', 'Ґ'=>'g', 'ґ'=>'g', 'ģ'=>'g',
		'ח'=>'h', 'ħ'=>'h', 'Х'=>'h', 'Ħ'=>'h', 'Ĥ'=>'h', 'ĥ'=>'h', 'х'=>'h', 'ה'=>'h',
		'î'=>'i', 'ï'=>'i', 'í'=>'i', 'ì'=>'i', 'į'=>'i', 'ĭ'=>'i', 'ı'=>'i', 'Ĭ'=>'i', 'И'=>'i', 'ĩ'=>'i', 'ǐ'=>'i', 'Ĩ'=>'i', 'Ǐ'=>'i', 'и'=>'i', 'Į'=>'i', 'י'=>'i', 'Ї'=>'i', 'Ī'=>'i', 'І'=>'i', 'ї'=>'i', 'і'=>'i', 'ī'=>'i', 'ĳ'=>'ij', 'Ĳ'=>'ij',
		'й'=>'j', 'Й'=>'j', 'Ĵ'=>'j', 'ĵ'=>'j', 'я'=>'ja', 'Я'=>'ja', 'Э'=>'je', 'э'=>'je', 'ё'=>'jo', 'Ё'=>'jo', 'ю'=>'ju', 'Ю'=>'ju',
		'ĸ'=>'k', 'כ'=>'k', 'Ķ'=>'k', 'К'=>'k', 'к'=>'k', 'ķ'=>'k', 'ך'=>'k',
		'Ŀ'=>'l', 'ŀ'=>'l', 'Л'=>'l', 'ł'=>'l', 'ļ'=>'l', 'ĺ'=>'l', 'Ĺ'=>'l', 'Ļ'=>'l', 'л'=>'l', 'Ľ'=>'l', 'ľ'=>'l', 'ל'=>'l',
		'מ'=>'m', 'М'=>'m', 'ם'=>'m', 'м'=>'m',
		'ñ'=>'n', 'н'=>'n', 'Ņ'=>'n', 'ן'=>'n', 'ŋ'=>'n', 'נ'=>'n', 'Н'=>'n', 'ń'=>'n', 'Ŋ'=>'n', 'ņ'=>'n', 'ŉ'=>'n', 'Ň'=>'n', 'ň'=>'n',
		'о'=>'o', 'О'=>'o', 'ő'=>'o', 'õ'=>'o', 'ô'=>'o', 'Ő'=>'o', 'ŏ'=>'o', 'Ŏ'=>'o', 'Ō'=>'o', 'ō'=>'o', 'ø'=>'o', 'ǿ'=>'o', 'ǒ'=>'o', 'ò'=>'o', 'Ǿ'=>'o', 'Ǒ'=>'o', 'ơ'=>'o', 'ó'=>'o', 'Ơ'=>'o', 'œ'=>'oe', 'Œ'=>'oe', 'ö'=>'oe',
		'פ'=>'p', 'ף'=>'p', 'п'=>'p', 'П'=>'p',
		'ק'=>'q',
		'ŕ'=>'r', 'ř'=>'r', 'Ř'=>'r', 'ŗ'=>'r', 'Ŗ'=>'r', 'ר'=>'r', 'Ŕ'=>'r', 'Р'=>'r', 'р'=>'r',
		'ș'=>'s', 'с'=>'s', 'Ŝ'=>'s', 'š'=>'s', 'ś'=>'s', 'ס'=>'s', 'ş'=>'s', 'С'=>'s', 'ŝ'=>'s', 'Щ'=>'sch', 'щ'=>'sch', 'ш'=>'sh', 'Ш'=>'sh', 'ß'=>'ss',
		'т'=>'t', 'ט'=>'t', 'ŧ'=>'t', 'ת'=>'t', 'ť'=>'t', 'ţ'=>'t', 'Ţ'=>'t', 'Т'=>'t', 'ț'=>'t', 'Ŧ'=>'t', 'Ť'=>'t', '™'=>'tm',
		'ū'=>'u', 'у'=>'u', 'Ũ'=>'u', 'ũ'=>'u', 'Ư'=>'u', 'ư'=>'u', 'Ū'=>'u', 'Ǔ'=>'u', 'ų'=>'u', 'Ų'=>'u', 'ŭ'=>'u', 'Ŭ'=>'u', 'Ů'=>'u', 'ů'=>'u', 'ű'=>'u', 'Ű'=>'u', 'Ǖ'=>'u', 'ǔ'=>'u', 'Ǜ'=>'u', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'У'=>'u', 'ǚ'=>'u', 'ǜ'=>'u', 'Ǚ'=>'u', 'Ǘ'=>'u', 'ǖ'=>'u', 'ǘ'=>'u', 'ü'=>'ue',
		'в'=>'v', 'ו'=>'v', 'В'=>'v',
		'ש'=>'w', 'ŵ'=>'w', 'Ŵ'=>'w',
		'ы'=>'y', 'ŷ'=>'y', 'ý'=>'y', 'ÿ'=>'y', 'Ÿ'=>'y', 'Ŷ'=>'y',
		'Ы'=>'y', 'ž'=>'z', 'З'=>'z', 'з'=>'z', 'ź'=>'z', 'ז'=>'z', 'ż'=>'z', 'ſ'=>'z', 'Ж'=>'zh', 'ж'=>'zh'
	);
	return strtr($s, $replace);
}


if (!function_exists('url_title_deaccent')){
	function url_title_deaccent($url){
		$s = url_title_lowercase($url);
		$s = normalizeChars($url);

		return $s;
	}
}

//FORM VALIDATION CALLBACKS
if (!function_exists('fv_not_required')){
	function fv_not_required($data){
		return true;
	}
}

if (!function_exists('fv_required_select')){
	function fv_required_select($data){ //dd(empty($data), 'required_select');
		$is_not_empty = (!empty($data))? true : false;
		//dd($is_not_empty);
		return $is_not_empty;
	}
}

if (!function_exists('fv_unique_field')){
	function fv_unique_field($new_value, $table_field){ //dd($new_value);
		if (empti($new_value))
			return true;

		$CI =& get_instance();

		$params = explode('.', $table_field);

		if (count($params) == 2 || count($params) == 3){
			$table = $params[0];
			$field = $params[1];

			if (count($params) == 3){
				$id = $params[2];

				$CI->db->where('id !=', $id);
			}

			if (db_entry_exists($table, $new_value, $field))
				return false;
			else
				return true;
		}

		return false;
	}
}

if (!function_exists('fv_field_exists')){
	function fv_field_exists($field_value, $table_field){ //dd($field_value);
		if (empti($field_value))
			return true;

		$CI =& get_instance();

		$params = explode('.', $table_field);

		if (count($params) > 0){
			$table = $params[0];
			$field = 'id';

			if (count($params) > 1){
				$field = $params[1];
			}

			if (db_entry_exists($table, $field_value, $field))
				return true;
			else
				return false;
		} else {
			return false;
		}
	}
}



//	================================================================================================
// .. Added 2016-09-09
// dependencies for save_file and save_image
//	================================================================================================



if (!function_exists('upload_file')){
	function upload_file($field='userfile', $config_preset=null, $options, $display_errors=false){
		$CI =& get_instance();
		$CI->load->library('upload');

		//default options

		extract(options_upload_file($options));

		$config = options_upload_file_config($config_preset);

		$config['upload_path'] = $upload_path; 
		//dd($config['upload_path'], 'upload_path');
		$CI->upload->initialize($config);

		if (!is_dir($upload_path)) { 
			mkdir($upload_path);
		}

		$file = null;

		if ($CI->upload->do_upload($field)){
			$file = $CI->upload->data();

			$delete_file = (!empty($delete_file))? unserialize($delete_file) : $delete_file;

			if (!empty($delete_file)){
				delete_uploaded_file($upload_path, $delete_file);
			}
		} else {
			if ($display_errors){
				//dd($CI->upload->display_errors(),'upload_errors');
			}
			//var_dump($field);
			//dd($config);
		}

		return $file;
	}
}

	if (!function_exists('upload_img')){
		function upload_img($field, $options, $serialize=false){
			$file = upload_file($field, 'image', $options);
			//dd($file);
			if ($file !== null){
				if (array_key_exists('upload_path', $options)) {
					exif_orientation_fix($file['file_name'], $options['upload_path']);
				}

				if (array_key_exists('thumb', $options) && array_key_exists('upload_path', $options)) {
					create_thumb($file, $options['thumb'], $options['upload_path']);
				}

				if ($serialize === true)
					$file = serialize($file);
			}

			return $file;
		}
	}

	if (!function_exists('upload_img_s')){
		function upload_img_s($field, $options){
			$file = upload_img($field, $options, true);

			return $file;
		}
	}

		if (!function_exists('upload_img_tag')){
			function upload_img_tag($file_url, $file_name, $use_thumb=true, $use_anchor=true){
				$html = '';

				$file_url = trim_slashes($file_url).'/';

				$full_url = base_url().$file_url.$file_name;
				$file_ext = (($t=strrchr($file_name,'.'))!==false?$t:'');
				$raw_name = str_replace($file_ext, '', $file_name);
				$full_thumb_url = base_url().$file_url.$raw_name . '_thumb' . $file_ext;

				$img_url = ($use_thumb === true)? $full_thumb_url : $full_url;

				if (!empty($file_name)){
					$img = '<img src="'.$img_url.'" border="0" />';

					$html .= ($use_anchor === true)? anchor($full_url, $img, 'target="_blank" class="lightbox"') : $img;
				}

				return $html;
			}
		}




	if (!function_exists('delete_uploaded_file')){
		function delete_uploaded_file($file_path, $file_name){
			$file_path = rtrim($file_path, '/') . '/';
			$file_name = (is_array($file_name))? $file_name['file_name'] : $file_name;

			if (!empty($file_name)){
				$full_path = $file_path . $file_name;
				$file_ext = (($t=strrchr($file_name,'.'))!==false?$t:'');
				$raw_name = str_replace($file_ext, '', $file_name);

				$full_thumb_path = $file_path . $raw_name . '_thumb' . $file_ext;

				if (file_exists($full_path)) unlink($full_path);
				if (file_exists($full_thumb_path)) unlink($full_thumb_path);
			}

			//var_dump($full_path);
			//die('delete_done');
		}
	}



//	================================================================================================
// .. Added 2016-06-20
// save_file & save_image: Dependent on 'upload_file' and 'upload_img'
// adapted from models/comfo.php
//	================================================================================================



if (!function_exists('save_file')){
	function save_file($name, $upload_path, $filetype=null, $delete_file=false){
		$params['upload_path'] = $upload_path;

		if ($delete_file !== false)
			$params['delete_file'] = $delete_file;

		$file = upload_file($name, $filetype, $params);

		if (is_array($file))
			$file = serialize($file);

		return $file;
	}
}

if (!function_exists('save_image')){
	function save_image($name, $upload_path, $thumb=false, $delete_file=false){
		$params['upload_path'] = $upload_path;

		if ($delete_file !== false)
			$params['delete_file'] = $delete_file;

		if ($thumb !== false)
			$params['thumb'] = $thumb;

		$file = upload_img($name, $params, true);

		return $file;
	}
}

if (!function_exists('error_class')){
	function error_class($field, $class='is-invalid'){
		$form_error = form_error($field);

		if ( !empty($form_error) )
			return $class;
		else
			return '';
	}
}

if (!function_exists('error_block')){
	function error_block($field){
		return form_error($field, '<div class="invalid-feedback">','</div>');
	}
}

if (!function_exists('validation_block')){
	function validation_block($classes='alert alert-danger col-10'){
		$CI =& get_instance();

		$errors = '';
		$errors = validation_errors();
		$errors .= $CI->session->flashdata('errors');

		return emptag($errors, '<div class="'.$classes.'">', '</div>');
	}
}

if (!function_exists('gender')){
	function gender($g){
		$genders = array(
			'L' => 'Pria',
			'P' => 'Wanita'
		);

		$string = (array_key_exists($g, $genders))? $genders[$g] : $genders['L'];

		return $string;
	}
}


//	================================================================================================
// .. Added 2017-03-02
// object to unordered list
//	================================================================================================

if (!function_exists('object_to_ul')){
	function object_to_ul($object){
		$html = '';

		if (is_object($object)){ $object = (array) $object;
			$html .= '<ul>';
				foreach ($object as $key => $value){
					$html .= '<li>';
					if (is_object($value)){
						$html .= "$key:";
						$html .= object_to_ul($value);
					} elseif (is_array($value)){
						$html .= "$key:";
						$html .= array_to_ul($value);
					} else {
						$html .= "$key: $value";
					}
					$html .= '</li>';
				}
			$html .= '</ul>';
		}

		return $html;
	}
}

if (!function_exists('array_to_ul')){
	function array_to_ul($array){
		$html = '';

		if (is_array($array)){
			$html .= '<ul>';
				foreach ($array as $key => $value){
					$html .= '<li>';
					if (is_array($value)){
						$html .= array_to_ul($value);
					} else {
						$html .= "$key: $value";
					}
					$html .= '</li>';
				}
			$html .= '</ul>';
		}

		return $html;
	}
}


//	================================================================================================
// FROM WORDPRESS functions.php
/**
 * Unserialize value only if it was serialized.
 *
 * @since 2.0.0
 *
 * @param string $original Maybe unserialized original, if is needed.
 * @return mixed Unserialized data can be any type.
 */
function maybe_unserialize( $original ) {
	if ( is_serialized( $original ) ) // don't attempt to unserialize data that wasn't serialized going in
		return @unserialize( $original );
	return $original;
}

/**
 * Check value to find if it was serialized.
 *
 * If $data is not an string, then returned value will always be false.
 * Serialized data is always a string.
 *
 * @since 2.0.5
 *
 * @param string $data   Value to check to see if was serialized.
 * @param bool   $strict Optional. Whether to be strict about the end of the string. Default true.
 * @return bool False if not serialized and true if it was.
 */
function is_serialized( $data, $strict = true ) {
	// if it isn't a string, it isn't serialized.
	if ( ! is_string( $data ) ) {
		return false;
	}
	$data = trim( $data );
	if ( 'N;' == $data ) {
		return true;
	}
	if ( strlen( $data ) < 4 ) {
		return false;
	}
	if ( ':' !== $data[1] ) {
		return false;
	}
	if ( $strict ) {
		$lastc = substr( $data, -1 );
		if ( ';' !== $lastc && '}' !== $lastc ) {
			return false;
		}
	} else {
		$semicolon = strpos( $data, ';' );
		$brace     = strpos( $data, '}' );
		// Either ; or } must exist.
		if ( false === $semicolon && false === $brace )
			return false;
		// But neither must be in the first X characters.
		if ( false !== $semicolon && $semicolon < 3 )
			return false;
		if ( false !== $brace && $brace < 4 )
			return false;
	}
	$token = $data[0];
	switch ( $token ) {
		case 's' :
			if ( $strict ) {
				if ( '"' !== substr( $data, -2, 1 ) ) {
					return false;
				}
			} elseif ( false === strpos( $data, '"' ) ) {
				return false;
			}
			// or else fall through
		case 'a' :
		case 'O' :
			return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
		case 'b' :
		case 'i' :
		case 'd' :
			$end = $strict ? '$' : '';
			return (bool) preg_match( "/^{$token}:[0-9.E-]+;$end/", $data );
	}
	return false;
}

function createColumnsArray($end_column, $first_letters = ''){
  $columns = array();
  $length = strlen($end_column);
  $letters = range('A', 'Z');

  // Iterate over 26 letters.
  foreach ($letters as $letter) {
	  // Paste the $first_letters before the next.
	  $column = $first_letters . $letter;

	  // Add the column to the final array.
	  $columns[] = $column;

	  // If it was the end column that was added, return the columns.
	  if ($column == $end_column)
		  return $columns;
  }

  // Add the column children.
  foreach ($columns as $column) {
	  // Don't itterate if the $end_column was already set in a previous itteration.
	  // Stop iterating if you've reached the maximum character length.
	  if (!in_array($end_column, $columns) && strlen($column) < $length) {
		  $new_columns = createColumnsArray($end_column, $column);
		  // Merge the new columns which were created with the final columns array.
		  $columns = array_merge($columns, $new_columns);
	  }
  }

  return $columns;
}

/* End of file common_helper.php */
/* Location: ./application/helpers/common_helper.php */
