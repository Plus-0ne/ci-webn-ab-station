<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertController extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('admin/A_ModelSelect','amSelect');
		$this->load->model('admin/A_ModelInsert','amInsert');
	}
	
	public function AddAdmin()
	{
		if ($this->session->userdata('is_Admin') == 1) {
			$fname = $this->input->post('fname',true);
			$lname = $this->input->post('lname',true);
			$emailaddress = $this->input->post('emailaddress',true);
			$password = $this->input->post('password',true);
			$al_value = $this->input->post('al_value',true);

			if ($fname == "" || $lname == "" || $emailaddress == "" || $password == "" || $al_value == "") {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>All Fields are required.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-list');
			}
			else
			{
				$Newpassword = password_hash($password,PASSWORD_BCRYPT);

				$data = array(
					'fname' => $fname, 
					'lname' => $lname, 
					'emailaddress' => $emailaddress, 
					'password' => $Newpassword, 
					'al_value' => $al_value, 
				);

				$insertResult = $this->amInsert->InserNewAdmin($data);
				if ($insertResult == true) {
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong>New Admin added.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-list');
				}
				else
				{
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error Saving.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-list');
				}
			}
		}
		else
		{
			redirect('Admin');
		}
	}
	public function AddAirdrops()
	{
		if (isset($_SESSION['is_Active'])) {

			// $TokenImage = $this->input->post('TokenImage',true);
			$ProjectName = $this->input->post('ProjectName',true);
			$Description = $this->input->post('Description',true);
			$DateStart = $this->input->post('DateStart',true);
			$DateEnd = $this->input->post('DateEnd',true);
			$AirdropsLink = $this->input->post('AirdropsLink',true);
			$WebsiteSource = $this->input->post('WebsiteSource',true);
			$MaxParticipant = $this->input->post('MaxParticipant',true);
			$ToBeDistributed = $this->input->post('ToBeDistributed',true);
			$RewardQuantity = $this->input->post('RewardQuantity',true);
			$CompleteInstruction = $this->input->post('CompleteInstruction',true);

			if ($ProjectName == "" ||$Description == "" ||$DateStart == "" ||$DateEnd == "" ||$AirdropsLink == "" ||$WebsiteSource == "" ||$MaxParticipant == "" ||$ToBeDistributed == "" ||$RewardQuantity == "" ||$CompleteInstruction == "") {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>All Fields are required.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-New_Entry');
			}
			else
			{
				$userpath = 'C:\xampp\htdocs\webn-ab-station\uploads';
				$config['upload_path']          = $userpath;
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('TokenImage'))
                {
                        $this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>'.$this->upload->display_errors().'.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('Admin-New_Entry');
                }
                else
                {
                	date_default_timezone_set("Asia/Manila");
                	$today = date("Y-m-d");

                	$AddedBy = $this->session->userdata('FName').' '.$this->session->userdata('LName');
                    $TokenImage = 'https://localdev.test/webn-ab-station/uploads/'.$this->upload->data('file_name');
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
						'DateAdded' => $today,
						'AddedBy' => $AddedBy ,
						'Rate' => 4 ,
						'RequestStatus' => 'Approved' ,
					);

					$InserResult = $this->amInsert->InsertNewAirdrops($dataa);
					if ($InserResult == true) {
						$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong>New Airdrop has been added.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('Admin-New_Entry');
					}
					else
					{
						$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error saving.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('Admin-New_Entry');
					}
                }
			}
		}
	}
	public function AddFaqs()
	{
		if (isset($_SESSION['is_Active'])) {
			$Question = $this->input->post('Question',true);
			$Answer = $this->input->post('Answer',true);
			if ($Question == false || $Answer == false) {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error saving.</strong> Error saving. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin-Faqs');
			}
			else
			{
				$data = array(
					'Question' => $Question,
					'Answer' => $Answer,
					 );
				$FaqAddResult = $this->amInsert->FaqAddResult($data);
				if ($FaqAddResult == true) {
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible" role="alert"><strong>FAQ saved.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-Faqs');
				}
				else
				{
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error saving.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin-Faqs');
				}
			}
		}
		else
		{
			redirect('Admin');
		}
	}
}

