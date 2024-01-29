<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

if (!function_exists('languages')){
	function languages($include_default=true, $two_char_code=false){
		if ($two_char_code === true)
			$languages = array('en','id');
		else
			$languages = array('eng','ind');

		if ($include_default === false)
			array_shift($languages);

		return $languages;
	}
}

if (!function_exists('lang_url')){
	function lang_url($uri_string){
		if (uri_segment(1) == 'control'){
			return site_url($uri_string);
		} else {
			return site_url(lang_preferred(true).'/'.$uri_string);
		}
	}
}

	if (!function_exists('current_lang_url')){
		function current_lang_url($language){
			if (in_array($language, languages(true, true))){
				return site_url($language.'/'.lang_uri_string());
			}
		}
	}

if (!function_exists('lang_uri_string')){
	function lang_uri_string(){
		$uri_string = uri_string();

		if ( in_array($uri_string, ['en', 'id']) || in_array($uri_string, ['en/', 'id/']) ){
			$uri_string = '';
		} else {
			if (substr($uri_string, 0, 3) == 'en/'){ 
				$uri_string = substr($uri_string, 3);
			} elseif (substr($uri_string, 0, 3) == 'id/'){
				$uri_string = substr($uri_string, 3);
			}
		}

		return $uri_string;
	}
}


if (!function_exists('lang_name')){
	function lang_name($lang_code){
		$languages = array(
			'eng' => 'English',
			'ind' => 'Indonesia'
		);

		$language = '';

		if (array_key_exists($lang_code, $languages)){
			$language = $languages[$lang_code];
		}

		return $language;
	}
}

	if (!function_exists('lang_exists')){
		function lang_exists($lang_code){
			$lang_exists = (!empty(lang_name($lang_code)))? true : false;

			return $lang_exists;
		}
	}

if (!function_exists('lang_code')){
	function lang_code($key=0){
		$languages = languages(true);

		if (array_key_exists($key, $languages))
			return $languages[$index];
		else
			return $languages[0];
	}
}

if (!function_exists('lang_text')){
	function lang_text($primary, $ind){
		$text = $primary;

		if (lang_preferred() == 'ind' && !empty($ind)){
			$text = $ind;
		}

		return $text;
	}
}

if (!function_exists('lang_default')){
	function lang_default(){
		$languages = languages();

		return $languages[0];
	}
}

if (!function_exists('lang_preferred')){
	function lang_preferred($two_char_code=false){
		$CI =& get_instance();

		$lang_preferred = $CI->session->userdata('language_preference');

		$lang_preferred = ($lang_preferred && in_array($lang_preferred, languages()))? $lang_preferred : lang_default();

		if (uri_segment(1) == 'control'){
			$lang_preferred = lang_default();
		}

		if ($two_char_code === true){
			$lang_preferred = ($lang_preferred == 'eng')? 'en' : 'id';
		}

		return $lang_preferred;
	}
}

if (!function_exists('is_default_language_preferred')){
	function is_default_language_preferred($lang=null){
		if ($lang === null){
			$lang = lang_preferred();
		}

		$is_default_language_preferred 	= ($lang == lang_default())? true : false;

		return $is_default_language_preferred;
	}
}

if (!function_exists('lang_url')){
	function lang_url($path=''){
		$lang = lang_preferred();

		return site_url($lang.'/'.$path);
	}
}

	if (!function_exists('lang_current_url')){
		function lang_current_url($lang){
			$url = current_url();
			//dd($url);
			if (in_array($lang, languages())){
				$url = site_url(substr_replace(uri_string(), $lang, 0, 2));
			}

			return $url;
		}
	}

if (!function_exists('lang_field')){
	function lang_field($row, $field, $lang=null){
		if (!is_default_language_preferred($lang) && lang_exists($lang)){
			$lang_field = $lang.'_'.$field;

			if (array_key_exists($lang_field, $row)){
				return $row[$lang_field];
			}
		}

		if (array_key_exists($field, $row)){
			return $row[$field];
		} else {
			return '';
		}
	}
}

/* End of file multilanguage_helper.php */
/* Location: ./application/helpers/multilanguage_helper.php */
