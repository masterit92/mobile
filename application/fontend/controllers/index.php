<?php
class Index extends My_controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('model_products');
    }

    public function index()
    {
        $this->response['data']['product_selected']= $this->model_products->selected_product();
        $this->response['data']['product_new']= $this->model_products->limit_product(4,0);
        $this->response['title'] = "Home";
        $this->response['template'] = 'default/index/index';
        $this->load->view("default/layout", $this->response);
    }

}
