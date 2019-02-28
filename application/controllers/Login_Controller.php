<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		
	}
	public function index()
	{
		redirect('Home');
	}
	public function login()
	{
		$title['title'] = "Welcome | WEBN Airdrops and Bounty Station";
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$title), 
			'user_jsscripts' => $this->load->view('pages/users/_template/_jsscripts'),
		);
		$this->load->view('pages/users/login',$data);
	}
}
