<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_Login');
	}
	public function index()
	{
		redirect('Home');
	}
	public function login()
	{
		$title['title'] = "Welcome | WEBN Airdrops and Bounty Station";
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$title), 
			'user_jsscripts' => $this->load->view('pages/users/_template/_jsscripts'),
		);
		$this->load->view('pages/users/login',$data);
	}
	public function Login_Validation()
	{
		if ($this->input->post('SubmitLogin',true))
		{
			$data = array
			(
				'Email_Address' => $this->input->post('Email_Address',true),
				'Password' => $this->input->post('Password',true),
			);
			$result = $this->Model_Login->check_user($data);
			if ($result == true) {
				echo $result->Email_Address;
				echo $result->Password;
			}
			else
			{
				echo "ERROR";
			}
		}
	}
}
