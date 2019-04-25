<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateController extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin/A_ModelSelect','amSelect');
		$this->load->model('admin/A_ModelInsert','amInsert');
		$this->load->model('admin/A_ModelUpdate','amUpdate');
	}
	
	public function Approve_Request()
	{
		if ($this->session->userdata('is_Active')) {

			$airdrop_id = $this->input->get('aide');
			$AirdropDetails = $this->amSelect->getAirdropsFields($airdrop_id);

			date_default_timezone_set("Asia/Manila");

			$today = date("Y-m-d h:i:s a");

			$currentDate = $today;

			switch ($AirdropDetails->PaymentDetails) {
				case '24hrs':
					$ExpirationDate = date('Y-m-d h:i:s a', strtotime($currentDate . ' +1 day'));
					break;
				case '48hrs':
					$ExpirationDate = date('Y-m-d h:i:s a', strtotime($currentDate . ' +2 day'));
					break;
				case '1week':
					$ExpirationDate = date('Y-m-d h:i:s a', strtotime($currentDate . ' +7 day'));
					break;

				default:
					$ExpirationDate = date('Y-m-d h:i:s a', strtotime($currentDate . ' +1 day'));
					break;
			}

	        

			$data = array(
				'airdrop_id' => $airdrop_id,
				'ExpirationDate' => $ExpirationDate,
				'ApproveDate' => $today,
			);
			$Approve_Airdrop = $this->amUpdate->Approve_Airdrop($data);

			if ($Approve_Airdrop == true) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong>New Airdrop has been posted.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-Requests');
			}
			else
			{
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Error approving Airdrop.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-Requests');
			}
		}
	}
	
}

