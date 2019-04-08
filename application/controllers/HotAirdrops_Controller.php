<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HotAirdrops_Controller extends CI_Controller {

	// ---------------- HOT AIRDROPS VIEW
	public function hot_airdrops()
	{
		$navdata['title'] = "Hot Airdrops for you | WEBN Airdrops and Bounty Station";
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$data['HotAirdrops'] = $this->Model_Select->getHotairdrops();
		$this->load->view('pages/users/hot_airdrops',$data);
	}
}
