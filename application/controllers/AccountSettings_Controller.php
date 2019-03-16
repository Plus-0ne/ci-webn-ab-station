<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountSettings_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
	}

	// ---------------- REDIRECT TO AIRDROPS
	public function index()
	{
		redirect('AccountSettings');
	}

	public function Account_Settings()
	{
		if ($this->session->userdata('isActive')) {
			$navdata['title'] = "Accounts | WEBN Airdrops and Bounty Station";
			$navdata['bot_token'] = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
			$navdata['chat_id'] = '-1001489662009';
			
			$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
			);

			$this->load->view('pages/users/account_settings',$data);
		}
		else
		{
			redirect('Home');
		}
	}
	public function SubmitHydroID()
	{
		if ($this->session->userdata('isActive')) {
			$HydroID = $this->input->post('HydroID',true);
			if ($HydroID == false) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opppsss!</strong> Hydro ID Empty. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('AccountSettings',location);
			}
			else
			{
				$UserNo = $this->session->userdata('UserNo');
				$HydroResult = $this->Model_Update->HydroIDUpdate($HydroID,$UserNo);
				if ($HydroResult == true) {
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

					$hydroId = $HydroID;
					$registerUser = $client->registerUser($hydroId);


					redirect('RegisterHydroVerify');

				}
			}
		}
		else
		{
			redirect('Home');
		}
	}

	public function UnregisterHydro()
	{
		if ($this->session->userdata('isActive')) {
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

			$client = new \Adrenth\Raindrop\Client($settings, $tokenStorage, $applicationId);require_once APPPATH."/../vendor/autoload.php";

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

			$hydroId = 'hlozv48';
			$unregisterUserResult = $client->unregisterUser($hydroId);

			if ($unregisterUserResult == TRUE) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>AWWW!</strong> Hydro ID Unregistered. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('AccountSettings',location);
			}
		}
	}

	public function VerifyHydroAuth()
	{
		if ($this->session->userdata('isActive')) {
			redirect('Home');
		}
		else
		{
			$UserNo = $this->input->post('UserNo',TRUE);
			$hyrdroid = $this->input->post('hyrdroid',TRUE);
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

			$result = $this->Model_Login->GetUserData($UserNo);

			if ($result == TRUE) {

				$this->Model_Update->updateUSerLogin($UserNo);
				
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible fade animated bounceInDown show" role="alert"><strong>Wow!</strong> Hydro Authentication is activated Login now. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				$this->session->sess_destroy();
				redirect('Login');
			}
			else
			{
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> ERROR. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Login');
			}
		}
	}
	

}
