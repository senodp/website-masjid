<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
	C99 by Muhammad Dahri 
	http://commongoodguy.com/ 
*/

//	================================================================================================



function populate_select($rows, $field_name=null, $selected=null, $data=array(), $default_text=null, $multiple=false, $default_value = ''){
	$html = ($multiple === false && $default_text !== null)? '<option value="'.$default_value.'">'.$default_text.'</option>' : '';

	//var_dump($html); die();

	foreach ($rows as $i => $r) {
		$name = $r['select_name'];
		$value = (array_key_exists('select_value',	$r))? $r['select_value'] : $r['select_name'];

		if ($field_name !== null && $selected !== null){
			$is_selected = ($value == $selected)? true : false;
			$set_select = set_select($field_name, $value, $is_selected);
		} elseif ($field_name !== null && $selected === null){
			$set_select = set_select($field_name, $value);
		} else {
			$set_select = '';
		}

		$data_attr = '';
		
		foreach($data as $d){
			$data_attr .= 'data-'.$d.'="'.$r[$d].'" ';
		}

		$html .= '<option value="'.$value.'" '.$set_select.' '.$data_attr.'>'.$name.'</option>';
	}

	return $html;
}

	function populate_select_ex($rows, $options){
		extract(options_populate_select($options));

		$html = populate_select($rows, $field_name, $selected, $data, $default_text, $multiple, $default_value);

		return $html;
	}

function populate_select_db($table, $default_text='Select an Option', $selected='', $options=array()){
	$CI =& get_instance();
	//dd($selected);
	$name_field='name'; $value_field='id';

	extract($options);

	if (isset($where)){
		if (is_array($where)){
			foreach($where as $field=>$value){
				$CI->db->where($field, $value);
			}
		}
	}

	$CI->db->order_by('id', 'ASC');
	$CI->db->select("$name_field as select_name, $value_field as select_value");
    $rows = db_entries($table);// dd($rows);

    $options['default_text'] 	= $default_text;
    $options['selected']		= $selected;

    $html = populate_select_ex($rows, $options);

    return $html;
}

function populate_select_featured_showcase_db($table, $default_text='Select an Option', $selected='', $options=array()){
	$CI =& get_instance();
	//dd($selected);
	$name_field='name'; $value_field='id';

	extract($options);

	if (isset($where)){
		if (is_array($where)){
			foreach($where as $field=>$value){
				$CI->db->where($field, $value);
			}
		}
	}

	$CI->db->where('common_page', 10);
	$CI->db->order_by($name_field, 'ASC');
	$CI->db->select("$name_field as select_name, $value_field as select_value");
    $rows = db_entries($table);// dd($rows);

    $options['default_text'] 	= $default_text;
    $options['selected']		= $selected;

    $html = populate_select_ex($rows, $options);

    return $html;
}




/* End of file helper/populate_helper.php */