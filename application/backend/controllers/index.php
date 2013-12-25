<?php

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('model_users');
	}

	public function index()
	{
		$flag = FALSE;
		if ($this->session->userdata("user_infor"))
		{
			$flag = TRUE;
		}
		if (isset($_POST['tbnLogin']))
		{
			$email = $_POST['username'];
			$password = $_POST['password'];
			$user = $this->model_users->check_login($email, $password);
			if (!empty($user))
			{
				$this->session->set_userdata('user_infor', $user);
				$this->session->set_userdata('role_user', $this->model_users->role_user($user->user_id));
				$flag = TRUE;
			}
		}
		if (!$flag)
		{
			$this->load->view("default/index/login");
		}
		else
		{
			$response['title'] = "Home";
			$response['template'] = 'default/index/home';
			$this->load->view("default/layout", $response);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_infor');
		$this->session->unset_userdata('role_user');
		$this->session->sess_destroy();
		redirect("admin/index");
	}

}
