<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_Login');
		$this->load->database();
		
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
		$Email_Address = $this->input->post('Email_Address1');
		$Password = do_hash($this->input->post('Password1'), 'md5'); 

		$data = array
		(
			'Email_Address' => $Email_Address,
			'Password' => $Password,
		);
		$result = $this->Model_Login->check_user($data);
		if ($result == true) {
			echo "OK";
		}
		else
		{
			echo "ERROR";
		}
	}
}
