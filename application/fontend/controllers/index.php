<?php
class Index extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $response['title'] = "Home";
        $response['template'] = 'home';
        $this->load->view("default/layout", $response);
    }

}
