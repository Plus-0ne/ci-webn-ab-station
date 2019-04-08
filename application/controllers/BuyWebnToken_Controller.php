<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuyWebnToken_Controller extends CI_Controller {

	// ---------------- LOAD SIGNUP VIEW
	public function buywebn_token()
	{
		$navdata['title'] = "Buy WEBN Token | WEBN Airdrops and Bounty Station";
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$this->load->view('pages/users/buywebn_token',$data);
	}

}