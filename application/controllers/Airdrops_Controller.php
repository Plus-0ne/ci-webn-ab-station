<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airdrops_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		// $Model_Select = $this->load->model('Model_Select');
		// $Model_Insert = $this->load->model('Model_Insert');
		// $Model_Update = $this->load->model('Model_Update');
	}

	// ---------------- REDIRECT TO AIRDROPS
	public function index()
	{
		redirect('LATEST');
	}
	// ---------------- LATEST AIRDROPS VIEW
	public function airdrops()
	{
		$navdata['title'] = "Airdrop Details | WEBN Airdrops and Bounty Station";
		$navdata['bot_token'] = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
		$navdata['chat_id'] = '-1001489662009';
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$data['GetAirdrops'] = $this->Model_Select->GetAirdrops();
		$this->load->view('pages/users/airdrops',$data);
	}
	// ---------------- AIRDROPS DETAILS VIEW
	public function airdrops_details()
	{
		$navdata['title'] = "Latest Airdops | WEBN Airdrops and Bounty Station";
		$navdata['bot_token'] = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
		$navdata['chat_id'] = '-1001489662009';
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);

		$airdrop_id = $this->input->get('aide');
		$data['ai_details'] = $this->Model_Select->ai_details($airdrop_id);
		
		$this->load->view('pages/users/airdrop_details',$data);
	}
	// ---------------- AIRDROPS RATE IT
	public function Post_this_rate()
	{
		
		$userid = $this->session->userdata('UserNo');
		$ratepoints = $this->input->post('rate');
		$ratepostid = $this->input->post('postid');

		$AirdropDetails = $this->Model_Select->getTotalrating($ratepostid);

		$UserHasRate = $this->Model_Select->UserHasRate($userid,$ratepostid);
		if ($UserHasRate == TRUE) {

			echo "HASRATE";
		}
		else
		{
			// SAVE RATE
			$SaveRate = $this->Model_Insert->SaveRate($userid,$ratepoints,$ratepostid);
			// GET AVG
			$avgRate = $this->Model_Select->GetAVGrate($ratepostid);
			$total = round($avgRate->avg_rate);
			// UPDATE TOTAL RATE
			$UpdateRate = $this->Model_Update->UpdateRate($total,$ratepostid);

			if ($UpdateRate == TRUE) {
				echo "RATED";
			}
			else
			{
				echo "ERROR";
			}

		}
		
	}

}
