<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LYCT_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		
	}

	// ---------------- REDIRECT TO SIGN UP VIEW
	public function index()
	{
		redirect('List-Your-Coin-Token');
	}

	// ---------------- LOAD SIGNUP VIEW
	public function lyct_view()
	{

		if ($this->session->userdata('isActive') == 3) {
			$navdata['title'] = "List your Coin / Token | WEBN Airdrops and Bounty Station";
			$navdata['bot_token'] = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
			$navdata['chat_id'] = '-1001489662009';
			
			$data = array(
				'user_header' => $this->load->view('pages/users/_template/_header',$navdata), 
			);
			$this->load->view('pages/users/lyct',$data);
		}
		else
		{
			redirect('Home');
		}

	}

	// ---------------- REQUEST FOR LISTING
	public function RequestForListing()
	{
		if ($this->session->userdata('isActive') == 3) {

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

			if ($ProjectName == "" ||$Description == "" ||$DateStart == "" ||$DateEnd == "" ||$AirdropsLink == "" ||$WebsiteSource == "" ||$MaxParticipant == "" ||$ToBeDistributed == "" ||$RewardQuantity == "" ||$CompleteInstruction == "") {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opppsss!</strong> All Fields are required. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('List-Your-Coin-Token',location);
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
                        $this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opppsss!</strong> '.$this->upload->display_errors().'. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        redirect('List-Your-Coin-Token',location);
                }
                else
                {
                	date_default_timezone_set("Asia/Manila");
                	$today = date("Y-m-d");

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
						'AddedBy' => 'AddedBy' ,
						'Rate' => '0' ,
						'RequestStatus' => 'For Approval' ,
					);

					$RequestForListResult = $this->Model_Insert->RequestForList($dataa);
					
					if ($RequestForListResult == true) {
						$this->session->set_flashdata('promptInfo', '<div class="alert alert-success alert-dismissible fade animated bounceInDown show" role="alert"><strong>Success !</strong> New Airdrop has been posted. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('List-Your-Coin-Token',location);
					}
					else
					{
						$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible fade animated bounceInDown show" role="alert"><strong>Opppsss!</strong> Error saving. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('List-Your-Coin-Token',location);
					}
                }
			}
		}
	}

}