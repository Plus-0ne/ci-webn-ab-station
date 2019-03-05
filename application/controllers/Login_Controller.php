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

		);
		$this->load->view('pages/users/login',$data);
	}
	public function Login_Validation()
	{
		if ($this->session->userdata('isActive') == 1) {
			redirect('Home');
		}
		else
		{
			$Email_Address = $this->input->post('Email_Address1',true);
			$Password = do_hash($this->input->post('Password1'), 'md5',true); 

			$data = array
			(
				'Email_Address' => $Email_Address,
				'Password' => $Password,
			);
			$result = $this->Model_Login->check_user($data);
			if ($result == true) {
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
			else
			{
				echo "ERROR";
			}
		}
	}
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
