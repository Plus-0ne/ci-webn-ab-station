<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin/a_ModelSelect','amSelect');
	}
	public function index()
	{
		if (isset($_SESSION['is_Active'])) {
			redirect('Admin-Dashboard');
		}
		else
		{
			$data['title'] = "Login | Airdrop Coin Station";
			$data = array
			(
				'admin_header' => $this->load->view('pages/admin/_template/admin_header',$data),
				'admin_jsscript' => $this->load->view('pages/admin/_template/admin_jsscripts'),
			);
			$this->load->view('pages/admin/login',$data);
		}
	}
	public function step2login()
	{
		if (isset($_SESSION['is_Active'])) {
			redirect('Admin-Dashboard');
		}
		else
		{
			$data['title'] = "Login | Airdrop Coin Station";
			$data = array
			(
				'admin_header' => $this->load->view('pages/admin/_template/admin_header',$data),
				'admin_jsscript' => $this->load->view('pages/admin/_template/admin_jsscripts'),
			);
			$this->load->view('admin/loginS2',$data);
		}
	}
	
	public function Dashboard()
	{
		if (isset($_SESSION['is_Active'])) {
			$title['title'] = "Dashboard | Airdrop Coin Station";

			$data['GetUserCounts'] = $this->amSelect->GetUserCounts();
			$data['GetAirdropApproved'] = $this->amSelect->GetAirdropApproved();
			$data['GetAirdropRequest'] = $this->amSelect->GetAirdropRequest();
			$data['GetAirdropExpired'] = $this->amSelect->GetAirdropExpired();
			$data['GetAirdropTopRated'] = $this->amSelect->GetAirdropTopRated();
			$data['getFeaturedairdrops'] = $this->amSelect->getFeaturedairdrops();

			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);			
			
			$this->load->view('pages/admin/admin_dashboard',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
		
	}
	public function Airdrops()
	{
		if (isset($_SESSION['is_Active'])) {


			$title['title'] = "List of Airdrops | Airdrop Coin Station";

			$data['GetAirdrops'] = $this->amSelect->GetAirdrops();
			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);
			$this->load->view('pages/admin/admin_airdrops',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
	}
	public function FeaturedAirdrops()
	{
		if (isset($_SESSION['is_Active'])) {


			$title['title'] = "Featured Airdrops | Airdrop Coin Station";

			$data['getFeaturedairdrops'] = $this->amSelect->getFeaturedairdrops();
			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);
			
			
			$this->load->view('pages/admin/featuredrops',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
	}
	public function bounty_list()
	{
		if (isset($_SESSION['is_Active'])) {
			$title['title'] = "List of Bounties | Airdrop Coin Station";

			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);
			$data['admin_nav'] = $this->load->view('admin/_template/admin_nav');
			$data['admin_jsscript'] = $this->load->view('pages/admin/_template/admin_jsscripts');
			
			
			$this->load->view('pages/admin/admin_bounties',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
	}
	public function Add_New_Entry()
	{
		if (isset($_SESSION['is_Active'])) {
			$title['title'] = "New Entry | Airdrop Coin Station";

			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);
			$data['admin_nav'] = $this->load->view('admin/_template/admin_nav');
			$data['admin_jsscript'] = $this->load->view('pages/admin/_template/admin_jsscripts');
			
			
			$this->load->view('pages/admin/admin_newentry',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
	}
	public function Admin_Request()
	{
		if (isset($_SESSION['is_Active'])) {


			$title['title'] = "Requests  | Airdrop Coin Station";

			$data['GetRequest'] = $this->amSelect->GetRequest();

			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);
			
			
			$this->load->view('pages/admin/admin_request',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
	}
	public function Request_details()
	{
		if (isset($_SESSION['is_Active'])) {


			$title['title'] = "Requests Details | Airdrop Coin Station";

			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);
			
			$airdopid = $this->input->get('aide');

			$data['TotalLikes'] = $this->amSelect->getTotallikes($airdopid);
			$data['TotalDislike'] = $this->amSelect->getTotaldislike($airdopid);

			$data['GetAirdopDetails'] = $this->amSelect->GetAirdopDetails($airdopid);
			$data['GetRequestDetails'] = $this->amSelect->GetRequestDetails($airdopid);
			
			$this->load->view('pages/admin/Request_details',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
	}
	public function Expired_Airdrops()
	{
		if (isset($_SESSION['is_Active'])) {


			$title['title'] = " Expired Airdrops  | Airdrop Coin Station";

			$data['GetExpireAirdrops'] = $this->amSelect->GetExpireAirdrops();

			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);
			
			
			$this->load->view('pages/admin/admin_expired',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
	}

	public function all_users()
	{
		if (isset($_SESSION['is_Active'])) {
			$title['title'] = "List of Users | Airdrop Coin Station";

			$data['GetUsers'] = $this->amSelect->getUsers();
			
			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);

			
			
			$this->load->view('pages/admin/admin_users',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
		
	}
	public function Option_Platform()
	{
		if (isset($_SESSION['is_Active'])) {
			$title['title'] = "Platforms | Airdrop Coin Station";

			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);

			
			
			$this->load->view('pages/admin/admin_optionplatform',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
		
	}
	public function Option_Admin()
	{
		if ($this->session->userdata('is_Admin') == 1) {
			$title['title'] = "Admins | Airdrop Coin Station";

			$data['GetAdmins'] = $this->amSelect->GetAdmins();

			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);

			
			
			$this->load->view('pages/admin/admin_optionadmin',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
		
	}
	public function pricing()
	{
		if ($this->session->userdata('is_Admin') == 1) {
			$title['title'] = "Prices | Airdrop Coin Station";

			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);
			$data['priceforday'] = $this->amSelect->priceforday();
			$data['addPricefor'] = $this->amSelect->addPricefor();
			$this->load->view('pages/admin/admin_pricing',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
		
	}
	public function all_faqs()
	{
		if (isset($_SESSION['is_Active'])) {
			$title['title'] = "List of Frequently asked question | Airdrop Coin Station";

			$data['GetFaqs'] = $this->amSelect->GetFaqs();
			
			$data['admin_header'] = $this->load->view('pages/admin/_template/admin_header',$title);
			
			$this->load->view('pages/admin/admin_faqs',$data);
		}
		else
		{
			$this->session->set_flashdata('promptInfo', '<div class="alert alert-danger alert-dismissible" role="alert"><strong>You need to login.</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin');
		}
		
	}
}
