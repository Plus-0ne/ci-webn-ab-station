<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs_Controller extends CI_Controller {

	// ---------------- LOAD FAQS VIEW
	public function faqs()
	{

		$navdata['title'] = "Frequently Asked Questions | WEBN Airdrops and Bounty Station";
		
		$data = array(
			'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
		);

		$data['GetAllfaqs'] = $this->Model_Select->GetAllfaqs();
		$this->load->view('pages/users/faqs',$data);
	}
}
