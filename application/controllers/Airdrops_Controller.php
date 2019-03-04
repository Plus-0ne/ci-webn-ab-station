<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airdrops_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		
	}
	public function index()
	{
		redirect('Airdrops');
	}
	public function airdrops()
	{
		$title['title'] = "Airdrops | WEBN Airdrops and Bounty Station";
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$title), 
		);
		$this->load->view('pages/users/airdrops',$data);
	}
}
