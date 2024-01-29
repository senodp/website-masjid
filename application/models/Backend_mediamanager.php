<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_mediamanager extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function _index($media_page=null){ //die('something');
		//$media_page = uri_segment(4);

		$data = array('subtitle' => 'Media Manager', 'modal_size' => 'modal-lg');
		
		$data['files'] = array();
		$data['media_page'] = $media_page;

		if (is_string($media_page)){
			$file_path = 'uploads/'.'media/'.url_title_lowercase($media_page).'/';

			if (!is_dir($file_path)) 
				mkdir($file_path);

			$data['files'] = dir_list($file_path);
		} //dd($media_page);

		return $data;
    }
    
        function _index_save($media_page=null){
			$data = ['mediamanager' => true];
			
			if (is_string($media_page)){
				$file_path = 'uploads/media/'.url_title_lowercase($media_page).'/';

				if (!is_dir($file_path)) 
					mkdir($file_path);

				upload_file('file', null, array('upload_path'=>$file_path));

				$data = $this->_index($media_page);

				return $data;
			} else {
				die(json_encode($data));
			}
        }
}

/* End of file models/Backend_mediamanager.php */
