<?php
class Product extends My_controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('model_products');
    }

    public function index()
    {
        $start = 0;
        $num_row = 6;
        $list_product=$this->model_products->limit_product($num_row, $start);
        $this->response['data']['list_product'] = $list_product ;
        $this->response['data']['num_page'] = ceil($this->model_products->count_all()/$num_row);
        $this->response['title'] = "Product";
        $this->response['template'] = 'default/product/index';
        $this->load->view("default/layout", $this->response);
    }

    public function detail()
    {
        $p_id = intval($this->input->get('p_id'));
        $this->response['data']['product'] = $this->model_products->product_by_id($p_id);
        $this->response['title'] = "Product";
        $this->response['template'] = 'default/product/detail';
        $this->load->view("default/layout", $this->response);
    }

    public function product_category()
    {
        $c_id = intval($this->input->get('c_id'));
        $this->response['data']['list_product'] = $this->model_products->product_by_category($c_id);
        $this->response['data']['num_page'] =10;
        $this->response['title'] = "Product";
        $this->response['template'] = 'default/product/index';
        $this->load->view("default/layout", $this->response);
    }

}
