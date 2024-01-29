<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_page extends CI_Model {

	var $pages_lang = array( 'title' );

	function __construct(){
		parent::__construct();
	}

	function _update_depth(){
		echo("STARTING...\n\n\n");

		$this->update_depth();

		die('DONE!');
	}

		function update_depth(){
			$parents = $this->parents();
			$children = $this->children();

			$depth = 0;

			foreach ($parents as $p){
				$this->do_update_depth($p, $depth, $children);
			}
		}

		function do_update_depth($row, $depth, $children, $base_url = ''){
			$data['depth'] = $depth;
			$data['parent_url'] = $base_url;
			db_save('pages', $data, $row['id']);

			if ( array_key_exists($row['id'], $children) ){
				$depth++;
				$parent_url = ($row['id_parent'] == '0')? $row['url'] : $base_url.'/'.$row['url'];

				foreach ($children[$row['id']] as $child){
					$this->do_update_depth($child, $depth, $children, $parent_url);
				}
			}
		}

	function menus(){
		$this->db->order_by('sorting', 'ASC');
		$this->db->where('template', 'menu');
		$this->db->where('id_parent', '0');
		$parents = db_entries('pages');

		$this->db->order_by('sorting', 'ASC');
		$this->db->where('template', 'menu');
		$this->db->where('id_parent !=', '0');
		$children_rows = db_entries('pages');

		$children = array();

		foreach ($children_rows as $r){ 
			$id_parent = $r['id_parent'];

			if (!array_key_exists($id_parent, $children)){
				$children[$id_parent] = array();
			}

			$children[$id_parent][] = $r;
		}

		return array('parents' => $parents, 'children' => $children);
	}

	function parents(){
		$this->db->order_by('sorting', 'ASC');
		$this->db->where('id_parent', '0');
		$rows = db_entries('pages');
		//var_dump($rows); echo "<br /><br /><br />";

		return $rows;
	}

	function children($id_parent=null){
		if (is_numeric($id_parent))
			$this->db->where('id_parent', $id_parent);
		else
			$this->db->where('id_parent !=', '0');

		$this->db->order_by('sorting', 'ASC');
		$rows = db_entries('pages');


		if (is_numeric($id_parent)){
			return $rows;
		} else {
			$children = array();

			foreach ($rows as $r){ 
				$id_parent = $r['id_parent'];

				if (!array_key_exists($id_parent, $children)){
					$children[$id_parent] = array();
				}

				$children[$id_parent][] = $r;
			}

			return $children;
		}
	}

	function move_page($id, $direction){
		$directions = array( 'up', 'down' );

		$row = db_entry('pages', $id);

		if (!empty($row) && in_array($direction, $directions)){
			$row_index = null;

			if ($row['id_parent'] == '0'){
				$rows = $this->parents();
			} else {
				$rows = $this->children($row['id_parent']);
			}

			foreach ($rows as $i => $r){
				db_save('pages', ['sorting' => $i], $r['id']);

				if ($r['id'] == $row['id']){
					$row_index = $i;
				}
			}

			if (is_numeric($row_index)){
				if ( $direction == 'up' && $row_index > 0 ){
					$desired_index = $row_index-1;
					db_save('pages', ['sorting' => $row_index], $rows[$desired_index]['id']);
					db_save('pages', ['sorting' => $desired_index], $row['id']);
				} elseif ( $direction == 'down' && $row_index < (count($rows)-1) ) {
					$desired_index = $row_index+1;
					db_save('pages', ['sorting' => $row_index], $rows[$desired_index]['id']);
					db_save('pages', ['sorting' => $desired_index], $row['id']);
				}
			}

		}

		redirect_control('page/?scrollIntoView=page-'.$id);
	}

	function _index(){
		$data = array('subtitle' => 'Index');

		$data['rows'] = $this->parents();
		$data['children'] = $this->children();

		//dd($data['rows']);

		return $data;
	}

	function _toggle_visibility($id){
		Common_form_init('pages');
		
		Common_form_set('visibility', 'Hide in Frontend navigation', 'checkbox');
		
		$id = Common_form_update($id); //dd($id);

		if ($id){
			die('success');
		}
	}

	function _sitemap_visibility($id){
		Common_form_init('pages');
		
		Common_form_set('visibility_sitemap', 'Hide in Sitemap page', 'checkbox');
		
		$id = Common_form_update($id); //dd($id);

		if ($id){
			die('success');
		}
	}

// ---------------------------------------------------

	function prep($id=null){
		$unique_field = 'pages.url';

		if (is_numeric($id)){
			$unique_field = $unique_field.'.'.$id;
		}

		Common_form_init('pages');

		// Common_form_set('visibility', 'Hide page from menu', 'checkbox');
		Common_form_set('id_parent', 'Menu', 'not_required');
		Common_form_set_lang('title', 'Title', 'required');
		Common_form_set('url', 'URL Slug (optional)', 'not_required|url_title_lowercase|callback_fv_unique_field['.$unique_field.']');
		Common_form_set('template', 'Template', 'not_required');
		Common_form_set('template_options', 'Template Options', 'not_required');
	}

	function _new($id_parent = 0){
		$data = array('subtitle' => 'New Page', 'multilanguage' => true);

		$id_parent = (is_numeric($id_parent))? $id_parent : 0;

		$row = db_insert_fill('pages', ['id_parent' => $id_parent], $this->pages_lang);
		$data['row'] = $row;

		$data['menus'] = $this->menus();

		return $data;
	}

		function _new_save(){
			$this->prep();

			$title = form_post('title');
			$url = form_post('url');

			$db_data = array();

			if ($title && empty($url)){
				$new_url = new_page_url($title);
				$db_data['url'] = $new_url;
			}

			$db_id = Common_form_insert($db_data);
			//dd($db_id);
			if ($db_id){
				$this->update_depth();	
				die('success');
			}
		}

	function _edit($id){
		$data = array('subtitle' => 'Edit Page', 'view' => 'page_new', 'multilanguage' => true);

		$row = db_entry('pages', $id, null, $this->pages_lang);
		$data['row'] = $row;

		$data['menus'] = $this->menus();

		if (!empty($row)){
			$data['subtitle'] = $data['subtitle'] . ' - ' . $row['title'];
		}

		return $data;
	}

		function _edit_save($id){
			$this->prep($id);

			$title = form_post('title');
			$url = form_post('url');

			$db_data = array();

			if ($title && empty($url)){
				$new_url = new_page_url($title);
				$db_data['url'] = $new_url;
			}

			$db_id = Common_form_update($id, 'id', $db_data);
			//dd($db_id);
			if ($db_id){
				$this->update_depth();
				die('success');
			}
		}

	function _remove($id){
		$data = [
			'subtitle' => 'Remove Page',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_save($id){
			db_remove('pages', $id);
		}

	function _move_up($id){
		$this->move_page($id, 'up');
	}

	function _move_down($id){
		$this->move_page($id, 'down');
	}

// ---------------------------------------------------

	function prep_menu($id=null){
		$unique_field = 'pages.url';

		if (is_numeric($id)){
			$unique_field = $unique_field.'.'.$id;
		}

		Common_form_init('pages');

		Common_form_set('id_parent', 'Menu', 'not_required');
		Common_form_set_lang('title', 'Title', 'required');
		Common_form_set('url', 'URL Slug (optional)', 'not_required|url_title_lowercase|callback_fv_unique_field['.$unique_field.']');
	}

	function _new_menu($id_parent = 0){
		$data = array('subtitle' => 'New Menu', 'multilanguage' => true);

		$id_parent = (is_numeric($id_parent))? $id_parent : 0;

		$row = db_insert_fill('pages', ['id_parent' => $id_parent], $this->pages_lang);
		$data['row'] = $row;
		$data['menus'] = $this->menus();

		return $data;
	}

		function _new_menu_save(){
			$this->prep_menu();

			$title = form_post('title');
			$url = form_post('url');

			$db_data = array();

			if ($title && empty($url)){
				$new_url = url_title_lowercase($title);
				$db_data['url'] = $new_url;
			}

			$db_data['template'] = 'menu';

			$db_id = Common_form_insert($db_data);
			//dd($db_id);
			if ($db_id){
				$this->update_depth();
				die('success');
			}
		}

	function _edit_menu($id){
		$data = array('subtitle' => 'Edit Menu', 'view' => 'page_new_menu', 'multilanguage' => true);

		$row = db_entry('pages', $id, null, $this->pages_lang);
		$data['row'] = $row;
		$data['menus'] = $this->menus();

		if (!empty($row)){
			$data['subtitle'] = $data['subtitle'] . ' - ' . $row['title'];
		}

		return $data;
	}

		function _edit_menu_save($id){
			$this->prep_menu($id);

			$title = form_post('title');
			$url = form_post('url');

			$db_data = array();

			if ($title && empty($url)){
				$new_url = url_title_lowercase($title);
				$db_data['url'] = $new_url;
			}

			$db_data['template'] = 'menu';

			$db_id = Common_form_update($id, 'id', $db_data);
			//dd($db_id);
			if ($db_id){
				$this->update_depth();
				die('success');
			}
		}

	function _remove_menu($id){
		$data = [
			'subtitle' => 'Remove Menu',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_menu_save($id){
			db_remove('pages', $id);
		}

// ---------------------------------------------------

	function prep_link($id=null){
		Common_form_init('pages');

		Common_form_set('id_parent', 'Parent Menu', 'not_required');
		Common_form_set('url', 'Linked Page', 'required_select');
		Common_form_set_lang('title', 'Custom Title', 'not_required');
	}

	function _new_link($id_parent = 0){ //dd($id_parent);
		$data = array('subtitle' => 'New Link', 'multilanguage' => true);

		$id_parent = (is_numeric($id_parent))? $id_parent : 0;

		$row = db_insert_fill('pages', ['id_parent' => $id_parent], $this->pages_lang);
		$data['row'] = $row;
		$data['menus'] = $this->menus();
		//dd($data);
		return $data;
	}

		function _new_link_save(){
			$this->prep_link();

			$title = form_post('title');
			$url = form_post('url');

			$db_data = array();

			$db_data['template'] = 'menu_link';

			$db_id = Common_form_insert($db_data);
			//dd($db_id);
			if ($db_id){
				$this->update_depth();
				die('success');
			}
		}

	function _edit_link($id){
		$data = array('subtitle' => 'Edit Link', 'view' => 'page_new_link', 'multilanguage' => true);

		$row = db_entry('pages', $id, null, $this->pages_lang);
		$data['row'] = $row;
		$data['menus'] = $this->menus();

		if (!empty($row)){
			$data['subtitle'] = $data['subtitle'] . ' - ' . $row['title'];
		}

		return $data;
	}

		function _edit_link_save($id){
			$this->prep_link($id);

			$title = form_post('title');
			$url = form_post('url');

			$db_data = array();

			$db_data['template'] = 'menu_link';

			$db_id = Common_form_update($id, 'id', $db_data);
			//dd($db_id);
			if ($db_id){
				$this->update_depth();
				die('success');
			}
		}

	function _remove_link($id){
		$data = [
			'subtitle' => 'Remove Menu',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_link_save($id){
			db_remove('pages', $id);
		}
}

/* End of file models/Backend_page.php */
