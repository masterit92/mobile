<?php

class Category extends My_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('model_category');
	}

	public function index()
	{
		$arr_cat = $this->model_category->all_category();
		$this->response['data']['list_category'] = $arr_cat;
		$this->response['title'] = 'Category';
		$this->response['template'] = 'default/category/index';
		$this->load->view("default/layout", $this->response);
	}

	public function set_status()
	{
		if ($this->input->get('c_id'))
		{
			$c_id = intval($this->input->get('c_id'));
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
			$this->model_category->update($arr_data, $c_id);
		}
		redirect('admin/category');
	}

	public function delete()
	{
		if ($this->input->get('c_id'))
		{
			$c_id = intval($this->input->get('c_id'));
			$this->model_category->delete($c_id);
		}
		redirect('admin/category');
	}

	public function edit()
	{
		$c_id = intval($this->input->get('c_id'));
		$this->response['data']['category'] = $this->model_category->category_by_id($c_id);
		$arr_cat = $this->model_category->all_category();
		$this->response['data']['list_category'] = $arr_cat;
		$this->response['title'] = 'Edit Category';
		$this->response['template'] = 'default/category/form';
		$this->load->view("default/layout", $this->response);
	}

	public function create()
	{
		$arr_cat = $this->model_category->all_category();
		$this->response['data']['list_category'] = $arr_cat;
		$this->response['title'] = 'Create Category';
		$this->response['template'] = 'default/category/form';
		$this->load->view("default/layout", $this->response);
	}

	public function save()
	{
		if ($this->input->post('save'))
		{
			$name = $this->input->post('category_name');
			$parent_id = $this->input->post('parent_id');
			if (!empty($name))
			{
				$arr_data = array('name' => $name, 'parent_id' => $parent_id);
				if ($this->input->post('c_id'))
				{
					$c_id = intval($this->input->post('c_id'));
					$this->model_category->update($arr_data, $c_id);
				}
				else
				{
					$this->model_category->insert($arr_data);
				}
			}
		}
		redirect('admin/category');
	}

}