<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_Signup');
		$this->load->helper('security');
	}

	// ---------------- REDIRECT TO SIGN UP VIEW
	public function index()
	{
		redirect('Sign_up');
	}

	// ---------------- LOAD SIGNUP VIEW
	public function Sign_up()
	{

		$title['title'] = "Sign-Up | WEBN Airdrops and Bounty Station";
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$title), 
		);
		$this->load->view('pages/users/sign-up',$data);
	}

	// ---------------- SUBMIT REGISTRATION
	public function submit_form_signup()
	{
		if ($this->session->userdata('isActive') == 1) {
			redirect('Home');
		}
		else
		{
			if ($this->input->post('Password',true) == $this->input->post('rePassword',true) || $this->input->post('rePassword',true) == $this->input->post('Password',true)) {

				$Email_Add = $this->input->post('Email_Address',true);
				$EmailCheck = $this->Model_Signup->Check_EmailAdd($Email_Add);

				if ($EmailCheck->Email_Address == $Email_Add) {
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opppsss!</strong> Email Address exist. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Sign-Up');
				}
				else
				{
					$hashed = $this->input->post('rePassword',true);
					$Password = password_hash($hashed, PASSWORD_BCRYPT);
					
					$data = array
					(
						'First_Name' => $this->input->post('First_Name',true),
						'Last_Name' => $this->input->post('Last_Name',true),
						'Email_Address' => $this->input->post('Email_Address',true),
						'Password' => $Password,
						'Is_Telegram_Member' => "0",
						'Is_Subscriber' => "0",
						'Hydro_ID' => "0",
						'Hydro_Auth' => "0",
						'Active_Status' => "0",
						'Account_Status' => "1",
						'isICO' => "no",
					);
					$result = $this->Model_Signup->register_user($data);

					if ($result == true) {

						$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible fade animated bounceInDown show" role="alert"><strong> Registration Success! </strong> Login using your email and password. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('Sign-Up');
					}
					else
					{
						$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Awww!</strong> Somesthings wrong. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('Sign-Up');
					}
				}
			}
			else
			{
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opppsss!</strong> Password didn\'t match. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Sign-Up');
			}


			
			
		}
	}
}