<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_Signup');
		$this->load->helper('security');
	}

	// ---------------- LOAD SIGNUP VIEW
	public function Sign_up()
	{
		if (isset($_SESSION['isActive'])) {
			redirect('Home');
		}
		else
		{
			$title['title'] = "Sign-Up | WEBN Airdrops and Bounty Station";
			$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$title), 
			);
			$this->load->view('pages/users/sign-up',$data);
		}
		
	}

	public function GenerateVerificationCode()
	{
		$length = 6;    
		$randomint = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
		return $randomint;
	}
	// ---------------- SUBMIT REGISTRATION
	public function submit_form_signup()
	{
		if (isset($_SESSION['isActive'])) {
			redirect('Home');
		}
		else
		{
			if ($this->input->post('Email_Address') == false || $this->input->post('Password') == false || $this->input->post('rePassword') == false || $this->input->post('TelegramID') == false) {
				$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Empty Fields</div>');
				redirect('Sign-Up');
			}
			elseif ($this->input->post('Password',true) != $this->input->post('rePassword',true) || $this->input->post('rePassword',true) != $this->input->post('Password',true)) {
				$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Password didn\'t match! </div>');
				redirect('Sign-Up');
			}
			else
			{
				// reCaptcha
				$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
				$userIp=$this->input->ip_address();
				$secret = $this->config->item('google_secret');

				$url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
				$ch = curl_init(); 
				curl_setopt($ch, CURLOPT_URL, $url); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
				$output = curl_exec($ch); 

				$status= json_decode($output, true);
				if ($status['success']) {

					// Check Telegram
					$TelegramID = $this->input->post('TelegramID',true);

			        $botToken =  '872531119:AAGj0NvKGg1bTO-jovePbO8c-B553jhS6Ok';
			        $url= 'https://api.telegram.org/bot'.$botToken;
			        $chatId= '-1001330658507';
			                        
			        $params=[
			            'chat_id'=>$chatId,
			            'user_id'=>$TelegramID,
			        ];

			        $ch = curl_init($url . '/getChatMember?');
			        curl_setopt($ch, CURLOPT_HEADER, false);
			        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			        curl_setopt($ch, CURLOPT_POST, 1);
			        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
			        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			        $result = curl_exec($ch);
			                        
			        $getUserData = json_decode($result ,true);
			        if (is_array($getUserData)) {

			        	$chkID = $getUserData['result']['user']['id'];
			        	$chkStatus = $getUserData['result']['status'];
			        	if ($chkID == $TelegramID && $chkStatus == "member") {

			        		$Email_Add = $this->input->post('Email_Address',true);
			        		$EmailCheck = $this->Model_Signup->Check_EmailAdd($Email_Add);

			        		if ($EmailCheck->num_rows() == true) {
			        			$this->session->set_flashdata('promptInfo', '<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Warning ! Email exist</div>');
			        			redirect('Sign-Up');
			        		}
			        		else
			        		{
			        			// Register User
			        			$verificationCode = $this->GenerateVerificationCode();
			        			$hashed = $this->input->post('rePassword',true);
			        			$Password = password_hash($hashed, PASSWORD_BCRYPT);

			        			$EmailAddress = $this->input->post('Email_Address',true);
			        			$TelegramID = $this->input->post('TelegramID',true);
			        			

			        			$data = array
			        			(
			        				'Email_Address' => $EmailAddress,
			        				'Password' => $Password,
			        				'Is_Telegram_Member' => $TelegramID,
			        				'Is_Subscriber' => 1,
			        				'Hydro_ID' => "0",
			        				'Hydro_Auth' => "0",
			        				'Active_Status' => "0",
			        				'Account_Status' => "0",
			        				'VerificationCode' => $verificationCode,
			        				'VerifyStatus' => "0",
			        				'isICO' => "no",
			        			);
			        			$result = $this->Model_Signup->register_user($data);
			        			if ($result == true) {

			        				$this->email->from('webndrops@gmail.com');
			        				$this->email->to($this->input->post('Email_Address')); 
			        				$this->email->subject('Message from Web Innovation PH INC.');
			        				$this->email->set_mailtype('html');

			        				$data['CODE'] = $verificationCode;
			        				$msg = $this->load->view('verify_email',$data,TRUE);
			        				$this->email->message($msg);

			        				if ($this->email->send()) {
			        					$this->session->set_flashdata('LoginResponse', '<div class="prompt-success"><i class="fas fa-check-circle"></i> You can login now. Verify Email in account settings</div>');
			        					redirect('Login');
			        				}
			        				else
			        				{
			        					$this->session->set_flashdata('LoginResponse', '<div class="prompt-success"><i class="fas fa-check-circle"></i> You can login now. Verify Email in account settings</div>');
			        					redirect('Login');
			        				}
			        			}
			        			else
			        			{
			        				$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Somesthing\'s wrong! </div>');
									redirect('Sign-Up');
			        			}
			        		}
			        	}
			        	else
			        	{
			        		$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Join our Telegram Channel <a href="https://t.me/WEBN_Airdrop_Station" target="_blank"> Here </a> </div>');
							redirect('Sign-Up');
			        	}
			        }
			        else
			        {
			        	$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Telegram Error </div>');
						redirect('Sign-Up');
			        }
			    curl_close($ch);
				}
				else
				{
					$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Captcha failed</div>');
					redirect('Sign-Up');
				}
			}
		}
	}
}