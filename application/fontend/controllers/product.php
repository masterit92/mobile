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
		$list_product = $this->model_products->limit_product($min_max_price);
		$this->response['data']['list_product'] = $list_product;
		$this->response['data']['min_max_price'] = $min_max_price;
		$this->filter_by['min_max_price'] = $min_max_price;
		$this->session->set_userdata('filter_by', $this->filter_by);
		$this->response['data']['num_page'] = ceil($this->model_products->get_num_page() / $this->model_products->num_row);
		$this->response['title'] = "Product";
		$this->response['template'] = 'default/product/index';
		$this->load->view("default/layout", $this->response);
	}

	public function detail()
	{
		$p_id = intval($this->input->get('p_id'));
		$product = $this->model_products->product_by_id($p_id);
		$price_min = $product[0]['price'] - 20;
		$price_max = $product[0]['price'] + 20;
		$arr_where = array('price >= ' => $price_min, 'price <= ' => $price_max, 'p_id <>' => $p_id);
		$this->model_products->arr_where = $arr_where;
		$this->model_products->start = 0;
		$this->model_products->num_row = 4;

		$this->response['data']['arr_relate'] = $this->model_products->limit_product();
		$this->response['data']['product'] = $product;
		$this->response['title'] = "Product";
		$this->response['template'] = 'default/product/detail';
		$this->load->view('default/layout', $this->response);
	}

	public function product_category()
	{
		$this->filter_by = NULL;
		$c_id = intval($this->input->get('c_id'));
		$arr_c_id = array($this->input->get('c_id'));
		$this->model_category->category_child($c_id, $arr_c_id);
		$this->filter_by['c_id'] = $c_id;
		$this->filter_by['arr_c_id'] = $arr_c_id;
		$this->session->set_userdata('filter_by', $this->filter_by);

		$arr_pro_id = $this->model_products->product_in_category($arr_c_id);
		if (count($arr_pro_id) > 0)
		{
			$arr_where_in = array('p_id' => $arr_pro_id);
			$this->model_products->arr_where_in = $arr_where_in;
			$min_max_price = array();
			$this->response['data']['list_product'] = $this->model_products->limit_product($min_max_price);
			$this->response['data']['min_max_price'] = $min_max_price;
			$this->filter_by['min_max_price'] = $min_max_price;
			$this->response['data']['num_page'] = ceil($this->model_products->get_num_page() / $this->model_products->num_row);
		}
		else
		{
			$this->response['data']['list_product'] = NULL;
		}
		$this->session->set_userdata('filter_by', $this->filter_by);
		$this->maker_category($arr_c_id);
		$this->response['title'] = "Product";
		$this->response['template'] = 'default/product/index';
		$this->load->view("default/layout", $this->response);
	}

	public function filter()
	{
		$this->delete_filter();
		$this->makers();
		$this->sort();
		$this->price_rang();
		$this->model_products->filter_by($this->filter_by);
		$page = 0;
		if ($this->input->post('page'))
		{
			$page = intval($this->input->post('page')) - 1;
			$this->model_products->start = intval($this->model_products->num_row) * $page;
		}
		$min_max_price = array();
		$action = TRUE;
		if ($this->input->post('price_rang'))
		{
			$action = FALSE;
		}
		$this->response['data']['list_product'] = $this->model_products->limit_product($min_max_price, $action);
		if (!$action)
		{
			$min_max_price = $this->filter_by['min_max_price'];
		}
		$this->response['data']['min_max_price'] = $min_max_price;
		$this->response['data']['num_page'] = ceil($this->model_products->get_num_page() / $this->model_products->num_row);
		$this->response['data']['page'] = $page + 1;
		$this->response['title'] = "Product";
		$this->load->view("default/product/index", $this->response);
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
		}
		if (isset($this->filter_by['c_id']))
		{
			$this->maker_category($this->filter_by['arr_c_id']);
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

	public function search()
	{
		if ($this->input->post('btn_search'))
		{
			$this->filter_by = NULL;
			$name = $this->input->post('txt_search');
			$this->filter_by['search'] = $name;

			$arr_like = array('name' => $name);
			$this->model_products->arr_like = $arr_like;
			$min_max_price = array();
			$list_product = $this->model_products->limit_product($min_max_price);
			$this->response['data']['list_product'] = $list_product;
			$this->response['data']['min_max_price'] = $min_max_price;
			$this->filter_by['min_max_price']= $min_max_price;
			$this->session->set_userdata('filter_by', $this->filter_by);
			$this->response['data']['num_page'] = ceil($this->model_products->get_num_page() / $this->model_products->num_row);
			$this->response['title'] = 'Product';
			$this->response['template'] = 'default/product/index';
			$this->load->view('default/layout', $this->response);
		}
		else
		{
			redirect('product');
		}
	}

	protected function delete_filter()
	{
		if ($this->input->post('filter'))
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
			$this->session->set_userdata('filter_by', $this->filter_by);
		}
	}

	public function maker_category($arr_c_id)
	{
		$arr_maker_cat = $this->model_products->maker_product($arr_c_id);
		$this->response['data']['makers'] = $this->model_maker->maker_by_id($arr_maker_cat);
	}
}
