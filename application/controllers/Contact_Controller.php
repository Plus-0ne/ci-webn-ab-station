<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		
	}
	public function index()
	{
		redirect('Contact');
	}
	public function contact()
	{
		$title['title'] = "Contact us | WEBN Airdrops and Bounty Station";
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$title), 
		);
		$this->load->view('pages/users/contact',$data);
	}
}
