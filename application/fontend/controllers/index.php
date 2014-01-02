<?php

class Index extends My_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('model_products');
	}

	public function index()
	{
		$this->response['data']['product_selected'] = $this->model_products->product_slide_show();
		$this->response['data']['product_new'] = $this->model_products->product_new();
		$this->response['title'] = 'Home';
		$this->response['template'] = 'default/index/index';
		$this->load->view('default/layout', $this->response);
	}

}
