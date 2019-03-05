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
		$title['title'] = "Hot Airdrops for you | WEBN Airdrops and Bounty Station";
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$title), 
		);
		$this->load->view('pages/users/hot_airdrops',$data);
	}
}
