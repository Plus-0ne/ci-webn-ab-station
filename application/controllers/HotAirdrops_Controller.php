<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HotAirdrops_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		
	}
	// ---------------- REDIRECT TO HOT AIRDROPS
	public function index()
	{
		redirect('HOT');
	}
	// ---------------- HOT AIRDROPS VIEW
	public function hot_airdrops()
	{
		$navdata['title'] = "Hot Airdrops for you | WEBN Airdrops and Bounty Station";
		$navdata['bot_token'] = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
		$navdata['chat_id'] = '-1001489662009';
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$this->load->view('pages/users/hot_airdrops',$data);
	}
}
