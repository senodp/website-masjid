<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
	C99 by Muhammad Dahri 
	http://commongoodguy.com/ 
*/

class Common_indonesia extends CI_Model {	
	function __construct(){
		parent::__construct();
	}

	var $db_table = 'indonesia';

	function _id($id_lokasi){
		$row = db_entry($this->db_table, $id_lokasi, 'lokasi_ID');

		return $row;
	}

	function _nama($id_lokasi){
		$row = db_entry($this->db_table, $id_lokasi, 'lokasi_ID');

		$nama = (!empty($row))? $row['lokasi_nama'] : '';

		return $nama;
	}

	function _propinsi($id_propinsi){
		$this->db->where('lokasi_kabupatenkota','00');
		$this->db->where('lokasi_kecamatan','00');
		$this->db->where('lokasi_kelurahan','00');

		$row = db_entry($this->db_table, $id_propinsi, 'lokasi_propinsi');

		return $row;
	}

		function _propinsi_exists($id_propinsi){
			$row = db_entry($this->db_table, $id_propinsi, 'lokasi_ID');

			if (!empty($row)){
				return true;
			} else {
				return false;
			}
		}

	function _kabupatenkota($id_kabupatenkota){
		// $this->db->where('lokasi_kabupatenkota','00');
		$this->db->where('lokasi_kecamatan','00');
		$this->db->where('lokasi_kelurahan','00');

		$row = db_entry($this->db_table, $id_kabupatenkota, 'lokasi_ID');

		return $row;
	}

		function _kabupatenkota_exists($id_kabupatenkota){
			$row = $this->_kabupatenkota($id_kabupatenkota);

			if (!empty($row)){
				return true;
			} else {
				return false;
			}
		}

	function propinsi(){
		$this->db->order_by('lokasi_nama');
		
		$this->db->where('lokasi_kabupatenkota','00');
		$this->db->where('lokasi_kecamatan','00');
		$this->db->where('lokasi_kelurahan','00');

		$rows = db_entries($this->db_table);
		//dd($this->db->last_query());
		return $rows;
	}

		function propinsi_is_valid($id){
			if (!is_numeric($id))
				return false;

			$this->db->where('lokasi_ID', $id);
			$rows = $this->propinsi();

			$valid = (empty($rows))? false : true;

			return $valid;
		}

		function propinsi_valid($id){
			if ($id === null || !is_numeric($id))
				return null;

			if (!$this->propinsi_is_valid($id))
				return null;

			return $id;
		}

	function kabupatenkota($id_propinsi){
		$this->db->order_by('lokasi_nama');

		$this->db->where('lokasi_propinsi',$id_propinsi);
		$this->db->where('lokasi_kabupatenkota !=','00');
		$this->db->where('lokasi_kecamatan','00');
		$this->db->where('lokasi_kelurahan','00');

		$rows = db_entries($this->db_table);

		return $rows;
	}
	
}

/* End of file models/Common_indonesia.php */