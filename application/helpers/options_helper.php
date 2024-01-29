<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
	C99 by Muhammad Dahri 
	http://commongoodguy.com/ 
*/

//	================================================================================================



function options_upload_file($options){
	$o['delete_file'] = false;
	$o['upload_path'] = 'uploads';

	$options = array_merge($o, $options);

	return $options;
}

function options_upload_file_config($config=null){
	if (!is_array($config)){
		switch ($config) {
			case 'image':
				$config = Array(
					'allowed_types' => 'jpg|jpeg|png|gif|bmp|webp',
					'encrypt_name' => TRUE,
					'max_size' => 8192,
					'remove_spaces' => TRUE
				);
				break;
			
			case 'xlsx':
				$config = Array(
					'allowed_types' => 'xlsx|ods',
					'encrypt_name' => TRUE,
					'max_size' => 8192,
					'remove_spaces' => TRUE
				);
				break;

			case 'doc':
				$config = Array(
					'allowed_types' => 'pdf|txt|rtf|doc|docx|xls|xlsx|ppt|pptx|odt|ods|odg|odp|odf|odc|odb',
					'encrypt_name' => FALSE,
					'max_size' => 8192,
					'remove_spaces' => TRUE
				);
				break;

			case 'mp4':
				$config = Array(
					'allowed_types' => 'mp4',
					'encrypt_name' => FALSE,
					'max_size' => 102400,
					'remove_spaces' => TRUE
				);
				break;

			case 'pdf':
				$config = Array(
					'allowed_types' => 'pdf',
					'encrypt_name' => FALSE,
					'max_size' => 8192,
					'remove_spaces' => TRUE
				);
				break;

			default:
				$config = Array(
					'allowed_types' => 'pdf|txt|rtf|doc|docx|xls|xlsx|ppt|pptx|odt|ods|odg|odp|odf|odc|odb|zip|jpg|jpeg|png|gif|bmp|tif|tiff|webp',
					'encrypt_name' => FALSE,
					'max_size' => 8192,
					'remove_spaces' => TRUE
				);
				break;
		}
	}

	return $config;
}

function options_img_thumb($options){
	$o['marker'] = '_thumb';
	$o['fullsize'] = false;

	$options = array_merge($o, $options);

	return $options;
}

function options_populate_select($options){
	$o['field_name'] = null;
	$o['selected'] = null;
	$o['data'] = array();
	$o['multiple'] = false;
	$o['default_text'] = null;
	$o['default_value'] = '';

	$options = array_merge($o, $options);

	return $options;
}



/* End of file helper/options_helper.php */