<?php

class Maker extends My_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('model_maker');
		$this->load->Model('model_product');
	}

	public function index()
	{
		$arr_maker = $this->model_maker->all_maker();
		$this->response['data']['list_maker'] = $arr_maker;
		$this->response['title'] = 'Maker';
		$this->response['template'] = 'default/maker/index';
		$this->load->view("default/layout", $this->response);
	}

	public function delete()
	{
		$m_id = intval($this->input->get('m_id'));
		if ($m_id !== MAKER_DEFAULT)
		{
			$arr_pro = $this->model_maker->product_maker($m_id);
			foreach ($arr_pro as $pro)
			{
				$arr_data = array('m_id' => MAKER_DEFAULT);
				$this->model_product->update($arr_data, $pro['p_id']);
			}
			$this->model_maker->delete($m_id);
		}
		else
		{
			$this->session->set_flashdata('error', 'No Delete!');
		}
		redirect('admin/maker');
	}

	public function edit()
	{
		$m_id = intval($this->input->get('m_id'));
		$maker = $this->model_maker->maker_by_id($m_id);
		if (isset($maker[0]['m_id']) && $maker[0]['m_id'] != MAKER_DEFAULT)
		{
			$this->response['data']['maker'] = $maker;
			$this->response['title'] = 'Maker';
			$this->response['template'] = 'default/maker/form';
			$this->load->view("default/layout", $this->response);
		}
		else
		{
			$this->session->set_flashdata('error', 'No Edit!');
			redirect('admin/maker');
		}
	}

	public function create()
	{
		$this->response['title'] = 'Maker';
		$this->response['template'] = 'default/maker/form';
		$this->load->view("default/layout", $this->response);
	}

	public function save()
	{
		if ($this->input->post('save'))
		{
			$name = $this->input->post('name');
			if (!empty($name))
			{
				$arr_data = array('name' => $name);
				if ($this->input->post('m_id'))
				{
					$m_id = intval($this->input->post('m_id'));
					$this->model_maker->update($arr_data, $m_id);
				}
				else
				{
					$this->model_maker->insert($arr_data);
				}
			}
		}
		redirect('admin/maker');
	}

}
