<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_ModelSelect extends CI_Model {
	
	public function GetAirdrops()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus = 'Approved'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function getUsers()
	{
		$sql = "SELECT * FROM ab_users";
		$result = $this->db->query($sql);
		return $result;
	}
	public function GetICOS()
	{
		$sql = "SELECT * FROM ab_users";
		$result = $this->db->query($sql);
		return $result;
	}
	public function GetAdmins()
	{
		$sql = "SELECT * FROM ab_admin";
		$result = $this->db->query($sql);
		return $result;
	}
	public function GetRequest()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus = 'For Approval'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function getAdminCode($adminemailaddress)
	{
		$sql = "SELECT * FROM ab_admin WHERE EmailAddress = ?";
		$result = $this->db->query($sql,$adminemailaddress);
		return $result->row();
	}
	public function getAdminCodePin($admin_code)
	{
		$sql = "SELECT * FROM ab_admin WHERE Code = ?";
		$result = $this->db->query($sql,$admin_code);
		return $result->row();
	}
	public function GetFaqs()
	{
		$sql = "SELECT * FROM ab_faqs";
		$result = $this->db->query($sql);
		return $result;
	}
	public function GetAirdopDetails($airdopid)
	{
		$sql = "SELECT * FROM ab_airdrops WHERE airdrop_id = '$airdopid'";
		$result = $this->db->query($sql);
		return $result->row();
	}
	public function GetRequestDetails($airdopid)
	{
		$sql = "SELECT * FROM ab_payments WHERE AirdropID = '$airdopid'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function getAirdropsFields($airdrop_id)
	{
		$sql = "SELECT * FROM ab_airdrops WHERE airdrop_id = '$airdrop_id'";
		$result = $this->db->query($sql);
		return $result->row();
	}
	public function GetUserCounts()
	{
		$sql = "SELECT * FROM ab_users";
		$result = $this->db->query($sql);
		return $result;
	}
	public function GetAirdropApproved()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus = 'Approved'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function GetAirdropRequest()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus = 'For Approval'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function GetAirdropExpired()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus = 'Expired'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function GetAirdropTopRated()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus = 'Approved' ORDER BY Rate DESC";
		$result = $this->db->query($sql);
		return $result;
	}
	public function getFeaturedairdrops()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus = 'Approved' AND isFeatured = 'yes' ORDER BY Rate DESC";
		$result = $this->db->query($sql);
		return $result;
	}
	public function GetExpireAirdrops()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus = 'Expired'";
		$result = $this->db->query($sql);
		return $result;
	}
}

