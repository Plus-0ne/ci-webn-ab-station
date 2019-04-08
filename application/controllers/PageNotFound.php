<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageNotFound extends CI_Controller {

	public function index()
	{
		$navdata['title'] = "Error 404 Page not found | WEBN Airdrops and Bounty Station";
		$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$this->load->view('pages/users/page_not_found',$data);
	}
	public function apply_to_listprompt()
	{
		$navdata['title'] = " Limited Account | WEBN Airdrops and Bounty Station";
		$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$this->load->view('pages/users/apply_to_listprompt',$data);
	}
	public function NeedToLogin()
	{
		$navdata['title'] = " Login first | WEBN Airdrops and Bounty Station";
		$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);
		$this->load->view('pages/users/lyct_needlogin',$data);
	}
}
