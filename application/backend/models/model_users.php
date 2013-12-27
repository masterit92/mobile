<?php

class Model_users extends CI_Model {

	protected $table_name = 'user';

	public function __construct()
	{
		parent::__construct();
	}

	public function check_login($email, $password)
	{
		if (!empty($email) && !empty($password))
		{
			$this->db->where('email', $this->db->escape_str($email));
			$this->db->where('password', $this->db->escape_str($password));
			$this->db->where('status', 1);
			$query = $this->db->get($this->table_name);
			return $query->row();
		}
		return NULL;
	}

	public function all_user()
	{
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function insert($arr_data)
	{
		$this->db->insert($this->table_name, $arr_data);
	}

	public function update($arr_data, $user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update($this->table_name, $arr_data);
	}

	public function delete($user_id)
	{
		$this->delete_permissions($user_id);
		$this->db->where('user_id', $user_id);
		$this->db->delete($this->table_name);
	}

	public function user_by_id($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

	public function role_user($user_id)
	{
		$sql_query = "SELECT role.`name` FROM `role`
                    JOIN `role_and_user` ON `role`.`role_id`=`role_and_user`.`role_id` 
                    WHERE `role_and_user`.`user_id`=$user_id AND `role`.`status`=1";
		$query = $this->db->query($sql_query);
		return $query->result_array();
	}

	public function check_email($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get($this->table_name);
		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		return TRUE;
	}

	public function insert_permissions($arr_data)
	{
		$this->db->insert('role_and_user', $arr_data);
	}

	public function delete_permissions($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete('role_and_user');
	}

	public function user_permissions($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('role_and_user');
		return $query->result_array();
	}

	public function check_permissions($user_id, $role_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('role_id', $role_id);
		$query = $this->db->get('role_and_user');
		if ($query->num_rows() > 0)
		{
			return FALSE;
		}
		return TRUE;
	}

}
