<?php

class Product extends My_controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('model_products');
        $this->model_products->set_infor(0,8);
        $top_category=$this->model_category->category_by_parent_id(0);
        $this->response['data']['top_category']=$top_category;
    }

    public function index()
    {
        $list_product=$this->model_products->limit_product();
        $this->response['data']['list_product']=$list_product;
        $this->response['data']['num_page']=ceil($this->model_products->get_num_page() / $this->model_products->num_row);
        $this->response['title']="Product";
        $this->response['template']='default/product/index';
        $this->load->view("default/layout",$this->response);
    }

    public function detail()
    {
        $p_id=intval($this->input->get('p_id'));
        $this->response['data']['product']=$this->model_products->product_by_id($p_id);
        $this->response['title']="Product";
        $this->response['template']='default/product/detail';
        $this->load->view("default/layout",$this->response);
    }

    public function product_category()
    {
        $c_id=intval($this->input->get('c_id'));
        $arr_pro_id=array();
        foreach($this->model_products->product_category($c_id) as $pro_id)
        {
            $arr_pro_id[]=$pro_id['p_id'];
        }
        if(count($arr_pro_id) > 0)
        {
            $arr_where_in=array('p_id' => $arr_pro_id);
            $this->model_products->arr_where_in=$arr_where_in;
            $this->response['data']['list_product']=$this->model_products->limit_product();
            $this->response['data']['num_page']=ceil($this->model_products->get_num_page() / $this->model_products->num_row);
        }
        else
        {
            $this->response['data']['list_product']=NULL;
        }
        $this->response['title']="Product";
        $this->response['template']='default/product/index';
        $this->load->view("default/layout",$this->response);
    }

    public function filter()
    {
        $this->response['data']['parent_id']=2;
    }

}
