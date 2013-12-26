<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class My_controller extends CI_Controller {

	public $response;

	public function __construct()
	{
		parent::__construct();

		$this->load->Model('model_category');
		$this->response['data']['all_category'] = $this->model_category->all_category();
	}

}
