<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_Login');
	}
	/*
		Load login page
	 */
	public function login()
	{
		$this->session->sess_destroy();
		$title['title'] = "Welcome | WEBN Airdrops and Bounty Station";
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$title), 

		);
		$this->load->view('pages/users/login',$data);
	}
	/*
		Validate User 
	 */
	public function Login_Validation()
	{
		$Email_Address = $this->input->post('Email_Address',true);
		$UserPass = $this->input->post('Password',true);

		if ($Email_Address == false || $UserPass == false) {
			$this->session->set_flashdata('LoginResponse', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Empty fields </div>');
			redirect('Login');
		}
		else
		{
			$result = $this->Model_Login->get_email_add($Email_Address);
			if ($result == true) {
				if (password_verify($UserPass,$result->Password)) {

					if ($result->Hydro_Auth == 0) {
						
						$userdata = array(
							'UserNo' => $result->User_No,
							'Email' => $result->Email_Address,
							'Is_Telegram_Member' => $result->Is_Telegram_Member, 
							'Is_Subscriber' => $result->Is_Subscriber,  
							'Hydro_ID' => $result->Hydro_ID,
							'Hydro_Auth' => $result->Hydro_Auth,
							'Active_Status' => $result->Active_Status,
							'Account_Status' => $result->Account_Status,
							'VerificationCode' => $result->VerificationCode,
							'VerifyStatus' => $result->VerifyStatus,
							'isActive' => 1,
						);
						$this->session->set_userdata($userdata);

						redirect('Home');
					}
					else
					{
						$data = array(
							'UserNo' => $result->User_No,
							'Hydro_ID' => $result->Hydro_ID,
						);
						$this->session->set_userdata($data);
						$this->session->set_flashdata('Step2','Step 2');
						redirect('LoadHydroMessage');
					}
				}
				else {
					$this->session->set_flashdata('LoginResponse', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Wrong password </div>');
					redirect('Login');
				}
			}
			else
			{
				$this->session->set_flashdata('LoginResponse', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Email doesn\'t exist </div>');
				redirect('Login');
			}
		}
	}
	/*
		Hydro authentication for user 3
	 */
	public function HydroAuthentication()
	{
		if ($this->input->post('ha',true) == 'Authenticate') {
			$UserNo = $this->session->userdata('UserNo');
			$hyrdroid = $this->session->userdata('Hydro_ID');
			$hydromessage = $this->input->post('hydromessage',TRUE);

			require_once APPPATH."/../vendor/autoload.php";

			$clientId = 'suurpxpucsm6mg2f3vmv243n6g';
			$clientSecret = 'ocv1281prxvikoqbjocmmrbnge';
			$applicationId = '0161df87-3b3a-4005-a2c7-7c34a6764552';

			$settings = new \Adrenth\Raindrop\ApiSettings(
				$clientId,
				$clientSecret,
				new \Adrenth\Raindrop\Environment\SandboxEnvironment
			);

							// Create token storage for storing the API's access token.
			$tokenStorage = new \Adrenth\Raindrop\TokenStorage\FileTokenStorage(__DIR__.'/token.txt');

			$client = new \Adrenth\Raindrop\Client($settings, $tokenStorage, $applicationId);

			$hydroId = $hyrdroid;
			$message = $hydromessage;

			$verifys = $client->verifySignature($hydroId, $message);

			if ($verifys == true) {
				$result = $this->Model_Login->GetUserData($UserNo);

				if ($result == TRUE) {
					$userdata = array(
						'UserNo' => $result->User_No, 
						'Email' => $result->Email_Address,
						'Is_Telegram_Member' => $result->Is_Telegram_Member, 
						'Is_Subscriber' => $result->Is_Subscriber,  
						'Hydro_ID' => $result->Hydro_ID,
						'Hydro_Auth' => $result->Hydro_Auth,
						'Active_Status' => $result->Active_Status,
						'Account_Status' => $result->Account_Status,
						'VerificationCode' => $result->VerificationCode,
						'VerifyStatus' => $result->VerifyStatus,
						'isActive' => 1,
					);

					$this->session->set_userdata($userdata);

					redirect('Home');
				}
				else
				{
					$this->session->sess_destroy();
					redirect('Login');
				}
			}
		}
	}
	/*
		User Logout
	 */
	public function logout()
	{
		if (isset($_SESSION['isActive'])) {
			$this->session->sess_destroy();
			redirect('Login');
		}
		else
		{
			redirect('Login');
		}
	}
}
