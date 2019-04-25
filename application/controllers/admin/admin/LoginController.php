<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin/A_ModelSelect','amSelect');
	}
	public function Admin_Validation()
	{
		if (isset($_SESSION['is_Active'])) {
			redirect('Admin-Dashboard');
		}else
		{
			if ($this->input->post('Checkadmin',true)) {
				if ($this->input->post('emailaddress',true) == "") {
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Email Address Empty.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin');
				}
				elseif ($this->input->post('password',true) == "")
				{
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Password Empty.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Admin');
				}
				else
				{
					$adminemailaddress = $this->input->post('emailaddress',true);
					$adminpassword = $this->input->post('password',true);

					$get_admin = $this->amSelect->getAdminCode($adminemailaddress);

					if ($get_admin->EmailAddress == $adminemailaddress) {
						$dbpass = $get_admin->Password;
						$haspass = $adminpassword;

						if (password_verify($haspass,$dbpass) == true) {
							$data = array(
								'No' =>$get_admin->No , 
								'FName' => $get_admin->FName, 
								'LName' =>$get_admin->LName , 
								'EmailAddress' =>$get_admin->EmailAddress , 
								'is_Admin' => $get_admin->is_Admin , 
								'is_Active' => 'Admin' , 
							);
							$this->session->set_userdata($data);
							redirect('Admin-Dashboard');
						}
						else
						{
							$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Password Error.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							redirect('Admin');
						}
					}
					else
					{
						$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Email didnt match.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							redirect('Admin');
					}
				}
			} else {
				redirect('Admin');
			}
		}
	}
	public function ValidateCP_Functions()
	{
		if ($this->input->post('CheckCP',true)) {
			if ($this->input->post('code',true) == "") {
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opppsss!</strong> Code Empty. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('step2login');
			}
			elseif ($this->input->post('pincode',true) == "")
			{
				$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opppsss!</strong> PIN Empty. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('step2login');
			}
			else
			{
				$admin_code = $this->input->post('code',true);
				$admin_pincode = $this->input->post('pincode',true);
				
				$get_admincp = $this->amSelect->getAdminCodePin($admin_code);

				if ($get_admincp->Code == $admin_code) {
					$dbpass = $get_admincp->PIN;
					$haspass = $admin_pincode;

					if (password_verify($haspass,$dbpass) == true) {

						$data = array(
							'No' =>$get_admincp->No , 
							'FName' => $get_admincp->FName, 
							'LName' =>$get_admincp->LName , 
							'EmailAddress' =>$get_admincp->EmailAddress , 
							'is_Admin' => $get_admincp->is_Admin , 
							'is_Active' => 'Admin' , 
						);
						$this->session->set_userdata($data);
						redirect('Admin-Dashboard');
					}
					else
					{
						$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opppsss!</strong> PIN Error. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('step2login');
					}
				}
				else
				{
					$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Opppsss!</strong> Code Error. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('step2login');
				}
			}
		} else {
			redirect('step2login');
		}
	}
}
