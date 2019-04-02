<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Select extends CI_Model {
	
	public function GetAirdropsHot()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus ='Approved' AND PostPrio ='hot' ORDER BY Rate DESC LIMIT 8";
		$result = $this->db->query($sql);
		return $result;
	}
	public function GetAirdropsLatest()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus ='Approved' AND PostPrio ='latest' ORDER BY DateAdded DESC LIMIT 8";
		$result = $this->db->query($sql);
		return $result;
	}
	public function getHotairdrops()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus ='Approved' AND PostPrio ='hot' ORDER BY Rate DESC";
		$sqlres = $this->db->query($sql);
		return $sqlres;
	}
	public function GetAirdrops()
	{
		$sql = "SELECT * FROM ab_airdrops WHERE RequestStatus ='Approved' AND PostPrio ='latest' ORDER BY DateAdded DESC";
		$sqlres = $this->db->query($sql);
		return $sqlres;
	}
	public function ai_details($airdrop_id)
	{
		$sql = "SELECT * FROM ab_airdrops WHERE airdrop_id = ?";
		$result = $this->db->query($sql,$airdrop_id);
		return $result->row();
	}
	
	public function get_userdata($User_No)
	{
		$sql = "SELECT * FROM ab_users WHERE User_No='$User_No'";
		$sqlres = $this->db->query($sql);
		return $sqlres->row();
	}


	public function getTotalrating($ratepostid)
	{
		$sql = "SELECT * FROM ab_airdrops WHERE airdrop_id = ?";
		$result = $this->db->query($sql,$ratepostid);
		return $result->row();
	}
	public function UserHasRate($userid,$ratepostid)
	{
		$sql = "SELECT * FROM ab_rates WHERE userid = '$userid' AND ratepostid = '$ratepostid'";
		$result = $this->db->query($sql);
		return $result;
	}

	public function GetAVGrate($ratepostid)
	{
		$sql = "SELECT AVG(ratepoints) AS avg_rate FROM ab_rates WHERE ratepostid = '$ratepostid'";
		$result = $this->db->query($sql);
		return $result->row();
	}

	public function getHydroID($UserNo)
	{
		$sql = "SELECT * FROM ab_users WHERE User_No = '$UserNo'";
		$result = $this->db->query($sql);
		return $result->row();
	}
	
	public function GetUserData($UserNo)
	{
		$sql = "SELECT * FROM ab_users WHERE User_No = '$UserNo'";
		$result = $this->db->query($sql);
		return $result->row();
	}
	public function getUserbyNO($UserNo)
	{
		$sql = "SELECT * FROM ab_users WHERE User_No = '$UserNo'";
		$result = $this->db->query($sql);
		return $result->row();
	}
	public function GetAllfaqs()
	{
		$sql = "SELECT * FROM ab_faqs";
		$result = $this->db->query($sql);
		return $result;
	}
	public function getUserCode($data)
	{
		extract($data);
		$sql = "SELECT User_No,Email_Address,VerificationCode FROM ab_users WHERE User_No = '$UserNo' AND Email_Address = '$Email_Address'";
		$result = $this->db->query($sql);
		return $result->row();
	}
	public function showratebtn($data)
	{
		extract($data);
		$sql = "SELECT * FROM ab_rates WHERE userid = ? AND ratepostid = ?";
		$result = $this->db->query($sql,array($userid,$ratepostid));
		return $result;
	}
	public function getAirdoprequest($EmailAddress)
	{
		$this->db->select('*');
		$this->db->from('ab_airdrops');
		$this->db->where('AddedBy',$EmailAddress);
		$this->db->order_by('airdrop_id DESC');
		$result = $this->db->get();
		return $result;
	}
	public function GetAirdropFields($data)
	{
		extract($data);
		$this->db->select('*');
		$this->db->from('ab_airdrops');
		$this->db->where(array('airdrop_id' => $airdropid,'AddedBy' => $email_address, ));
		$result = $this->db->get();
		return $result->row();
	}
	public function GetPayments($data)
	{
		extract($data);
		$this->db->select('*');
		$this->db->from('ab_payments');
		$this->db->where(array('AirdropID' => $airdropid,'EmailAddress' => $email_address, ));
		$this->db->order_by('AirdropID DESC');
		$result = $this->db->get();
		return $result;
	}
	public function checkPayments($ses_paymentid,$EmailAddress)
	{
		$this->db->select('*');
		$this->db->from('ab_payments');
		$this->db->where(array('AirdropID' => $ses_paymentid,'EmailAddress' => $EmailAddress, ));
		$result = $this->db->get();
		return $result->row();
	}
}
