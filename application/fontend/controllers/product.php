<?php
class Product extends My_controller{

    protected $filter_by = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('model_products');
        $this->load->Model('model_maker');
        $this->model_products->set_infor(0, 8);
        $this->response['data']['makers'] = $this->model_maker->all_maker();
        if($this->session->userdata('filter_by'))
        {
            $this->filter_by = $this->session->userdata('filter_by');
        }
    }

    public function index()
    {
        $this->session->unset_userdata('filter_by');
        $list_product = $this->model_products->limit_product();
        $this->response['data']['list_product'] = $list_product;
        $this->response['data']['num_page'] = ceil($this->model_products->get_num_page() / $this->model_products->num_row);
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
        $this->load->view('default/layout', $this->response);
    }

    public function product_category()
    {
        $c_id = intval($this->input->get('c_id'));
        $this->filter_by['c_id'] = $c_id;
        $this->session->set_userdata('filter_by', $this->filter_by);
        $arr_pro_id = array();
        foreach($this->model_products->product_category($c_id) as $pro_id)
        {
            $arr_pro_id[] = $pro_id['p_id'];
        }
        if(count($arr_pro_id) > 0)
        {
            $arr_where_in = array('p_id' => $arr_pro_id);
            $this->model_products->arr_where_in = $arr_where_in;
            $this->response['data']['list_product'] = $this->model_products->limit_product();
            $this->response['data']['num_page'] = ceil($this->model_products->get_num_page() / $this->model_products->num_row);
        }
        else
        {
            $this->response['data']['list_product'] = NULL;
        }
        $this->response['title'] = "Product";
        $this->response['template'] = 'default/product/index';
        $this->load->view("default/layout", $this->response);
    }

    public function filter()
    {
        if(isset($this->filter_by['top_c_id']))
        {
            $this->response['data']['parent_id'] = $this->filter_by['top_c_id'];
        }
        $this->response['data']['list_product'] = $this->model_products->limit_product();
        $this->response['data']['num_page'] = ceil($this->model_products->get_num_page() / $this->model_products->num_row);
        $this->response['title'] = "Product";
        $this->load->view("default/product/index", $this->response);
    }

    public function price_rang()
    {
        if($this->input->post('price_rang'))
        {
            $range = explode(' - ', $this->input->post('price_rang'));
            $min = ltrim($range[0], "$");
            $max = ltrim($range[1], "$");
            $this->filter_by['price_min'] = $min;
            $this->filter_by['price_max'] = $max;
            $this->session->set_userdata('filter_by', $this->filter_by);
        }
        $this->filter();
    }

    public function makers()
    {
        if($this->input->post('arr_m_id'))
        {
            $this->filter_by['arr_m_id'] = $this->input->post('arr_m_id');
            $this->session->set_userdata('filter_by', $this->filter_by);
        }
        $this->filter();
    }

    public function search()
    {
        if($this->input->post('btn_search'))
        {
            $name = $this->input->post('txt_search');
            $this->filter_by['search'] = $name;
            $this->session->set_userdata('filter_by', $this->filter_by);
            $arr_like = array('name' => $name);
            $this->model_products->arr_like = $arr_like;
            $list_product = $this->model_products->limit_product();
            $this->response['data']['list_product'] = $list_product;
            $this->response['data']['num_page'] = ceil($this->model_products->get_num_page() / $this->model_products->num_row);
            $this->response['title'] = "Product";
            $this->response['template'] = 'default/product/index';
            $this->load->view("default/layout", $this->response);
        }
        else
        {
            redirect('product');
        }
    }

}
