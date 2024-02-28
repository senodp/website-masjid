<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
	v.2.5
*/

if (!function_exists('Tanabe_active_menu')){
	function active_menu($Page, $Menu){
		$html = '';
		
		if ($Page['id'] == $Menu['id'] || $Page['id_parent'] == $Menu['id']){
			$html = 'active';
		}

		return $html;
	}
}

if (!function_exists('form_set_recaptcha')){
	function form_set_recaptcha(){
		if (is_production())
			form_set('g-recaptcha-response', 'reCAPTCHA', 'required|callback_fv_recaptcha');
	}
}

if (!function_exists('pagination')){
	function pagination(){
		$config['use_page_numbers'] = true;
		// $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_open'] = '<ul class="pagi-nation margin-top-40 d-flex justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li class="">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['next_link'] = 'Next';
		$config['first_link'] = '&lt;&lt;';
		$config['last_link'] = '&gt;&gt;';
		$config['num_links'] = 7;

		return $config;
	}
}

if (!function_exists('pagination_cms')){
	function pagination_cms(){
		$config['use_page_numbers'] = true;
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		// $config['full_tag_open'] = '<ul class="pagi-nation margin-top-40 d-flex justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class=""> &nbsp;';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '&nbsp; <li style="padding-left:10px;padding-right:10px;font-size:14px;background-color:#71b6f9;border-radius:20px;" class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li> &nbsp;';
		$config['next_tag_open'] = '<li class="">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '<b style="font-size: 14px;">Prev</b> &nbsp;';
		$config['next_link'] = '&nbsp; <b style="font-size: 14px;">Next</b>';
		$config['first_link'] = '&lt;&lt;';
		$config['last_link'] = '&gt;&gt;';
		$config['num_links'] = 7;

		return $config;
	}
}

if (!function_exists('attachments')){
	function attachments($collection){
		$CI =& get_instance();

		$CI->db->where('collection', $collection);
		return db_entries('attachments');
	}
}

if (!function_exists('highlights')){
	function highlights(){
		return db_entries('highlights');
	}
}

if (!function_exists('Tanabe_title')){
	function Tanabe_title(){
		$trails = Common_crumbs();
		$html = '';

		foreach ($trails as $i => $trail){
			$html .= (count($trails) > 1 && $i == 0)? '<span class="small">'.$trail[0].'</span>' : $trail[0];
			$html .= (count($trails) > 1 && ($i+1) < count($trails))? '<br>' : '';
		}

		return $html;
	}
}

if (!function_exists('Headhunter_title')){
	function Headhunter_title(){
		$trails = Common_crumbs();
		$html = '';

		foreach ($trails as $i => $trail){
			$html .= (count($trails) > 1 && $i == 0)? '' : $trail[0];
			$html .= (count($trails) > 1 && ($i+1) < count($trails))? '' : '';
		}

		return $html;
	}
}

if (!function_exists('Template_class')){
	function Template_class($Template){
		$class = $Template; //dd($Template);

		if ($Template == 'vacancy' || $Template == 'search'){
			$class = 'listpage';
		}

		return $class;
	}
}

if (!function_exists('Pages')){
	function Pages(){
		$CI =& get_instance();

		return $CI->Site->Cached_pages();
	}
}

if (!function_exists('Page_finder')){
	function Page_finder($Pages, $Value, $Field='id', $Return_Key=null){
		$Page = array_search($Value, array_column($Pages, $Field));
		$Page = (is_int($Page))? $Pages[$Page] : db_entry_fill('pages');

		if (is_string($Return_Key) && array_key_exists($Return_Key, $Page)){
			$Page = $Page[$Return_Key];
		}

		return $Page;
	}
}

if (!function_exists('Page_finder_url')){
	function Page_finder_url($Value, $Field='id'){
		$Page = Page_finder(Pages(), $Value, $Field);
		$Page_url = Page_url($Page);

		return $Page_url;
	}
}

if (!function_exists('Page_children_by_url')){
	function Page_children_by_url($Pages, $Parent_url){
		$Parent_id = Page_finder($Pages, $Parent_url, 'url', 'id');
		$keys = array_keys(array_column($Pages, 'id_parent'), $Parent_id);

		$Page_children = [];
		foreach ($keys as $key){
			$Page_children[] = $Pages[$key];
		}

		return $Page_children;
	}
}

	if (!function_exists('Footer_links')){
		function Footer_links($Pages){
			$Page_children = Page_children_by_url($Pages, 'footer');
			$Page_children = array_chunk($Page_children, ceil(count($Page_children)/2));

			return $Page_children;
		}
	}

if (!function_exists('Mfi_navtitle')){
	function Mfi_navtitle($lang, $urlback){
		$trails = Common_crumbs();
		$html = '';

		if($lang=='id'){
			$html .= '<li class="breadcrumb-item"><a href="'.lang_url('home').'">Beranda</a></li>';
			foreach ($trails as $i => $trail){
				$html .= (count($trails) > 1 && $i == 0)? '<li class="breadcrumb-item"><a href="">'.$trail[0].'</a></li>' : '<li class="breadcrumb-item active" aria-current="page">'.$trail[0].'</a></li>' ;
				if($trails > 1 && $i==1){
					$html .= (count($trails) > 1 && ($i+1) < count($trails))? '<li class="breadcrumb-item"><a href="'.lang_url($urlback).'">'.$trail[1].'</a></li>' : '';
				}
			}
		}else{
			$html .= '<li class="breadcrumb-item"><a href="'.lang_url('home').'">Home</a></li>';
			foreach ($trails as $i => $trail){
				$html .= (count($trails) > 1 && $i == 0)? '<li class="breadcrumb-item"><a href="">'.$trail[0].'</a></li>' : '<li class="breadcrumb-item active" aria-current="page">'.$trail[0].'</a></li>' ;
				if($trails > 1 && $i==1){
					$html .= (count($trails) > 1 && ($i+1) < count($trails))? '<li class="breadcrumb-item"><a href="'.lang_url($urlback).'">'.$trail[1].'</a></li>' : '';
				}
			}

		}

		return $html;
	}
}

if (!function_exists('Mfi_navtitleP')){
	function Mfi_navtitleP($lang, $urlback){
		$trails = Common_crumbs();
		$html = '';

		if($lang=='id'){
			$html .= '<a href="'.lang_url('home').'">Beranda </a> / ';
			foreach ($trails as $i => $trail){
				$html .= (count($trails) > 1 && $i == 0)? '<a href="">'.$trail[0].' </a> / ' : $trail[0] ;
				if($trails > 1 && $i==1){
					$html .= (count($trails) > 1 && ($i+1) < count($trails))? '<a href="'.lang_url($urlback).'">'.$trail[1].'</a>' : '';
				}
			}
		}else{
			$html .= '<a href="'.lang_url('home').'">Home </a> / ';
			foreach ($trails as $i => $trail){
				$html .= (count($trails) > 1 && $i == 0)? '<a href="">'.$trail[0].' </a> / ' : $trail[0] ;
				if($trails > 1 && $i==1){
					$html .= (count($trails) > 1 && ($i+1) < count($trails))? '<a href="'.lang_url($urlback).'">'.$trail[1].'</a>' : '';
				}
			}

		}

		return $html;
	}
}

//============================================================================================================

if (!function_exists('testimonial_url')){
	function testimonial_url($testimonial){
		$url = site_url('testimonial/detail/'.$testimonial['url']);

		return $url;
	}
}

if (!function_exists('about_url')){
	function about_url($about){
		$url = site_url('about/subsidiaries/'.$about['url']);

		return $url;
	}
}

if (!function_exists('homesector_url')){
	function homesector_url($home){
		$url = lang_url('investment-opportunities/view_sub_sector/'.$home['id']);

		return $url;
	}
}

if (!function_exists('homeioa_url')){
	function homeioa_url($ioa){
		$url = lang_url('investment-opportunities/view_investment_opportunity_area/'.$ioa['id']);

		return $url;
	}
}

if (!function_exists('sectorioa_url')){
	function sectorioa_url($sioa){
		$url = lang_url('sector/detail/'.$sioa['id']);

		return $url;
	}
}

if (!function_exists('news_url')){
	function news_url($news){
		$url = lang_url('news/detail/'.$news['url']);

		return $url;
	}
}

if (!function_exists('jobopening_url')){
	function jobopening_url($jobopening){
		$url = site_url('job-openings/detail/'.$jobopening['url']);

		return $url;
	}
}

if (!function_exists('pastevents_url')){
	function pastevents_url($pastevents){
		$url = site_url('past-events/detail/'.$pastevents['url']);

		return $url;
	}
}

if (!function_exists('upcomingevents_url')){
	function upcomingevents_url($upcomingevents){
		$url = site_url('upcoming-events/detail/'.$upcomingevents['url']);

		return $url;
	}
}

if (!function_exists('career_url')){
	function career_url($career){
		$url = site_url('career/detail/'.$career['url']);

		return $url;
	}
}

if (!function_exists('news_url')){
	function ioa_url($news){
		$url = lang_url('news/detail/'.$news['url']);

		return $url;
	}
}

//if (!function_exists('berita_url')){
//	function berita_url($berita){
//		$url = lang_url('berita/detail/'.$berita['url']);

//		return $url;
//	}
//}

if (!function_exists('berita_url')){
	function berita_url($row, $page_url){
		$url = lang_url('berita/detail/'.$row['id'].'/'.$row['url']);

		return $url;
	}
}

if (!function_exists('Page_content')){
	function Page_content($id_page){
		$row = db_entry_fill('contents', $id_page, 'id_page', array(), array('content') );
		//dd($id_page);
		return $row;
	}
}

if (!function_exists('Page_content_header')){
	function Page_content_header($Page_row, $default_header){
		$file_does_exist = false;

		$file = file_does_exist($Page_row['header'], 'contents');

		if ( $file !== false && is_array($file) ){
			$file_does_exist = ( array_key_exists('url', $file) )? true : false;
		}

		$header = ( $file_does_exist )? $file['url'] : $default_header;

		return $header;
	}
}

if (!function_exists('Page_title')){
	function Page_title($row, $Pages=null){
		if (is_array($Pages) && $row['template'] == 'menu_link'){
			$row = Page_finder($Pages, $row['url']);
		}

		$Page_title = $row['title'];

		return $Page_title;
	}
}

if (!function_exists('Page_url')){
	function Page_url($row, $Pages=null){
		if (is_array($Pages) && $row['template'] == 'menu_link'){
			$row = Page_finder($Pages, $row['url']);
			//dd($row);
		}

		if (is_array($Pages) && $row['id_parent'] != '0'){
			$parent = Page_finder($Pages, $row['id_parent']);
			$row['id_parent'] = ($parent['visibility'] == '0')? $row['id_parent'] : '0';
		}

		$Page_url = ($row['id_parent'] == '0')? $row['url'] : $row['parent_url'].'/'.$row['url'];
		$Page_url = lang_url($Page_url);

		return $Page_url;
	}
}

if (!function_exists('new_page_url')){
	function new_page_url($title){
		$marker = 0;
		$url_title = url_title_lowercase($title);
		$new_url = $url_title;

		//dd(new_page_url_exists($title));

		do {
			$url_marker = ($marker == 0)? '' : '-'.$marker;
			$new_url = $url_title.$url_marker;

			$marker++;
		} while (new_page_url_exists($new_url));

		//dd($new_url);

		return $new_url;
	}
}

	if (!function_exists('new_page_url_exists')){
		function new_page_url_exists($title){
			if (!fv_unique_field($title, 'pages.url'))
				return true;
			else
				return false;
		}
	}

//============================================================================================================

if (!function_exists('Countries')){
	function Countries(){
		$rows = db_entries('apps_countries');

		return $rows;
	}
}

	if (!function_exists('Country_name')){
		function Country_name($code){
			$row = db_entry('apps_countries', $code, 'country_code');
			$country_name = (!empty($row))? $row['country_name'] : null;

			return $country_name;
		}
	}

//============================================================================================================

if (!function_exists('is_multiple_select_selected')){
	function is_multiple_select_selected($id, $items){
		$is_selected = false;

		if (!empty($id) && !empty($items)){
			$items = str_replace('#', '', $items);
			$items_array = explode(',', $items);

			if (count($items_array)>0){
				foreach ($items_array as $item_id){
					if ($id == $item_id){
						$is_selected = true;
					}
				}
			}
		}

		return $is_selected;
	}
}

if (!function_exists('set_multiple_select')){
	function set_multiple_select($id, $items){
		if (is_multiple_select_selected($id, $items)){
			return 'selected="selected"';
		} else {
			return '';
		}
	}
}

if (!function_exists('multiple_rows')){
	function multiple_rows($items, $db_table){
		$items = str_replace('#', '', $items);
		$items_array = explode(',', $items);

		if (count($items_array)>0){
			CI()->db->where_in('id', $items_array);
			$rows = db_entries($db_table);
			return $rows;
		} else {
			return [];
		}
	}
}

//============================================================================================================

if (!function_exists('listpage_url')){
	function listpage_url($row, $page_url=null){
		if (!is_string($page_url)){
			$page_url = Page_finder_url($row['common_page']);
		}

		$url = $page_url.'/read/'.$row['url'];

		return $url;
	}
}

if (!function_exists('listpagecase_url')){
	function listpagecase_url($row, $page_url){
		//$url = $page_url.'/read/'.$row['url'];
		$url = site_url('solutions/case-studies/read/'.$row['url']);

		return $url;
	}
}

if (!function_exists('listartikel_url')){
	function listartikel_url($row, $page_url){
		//$url = $page_url.'/read/'.$row['url'];
		$url = site_url('artikel/read/'.$row['url']);

		return $url;
	}
}

if (!function_exists('listpageinsights_url')){
	function listpageinsights_url($row, $page_url){
		//$url = $page_url.'/read/'.$row['url'];
		$url = site_url('insights/read/'.$row['url']);

		return $url;
	}
}

if (!function_exists('listpage_cover')){
	function listpage_cover($row, $fullsize=false){
		$attachments = attachments($row['attachment_collection']);

		if (!empty($attachments)){
			$attachment = $attachments[0];
			return $attachment['file'];
		} else {
			return '';
		}
	}
}

if (!function_exists('listpage_cover_url')){
	function listpage_cover_url($row, $fullsize=false){
		$attachment = listpage_cover($row);

		if (!empty($attachment)){
			if ($fullsize)
				return img_url($attachment, 'attachments');
			else
				return img_thumb_url($attachment, 'attachments');
		} else {
			return 'holder.js/300x300?auto=yes';
		}
	}
}

//============================================================================================================

if (!function_exists('vacancy_url')){
	function vacancy_url($row, $page_url=null){
		if (!is_string($page_url)){
			$page_url = Page_finder_url($row['common_page']);
		}
		
		$url = $page_url.'/detail/'.$row['id'].'/'.url_title_lowercase($row['title']);

		return $url;
	}
}

//============================================================================================================
// Common Page

if (!function_exists('Common_page_row')){
	function Common_page_row($key=null){
		$CI =& get_instance();

		$Page_row = $CI->Common_page->row;

		if ( $key === null ){
			return $Page_row;
		} elseif (!empty($Page_row)) {
			if ( array_key_exists($key, $Page_row) ){
				return $Page_row[$key];
			}
		}

		return null;
	}
}

if (!function_exists('Common_page_data')){
	function Common_page_data($key=null){
		$CI =& get_instance();

		$Page_data = $CI->Common_page->data;

		if ( $key === null ){
			return $Page_data;
		} elseif (is_array($Page_data)) {
			if ( array_key_exists($key, $Page_data) ){
				return $Page_data[$key];
			}
		}

		return null;
	}
}

if (!function_exists('Common_crumbs')){
	function Common_crumbs(){
		$CI =& get_instance();

		return $CI->Common_page->crumb_trails;
	}
}

	if (!function_exists('Common_crumb_push')){
		function Common_crumb_push($title, $url){
			$CI =& get_instance();

			$url = ($url === null)? '' : site_url($url);

			$CI->Common_page->crumb_push($title, $url);
		}
	}

if (!function_exists('Common_html_head')){
	function Common_html_head(){
		$CI =& get_instance();

		$html = $CI->Common_page->html_head;

		$html = implode("\n", $html);

		return $html;
	}
}

	if (!function_exists('Common_html_head_push')){
		function Common_html_head_push($inline_html){
			$CI =& get_instance();

			$CI->Common_page->html_head_push($inline_html);
		}
	}

//============================================================================================================

if (!function_exists('mediamanager_thumb')){
	function mediamanager_thumb($file, $size='200x100'){
		$thumb = 'holder.js/'.$size.'?auto=yes&text='.strtoupper($file['ext']);

		if ($file['is_image'] == '1'){
			$dir = trim_slashes(str_replace('uploads/', '', $file['dir']));
			$thumb = create_thumb_cache($file, $dir, $size, $thumb, true);
			//$thumb = $dir;
		}

		return $thumb;
	}
}

//============================================================================================================

if (!function_exists('links')){
	function links($section=null){
		$links = array();

		if (is_string($section)){
			$CI =& get_instance();

			$CI->db->where('section', $section);
			$links = db_entries('links', array('title') );
		}
		
		return $links;
	}
}

//============================================================================================================

if (!function_exists('user_fullname')){
	function user_fullname($id){
		$fullname = '';

		if (is_numeric($id)){
			$CI =& get_instance();

			$user = $CI->ion_auth->user($id)->row_array();

			if (!empty($user)){
				$fullname = $user['first_name'].' '.$user['last_name'];
			}
		}

		return $fullname;
	}
}

//============================================================================================================

if (!function_exists('is_production')){
	function is_production($force_true=false){
		$is_production = (ENVIRONMENT === 'production')? true : false;

		if ($force_true === true){
			$is_production = true;
		}

		return $is_production;
	}
}

//============================================================================================================
// Options

if (!function_exists('option_value')){
	function option_value($name, $default=null, $lang=null){
		$row = option_row($name);

		if (is_string($lang) && in_array($lang, languages(false))){
			$value = (!empty($default) && empty($row[$lang.'_value']))? $default : $row[$lang.'_value'];
		} else {
			$value = (!empty($default) && empty($row['value']))? $default : $row['value'];
		}

		return $value;
	}
}

	if (!function_exists('option_values')){
		function options_values($names, $default=null){
			$values = array();

			foreach ($names as $name){
				$values[$name] = option_value($name, $default);
			}

			return $values;
		}
	}

if (!function_exists('option_image_url')){
	function option_image_url($name, $fallback_url=false){
		$row = option_row($name);

		$url = img_url($row['value'], 'options', $fallback_url);

		return $url;
	}
}

if (!function_exists('option_thumb_url')){
	function option_thumb_url($name, $fallback_url=false){
		$row = option_row($name);

		$url = img_thumb_url($row['value'], 'options', $fallback_url);

		return $url;
	}
}

if (!function_exists('option_row')){
	function option_row($name, $fill_empty_lang_fields=true){
		$row = db_entry_fill('options', $name, 'name', [], ['value'], $fill_empty_lang_fields);

		return $row;
	}
}

	if (!function_exists('option_rows')){
		function options_rows($names, $fill_empty_lang_fields=true){
			$rows = array();

			foreach ($names as $name){
				$rows[$name] = option_row($name, $fill_empty_lang_fields);
			}

			return $rows;
		}
	}

if (!function_exists('option_set')){
	function option_set($name, $value){
		db_save('options', array('name'=>$name, 'value'=>$value), $name, 'name');
	}
}

if (!function_exists('option_save')){
	function option_save($name, $form_name=null, $form_rule='not_required', $multilanguage=false){
		$db_id = 0;
		$form_name = ( is_string($form_name) )? $form_name : $name;
		//var_dump($name."|".$form_name." - "."|".$form_rule);
		Common_form_init('options');

		if ($multilanguage){
			Common_form_set_lang($form_name, $form_name, $form_rule, 'value');
		} else {
			Common_form_set($form_name, $form_name, $form_rule, 'value');
		}

		$db_id = Common_form_save($name, 'name', array( 'name' => $name ));

		// if (form_validate()){
		// 	$value = form_post($form_name, true);
		// 	$value = (!$value)? '' : $value;

		// 	$db_data = array( 'name' => $name, 'value' => $value );
		// 	$db_id = db_save('options', $db_data, $name, 'name');
		// }

		return $db_id;
	}
}

	if (!function_exists('option_save_lang')){
		function option_save_lang($name, $form_name=null, $form_rule='not_required'){

			return option_save($name, $form_name, $form_rule, true);
		}
	}

	if (!function_exists('options_save')){
		function options_save($names, $options, $multilanguage=false){ //dd($names);
			foreach ($names as $i => $name){
				$option = $options[$i];

				if (!is_array($option))
					$option = array();

				if (count($option) == 1){
					$option[1] = 'not_required';
				} elseif (count($option) == 2){

				} else {
					$option = [null, 'not_required'];// dd($option);
				}

				option_save($name, $option[0], $option[1], $multilanguage);
			}
		}
	}

//============================================================================================================
// Indonesia

if (!function_exists('indonesia')){
	function indonesia($id_lokasi,$separator=null){
		$CI =& get_instance();
		$CI->load->model('Common_indonesia');

		$nama = $CI->Common_indonesia->_nama($id_lokasi);

		if (is_string($separator) && !empty($nama))
			$nama = $nama.$separator;

		return $nama;
	}
}

	if (!function_exists('indonesia_provinces')){
		function indonesia_provinces(){
			$CI =& get_instance();
			$CI->load->model('Common_indonesia');

			$rows = $CI->Common_indonesia->propinsi();// dd($rows);

			return $rows;
		}
	}

//============================================================================================================

if (!function_exists('boolean_yes')){
	function boolean_yes($bool){
		if ($bool == 1)
			return 'Yes';
		else
			return 'No';
	}
}

//============================================================================================================

if (!function_exists('Contact_subjects')){
	function Contact_subjects(){
		$Subjects = option_value('contact_subjects');
		$Subjects = explode(',', $Subjects);

		return $Subjects;
	}
}

if (!function_exists('fv_contact_exists')){
	function fv_subject_exists($field_value){ //dd($field_value);
		return db_entry_exists('subjects', xss_clean($field_value));
	}
}

//============================================================================================================

if (!function_exists('Taxonomies')){
	function Taxonomies($Page_id, $Cluster='Taxonomy'){
		$CI =& get_instance();
		$CI->db->where('page_id', $Page_id);
		$CI->db->where('cluster', $Cluster);
		$rows = db_entries('taxonomies');

		return $rows;
	}
}

if (!function_exists('Taxonomy')){
	function Taxonomy($id){
		$row = db_entry('taxonomies', $id);

		return $row;
	}
}

if (!function_exists('Subjects')){
	function Subjects($id=0, $key=null){
		if (is_numeric($id) && $id > 0){
			$row = db_entry('subjects', $id);

			if (array_key_exists($key, $row)){
				return $row[$key];
			} else {
				return $row;
			}
		} else {
			$rows = db_entries_lang('subjects', array('title'));

			return $rows;
		}
	}
}

//============================================================================================================
/* End of file helper/site_helper.php */
