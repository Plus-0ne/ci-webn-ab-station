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
			$Daysss = $AirdropDetails->PaymentDetails;
			$addDaysss = $this->amSelect->addDaysss($Daysss);
			$DCount = $addDaysss->DCount;
			$today = date("Y-m-d h:i:s a");

			$currentDate = $today;

			$ExpirationDate = date('Y-m-d h:i:s a', strtotime($currentDate . ' +'.$DCount.' day'));

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
	public function UpdatePrices()
	{
		$PriceNo = $this->input->post('PriceNo',true);
		$Days = $this->input->post('Days',true);
		$Price = $this->input->post('Price',true);

		if ($PriceNo == null || $Price == null) {
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Empty value</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin-Pricing');
		}
		else
		{
			$data = array(
				'PriceNo' => $PriceNo,
				'Days' => $Days,
				'Price' => $Price,
			);
			$UpdateThisPrices = $this->amUpdate->UpdateThisPrices($data);
			if ($UpdateThisPrices == TRUE) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Price Updated</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-Pricing');
			}
			else
			{
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error Updating</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-Pricing');
			}
		}
	}
	public function UpdateAdPrice()
	{
		$ad_PriceNo = $this->input->post('ad_PriceNo',true);
		$AdPrice = $this->input->post('AdPrice',true);

		if ($ad_PriceNo == null || $AdPrice == null) {
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Empty value</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin-Pricing');
		}
		else
		{
			$data = array(
				'ad_PriceNo' => $ad_PriceNo,
				'AdPrice' => $AdPrice,
			);

			$updatethisaddPrice = $this->amUpdate->updatethisaddPrice($data);
			if ($updatethisaddPrice == TRUE) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong>Price Updated</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-Pricing');
			}
			else
			{
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error Updating</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-Pricing');
			}
		}
	}
}

