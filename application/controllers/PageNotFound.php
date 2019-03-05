<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageNotFound extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		
	}
	public function index()
	{
		$title['title'] = "Error 404 Page not found | WEBN Airdrops and Bounty Station";
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$title), 
		);
		$this->load->view('pages/users/page_not_found',$data);
	}
}
