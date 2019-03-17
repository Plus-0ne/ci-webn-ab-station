<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_PageController extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		
	}

	public function Error_Expired()
	{
		$this->session->sess_destroy();
		$this->load->view('pages/users/error_pages/error_expired');
	}
	public function Client_Error()
	{
		$this->session->sess_destroy();
		$this->load->view('pages/users/error_pages/error_clienterror');
	}
	public function UnregisterNotUser()
	{
		$this->session->sess_destroy();
		$this->load->view('pages/users/error_pages/error_unregisterednotuser');
	}
}
