<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class My_controller extends CI_Controller {

	public $response;

	public function __construct()
	{
		parent::__construct();
		if (!$this->check_role())
		{
			echo '<h1>Sorry! Error!!</h1>';
			die('__________________________________');
		}
	}

	public function check_role()
	{
		$result = FALSE;
		if ($this->session->userdata("role_user") && $this->session->userdata("user_infor"))
		{
			foreach ($this->session->userdata("role_user") as $roles)
			{
				if (in_array('admin', $roles) OR in_array($this->uri->segment(1), $roles))
				{
					$result = TRUE;
				}
			}
		}
		return $result;
	}

}
