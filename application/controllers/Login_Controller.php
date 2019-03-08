<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_Login');
		$this->load->helper('security');

	}
	// ---------------- REDIRECT TO LOGIN
	public function index()
	{
		redirect('Login');
	}
	// ---------------- LOAD LOGIN VIEW
	public function login()
	{
		$title['title'] = "Welcome | WEBN Airdrops and Bounty Station";
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$title), 

		);
		$this->load->view('pages/users/login',$data);
	}
	// ---------------- VALIDATE USER LOGIN
	public function Login_Validation()
	{
		if ($this->session->userdata('isActive') == 1) {
			redirect('Home');
		}
		else
		{
			$Email_Address = $this->input->post('Email_Address1',true);
			$UserPass = $this->input->post('Password1',true);


			$result = $this->Model_Login->get_email_add($Email_Address);

			if ($result == true) {
				if (password_verify($UserPass,$result->Password)) {
				    
				    $userdata = array(
							'UserNo' => $result->User_No,
							'Fname' => $result->First_Name, 
							'Lname' => $result->Last_Name, 
							'Email' => $result->Email_Address,
							'Is_Telegram_Member' => $result->Is_Telegram_Member, 
							'Is_Subscriber' => $result->Is_Subscriber,  
							'Hydro_ID' => $result->Hydro_ID,
							'Active_Status' => $result->Active_Status,
							'Account_Status' => $result->Account_Status, 
							'isActive' => 1,
						);
						$this->session->set_userdata($userdata);

						echo "OK";
				}
				else {
				    echo "WRONG PASSWORD";
				}
			}
			else
			{
				echo "EMAIL NOT FOUND";
			}
		}
	}
	// ---------------- LOGOUT
	public function logout()
	{
		if ($this->session->userdata('isActive') == 1) {
			$this->session->sess_destroy();
			redirect('Login');
		}
		else
		{
			redirect('Login');
		}
	}
}
