<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

// SET DEFAULT OPTIONS

function create_thumb_options($options){
	$o['marker'] = '_thumb';
	$o['use_cropping'] = true;
	$o['dimension'] = null;

	$options = (is_array($options))? array_merge($o, $options) : $o;

	return $options;
}


/* CREATE THUMB - START */

if (!function_exists('create_thumb')){
	function create_thumb($file, $thumb, $upload_path, $options=array()){// dd($thumb);
		if (!is_array($thumb))
			$thumbs = array($thumb);
		else
			$thumbs = $thumb;

		extract(create_thumb_options($options));

		foreach ($thumbs as $i=>$value) {// dd($marker);
			if ($i > 0)
				$options['marker'] = $marker.'_'.$i;

			extract(create_thumb_options($options));

			$upload_path = trim_slashes($upload_path).'/';
			$path = (isset($source_path) === true)? $source_path : $upload_path;
			$path = trim_slashes($path).'/';

			if (is_string($file)){
				$file = img_data($file, $path);
			}

			$source_image = $path . $file['file_name'];
			$to = array_combine(array('width', 'height'), explode('x', $value));

			$create_thumb = ($marker === false)? false : true;
			//dd(is_file($source_image), 'is_file_source_image');
			//dd($upload_path, 'upload_path');
			if (is_file($source_image)){
				//if current image size is the same as thumbnail size, then no image processing required,
				//proceed with copying image file and name it as thumbnail
				if ($file['image_width'] == $to['width'] && $file['image_height'] == $to['height']){
					$new_marker = ($marker === false)? '' : $marker;
					$new_image = $upload_path . $file['raw_name'] . $new_marker . $file['file_ext'];
					copy($source_image, $new_image);
				} else
					create_thumb_now($file, $value, $upload_path, $options);
			}
		}
	}
}

if (!function_exists('create_thumb_now')){
	function create_thumb_now($file, $thumb, $upload_path, $options=array()){

		extract(create_thumb_options($options));

		// $file['file_name'] = strtolower($file['file_name']);
		// $file['raw_name'] = strtolower($file['raw_name']);
		// $file['file_ext'] = strtolower($file['file_ext']);

		$upload_path = trim_slashes($upload_path).'/';
		$path = (isset($source_path) === true)? $source_path : $upload_path;
		$path = trim_slashes($path).'/';

		$source_image = $path . $file['file_name'];
		$to = array_combine(array('width', 'height'), explode('x', $thumb));

		$create_thumb = ($marker === false)? false : true;


		$CI =& get_instance();
		$CI->load->library('image_lib');

		//RESIZING - START
		//calculate whether to resize based on width or height - new algorithm
		$final_width = $file['image_width'] * ($to['height'] / $file['image_height']);
		$final_height = $file['image_height'] * ($to['width'] / $file['image_width']);
		$master_dim = ($final_height < $to['height'])? 'height' : 'width';

		//configure options based on provided data and calculation
		$resize_config['source_image'] = $source_image;
		$resize_config['master_dim'] = $master_dim;//($dimension === null)? $master_dim : $dimension;
		$resize_config['maintain_ratio'] = true;
		$resize_config['dynamic_output'] = false;
		$resize_config['thumb_marker'] = $marker;
		$resize_config['create_thumb'] = $create_thumb;

		if ($to['width'] == '0'){
			$use_cropping = false;
			$resize_config['master_dim'] = 'height';
			$resize_config['width'] = 1;
		} else
			$resize_config['width'] = $to['width'];

		if ($to['height'] == '0'){
			$use_cropping = false;
			$resize_config['master_dim'] = 'width';
			$resize_config['height'] = 1;
		} else
			$resize_config['height'] = $to['height'];

		//if (isset($source_path)){
			$resize_config['new_image'] = $upload_path . strtolower($file['file_name']);
		//}

		//dd($resize_config);
		//send configuration to image library
		$CI->image_lib->initialize($resize_config);
		if  (!$CI->image_lib->resize() && !is_production() )
			dd($CI->image_lib->display_errors());

		$thumb_image = $upload_path . strtolower($file['raw_name']) . $marker . strtolower($file['file_ext']);

		$CI->image_lib->clear();
		//RESIZING - END


		//CROPPING - START
		//crop image to specified thumbnail width/height

		if ($use_cropping === true){
			$master_dim = (empty($dimension))? $master_dim : $dimension;

			if ((($master_dim == 'height') && ($final_height < $to['height'])) || (($master_dim == 'width') && ($final_width < $to['width'])) ){

				//calculate x and y axis for cropping
				if ($master_dim == 'height'){
					$crop_config['x_axis'] = ($final_width/2) - ($to['width']/2);
					$crop_config['y_axis'] = 0;
				} elseif ($master_dim == 'width'){
					$crop_config['x_axis'] = 0;
					$crop_config['y_axis'] = ($final_height/2) - ($to['height']/2);
				}

				//configure options based on provided data and calculation
				if ($create_thumb === true)
					$crop_config['source_image'] = $upload_path . strtolower($file['raw_name']) . $marker . strtolower($file['file_ext']);
				else
					$crop_config['source_image'] = $upload_path . strtolower($file['file_name']);

				$crop_config['width'] = $to['width'];
				$crop_config['height'] = $to['height'];
				$crop_config['master_dim'] = ($dimension === null)? 'auto' : $dimension;
				$crop_config['maintain_ratio'] = false;
				$crop_config['create_thumb'] = false;
				$crop_config['dynamic_output'] = false;
				$crop_config['thumb_marker'] = false;
				$crop_config['new_image'] = $crop_config['source_image'];

				//send configuration to image library
				$CI->image_lib->initialize($crop_config);
				$CI->image_lib->crop();
				//dd($crop_config);
			}
		}
		//CROPPING - END
	}
}

/* CREATE THUMB - END */



/* IMAGE CACHE - START */

if (!function_exists('create_thumb_cache')){
	function create_thumb_cache($file,$folder,$thumb_size,$thumb_default='',$return_url=true,$options=array()){
		if (is_serialized($file)){
			$file = unserialize($file);
		}

		if (is_array($file)){
			if (array_key_exists('file_name', $file)){
				$file = $file['file_name'];
			}
		}

		$filename = $file;// return $filename;
		$filename_thumb_url = $thumb_default;

		if (is_string($filename)){
			$original_path = 'uploads/'.$folder.'/';
			$file_path = 'uploads/cache/'.$folder.'/';
			
			if (!is_dir($file_path)) {
				//dd(is_dir($original_path), 'is_dir');
				//dd($file_path);
				mkdir($file_path);
				//dd($file_path);
			}
			//dd($filename);
			$filename = str_replace(site_url(), '', $filename);
			$filename = str_replace($original_path, '', $filename);
			//dd($filename);
			$ext 		= strrchr($filename, '.');
			$raw_name 	= substr($filename, 0, '-' . strlen($ext));
			$thumb_marker = '_thumb_'.$thumb_size;

			$filename_thumb = $raw_name.$thumb_marker.$ext;
			//dd($filename_thumb);
			$filename_thumb = strtolower($filename_thumb);
			$filename_thumb_path = $file_path.$filename_thumb;
			$filename_exists = Filename_NC($original_path, $filename); //var_dump($file_path); var_dump($filename);
			//dd($filename_exists);
			if (!is_file($filename_thumb_path) && $filename_exists){// die('true');
				//dd($file);

				$options['source_path'] = $original_path;
				$options['marker'] = $thumb_marker;

				create_thumb($file,$thumb_size,$file_path,$options);
			} //dd($filename_thumb_path, 'path'); 
			//dd(is_file($filename_thumb_path), 'is_file');

			if ($return_url === true && is_file($filename_thumb_path)){ // return URL instead of PATH
				$filename_thumb_url = site_url().$filename_thumb_path;
			} elseif ($return_url === false && is_file($filename_thumb_path)){
				$filename_thumb_url = $filename_thumb_path;
			}
		}


		//dd($filename_thumb_url);
		return $filename_thumb_url;
	}
}

if (!function_exists('imgcache_url')){
	function imgcache_url( $file, $folder, $thumb_size, $thumb_default='', $options=array() ){
		$url = create_thumb_cache( $file, $folder, $thumb_size, $thumb_default, true, $options );
		return $url;
	}
}

/* IMAGE CACHE - END */


// FIX EXIF ROTATION
if (!function_exists('exif_orientation_fix')){
	function exif_orientation_fix($filename, $path){
		$source_image = $path.'/'.$filename;

		$exif_data = @exif_read_data($source_image, 'IFD0');

		if (is_array($exif_data)){
			if (array_key_exists('Orientation', $exif_data)){
				$CI =& get_instance();
				$CI->load->library('image_lib');

				$rotate_config['source_image'] = $source_image;
				$rotate_config['new_image'] = $source_image;

				switch($exif_data['Orientation']) {
		            case 3:
		                $rotate_config['rotation_angle']='180';
		                break;
		            case 6:
		                $rotate_config['rotation_angle']='270';
		                break;
		            case 8:
		                $rotate_config['rotation_angle']='90';
		                break;
		        }

		        if (array_key_exists('rotation_angle', $rotate_config)){
		        	$rotate_config['maintain_ratio'] 	= false;
		        	$rotate_config['create_thumb'] 		= false;
		        	$rotate_config['dynamic_output'] 	= false;
		        	$rotate_config['thumb_marker'] 		= false;

		        	$CI->image_lib->initialize($rotate_config);

		        	if  (!$CI->image_lib->rotate() && !is_production() )
		        		dd($CI->image_lib->display_errors());
		        }

		        $CI->image_lib->clear();
			}
		}
	}
}
// FIX EXIF ROTATION - END



/* OTHERS START */

function Filename_NC($directory, $filename){
	$CI =& get_instance();
	$CI->load->helper('directory');

	$real_filename = false;

	$files = directory_map($directory, 1); //dd($files);

	if ($files){
		foreach ($files as $file){
			if (strtolower($file) == strtolower($filename)){
				$real_filename = $file;
			}
		}
	}

	return $real_filename;
}

if (!function_exists('img_data')){
	function img_data($file,$path,$error_data=array('file_name'=>'','file_ext'=>'','raw_name'=>'')){
		$path = trim_slashes($path).'/';

		$file_name = $file;
		$file_path = $path.$file;
		$file_error = true;
		//dd($file_path);
		if (is_file($file_path)){
			$size = getimagesize($file_path);
			//dd($size);
			if ($size){
				$file = array('file_name'=>$file_name, 'image_width'=>$size[0], 'image_height'=>$size[1]);
				$file['file_ext'] = strrchr($file_name, '.');
				$file['raw_name'] = substr($file_name, 0, '-' . strlen($file['file_ext']));

				$file_error = false;
			}
		}
		//dd($file_error);
		if ($file_error === true)
			$file = $error_data;

		return $file;
	}
}

/* OTHERS END */

/* End of file image_helper.php */
/* Location: ./application/helpers/image_helper.php */