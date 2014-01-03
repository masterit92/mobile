<?php
class Product extends My_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('model_product');
		$this->load->Model('model_category');
		$this->load->Model('model_maker');
	}

	public function index()
	{
		$count_num_row = intval($this->model_product->count_all());
		$start = 0;
		$num_row = 10;
		if ($this->input->post('page'))
		{
			$page = intval($this->input->post('page')) - 1;
			$start = $num_row * $page;
		}
		$this->response['data']['list_product'] = $this->model_product->limit_product($num_row, $start);
		$this->response['data']['num_page'] = ceil($count_num_row / $num_row);
		$this->response['title'] = "Product";
		if ($this->input->post('page'))
		{
			$this->response['data']['page'] = $this->input->post('page');
			$this->load->view('default/product/index', $this->response);
		}
		else
		{
			$this->response['template'] = 'default/product/index';
			$this->load->view('default/layout', $this->response);
		}
	}

	public function set_status()
	{
		if ($this->input->get('p_id'))
		{
			$p_id = intval($this->input->get('p_id'));
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
			$this->model_product->update($arr_data, $p_id);
		}
		redirect('admin/product');
	}

	public function delete()
	{
		if ($this->input->get('p_id'))
		{
			$p_id = intval($this->input->get('p_id'));
			$this->model_product->delete($p_id);
		}
		redirect('admin/product');
	}

	public function create()
	{
		$arr_cat = $this->model_category->all_category();
		$this->response['data']['list_category'] = $arr_cat;
		$this->response['title'] = 'Create Product';
		$this->response['template'] = 'default/product/form';
		$this->load->view('default/layout', $this->response);
	}

	public function edit()
	{
		$arr_cat = $this->model_category->all_category();
		$this->response['data']['list_category'] = $arr_cat;
		$p_id = intval($this->input->get('p_id'));
		$this->response['data']['product'] = $this->model_product->product_by_id($p_id);
		$this->response['data']['product_category'] = $this->model_product->product_category($p_id);
		$this->response['title'] = 'Edit Product';
		$this->response['template'] = 'default/product/form';
		$this->load->view('default/layout', $this->response);
	}

	public function save()
	{
		if ($this->input->post('save'))
		{
			$name = $this->input->post('product_name');
			$price = $this->input->post('price');
			$description = $this->input->post('description');
			$quantity =$this->input->post('quantity');
			$thumb = $this->upload_img('thumb');
			$arr_c_id = $this->input->post('cat_id');
			$m_id = $this->input->post('m_id');
			$selected = $this->input->post('selected');
			$arr_data = array('name' => $name, 'price' => $price, 'description' => $description, 'quantity' => $quantity, 'm_id' => $m_id, 'selected' => $selected);
			if (!empty($name) && $quantity >= 0 && is_numeric($quantity) && is_numeric($price))
			{
				if ($thumb !== NULL)
				{
					$arr_data['thumb'] = $thumb;
				}
				if ($this->input->post('p_id'))
				{
					$p_id = intval($this->input->post('p_id'));
					if ($thumb !== NULL)
					{
						$product = $this->model_product->product_by_id($p_id);
						$arr_data['thumb'] = $product[0]['thumb'];
						if (!empty($_FILES['thumb']['name']))
						{
							$arr_data['thumb'] = $thumb;
							unlink($product[0]['thumb']);
						}
					}
					$this->model_product->update($arr_data, $p_id);
					$arr_p_c = $this->model_product->product_category($p_id);
					foreach ($arr_p_c as $value)
					{
						if (!in_array($value, $arr_c_id))
						{
							$this->model_product->delete_product_category($p_id, $value);
						}
					}
					foreach ($arr_c_id as $c_id)
					{
						if (!in_array($c_id, $arr_p_c))
						{
							$data_c_p = array('p_id' => $p_id, 'c_id' => $c_id);
							$this->model_product->insert_product_category($data_c_p);
						}
					}
				}
				else
				{
					$p_id_new = $this->model_product->insert($arr_data);
					foreach ($arr_c_id as $c_id)
					{
						$data_c_p = array('p_id' => $p_id_new, 'c_id' => $c_id);
						$this->model_product->insert_product_category($data_c_p);
					}
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Form error!');
			}
		}
		redirect('admin/product');
	}

	public function upload_img($filed_name)
	{
		$path = realpath('../public/backend/images');
		if ($path)
		{
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['encrypt_name'] = FALSE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$_FILES[$filed_name]['name'] = $_FILES[$filed_name]['name'];
			$url_img = 'public/backend/images/' . $_FILES[$filed_name]['name'];
			$check_upload = $this->upload->do_upload($filed_name);
			if ($check_upload)
			{
				return $url_img;
			}
		}
		return 'public/default_img.gif';
	}

}
