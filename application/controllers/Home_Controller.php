<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends CI_Controller {

	public function index()
	{
		redirect('Home');
	}
	// ---------------- LOAD VIEW HOME
	public function home()
	{
		$navdata['title'] = "Featured , Hot , Latest Airdrops | WEBN Airdrops and Bounty Station";

		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata),
		);
		$data['GetAirdropsHot'] = $this->Model_Select->GetAirdropsHot();
		$data['GetAirdropsLatest'] = $this->Model_Select->GetAirdropsLatest();
		$data['GetRegular'] = $this->Model_Select->GetRegular();
		$data['GetFeatured'] = $this->Model_Select->GetFeatured();
		$this->load->view('pages/users/home',$data);
	}
}
