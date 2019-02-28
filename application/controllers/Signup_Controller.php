<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_Signup');
		$this->load->helper('security');
	}
	public function index()
	{
		redirect('Sign_up');
	}
	public function Sign_up()
	{
		$title['title'] = "Sign-Up | WEBN Airdrops and Bounty Station";
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$title), 
			'user_jsscripts' => $this->load->view('pages/users/_template/_jsscripts'),
		);
		$this->load->view('pages/users/sign-up',$data);
	}
	public function submit_form_signup()
	{
		$Passwords = $this->input->post('Password',true);

		$Password = do_hash($Passwords, 'md5');

		if ($this->input->post('Sign_Up',true)) {
			$data = array
			(
				'First_Name' => $this->input->post('First_Name',true),
				'Last_Name' => $this->input->post('Last_Name',true),
				'Email_Address' => $this->input->post('Email_Address',true),
				'Password' => $Password,
			);

			$result = $this->Model_Signup->register_user($data);

			if ($result == true) {
				// redirect to page saved
			}
			else
			{
				// redirect to page error
			}

		}
	}
}