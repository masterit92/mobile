<?php

class Role extends My_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('model_role');
		$this->load->Model('model_users');
	}

	public function index()
	{
		$this->response['data']['list_role'] = $this->model_role->all_role();
		$this->response['title'] = "Role";
		$this->response['template'] = 'default/role/index';
		$this->load->view("default/layout", $this->response);
	}

	public function set_status()
	{
		if ($this->input->get('role_id'))
		{
			$role_id = intval($this->input->get('role_id'));
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
			$this->model_role->update($arr_data, $role_id);
		}
		redirect('admin/role');
	}

	public function delete()
	{
		if ($this->input->get('role_id'))
		{
			$role_id = intval($this->input->get('role_id'));
			$this->model_role->delete($role_id);
		}
		redirect('admin/role');
	}

	public function edit()
	{
		if ($this->input->get('role_id'))
		{
			$role_id = intval($this->input->get('role_id'));
			$this->response['data']['role'] = $this->model_role->role_by_id($role_id);
		}
		$this->response['title'] = "Edit Users";
		$this->response['template'] = 'default/role/form';
		$this->load->view("default/layout", $this->response);
	}

	public function create()
	{
		$this->response['title'] = "Create Users";
		$this->response['template'] = 'default/role/form';
		$this->load->view("default/layout", $this->response);
	}

	public function save()
	{
		if ($this->input->post('save'))
		{
			$role_name = $this->input->post('role_name');
			if ($this->model_role->check_role($role_name) && !empty($role_name))
			{
				$arr_date = array('name' => $role_name);
				if ($this->input->post('role_id'))
				{
					$role_id = intval($this->input->post('role_id'));
					$this->model_role->update($arr_date, $role_id);
				}
				else
				{
					$this->model_role->insert($arr_date);
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Role name exists or empty!');
			}
		}
		redirect('admin/role');
	}

}