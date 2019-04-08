<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bounties_Controller extends CI_Controller {

	// ---------------- LOAD BOUNTY VIEWS
	public function bounties()
	{
		$navdata['title'] = "Bounties | WEBN Airdrops and Bounty Station";
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$this->load->view('pages/users/bounties',$data);
	}
}
