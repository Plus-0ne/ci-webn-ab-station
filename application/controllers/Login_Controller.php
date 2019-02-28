<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_Login');
		$this->load->helper('security');

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
			$Passwords = $this->input->post('Password',true);
			$Password = do_hash($Passwords, 'md5');

			$data = array
			(
				'Email_Address' => $this->input->post('Email_Address',true),
				'Password' => $Password,
			);
			$result = $this->Model_Login->check_user($data);
			if ($result == true) {
				echo '<h1>'.$result->Hydro_ID.'</h1>';
				echo "OK";
			}
			else
			{
				echo "ERROR";
			}
		}
	}
}
