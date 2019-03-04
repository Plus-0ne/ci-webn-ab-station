<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bounties_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		
	}
	public function index()
	{
		redirect('Bounties');
	}
	public function bounties()
	{
		$title['title'] = "Bounties | WEBN Airdrops and Bounty Station";
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$title), 
		);
		$this->load->view('pages/users/bounties',$data);
	}
}
