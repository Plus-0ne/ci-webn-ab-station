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
			if ($this->input->post('Email_Address') == false || $this->input->post('Password') == false || $this->input->post('rePassword') == false) {
				$this->session->set_flashdata('promptInfo', '<div class="prompt-error animated heartBeat"><i class="fas fa-times-circle"></i> Error ! Empty Fields</div>');
				redirect('Sign-Up');
			}
			else
			{
				if ($this->input->post('Password',true) == $this->input->post('rePassword',true) || $this->input->post('rePassword',true) == $this->input->post('Password',true)) {

					$Email_Add = $this->input->post('Email_Address',true);
					$EmailCheck = $this->Model_Signup->Check_EmailAdd($Email_Add);

					if ($EmailCheck->num_rows() == true) {
						$this->session->set_flashdata('promptInfo', '<div class="prompt-warning  animated heartBeat"><i class="fas fa-exclamation-circle"></i> Warning ! Email exist</div>');
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
				        curl_close($ch);      
				        $status= json_decode($output, true);
						if ($status['success']) {

							// Register User
							$verificationCode = $this->GenerateVerificationCode();

							$hashed = $this->input->post('rePassword',true);
							$Password = password_hash($hashed, PASSWORD_BCRYPT);
							$data = array
							(
								'Email_Address' => $this->input->post('Email_Address',true),
								'Password' => $Password,
								'Is_Telegram_Member' => "0",
								'Is_Subscriber' => "0",
								'Hydro_ID' => "0",
								'Hydro_Auth' => "0",
								'Active_Status' => "0",
								'Account_Status' => "0",
								'VerificationCode' => $verificationCode,
								'VerifyStatus' => "0",
								'isICO' => "no",
							);
							$result = $this->Model_Signup->register_user($data);
							if ($result) {
								
								
							    $this->email->from('webndrops@gmail.com');
							    $this->email->to($this->input->post('Email_Address')); 
							    $this->email->subject('Message from Web Innovation PH INC.');
							    $this->email->set_mailtype('html');

							    $data['CODE'] = $verificationCode;
							    $msg = $this->load->view('verify_email',$data,TRUE);
							    $this->email->message($msg);

								if ($this->email->send()) {
									$this->session->set_flashdata('LoginResponse', '<div class="prompt-success  animated heartBeat"><i class="fas fa-check-circle"></i> Success ! You can login now.</div>');
									redirect('Login');
								}
								else
								{
									$this->session->set_flashdata('promptInfo', '<div class="prompt-warning  animated heartBeat"><i class="fas fa-exclamation-circle"></i> Warning ! Email not sent.</div>');
									redirect('Sign-Up');
								}
							}
							else
							{
								$this->session->set_flashdata('promptInfo', '<div class="prompt-error  animated heartBeat"><i class="fas fa-times-circle"></i> Error ! Somesthing\'s wrong</div>');
								redirect('Sign-Up');
							}
						}
						else
						{
							$this->session->set_flashdata('promptInfo', '<div class="prompt-error  animated heartBeat"><i class="fas fa-times-circle"></i> Error ! Captcha failed</div>');
							redirect('Sign-Up');
						}
						
					}
				}
				else
				{
					$this->session->set_flashdata('promptInfo', '<div class="prompt-error  animated heartBeat"><i class="fas fa-times-circle"></i> Error ! Password did not match!</div>');
					redirect('Sign-Up');
				}
			}
		}
	}
}