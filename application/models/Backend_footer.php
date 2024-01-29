<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_footer extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array('subtitle' => 'Index');

		$slides = db_entries('slides');
		$data['slides'] = $slides;

		$reach = db_entries('reach');
		$data['reach'] = $reach;

		return $data;
	}

	function _certification(){
		option_save('footer_certification', null, 'image');

		$new_image = option_image_url('footer_certification', 'holder.js/800x600?auto=yes');

		$response = array(
			'container' => '#footer-certification-image',
			'propName' => 'src',
			'propValue' => $new_image
		);

		die(json_encode($response));
	}

}

/* End of file models/Backend_home.php */
