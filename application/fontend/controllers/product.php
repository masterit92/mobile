<?php

class Product extends My_controller {

	protected $filter_by = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('model_products');
		$this->load->Model('model_maker');
		$this->model_products->set_infor(0, 8);
		$this->response['data']['makers'] = $this->model_maker->all_maker();
		if ($this->session->userdata('filter_by'))
		{
			$this->filter_by = $this->session->userdata('filter_by');
		}
	}

	public function index()
	{
		$this->filter_by = NULL;
		$min_max_price = array();
		$list_product = $this->model_products->all_product($min_max_price);
		$this->response['data']['list_product'] = $list_product;
		$this->response['data']['min_max_price'] = $min_max_price;
		$this->filter_by['min_max_price'] = $min_max_price;
		$this->session->set_userdata('filter_by', $this->filter_by);
		$this->response['data']['num_page'] = ceil($this->model_products->get_num_page() / $this->model_products->num_row);
		$this->response['title'] = 'Product';
		$this->response['template'] = 'default/product/index';
		$this->load->view('default/layout', $this->response);
	}

	public function detail()
	{
		$p_id = intval($this->input->get('p_id'));
		$product = $this->model_products->product_by_id($p_id);
		$this->response['data']['arr_relate'] = $this->model_products->product_relate($product[0]['price'], $p_id);
		$this->response['data']['product'] = $product;
		$this->response['title'] = 'Product';
		$this->response['template'] = 'default/product/detail';
		$this->load->view('default/layout', $this->response);
	}

	public function product_category()
	{
		$this->filter_by = NULL;
		$c_id = intval($this->input->get('c_id'));
		$arr_c_id = array();
		$this->model_category->category_child($c_id, $arr_c_id);
		$arr_c_id[] = $this->input->get('c_id');
		$this->filter_by['c_id'] = $c_id;
		$this->filter_by['arr_c_id'] = $arr_c_id;
		$this->session->set_userdata('data_c_id', $arr_c_id);
		$this->session->set_userdata('filter_by', $this->filter_by);

		$arr_pro_id = $this->model_products->product_in_category($arr_c_id);
		if (count($arr_pro_id) > 0)
		{
			$min_max_price = array();
			$this->response['data']['list_product'] = $this->model_products->get_product_category($arr_pro_id, $min_max_price);
			$this->response['data']['min_max_price'] = $min_max_price;
			$this->filter_by['min_max_price'] = $min_max_price;
			$this->response['data']['num_page'] = ceil($this->model_products->get_num_page() / $this->model_products->num_row);
		}
		else
		{
			$this->response['data']['list_product'] = NULL;
		}
		$this->session->set_userdata('filter_by', $this->filter_by);
		$this->response['data']['makers'] = $this->maker_category($arr_c_id);
		$this->response['title'] = 'Product';
		$this->response['template'] = 'default/product/index';
		$this->load->view('default/layout', $this->response);
	}

	public function filter()
	{
		$this->delete_filter();
		$this->makers();
		$this->sort();
		$this->price_rang();
		$page = 0;
		if ($this->input->post('page'))
		{
			$page = intval($this->input->post('page')) - 1;
		}
		$min_max_price = array();
		$action = TRUE;
		if ($this->input->post('price_rang'))
		{
			$action = FALSE;
		}
		$this->response['data']['list_product'] = $this->model_products->filter_product($this->filter_by, $page, 8, $min_max_price, $action);
		if (!$action)
		{
			$min_max_price = $this->filter_by['min_max_price'];
		}
		if ($this->session->userdata('data_c_id') && isset($this->filter_by['price_min']))
		{
			$this->response['data']['makers'] = $this->maker_category($this->session->userdata('data_c_id'), $this->filter_by['price_min'], $this->filter_by['price_max']);
		}
		else if (isset($this->filter_by['c_id']))
		{
			$this->response['data']['makers'] = $this->maker_category($this->filter_by['arr_c_id']);
		}
		$this->response['data']['min_max_price'] = $min_max_price;
		$this->response['data']['num_page'] = ceil($this->model_products->get_num_page() / $this->model_products->num_row);
		$this->response['data']['page'] = $page + 1;
		$this->response['title'] = 'Product';
		$this->load->view('default/product/index', $this->response);
	}

	protected function price_rang()
	{
		if ($this->input->post('price_rang'))
		{
			$range = explode(' - ', $this->input->post('price_rang'));
			$min = ltrim($range[0], '$');
			$max = ltrim($range[1], '$');
			$this->filter_by['price_min'] = $min;
			$this->filter_by['price_max'] = $max;
			$this->response['data']['makers'] = $this->maker_category($this->session->userdata('data_c_id'), $min, $max);
			$this->session->set_userdata('filter_by', $this->filter_by);
		}
	}

	protected function makers()
	{
		if ($this->input->post('arr_m_id'))
		{
			$arr_m_id = $this->input->post('arr_m_id');
			if (count($arr_m_id) > 0)
			{
				$this->filter_by['arr_m_id'] = $arr_m_id;
			}
			else
			{
				$this->filter_by['arr_m_id'] = NULL;
			}
			$this->session->set_userdata('filter_by', $this->filter_by);
			if ($this->session->userdata('data_c_id') && isset($this->filter_by['price_min']))
			{
				$this->response['data']['makers'] = $this->maker_category($this->session->userdata('data_c_id'), $this->filter_by['price_min'], $this->filter_by['price_max']);
			}
			else if (isset($this->filter_by['c_id']))
			{
				$this->response['data']['makers'] = $this->maker_category($this->filter_by['arr_c_id']);
			}
		}
	}

	protected function sort()
	{
		if ($this->input->post('sort_name'))
		{
			$sort_name = $this->input->post('sort_name');
			$this->filter_by['sort_name'] = $sort_name;
			unset($this->filter_by['sort_price']);
			$this->session->set_userdata('filter_by', $this->filter_by);
		}
		else if ($this->input->post('sort_price'))
		{
			$sort_price = $this->input->post('sort_price');
			$this->filter_by['sort_price'] = $sort_price;
			unset($this->filter_by['sort_name']);
			$this->session->set_userdata('filter_by', $this->filter_by);
		}
	}

	protected function delete_filter()
	{
		if ($this->input->post('filter'))
		{
			if ($this->input->post('filter') === 'clear_filter')
			{
				$cat_id = $this->filter_by['c_id'];
				$arr_c_id = $this->filter_by['arr_c_id'];
				$this->filter_by = NULL;
				$this->filter_by['c_id'] = $cat_id;
				$this->filter_by['arr_c_id'] = $arr_c_id;
			}
			else
			{
				if ($this->input->post('filter') === 'c_id')
				{
					unset($this->filter_by['arr_c_id']);
				}
				if ($this->input->post('filter') === 'price_min' OR $this->input->post('filter') === 'price_max')
				{
					unset($this->filter_by['price_min']);
					unset($this->filter_by['price_max']);
				}
				unset($this->filter_by[$this->input->post('filter')]);
			}
			$this->session->set_userdata('filter_by', $this->filter_by);
		}
	}

	protected function maker_category($arr_c_id, $price_min = NULL, $price_max = NULL)
	{
		$arr_maker_cat = $this->model_products->maker_product($arr_c_id, $price_min, $price_max);
		return $this->model_maker->maker_by_id($arr_maker_cat);
	}
}
