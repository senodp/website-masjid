<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Site extends CI_Model {

	var $pages_lang = array( 'title' );

	function __construct(){
		parent::__construct();
		//die('Backend_Page');
	}

	function Pages(){
		$this->db->order_by('sorting', 'ASC');
		$rows = db_entries_lang('pages', $this->pages_lang);

		return $rows;
	}

		function Cache_pages($return_pages=false){
			$this->load->driver('cache');

			$pages = $this->cache->file->get('pages');

			if (!is_array($pages)){
				$pages = $this->Pages();

				$this->cache->file->save('pages', $pages, 60*60*24*7);
			}

			if ($return_pages){
				return $pages;
			}
		}

		function Cached_pages(){
			if (uri_segment(1) == 'control' || !is_production())
				return $this->Pages();
			else
				return $this->Cache_pages(true);
		}

	function Menu_rows(){
		$this->db->order_by('sorting', 'ASC');
		$this->db->where('template', 'menu');
		$this->db->where('id_parent', '0');
		$rows = db_entries_lang('pages', $this->pages_lang);

		return $rows;
	}

	function Menu_parents($prefix='', $visibility = '0'){
		//if (strpos(strtolower($prefix), 'frontend') !== false){
			$this->db->where('pages.visibility', $visibility);
		//}

		$this->db->order_by('pages.sorting', 'ASC');
		$this->db->where('pages.id_parent', '0');
		$rows = db_entries_lang('pages', $this->pages_lang);// dd($rows);

		return $rows;
	}

	function Menu_children($id_parent=null, $prefix='', $visibility = '0', $return_rows = false){
		if (is_numeric($id_parent))
			$this->db->where('id_parent', $id_parent);
		else
			$this->db->where('id_parent !=', '0');

		if (is_numeric($visibility)){
		//if (strpos(strtolower($prefix), 'frontend') !== false){
			$this->db->where('visibility', $visibility);
		//}
		}

		$this->db->order_by('sorting', 'ASC');
		$rows = db_entries_lang('pages', $this->pages_lang);


		if (is_numeric($id_parent) || $return_rows === true){
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

	function Menu_hidden(){
		$included_parents = array();

		$children = array(); //$this->children('0', '', '1', true);

		// foreach ($children as $child){
		// 	if (!in_array($child['id_parent'], $included_parents)){
		// 		$included_parents[] = $child['id_parent'];
		// 	}
		// }

		if (!empty($included_parents)){
			$this->db->or_where_in('id', $included_parents);
		} $parents = $this->Menu_parents('', '1');

		$children = $this->Menu_children(null, null, false, false);

		$data = [
			'parents' => $parents,
			'children' => $children
		];

		return $data;
	}
}

/* End of file models/Site.php */
