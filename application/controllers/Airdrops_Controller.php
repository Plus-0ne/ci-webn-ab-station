<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airdrops_Controller extends CI_Controller {


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
	public function Regular()
	{
		$navdata['title'] = "Regular Airdrops | WEBN Airdrops and Bounty Station";
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$data['getRegAirdrops'] = $this->Model_Select->getRegAirdrops();

		$this->load->view('pages/users/regular_airdrops',$data);
	}
	// ---------------- AIRDROPS DETAILS VIEW
	public function airdrops_details()
	{
		$navdata['title'] = "Airdrop Information | WEBN Airdrops and Bounty Station";
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);

		$airdrop_id = $this->input->get('aide');

		$data['TotalLikes'] = $this->Model_Select->getTotallikes($airdrop_id);
		$data['TotalDislike'] = $this->Model_Select->getTotaldislike($airdrop_id);
		$data['ai_details'] = $this->Model_Select->ai_details($airdrop_id);

		$this->load->view('pages/users/airdrop_details',$data);
	}
	public function LikeThisPost()
	{
		$postid = $this->input->post('postid');
		$like = $this->input->post('like');
		$userid = $this->input->ip_address();

		$data = array(
			'userid' => $userid,
			'postid' => $postid,
			'like' => $like,
		);

		$UserLiked = $this->Model_Select->UserLiked($data);
		if ($UserLiked == true)
		{
			if ($UserLiked->ratepoints == 'dislike') {
				$this->Model_Update->updatedlike($postid,$like,$userid);
			}
		}
		else
		{
			$inLike = $this->Model_Insert->inLike($data);
		}
		
	}
	public function DislikeThisPost()
	{
		$postid = $this->input->post('postid');
		$like = $this->input->post('dislike');
		$userid = $this->input->ip_address();

		$data = array(
			'userid' => $userid,
			'postid' => $postid,
			'dislike' => $like,
		);

		$UserLiked = $this->Model_Select->UserLiked($data);
		if ($UserLiked == true)
		{
			if ($UserLiked->ratepoints == 'like') {
				$this->Model_Update->updatedlike($postid,$like,$userid);
			}
		}
		else
		{
			$DisLike = $this->Model_Insert->DisLike($data);
		}
		
	}

}
