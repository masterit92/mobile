<?php

class Index extends My_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('model_products');
	}

	public function index()
	{
		$this->model_products->set_infor(0, slide_show);
		$arr_where = array('selected <>' => 0);
		$arr_order_by = array('selected' => 'ASC');
		$this->model_products->arr_where = $arr_where;
		$this->model_products->arr_order_by = $arr_order_by;
		$this->response['data']['product_selected'] = $this->model_products->limit_product();
		$this->model_products->arr_where = NULL;
		$this->model_products->set_infor(0, 5);
		$this->response['data']['product_new'] = $this->model_products->limit_product();
		$this->response['title'] = "Home";
		$this->response['template'] = 'default/index/index';
		$this->load->view("default/layout", $this->response);
	}

}
