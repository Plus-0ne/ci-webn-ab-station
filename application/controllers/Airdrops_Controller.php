<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airdrops_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		
	}

	// ---------------- REDIRECT TO AIRDROPS
	public function index()
	{
		redirect('LATEST');
	}
	// ---------------- LATEST AIRDROPS VIEW
	public function airdrops()
	{
		$navdata['title'] = "Latest Airdops | WEBN Airdrops and Bounty Station";
		$navdata['bot_token'] = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
		$navdata['chat_id'] = '-1001489662009';
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$this->load->view('pages/users/airdrops',$data);
	}
}
