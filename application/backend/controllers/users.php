<?php

class Users extends My_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('model_users');
		$this->load->Model('model_role');
	}

	public function index()
	{
		$this->response['data']['list_user'] = $this->model_users->all_user();
		$this->response['title'] = 'Users';
		$this->response['template'] = 'default/users/index';
		$this->load->view("default/layout", $this->response);
	}

	public function set_status()
	{
		if ($this->input->get('user_id'))
		{
			$user_id = intval($this->input->get('user_id'));
			if ($user_id != $this->session->userdata('user_infor')->user_id)
			{
				$status = intval($this->input->get('status'));
				if ($status === 1)
				{
					$status = 0;
				}
				else
				{
					$status = 1;
				}
				$arr_data = array('status' => $status);
				$this->model_users->update($arr_data, $user_id);
			}
			else
			{
				$this->session->set_flashdata('error', 'You can not set active yourself!');
			}
		}
		redirect('admin/users');
	}

	public function delete()
	{
		if ($this->input->get('user_id'))
		{
			$user_id = intval($this->input->get('user_id'));
			if ($user_id != $this->session->userdata('user_infor')->user_id)
			{
				$this->model_users->delete($user_id);
			}
			else
			{
				$this->session->set_flashdata('error', 'You can not delete yourself!');
			}
		}
		redirect('admin/users');
	}

	public function create()
	{
		$this->response['title'] = 'Create Users';
		$this->response['template'] = 'default/users/form_create';
		$this->load->view("default/layout", $this->response);
	}

	public function profile()
	{
		$user_id = intval($this->input->get('user_id'));
		$this->response['data']['user'] = $this->model_users->user_by_id($user_id);
		$this->response['title'] = 'Profile Users';
		$this->response['template'] = 'default/users/form_profile';
		$this->load->view('default/layout', $this->response);
	}

	public function password()
	{
		$this->response['title'] = 'Changer password';
		$this->response['template'] = 'default/users/form_password';
		$this->load->view('default/layout', $this->response);
	}

	public function save()
	{
		if ($this->input->post('save'))
		{
			$email = $this->input->post('email');
			$full_name = $this->input->post('full_name');
			$password = $this->input->post('password');
			$re_password = $this->input->post('re_password');
			if (!empty($email) && !empty($password) && strcmp($password, $re_password) === 0)
			{
				if ($this->input->post('user_id'))
				{
					$user_id = intval($this->input->post('user_id'));
					if ($this->input->post('full_name'))
					{
						$arr_data = array('full_name' => $full_name);
						$this->model_users->update($arr_data, $user_id);
					}
					if ($this->input->post('password') && $this->input->post('re_password'))
					{
						$arr_data = array('password' => $password);
						$this->model_users->update($arr_data, $user_id);
					}
				}
				else
				{
					if ($this->model_users->check_email($email))
					{
						$arr_data = array('email' => $email, 'password' => $password, 'full_name' => $full_name);
						$this->model_users->insert($arr_data);
					}
					else
					{
						$this->session->set_flashdata('error', 'Email exists!');
					}

				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Input Form Eror!');
			}
		}
		redirect('admin/users');
	}

	public function permissions()
	{
		$user_id = intval($this->input->get('user_id'));
		$this->response['data']['list_permissions'] = $this->model_users->user_permissions($user_id);
		$this->response['data']['list_role'] = $this->model_role->all_role(TRUE);
		$this->response['title'] = 'Permissions';
		$this->response['template'] = 'default/users/permissions';
		$this->load->view('default/layout', $this->response);
	}

	public function save_permissions()
	{
		if ($this->input->post('save'))
		{
			$arr_check = $this->input->post('ckb_role');
			$user_id = intval($this->input->post('user_id'));
			$arr_permissions = $this->model_users->user_permissions($user_id);
			$arr_role = array();
			foreach ($arr_permissions as $role_id)
			{
				$arr_role[] = $role_id['role_id'];
			}
			foreach ($arr_role as $value)
			{
				if (!in_array($value, $arr_check))
				{
					$this->model_users->delete_permissions($user_id, $value);
				}
			}
			foreach ($arr_check as $id_role)
			{
				if ($this->model_users->check_permissions($user_id, $id_role))
				{
					$arr_data = array('user_id' => $user_id, 'role_id' => $id_role);
					$this->model_users->insert_permissions($arr_data);
				}
			}
		}
		redirect('admin/users');
	}

}
