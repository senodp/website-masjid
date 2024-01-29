<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
	C99 by Muhammad Dahri 
	http://commongoodguy.com/ 
*/

class Common_admin extends CI_Model {	
    function __construct(){
		parent::__construct();
    }

    var $tbl = 'admin';
    var $admin_rules = null;

    function _id($id) {
		$user = db_entry($this->tbl, $id);
		return $user;
	}

		function _name($name) {
			$user = db_entry($this->tbl, $name, 'name');
			return $user;
		}

		function _all() {
			$users = db_entries($this->tbl);
			return $users;
		}

		function _block($id, $status){
			$statuses = array('0','1');

			$row = $this->_id($id);

			if (!empty($row) && in_array($status, $statuses)){
				$user = $this->login();

				$data = array(
					'is_blocked'	=> $status,
					'updated_on' 	=> current_date(),
					'updated_by'	=> $user['id']
				);

				$this->db->where('id', $id);
				$this->db->update($this->tbl, $data);
			}	
		}

	function login($field=null){
		$user = false;

		if ($this->session->userdata('admin_logged_in') === true){
			$user['id'] = $this->session->userdata('admin_id');
			$user['name'] = $this->session->userdata('admin_name');
			$user['email'] = $this->session->userdata('admin_email');
			$user['id_role'] = $this->session->userdata('admin_role');
		}

		if ($field !== null && array_key_exists($field, $user))
			$user = $user[$field];

		return $user;
	}

		function is_logged_in() {
			$logged_in = ($this->session->userdata('admin_logged_in') === true)? true : false;
			return $logged_in;
		}

	function logout() {
		$this->session->unset_userdata('admin_logged_in');
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_name');
		$this->session->unset_userdata('admin_email');
		$this->session->unset_userdata('admin_role');
	}

	function is_super_admin($login=null){
		if ($login === null)
			$login = $this->login();

		if ($login['id_role'] == 1)
			return true;
		else
			return false;
	}

	function allow_action($action, $data=null){
		$own = $this->login();

		if ($this->is_super_admin($own)) {
			return true;
		} elseif ($action == 'beranda_index' || strpos($action, '_denied')){
			return true;
		} elseif (is_array($own)){
			switch ($action) {
				case 'admin_delete_row':
					return $this->allow_admin_delete_row($own, $data);
					break;
				
				default:
					return $this->allow_action_db($own, $action);
					break;
			}
		} else {
			return false;
		}
	}

		function allow_admin_delete_row($own, $user){
			$allow = false;

			if ($user !== null){
				if ($user['id_role']>1)
					$allow = true;
				
				if ($user['id'] == $own['id'])
					$allow = false;
			}

			return $allow;
		}

		function allow_action_db($own, $action){
			return true;
		}
}

/* End of file models/Common_admin.php */