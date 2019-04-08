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
		$navdata['title'] = "Hot and Latest Airdrops | WEBN Airdrops and Bounty Station";

		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata),
		);
		$data['GetAirdropsHot'] = $this->Model_Select->GetAirdropsHot();
		$data['GetAirdropsLatest'] = $this->Model_Select->GetAirdropsLatest();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.coinmarketcap.com/v1/ticker/ethereum/');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$json_object= curl_exec($ch);
		curl_close($ch);
		$data['json_decoded'] = json_decode($json_object,true);

		$this->load->view('pages/users/home',$data);
	}
}
