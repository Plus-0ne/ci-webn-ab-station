<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteController extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin/A_ModelDelete','amDelete');
	}
	

	public function RemoveAirdrop()
	{
		if (isset($_SESSION['is_Active'])) {
			$AirdropID = $this->input->get('aide');
			if ($AirdropID == false) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Airdrop ID Missing.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-Expired-Airdrops');
			}
			else
			{
				$removeAirdrops = $this->amDelete->removeAirdrops($AirdropID);
				if ($removeAirdrops == TRUE) {
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Airdrop Removed</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-Expired-Airdrops');
				}
				else
				{
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-Expired-Airdrops');
				}
			}
		}	
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"<strong>Error</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin-Expired-Airdrops');
		}
	}
	public function RemoveUser()
	{
		if (isset($_SESSION['is_Active'])) {
			$UserID = $this->input->get('aide');
			if ($UserID == false) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Airdrop ID Missing.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-AllUsers');
			}
			else
			{
				$RemovethisUser = $this->amDelete->RemovethisUser($UserID);
				if ($RemovethisUser == TRUE) {
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong>User Removed</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-AllUsers');
				}
				else
				{
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-AllUsers');
				}
			}
		}	
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin-AllUsers');
		}
	}
	public function RemovedAdmin()
	{
		if (isset($_SESSION['is_Active'])) {
			$UserID = $this->input->get('aide');
			if ($UserID == false) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Airdrop ID Missing.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-list');
			}
			else
			{
				$RemovedAdmin = $this->amDelete->RemovedAdmin($UserID);
				if ($RemovedAdmin == TRUE) {
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Admin Removed</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-list');
				}
				else
				{
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error removing admin</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-list');
				}
			}
		}	
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"> Error <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin-list');
		}
	}
	public function removeFAQs()
	{
		if (isset($_SESSION['is_Active'])) {
			$FaqNo = $this->input->get('aide');
			if ($FaqNo == false) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Airdrop ID Missing.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-Faqs');
			}
			else
			{
				$removeFAQs = $this->amDelete->removeFAQs($FaqNo);
				if ($removeFAQs == TRUE) {
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong> Removed </strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-Faqs');
				}
				else
				{
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error removing admin</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-Faqs');
				}
			}
		}	
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"> Error <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin-Faqs');
		}
	}
	public function RemovePayment()
	{
		if (isset($_SESSION['is_Active'])) {
			$PriceNo = $this->input->get('aide');
			if ($PriceNo == false) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>ID Missing.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-Pricing');
			}
			else
			{
				$RemovePayments = $this->amDelete->RemovePayments($PriceNo);
				if ($RemovePayments == TRUE) {
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong> Removed </strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-Pricing');
				}
				else
				{
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error removing admin</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-Pricing');
				}
			}
		}	
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"> Error <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin-Pricing');
		}
	}
	public function RemovaAddPayment()
	{
		if (isset($_SESSION['is_Active'])) {
			$ad_PriceNo = $this->input->get('aide');
			if ($ad_PriceNo == null) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>ID Missing.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-Pricing');
			}
			else
			{
				$removeaddPay = $this->amDelete->removeaddPay($ad_PriceNo);
				if ($removeaddPay == TRUE) {
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong> Removed </strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-Pricing');
				}
				else
				{
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error removing admin</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-Pricing');
				}
			}
		}	
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"> Error <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin-Pricing');
		}
	}

}

