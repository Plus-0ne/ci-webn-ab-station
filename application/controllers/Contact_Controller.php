<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_Controller extends CI_Controller {

	// ---------------- LOAD VIEW CONTACTS
	public function contact()
	{
		$navdata['title'] = "Contact us | WEBN Airdrops and Bounty Station";
		$navdata['bot_token'] = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
		$navdata['chat_id'] = '-1001489662009';
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$this->load->view('pages/users/contact',$data);
	}
}
