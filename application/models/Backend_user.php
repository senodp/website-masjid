<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

class Backend_user extends CI_Model {
	function __construct(){
		parent::__construct();
		//die('Backend_Page');
	}

	function _index(){
		$rows = $this->ion_auth->users()->result_array();
		$groups = $this->ion_auth->groups()->result_array();
		//dd($rows, 'ion_auth_users');
		foreach ($rows as $i => $r){
			$rows[$i]['groups'] = $this->ion_auth->get_users_groups($r['id'])->result_array();
		}

		foreach ($rows as $i => $r){
			$rows[$i]['groups_array'] = array();

			foreach ($r['groups'] as $group){
				$rows[$i]['groups_array'][] = $group['id'];
			}
		}

		foreach ($groups as $i => $g){
			if (!array_key_exists('users', $g)){
				$groups[$i]['users'] = array();
			}

			foreach ($rows as $r){
				if (in_array($g['id'], $r['groups_array'])){
					$groups[$i]['users'][] = $r;
				}
			}
		}

		$data = [
			'rows' => $rows,
			'groups' => $groups
		];

		return $data;
	}

	function _new(){
		$row = db_insert_fill('auth_users');
		$row['groups'] = [];
		$row['groups_array'] = [];
		$groups = $this->ion_auth->groups()->result_array();
		//dd($row, '_edit_row');
		$data = [
			'subtitle' => 'New User',
			'row' => $row,
			'groups' => $groups
			// 'modal_class' => 'modal-lg'
		];

		return $data;
	}

		function _new_save(){
			form_set('first_name', 'First Name', 'required');
			form_set('last_name', 'Last Name', 'required');
			form_set('username', 'Username', 'required');
			form_set('email', 'E-mail Address', 'required|valid_email');
			form_set('password', 'Password', 'required|min_length[7]|matches[password_re]');
			form_set('password_re', 'Repeat Password', 'required|min_length[7]');

			if (form_validate()){
				$username = form_post('username');
				$email = form_post('email');
				$password = form_post('password');

				$additional_data = [
					'first_name' => form_post('first_name'),
					'last_name' => form_post('last_name')
				];

				$groups = (form_post('groups'))? form_post('groups') : null;

				$this->ion_auth->register($username, $password, $email, $additional_data, $groups);

				die('success');
			}
		}

	function _edit($id){
		$row = $this->ion_auth->user($id)->row_array();
		$row['groups_array'] = [];

		$row['groups'] = $this->ion_auth->get_users_groups($row['id'])->result_array();

		foreach ($row['groups'] as $r){
			$row['groups_array'][] = $r['id'];
		}

		$groups = $this->ion_auth->groups()->result_array();
		//dd($row, '_edit_row');
		$data = [
			'subtitle' => 'Edit User',
			'row' => $row,
			'groups' => $groups,
			'view' => 'user_new'
		];// dd($data);

		return $data;
	}

		function _edit_save($id){
			form_set('first_name', 'First Name', 'required');
			form_set('last_name', 'Last Name', 'required');
			form_set('email', 'E-mail Address', 'required|valid_email');
			
			if ($id > 1){
				form_set('username', 'Username', 'required');
			}
			//dd($_POST);
			if (form_validate()){
				//dd($_POST);

				$data = [
					'first_name' => form_post('first_name'),
					'last_name' => form_post('last_name'),
				];

				$data['email'] = form_post('email');

				if ($id > 1){
					$data['username'] = form_post('username');
				}
				//dd($groups, 'groups');
				//dd($data);
				$this->ion_auth->update($id, $data);

				if ($id > 1){
					$groups = (form_post('groups'))? form_post('groups') : null;

					if (is_array($groups)){
						$this->ion_auth->remove_from_group(null, $id);
						$this->ion_auth->add_to_group($groups, $id);
					}
				}

				die('success');
			}
		}


	function _remove($id){
		$data = [
			'subtitle' => 'Remove User',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_save($id){
			$this->ion_auth->delete_user($id);

			die('success');
		}


	function _reset_password($id){
		$data = [
			'subtitle' => 'Reset Password',
			'modal_size' => 'modal-sm'
		];

		return $data;
	}

		function _reset_password_save($id){
			form_set('password', 'Password', 'required|min_length[7]|matches[password_re]');
			form_set('password_re', 'Repeat Password', 'required|min_length[7]');

			if (form_validate()){
				$data = array(
					'password' => form_post('password')
				);
				//dd($groups, 'groups');
				$this->ion_auth->update($id, $data);

				die('success');
			}
		}

	//----------------------------------------------------------------------------------------------------
	// MANAGE GROUP

	function _new_group(){
		$data = ['subtitle' => 'New Group'];

		$data['row'] = db_insert_fill('auth_groups');

		return $data;
	}

		function _new_group_save(){
			form_set('group_name', 'Group Name', 'required');
			form_set('group_description', 'Group Description', 'not_required');

			if (form_validate()){
				$group_name = form_post('group_name');
				$group_description = form_post('group_description');

				$this->ion_auth->create_group($group_name, $group_description);

				die('success');
			}
		}

	function _edit_group($id){
		$data = [
			'subtitle' => 'Edit Group',
			'view' => 'user_new_group'
		];

		$data['row'] = $this->ion_auth->group($id)->row_array();

		return $data;
	}

		function _edit_group_save($id){
			form_set('group_name', 'Group Name', 'required');
			form_set('group_description', 'Group Description', 'not_required');

			if (form_validate()){
				$group_name = form_post('group_name');
				$group_description = form_post('group_description');

				$this->ion_auth->update_group($id, $group_name, $group_description);

				die('success');
			}
		}

	function _remove_group($id){
		$data = [
			'subtitle' => 'Remove Group',
			'view' => '_remove'
		];

		return $data;
	}

		function _remove_group_save($id){
			$this->ion_auth->delete_group($id);

			die('success');
		}
}

/* End of file models/Backend_user.php */
