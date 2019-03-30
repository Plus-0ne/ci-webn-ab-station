<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_PageController extends CI_Controller {

	public function Error_Expired()
	{
		$this->load->view('pages/users/error_pages/error_expired');
	}
	public function Client_Error()
	{
		$this->load->view('pages/users/error_pages/error_clienterror');
	}
	public function UnregisterNotUser()
	{
		$this->load->view('pages/users/error_pages/error_unregisterednotuser');
	}
	public function AlredyMappedUser()
	{
		$this->load->view('pages/users/error_pages/error_usermapped');
	}
	public function NoUserExist()
	{
		$this->load->view('pages/users/error_pages/error_unknownUser');
	}
}
