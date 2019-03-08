<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuyWebnToken_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Model_Signup');
		$this->load->helper('security');
	}

	// ---------------- REDIRECT TO SIGN UP VIEW
	public function index()
	{
		redirect('BuyWEBNN_Token');
	}

	// ---------------- LOAD SIGNUP VIEW
	public function buywebn_token()
	{

		$navdata['title'] = "Buy WEBN Token | WEBN Airdrops and Bounty Station";
		$navdata['bot_token'] = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
		$navdata['chat_id'] = '-1001489662009';
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$this->load->view('pages/users/buywebn_token',$data);
	}

}