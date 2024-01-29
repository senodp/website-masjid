<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
	C99 by Muhammad Dahri 
	http://commongoodguy.com/ 
*/

if (!function_exists('html_list_files')){
	function html_list_files($files, $upload_path){
		$html = '';

		foreach (files_list($files, $upload_path) as $file){
			$html .= '<li><a href="'.$file['url'].'">'.$file['name'].'</a></li>';
		}

		return $html;
	}
}

if (!function_exists('html_upload')){
	function html_upload($file, $field_data, $upload_path, $link_text='', $input_attr=''){

		$uniqid = uniqid();
		
		$file_html = file_tag($file, $upload_path, $link_text);
		$file_html = (!empty($file_html))? '&nbsp;'.$file_html.'<br />' : $file_html;


		$glyph_up = glyph('arrow-up');
		$glyph_fullscreen = glyph('fullscreen');

$html = <<<HTML
		<!-- JCROP -->
		<div class="thumbnail glow" id="file-$uniqid" data-uniqid="$uniqid">
			$file_html
			<input type="file" name="$field_data" $input_attr />
			<!--<div class="help-block smallic" style="margin-bottom: 0;">
				recommended file types are
			</div>-->
		</div>
		<!-- /JCROP -->
HTML;

		return $html;
	}
}

if (!function_exists('html_upload_img')){ //USING JCROP LIBRARY
	function html_upload_img($image, $form_field_name, $upload_path, $image_size, $image_type='jpg', $form_field_class=""){
		
		$uniqid = uniqid();

		$image_sizes = array_combine(array('width', 'height'), explode('x', $image_size));
		
		if ($image_sizes['width'] == '0'){
			$holder_img = 'holder.js/100x'.$image_sizes['height'].'?auto=yes&text='.$image_size;
			$holder_text = "recommended image height is ".$image_sizes['height']." pixels, no restriction/recommendation on image width";
		} elseif ($image_sizes['height'] == '0'){
			$holder_img = 'holder.js/'.$image_sizes['width'].'x100?auto=yes&text='.$image_size;
			$holder_text = "recommended image width is ".$image_sizes['width']." pixels, no restriction/recommendation on image height";
		} else {
			$holder_img = 'holder.js/'.$image_size.'?auto=yes';
			$holder_text = "recommended image size is $image_size pixels";
		}
		
		$img_thumb = img_thumb($image,$upload_path,'class="img-fluid thumb-img img-thumbnail rounded" id="image-'.$uniqid.'"', $holder_img);
		$img_thumb = (!empty($img_thumb))? '<div class="thumb-img-wrap">' . $img_thumb.'</div><br />' : $img_thumb;

$html = <<<HTML
		<!-- JCROP -->
		<div class="thumbnail crop-thumb glow crop-$image_type" id="thumb-$uniqid" data-uniqid="$uniqid" data-image-size="$image_size">
			$img_thumb
			<input type="file" name="$form_field_name" class="$form_field_class crop-input" accept="image/*" />
			<div style="margin-top: 5px;">
				<a href="#" class="btn-dark btn crop-btn btn-sm" ><?=glyph('upload')?> Choose File</a><br>
				<small>$holder_text</small>
			</div>
		</div>
		<!-- /JCROP -->
HTML;

		return $html;
	}
}

if (!function_exists('html_upload_video')){ //USING JCROP LIBRARY
	function html_upload_video($video, $form_field_name, $upload_path, $preview_width="100%"){
		
		$uniqid = uniqid();
		
		$video_file = file_url($video, $upload_path);
		$video_src = (!empty($video_file))? '<source src="'.$video_file.'" type="video/mp4">' : '';
		$video_anchor = (!empty($video_file))? '<p class="m-0"><a href="'.$video_file.'" target="_blank"></p>'.$video_file.'</a>' : '';

		$thumbnail_field_name = $form_field_name.'_thumb';

$html = <<<HTML
		<!-- JCROP -->
		<div class="thumbnail glow video-thumb" id="thumb-$uniqid" data-uniqid="$uniqid">
			<video controls="" width="$preview_width">$video_src</video>
			<canvas class="d-none" width="$preview_width"></canvas>
			<img class="d-none img-fluid" />
			<input type="file" name="$form_field_name" class="video-input" accept="video/mp4,video/x-m4v,video/*" />
			<input type="hidden" class="video-thumbnail-input" name="$thumbnail_field_name">
			$video_anchor
		</div>
		<!-- /JCROP -->
HTML;

		return $html;
	}
}

if (!function_exists('html_tag')){
	function html_tag($tag, $attrib="", $text=""){
		$single_tags = array('input', 'img');
		
		$html = '<' . $tag . ' ';
			
			$html .= $attrib;
		
		if (in_array($tag, $single_tags)) $html .= '/>';
		else $html .= '>' . $text . '</' . $tag . '>';
		
		return $html;
	}
}

function form_group($html, $class=""){
	$html = html_tag('div', 'class="form-group '.$class.'"', $html);

	return $html;
}

function tag_input($type, $name, $value='', $class='', $attr='',$html='',$use_label=false){
	if ($use_label === true){
		$html .= html_tag('label', 'for="'.$name.'"', $label);
	}

	$html .= html_tag('input', 'type="'.$type.'" name="'.$name.'" value="'.set_value($name,$value).'" class="form-control '.$class.'" '.$attr);
	
	$html = form_group($html);

	return $html;
}

function tag_input_label($type, $name, $label, $value='', $class='', $attr=''){
	$label = html_tag('label', 'for="'.$name.'"', $label);
	$html = tag_input($type, $name, $value='', $class='', $attr='',$label);

	return $html;
}

	function tag_submit($value='Submit', $class="", $attr=""){
		$html = html_tag('input', 'type="submit" value="'.$value.'" class="btn '.$class.'" '.$attr);
		$html = form_group($html);
		return $html;
	}

	function tag_submit_ex($value='Submit', $cancel_url, $class="", $attr=""){
		$html = html_tag('input', 'type="submit" value="'.$value.'" class="btn btn-info '.$class.'" '.$attr).' ';
		$html .= html_tag('a', 'href="'.$cancel_url.'" class="btn btn-warning '.$class.'"', 'Cancel');
		$html = form_group($html);
		return $html;
	}

	function tag_file_image($name='',$label='',$imagesize='200x200',$image=false,$folder=false){
		$html = html_tag('label', 'for="'.$name.'"', $label);

		if ($image === false){
			$html .= html_tag('img', 'class="img-fluid" data-src="holder.js/'.$imagesize.'/auto"');
		} elseif ($image !== false && $folder !== false) {
			$html .= img_tag_thumb($image,$folder,'class="img-fluid"','holder.js/'.$imagesize.'/auto');
		}

		$html .= html_tag('small', 'class="text-muted" style="display: block; margin-bottom: 5px;"', 'Recommended size is '.$imagesize);

		$html .= html_tag('input', 'type="file" name="'.$name.'"');
		
		$html = form_group($html, 'tag-file-image');
		return $html;
	}

	function tag_text($name, $value='', $class='', $attr=''){
		$html = tag_input('text', $name, $value, $class, $attr);

		return $html;
	}

	function tag_textarea($name, $label='', $value='', $class='', $attr=''){
		$html = '';
		if (!empty($label)) $html = html_tag('label', 'for="'.$name.'"', $label);
		$html .= html_tag('textarea', 'name="'.$name.'" class="form-control '.$class.'" '.$attr, set_value($name,$value));
		$html = form_group($html);
		return $html;
	}

	function tag_password($name, $value='', $class='', $attr=''){
		$html = tag_input('password', $name, $value, $class, $attr);

		return $html;
	}

/* End of file helper/tag_helper.php */