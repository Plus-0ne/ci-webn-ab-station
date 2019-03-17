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

			$bot_token = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
			$chat_id = '-1001489662009';
			$idid = $this->session->userdata('Is_Telegram_Member');
			$botToken = $bot_token;
			$url="https://api.telegram.org/bot".$botToken;
			$chatId=$chat_id;  //Receiver Chat Id 

			$params=[
				'chat_id'=>$chatId,
				'user_id'=>$idid,
			];

			$ch = curl_init($url . '/getChatMember?');
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$result = curl_exec($ch);


			$data['getUserData'] = json_decode($result ,true);

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

					$this->session->set_userdata('Hydro_ID',$HydroID);
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
		if ($this->session->userdata('isActive') == 3) {
			require_once APPPATH."/../vendor/autoload.php";

			$clientId = 'suurpxpucsm6mg2f3vmv243n6g';
			$clientSecret = 'ocv1281prxvikoqbjocmmrbnge';
			$applicationId = '0161df87-3b3a-4005-a2c7-7c34a6764552';

			$settings = new \Adrenth\Raindrop\ApiSettings(
				$clientId,
				$clientSecret,
				new \Adrenth\Raindrop\Environment\SandboxEnvironment
			);

			$tokenStorage = new \Adrenth\Raindrop\TokenStorage\FileTokenStorage(__DIR__.'/token.txt');

			$client = new \Adrenth\Raindrop\Client($settings, $tokenStorage, $applicationId);

			$hydroId = $this->session->userdata('Hydro_ID');
			$client->unregisterUser($hydroId);

			$this->Model_Update->UnregisterHydro($hydroId);

			$this->session->set_flashdata('LoginResponse', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>AWWW!</strong> Hydro ID Unregistered. Relogin <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Login');
		}
		else
		{
			redirect('Home');
		}
	}

	public function VerifyHydroAuth()
	{
		if ($this->session->userdata('isActive')) {
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

			$this->Model_Update->updateUSerLogin($UserNo);

			$this->session->set_flashdata('LoginResponse', '<div class="alert alert-success alert-dismissible fade animated bounceInDown show" role="alert"><strong>Wow!</strong> Hydro Authentication is activated Login now. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Login');
		}
		else
		{
			redirect('Home');
		}
	}

	public function ChangeNewPassword()
	{
		if ($this->session->userdata('isActive')) {
			if ($this->input->post('cp_submit')) {
				$cpass = $this->input->post('cpass',true);
				$npass = $this->input->post('npass',true);
				$retypepass = $this->input->post('retypepass',true);

				if ($cpass == false || $npass == false || $retypepass == false) {
					$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Empty fields <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('AccountSettings',location);
				}
				elseif ($npass != $retypepass || $retypepass != $npass) {
					$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Password Did not match fields <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('AccountSettings',location);
				}
				else
				{
					$UserNo = $this->session->userdata('UserNo');

					$getUserbyNO = $this->Model_Select->getUserbyNO($UserNo);

					if ($getUserbyNO == TRUE) {
						if (password_verify($cpass,$getUserbyNO->Password)) {

							$hashpass = password_hash($retypepass, PASSWORD_BCRYPT);

							$data = array(
								'UserNo' => $UserNo,
								'hashpass' => $hashpass,
								 );

							$UpdatePassword = $this->Model_Update->UpdatePassword($data);
							if ($UpdatePassword == true) {
								$this->session->set_flashdata('changepassprompt', '<div class="alert alert-success alert-dismissible fade animated bounceInDown show" role="alert"><strong>Success!</strong> Password Updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
								redirect('AccountSettings',location);
							}
							else
							{
								$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Error updating <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
								redirect('AccountSettings',location);
							}
						}
						else
						{
							$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Wrong password <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							redirect('AccountSettings',location);
						}
					}
					else
					{
						$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Error user not found <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('AccountSettings',location);
					}
				}
			}
		}
		else
		{
			redirect('Home');
		}
	}

	public function UpdateInformation()
	{
		if ($this->session->userdata('isActive')) {
			if ($this->input->post('ui_submit',true)) {
				$Fname = $this->input->post('Fname',true);
				$Lname = $this->input->post('Lname',true);
				$CompanyName = $this->input->post('CompanyName',true);
				$TelegramID = $this->input->post('TelegramID',true);
				$CompanyAddress = $this->input->post('CompanyAddress',true);

				if ($Fname == false || $Lname == false || $CompanyName == false || $TelegramID == false || $CompanyAddress == false) {
					$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Empty fields <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('AccountSettings',location);
				}
				else
				{
					$UserNo = $this->session->userdata('UserNo');
					$data = array(
						'UserNo' => $UserNo,
						'Fname' => $Fname,
						'Lname' => $Lname,
						'CompanyName' => $CompanyName,
						'TelegramID' => $TelegramID,
						'CompanyAddress' => $CompanyAddress,
						 );

					$updateInfo = $this->Model_Update->updateInfo($data);

					if ($updateInfo == true) {
						$userdata = array(
							'UserNo' => $UserNo,
							'Fname' => $Fname,
							'Lname' => $Lname,
							'CompanyName' => $CompanyName,
							'CompanyAddress' => $CompanyAddress,
							'Is_Telegram_Member' => $TelegramID,
						);
						$this->session->set_userdata($userdata);
						
						$this->session->set_flashdata('changepassprompt', '<div class="alert alert-success alert-dismissible fade animated bounceInDown show" role="alert"><strong>Success!</strong> Information Updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('AccountSettings',location);
					}
					else
					{
						$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Error updating <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('AccountSettings',location);
					}
				}
			}
			else
			{
				redirect('Home');
			}
		}
		else
		{
			redirect('Home');
		}
	}
	
	public function UpdateCompany()
	{
		if ($this->session->userdata('isActive') && $this->session->userdata('Is_Telegram_Member') != 0) {
			if ($this->input->post('RegisterICO',true)) {
				$CompanyName = $this->input->post('CompanyName',true);
				$CompanyAddress = $this->input->post('CompanyAddress',true);
				$RegisterICO = 'yes';
				if ($CompanyName == false || $CompanyAddress == false) {
					$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Empty fields <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('AccountSettings',location);
				}
				else
				{
					$data = array(
						'UserNo' => $this->session->userdata('UserNo'),
						'CompanyName' => $CompanyName,
						'CompanyAddress' => $CompanyAddress,
						'RegisterICO' => $RegisterICO,
						 );
					$UpdateICO = $this->Model_Update->UpdateICO($data);
					if ($UpdateICO == true) {
						$userdata = array(
							'CompanyName' => $CompanyName,
							'CompanyAddress' => $CompanyAddress,
							'isICO' => $RegisterICO,
						);
						$this->session->set_userdata($userdata);
						
						$this->session->set_flashdata('changepassprompt', '<div class="alert alert-success alert-dismissible fade animated bounceInDown show" role="alert"><strong>Success!</strong> Information Updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('AccountSettings',location);
					}
					else
					{
						$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Register error <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('AccountSettings',location);
					}
				}
			}
			else
			{
				redirect('Home');
			}
		}
		else
		{
			$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Join our Telegram Channel <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('AccountSettings',location);
		}
	}
}
