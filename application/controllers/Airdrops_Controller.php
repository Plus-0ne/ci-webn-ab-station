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
		$navdata['title'] = "Latest Airdrops | WEBN Airdrops and Bounty Station";
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$data['GetAirdrops'] = $this->Model_Select->GetAirdrops();
		$this->load->view('pages/users/airdrops',$data);
	}
	public function featured_airdrops()
	{
		$navdata['title'] = "Featured Airdrops | WEBN Airdrops and Bounty Station";
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$data['GetFeat'] = $this->Model_Select->getFeaturedAirdrops();

		$this->load->view('pages/users/featured_airdrops',$data);
	}
	// ---------------- AIRDROPS DETAILS VIEW
	public function airdrops_details()
	{
		$navdata['title'] = "Airdrop Information | WEBN Airdrops and Bounty Station";
		
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
		if (isset($_SESSION['isActive'])) {
			$userid = $this->session->userdata('UserNo');
			$ratepoints = $this->input->post('rate');
			$ratepostid = $this->input->post('postid');

			$AirdropDetails = $this->Model_Select->getTotalrating($ratepostid);

			$UserHasRate = $this->Model_Select->UserHasRate($userid,$ratepostid);
			if ($UserHasRate->num_rows() == 1) {
				echo "HASRATE";
			}
			else
			{
				$SaveRate = $this->Model_Insert->SaveRate($userid,$ratepoints,$ratepostid);
				$avgRate = $this->Model_Select->GetAVGrate($ratepostid);
				$total = round($avgRate->avg_rate);
				$UpdateRate = $this->Model_Update->UpdateRate($total,$ratepostid);

				echo "RATED";
			}
		}
		else
		{
			$userid = $this->input->ip_address();
			$ratepoints = $this->input->post('rate');
			$ratepostid = $this->input->post('postid');

			$AirdropDetails = $this->Model_Select->getTotalrating($ratepostid);

			$UserHasRate = $this->Model_Select->UserHasRate($userid,$ratepostid);
			if ($UserHasRate->num_rows() == 1) {
				echo "HASRATE";
			}
			else
			{
				$SaveRate = $this->Model_Insert->SaveRate($userid,$ratepoints,$ratepostid);
				$avgRate = $this->Model_Select->GetAVGrate($ratepostid);
				$total = round($avgRate->avg_rate);
				$UpdateRate = $this->Model_Update->UpdateRate($total,$ratepostid);

				echo "RATED";
			}
		}
		
	}

}
