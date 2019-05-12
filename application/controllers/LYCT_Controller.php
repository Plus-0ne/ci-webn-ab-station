<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LYCT_Controller extends CI_Controller {

	// ---------------- LOAD SIGNUP VIEW
	public function lyct_view()
	{

		if (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] == 1 AND $_SESSION['VerifyStatus'] == 1) {
			$navdata['title'] = "Apply to regular list | WEBN Airdrops and Bounty Station";
			
			$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
			);
			$data['getPricetags'] = $this->Model_Select->getPricetags();
			$this->load->view('pages/users/lyct',$data);
		}
		elseif (!isset($_SESSION['isActive'])) {
			redirect('NeedToLogin');
		}
		elseif (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] != 1 || $_SESSION['VerifyStatus'] != 1) {
			redirect('AccountLimited');
		}
		else
		{
			redirect('Home');
		}

	}
	public function request_as_hot()
	{

		if (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] == 1 AND $_SESSION['VerifyStatus'] == 1) {
			$navdata['title'] = "Apply to Hot list | WEBN Airdrops and Bounty Station";
			
			$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
			);
			$data['getPricetags'] = $this->Model_Select->getPricetags();
			$data['getHotPrice'] = $this->Model_Select->getHotPrice();
			$this->load->view('pages/users/request_as_hot',$data);
		}
		elseif (!isset($_SESSION['isActive'])) {
			redirect('NeedToLogin');
		}
		elseif (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] != 1 || $_SESSION['VerifyStatus'] != 1) {
			redirect('AccountLimited');
		}
		else
		{
			redirect('Home');
		}

	}
	public function request_as_featured()
	{

		if (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] == 1 AND $_SESSION['VerifyStatus'] == 1) {
			$navdata['title'] = "Apply to Featured list | WEBN Airdrops and Bounty Station";
			
			$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
			);
			$data['getPricetags'] = $this->Model_Select->getPricetags();
			$data['getFeaturePrice'] = $this->Model_Select->getFeaturePrice();
			$this->load->view('pages/users/request_as_featured',$data);
		}
		elseif (!isset($_SESSION['isActive'])) {
			redirect('NeedToLogin');
		}
		elseif (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] != 1 || $_SESSION['VerifyStatus'] != 1) {
			redirect('AccountLimited');
		}
		else
		{
			redirect('Home');
		}

	}

	// ---------------- REQUEST FOR LISTING
	public function RequestForListing()
	{
		if (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] == 1 AND $_SESSION['VerifyStatus'] == 1) {

			// $TokenImage = $this->input->post('TokenImage',true);
			$ProjectName = $this->input->post('ProjectName',true);
			$Description = $this->input->post('Description',true);
			$DateStart = $this->input->post('DateStart',true);
			$DateEnd = $this->input->post('DateEnd',true);
			$AirdropsLink = $this->input->post('Link',true);
			$WebsiteSource = $this->input->post('Website',true);
			$MaxParticipant = $this->input->post('MaxParticipant',true);
			$ToBeDistributed = $this->input->post('ToBeDistributed',true);
			$RewardQuantity = $this->input->post('RewardQuantity',true);
			$CompleteInstruction = $this->input->post('CompleteInstruction',true);
			$PaymentDetails = $this->input->post('PaymentDetails',true);
			$ExpirationDate = 'Not Set';
			$ApproveDate = 'Not Set';
			$ListAsHot = 'Regular';
			$Featured = 'no';
			$txid = $this->input->post('txid',true);

			if ($txid == "" || $ProjectName == "" ||$Description == "" ||$DateStart == "" ||$DateEnd == "" ||$AirdropsLink == "" ||$WebsiteSource == "" ||$MaxParticipant == "" ||$ToBeDistributed == "" ||$RewardQuantity == "" ||$CompleteInstruction == "") {
				$this->session->set_flashdata('promptInfo', '<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> All fields are required! </div>');
				redirect('atl_regular');
			}
			elseif ($PaymentDetails == null) {
				$this->session->set_flashdata('promptInfo', '<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Select Payment </div>');
				redirect('atl_regular');
			}
			else
			{
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('TokenImage'))
				{
					$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> '.$this->upload->display_errors().'</div>');
					redirect('atl_regular');
				}
				else
				{
					date_default_timezone_set("Asia/Manila");
					$today = date("Y-m-d h:i:s a");

					$TokenImage = base_url().'uploads/'.$this->upload->data('file_name');
					$dataa = array(
						'TokenImage' => $TokenImage ,
						'ProjectName' => $ProjectName ,
						'Description' => $Description ,
						'DateStart' => $DateStart ,
						'DateEnd' => $DateEnd ,
						'AirdropsLink' => $AirdropsLink ,
						'WebsiteSource' => $WebsiteSource ,
						'MaxParticipants' => $MaxParticipant ,
						'ToBeDistributed' => $ToBeDistributed ,
						'RewardQuantity' => $RewardQuantity ,
						'CompleteInstruction' => $CompleteInstruction ,
						'DateAdded' => $today ,
						'AddedBy' => $_SESSION['Email'] ,
						'Rate' => '4' ,
						'RequestStatus' => 'For Approval' ,
						'PaymentDetails' => $PaymentDetails ,
						'PostPrio' => $ListAsHot ,
						'isFeatured' => $Featured,
						'ExpirationDate' => $ExpirationDate ,
						'ApproveDate' => $ApproveDate ,

					);

					$RequestForListResult = $this->Model_Insert->RequestForList($dataa);
					
					if ($RequestForListResult == true) {
						$data = array(
							'AirdropID' => $RequestForListResult,
							'TxID' => $txid,
							'EmailAddress' => $_SESSION['Email'],
							'PaymentDetails' => $PaymentDetails,
							'ListAsHot' => $ListAsHot,
							'Featured' => $Featured,
							'Date' => $today,
						);
						$addTopayment = $this->Model_Insert->addTopayment($data);

						if ($addTopayment == true) {

							$this->session->set_flashdata('promptInfo', '<div class="prompt-success"><i class="fas fa-check-circle"></i> Waiting for Schedule </div>');
							redirect('atl_regular');
						}
						else
						{
							$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Error saving payment</div>');
							redirect('atl_regular');
						}
					}
					else
					{
						$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Error sending request</div>');
						redirect('atl_regular');
					}
				}
			}
		}
	}
	public function RequestForHotlisting()
	{
		if (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] == 1 AND $_SESSION['VerifyStatus'] == 1) {

			// $TokenImage = $this->input->post('TokenImage',true);
			$ProjectName = $this->input->post('ProjectName',true);
			$Description = $this->input->post('Description',true);
			$DateStart = $this->input->post('DateStart',true);
			$DateEnd = $this->input->post('DateEnd',true);
			$AirdropsLink = $this->input->post('Link',true);
			$WebsiteSource = $this->input->post('Website',true);
			$MaxParticipant = $this->input->post('MaxParticipant',true);
			$ToBeDistributed = $this->input->post('ToBeDistributed',true);
			$RewardQuantity = $this->input->post('RewardQuantity',true);
			$CompleteInstruction = $this->input->post('CompleteInstruction',true);
			$PaymentDetails = $this->input->post('PaymentDetails',true);
			$ExpirationDate = 'Not Set';
			$ApproveDate = 'Not Set';
			$ListAsHot = 'Hot';
			$Featured = 'no';
			$txid = $this->input->post('txid',true);

			if ($txid == "" || $ProjectName == "" ||$Description == "" ||$DateStart == "" ||$DateEnd == "" ||$AirdropsLink == "" ||$WebsiteSource == "" ||$MaxParticipant == "" ||$ToBeDistributed == "" ||$RewardQuantity == "" ||$CompleteInstruction == "") {
				$this->session->set_flashdata('promptInfo', '<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> All fields are required! </div>');
				redirect('atl_hot');
			}
			elseif ($PaymentDetails == null) {
				$this->session->set_flashdata('promptInfo', '<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Select Payment </div>');
				redirect('atl_hot');
			}
			else
			{
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('TokenImage'))
				{
					$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> '.$this->upload->display_errors().'</div>');
					redirect('atl_hot');
				}
				else
				{
					date_default_timezone_set("Asia/Manila");
					$today = date("Y-m-d h:i:s a");

					$TokenImage = base_url().'uploads/'.$this->upload->data('file_name');
					$dataa = array(
						'TokenImage' => $TokenImage ,
						'ProjectName' => $ProjectName ,
						'Description' => $Description ,
						'DateStart' => $DateStart ,
						'DateEnd' => $DateEnd ,
						'AirdropsLink' => $AirdropsLink ,
						'WebsiteSource' => $WebsiteSource ,
						'MaxParticipants' => $MaxParticipant ,
						'ToBeDistributed' => $ToBeDistributed ,
						'RewardQuantity' => $RewardQuantity ,
						'CompleteInstruction' => $CompleteInstruction ,
						'DateAdded' => $today ,
						'AddedBy' => $_SESSION['Email'] ,
						'Rate' => '4' ,
						'RequestStatus' => 'For Approval' ,
						'PaymentDetails' => $PaymentDetails ,
						'PostPrio' => $ListAsHot ,
						'isFeatured' => $Featured,
						'ExpirationDate' => $ExpirationDate ,
						'ApproveDate' => $ApproveDate ,

					);

					$RequestForListResult = $this->Model_Insert->RequestForList($dataa);
					
					if ($RequestForListResult == true) {
						$data = array(
							'AirdropID' => $RequestForListResult,
							'TxID' => $txid,
							'EmailAddress' => $_SESSION['Email'],
							'PaymentDetails' => $PaymentDetails,
							'ListAsHot' => $ListAsHot,
							'Featured' => $Featured,
							'Date' => $today,
						);
						$addTopayment = $this->Model_Insert->addTopayment($data);

						if ($addTopayment == true) {

							$this->session->set_flashdata('promptInfo', '<div class="prompt-success"><i class="fas fa-check-circle"></i> Waiting for Schedule </div>');
							redirect('atl_hot');
						}
						else
						{
							$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Error saving payment</div>');
							redirect('atl_hot');
						}
					}
					else
					{
						$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Error sending request</div>');
						redirect('atl_hot');
					}
				}
			}
		}
	}
	public function RequestForFeaturedlisting()
	{
		if (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] == 1 AND $_SESSION['VerifyStatus'] == 1) {

			// $TokenImage = $this->input->post('TokenImage',true);
			$ProjectName = $this->input->post('ProjectName',true);
			$Description = $this->input->post('Description',true);
			$DateStart = $this->input->post('DateStart',true);
			$DateEnd = $this->input->post('DateEnd',true);
			$AirdropsLink = $this->input->post('Link',true);
			$WebsiteSource = $this->input->post('Website',true);
			$MaxParticipant = $this->input->post('MaxParticipant',true);
			$ToBeDistributed = $this->input->post('ToBeDistributed',true);
			$RewardQuantity = $this->input->post('RewardQuantity',true);
			$CompleteInstruction = $this->input->post('CompleteInstruction',true);
			$PaymentDetails = $this->input->post('PaymentDetails',true);
			$ExpirationDate = 'Not Set';
			$ApproveDate = 'Not Set';
			$ListAsHot = 'Featured';
			$Featured = 'yes';
			$txid = $this->input->post('txid',true);

			if ($txid == "" || $ProjectName == "" ||$Description == "" ||$DateStart == "" ||$DateEnd == "" ||$AirdropsLink == "" ||$WebsiteSource == "" ||$MaxParticipant == "" ||$ToBeDistributed == "" ||$RewardQuantity == "" ||$CompleteInstruction == "") {
				$this->session->set_flashdata('promptInfo', '<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> All fields are required! </div>');
				redirect('atl_featured');
			}
			elseif ($PaymentDetails == null) {
				$this->session->set_flashdata('promptInfo', '<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Select Payment </div>');
				redirect('atl_featured');
			}
			else
			{
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 100;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('TokenImage'))
				{
					$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> '.$this->upload->display_errors().'</div>');
					redirect('atl_featured');
				}
				else
				{
					date_default_timezone_set("Asia/Manila");
					$today = date("Y-m-d h:i:s a");

					$TokenImage = base_url().'uploads/'.$this->upload->data('file_name');
					$dataa = array(
						'TokenImage' => $TokenImage ,
						'ProjectName' => $ProjectName ,
						'Description' => $Description ,
						'DateStart' => $DateStart ,
						'DateEnd' => $DateEnd ,
						'AirdropsLink' => $AirdropsLink ,
						'WebsiteSource' => $WebsiteSource ,
						'MaxParticipants' => $MaxParticipant ,
						'ToBeDistributed' => $ToBeDistributed ,
						'RewardQuantity' => $RewardQuantity ,
						'CompleteInstruction' => $CompleteInstruction ,
						'DateAdded' => $today ,
						'AddedBy' => $_SESSION['Email'] ,
						'Rate' => '4' ,
						'RequestStatus' => 'For Approval' ,
						'PaymentDetails' => $PaymentDetails ,
						'PostPrio' => $ListAsHot ,
						'isFeatured' => $Featured,
						'ExpirationDate' => $ExpirationDate ,
						'ApproveDate' => $ApproveDate ,

					);

					$RequestForListResult = $this->Model_Insert->RequestForList($dataa);
					
					if ($RequestForListResult == true) {
						$data = array(
							'AirdropID' => $RequestForListResult,
							'TxID' => $txid,
							'EmailAddress' => $_SESSION['Email'],
							'PaymentDetails' => $PaymentDetails,
							'ListAsHot' => $ListAsHot,
							'Featured' => $Featured,
							'Date' => $today,
						);
						$addTopayment = $this->Model_Insert->addTopayment($data);

						if ($addTopayment == true) {

							$this->session->set_flashdata('promptInfo', '<div class="prompt-success"><i class="fas fa-check-circle"></i> Waiting for Schedule </div>');
							redirect('atl_featured');
						}
						else
						{
							$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Error saving payment</div>');
							redirect('atl_featured');
						}
					}
					else
					{
						$this->session->set_flashdata('promptInfo', '<div class="prompt-error"><i class="fas fa-times-circle"></i> Error sending request</div>');
						redirect('atl_featured');
					}
				}
			}
		}
	}
}