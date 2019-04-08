<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountSettings_Controller extends CI_Controller {

	public function index()
	{
		redirect('AccountSettings');
	}
	public function Account_Settings()
	{
		if (isset($_SESSION['isActive'])) {
			$navdata['title'] = "Account | WEBN Airdrops and Bounty Station";

			$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
			);

			$botToken = $this->config->item('teleBOt');
			$chatId=$this->config->item('chat_id');
			$idid = $this->session->userdata('Is_Telegram_Member');

			$url="https://api.telegram.org/bot".$botToken;

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
			
			curl_close($ch);
			$EmailAddress = $_SESSION['Email'];
			$data['getAirdoprequest'] = $this->Model_Select->getAirdoprequest($EmailAddress);
			
			$this->load->view('pages/users/account_settings',$data);
		}
		else
		{
			redirect('Home');
		}
	}
	public function view_payments()
	{
		if (isset($_SESSION['isActive'])) {
			$navdata['title'] = "Payment Details | WEBN Airdrops and Bounty Station";

			$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
			);
			
			// Get Paymets for this airdrop
			
			$data = array(
				'airdropid' => $this->input->get('aide'), 
				'email_address' => $_SESSION['Email'], 
			);

			$data['Airdrop_Details'] = $this->Model_Select->GetAirdropFields($data);
			$data['PaymentFields'] = $this->Model_Select->GetPayments($data);
			$this->load->view('pages/users/View_Payments',$data);
		}
		else
		{
			redirect('Home');
		}
	}
	public function submit_payments()
	{
		if (isset($_SESSION['isActive'])) {
			$navdata['title'] = "Submit TXID | WEBN Airdrops and Bounty Station";

			$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
			);
			
			// Get Paymets for this airdrop
			
			$data = array(
				'airdropid' => $this->input->get('aide'), 
				'email_address' => $_SESSION['Email'], 
			);

			$data['Airdrop_Details'] = $this->Model_Select->GetAirdropFields($data);
			$data['PaymentFields'] = $this->Model_Select->GetPayments($data);
			$this->load->view('pages/users/Submit_Txid',$data);
		}
		else
		{
			redirect('Home');
		}
	}
	public function ExtendAirdrop()
	{
		if (isset($_SESSION['isActive'])) {
			$navdata['title'] = "Extend your Airdrop | WEBN Airdrops and Bounty Station";

			$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
			);
			
			// Get Paymets for this airdrop
			
			$data = array(
				'airdropid' => $this->input->get('aide'), 
				'email_address' => $_SESSION['Email'], 
			);

			$data['Airdrop_Details'] = $this->Model_Select->GetAirdropFields($data);
			$data['PaymentFields'] = $this->Model_Select->GetPayments($data);
			$this->load->view('pages/users/extend_airdrop',$data);
		}
		else
		{
			redirect('Home');
		}
	}
	public function SubmitHydroID()
	{
		if (isset($_SESSION['isActive'])) {
			$HydroID = $this->input->post('HydroID',true);
			if ($HydroID == false) {
				$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Hydro ID Empty</div>');
				redirect('AccountSettings');
			}
			else
			{
				require_once APPPATH."/../vendor/autoload.php";

				$clientId = $this->config->item('clientId');
				$clientSecret = $this->config->item('clientSecret');
				$applicationId = $this->config->item('applicationId');

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
		else
		{
			redirect('Home');
		}
	}
	public function VerifyHydroAuth()
	{
		if (isset($_SESSION['isActive'])) {
			$UserNo = $this->session->userdata('UserNo');
			$hyrdroid = $this->session->userdata('Hydro_ID');
			$hydromessage = $this->input->post('hydromessage',TRUE);

			require_once APPPATH."/../vendor/autoload.php";

			$clientId = $this->config->item('clientId');
			$clientSecret = $this->config->item('clientSecret');
			$applicationId = $this->config->item('applicationId');

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
			
			$HydroID = $hyrdroid;
			$HydroResult = $this->Model_Update->HydroIDUpdate($HydroID,$UserNo);
			
			$this->Model_Update->updateUSerLogin($UserNo);
			$this->session->set_flashdata('LoginResponse', '<div class="prompt-success"><i class="fas fa-check-circle"></i> Hydro MFA Activated</div>');
			redirect('Login');
		}
		else
		{
			redirect('Home');
		}
	}
	public function UnregisterHydro()
	{
		if (isset($_SESSION['isActive'])) {
			require_once APPPATH."/../vendor/autoload.php";

			$clientId = $this->config->item('clientId');
			$clientSecret = $this->config->item('clientSecret');
			$applicationId = $this->config->item('applicationId');

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

			$this->session->set_flashdata('LoginResponse', '<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Hydro MFA Deactivated</div>');
			redirect('Login');
		}
		else
		{
			redirect('Home');
		}
	}
	public function ChangeNewPassword()
	{
		if (isset($_SESSION['isActive'])) {
			if ($this->input->post('cp_submit')) {
				$cpass = $this->input->post('cpass',true);
				$npass = $this->input->post('npass',true);
				$retypepass = $this->input->post('retypepass',true);

				if ($cpass == false || $npass == false || $retypepass == false) {
					$this->session->set_flashdata('changepassprompt', '<div class="prompt-error"><i class="fas fa-times-circle"></i> All fields are required</div>');
					redirect('AccountSettings');
				}
				elseif ($npass != $retypepass || $retypepass != $npass) {
					$this->session->set_flashdata('changepassprompt', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Password did not match</div>');
					redirect('AccountSettings');
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
								$this->session->set_flashdata('changepassprompt', '<div class="prompt-success"><i class="fas fa-check-circle"></i> Password updated</div>');
								redirect('AccountSettings');
							}
							else
							{
								$this->session->set_flashdata('changepassprompt', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Error updating</div>');
								redirect('AccountSettings');
							}
						}
						else
						{
							$this->session->set_flashdata('changepassprompt', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Wrong password</div>');
							redirect('AccountSettings');
						}
					}
					else
					{
						$this->session->set_flashdata('changepassprompt', '<div class="prompt-error"><i class="fas fa-times-circle"></i> User not found</div>');
						redirect('AccountSettings');
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
		if (isset($_SESSION['isActive'])) {
			if ($this->input->post('ui_submit',true)) {
				$Fname = $this->input->post('Fname',true);
				$Lname = $this->input->post('Lname',true);
				$CompanyName = $this->input->post('CompanyName',true);
				$TelegramID = $this->input->post('TelegramID',true);
				$CompanyAddress = $this->input->post('CompanyAddress',true);

				if ($Fname == false || $Lname == false || $CompanyName == false || $TelegramID == false || $CompanyAddress == false) {
					$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Empty fields <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('AccountSettings');
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
						redirect('AccountSettings');
					}
					else
					{
						$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Error updating <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('AccountSettings');
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
		if (isset($_SESSION['isActive']) && $this->session->userdata('Is_Telegram_Member') != 0) {
			if ($this->input->post('RegisterICO',true)) {
				$CompanyName = $this->input->post('CompanyName',true);
				$CompanyAddress = $this->input->post('CompanyAddress',true);
				$RegisterICO = 'yes';
				if ($CompanyName == false || $CompanyAddress == false) {
					$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Empty fields <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('AccountSettings');
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
						redirect('AccountSettings');
					}
					else
					{
						$this->session->set_flashdata('changepassprompt', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opsss!</strong> Register error <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('AccountSettings');
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
			redirect('AccountSettings');
		}
	}

	public function GenerateVerificationCode()
	{
		$length = 6;    
		$randomint = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
		return $randomint;
	}

	public function ResendNewCOde()
	{
		if (isset($_SESSION['isActive'])) {
			$verificationCode = $this->GenerateVerificationCode();

			$data['CODE'] = $verificationCode;
			$this->email->from('webndrops@gmail.com');
			$this->email->to($this->session->userdata('Email')); 
			$this->email->subject('Message from Web Innovation PH INC.');
			$this->email->set_mailtype('html');
			$message = $this->load->view('verify_email',$data,TRUE);
			$this->email->message($message);
			$emailSent = $this->email->send();
			if ($emailSent == true) {
				$data = array(
					'UserNo' => $this->session->userdata('UserNo'),
					'Email' => $this->session->userdata('Email'),
					'VerificationCode' => $verificationCode,
				);

				$this->Model_Update->UpdateCode($data);
				$this->session->set_userdata('VerificationCode',$verificationCode);
				$this->session->set_flashdata('changepassprompt', '<div class="prompt-success"><i class="fas fa-check-circle"></i> New Code has been sent</div>');
				redirect('AccountSettings');
			}
			else
			{
				$this->session->set_flashdata('changepassprompt', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Error sending mail</div>');
				redirect('AccountSettings');
			}
		}
	}

	public function VerifyUserEmail()
	{
		if (isset($_SESSION['isActive'])) {
			$UserNo = $this->session->userdata('UserNo');
			$Email_Address = $this->session->userdata('Email');
			$VerificationCode = $this->input->post('email_vcode',true);
			if ($VerificationCode == false) {
				$this->session->set_flashdata('changepassprompt', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Code is empty</div>');
				redirect('AccountSettings');
			}
			else
			{
				$data = array(
					'UserNo' => $UserNo,
					'Email_Address' => $Email_Address,
					'VerificationCode' => $VerificationCode,
					 );

				$getUserCode = $this->Model_Select->getUserCode($data);

				if ($VerificationCode == $getUserCode->VerificationCode) {
					// Update Verify Status
					$data = array(
						'UserNo' => $UserNo,
						'Email_Address' => $Email_Address,
					);
					$UpdateVerifyStatus = $this->Model_Update->UpdateVerifyStatus($data);
					if ($UpdateVerifyStatus == true) {
						$this->session->set_userdata('VerifyStatus',1);
						$this->session->set_flashdata('changepassprompt', '<div class="prompt-success"><i class="fas fa-check-circle"></i> Email verified</div>');
						redirect('AccountSettings');
					}
				}
				else
				{
					$this->session->set_flashdata('changepassprompt', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Code not found</div>');
					redirect('AccountSettings');
				}
			}
		}
	}
	public function SubmitTxidforAirdrop()
	{
		if (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] == 1 AND $_SESSION['VerifyStatus'] == 1) {
			if ($this->input->post('d2s45h7lf',true) == 'ijkyo46tr') {

				$ses_paymentid = $this->input->post('airdropid', true);
				$EmailAddress = $_SESSION['Email'];
				$txid = $this->input->post('txid', true);

				if ($txid == null || $ses_paymentid == null) {
					$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Empty fields </div>');
					redirect($_SERVER['HTTP_REFERER']);
				}
				else
				{
					$checkPayments = $this->Model_Select->checkPayments($ses_paymentid,$EmailAddress);

					if ($checkPayments->AirdropID == $ses_paymentid AND $checkPayments->TxID == null) {

						// Update
						$data = array(
							'AirdropID' => $ses_paymentid,
							'EmailAddress' => $EmailAddress,
							'TxID' => $txid,
						);
						$savePayment = $this->Model_Update->UpdatePayment($data);
						if ($savePayment == true) {
							$this->session->set_flashdata('promptInfo', '<div class="prompt-success"><i class="fas fa-check-circle"></i> Waiting for Schedule </div>');
							redirect($_SERVER['HTTP_REFERER']);
						}
						else
						{
							$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Error saving </div>');
							redirect($_SERVER['HTTP_REFERER']);
						}
					}
					else
					{
						$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Transaction ID exist </div>');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}

			}
			else
			{
				$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Somethings wrong</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		else
		{
			redirect('Home');
		}
	}
	public function submittxidextend()
	{
		if (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] == 1 AND $_SESSION['VerifyStatus'] == 1) {
			if ($this->input->post('d2s45h7lf',true) == 'ijkyo46tr') {

				date_default_timezone_set('Asia/Manila');
				$ses_paymentid = $this->input->post('airdropid', true);
				$EmailAddress = $_SESSION['Email'];
				$txid = $this->input->post('txid', true);
				$PaymentDetails = $this->input->post('PaymentDetails', true);
				if ($this->input->post('ListAsHot',true) == null) {
					$ListAsHot = 'latest';
				}
				else
				{
					$ListAsHot = $this->input->post('ListAsHot',true);
				}

				$Date = date('Y-m-d h:i:s a');


				if ($txid == null || $ses_paymentid == null || $PaymentDetails == null) {
					$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Empty fields </div>');
					redirect($_SERVER['HTTP_REFERER']);
				}
				else
				{
					$data = array(
						'AirdropID' => $ses_paymentid,
						'TxID' => $txid,
						'EmailAddress' => $EmailAddress,
						'PaymentDetails' => $PaymentDetails,
						'ListAsHot' => $ListAsHot,
						'Date' => $Date,
						 );
					$insertResult = $this->Model_Insert->AddNewPayment($data);

					if ($insertResult == TRUE) {
						// update airdrop
						$data = array(
							'airdrop_id' => $ses_paymentid,
							'AddedBy' => $EmailAddress,
							'RequestStatus' => 'For Approval',
							'PaymentDetails' => $PaymentDetails,
							'PostPrio' => $ListAsHot,
						);
						$UpdateByResult = $this->Model_Update->UpdateExtendAirdrop($data);
						if ($UpdateByResult == TRUE) {
							$this->session->set_flashdata('promptInfo', '<div class="prompt-success"><i class="fas fa-check-circle"></i> Waiting for Schedule </div>');
							redirect($_SERVER['HTTP_REFERER']);
						}
						else
						{
							$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Somethings wrong</div>');
							redirect($_SERVER['HTTP_REFERER']);
						}
					}
					else
					{
						$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Somethings wrong</div>');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}

			}
			else
			{
				$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Somethings wrong</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		else
		{
			redirect('Home');
		}
	}
}
