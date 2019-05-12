<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Update extends CI_Model {
	
	public function update_telegram_id($verifiedid,$User_No)
	{		
		$sql = "UPDATE ab_users SET Is_Telegram_Member='$verifiedid' WHERE User_No='$User_No'";
		$sqlres = $this->db->query($sql);
		return $sqlres;
	}

	public function UpdateRate($total,$ratepostid)
	{		
		$sql = "UPDATE ab_airdrops SET Rate='$total' WHERE airdrop_id='$ratepostid'";
		$sqlres = $this->db->query($sql);
		return $sqlres;
	}
	public function HydroIDUpdate($HydroID,$UserNo)
	{
		$sql = "UPDATE ab_users SET Hydro_ID='$HydroID' WHERE User_No='$UserNo'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function hydroautup($UserNo)
	{
		$sql = "UPDATE ab_users SET Hydro_Auth= 1 WHERE User_No='$UserNo'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function updateUSerLogin($UserNo)
	{
		$sql = "UPDATE ab_users SET Hydro_Auth= 1 WHERE User_No='$UserNo'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function UnregisterHydro($hydroId)
	{
		$UserNo = $this->session->userdata('UserNo');
		$Hydro_Auth = 0;
		$sql = "UPDATE ab_users SET Hydro_ID = '$hydroId' , Hydro_Auth = '$Hydro_Auth' WHERE User_No = '$UserNo'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function UpdatePassword($data)
	{
		extract($data);
		
		$sql = "UPDATE ab_users SET Password= ? WHERE User_No=?";
		$result = $this->db->query($sql,array($hashpass,$UserNo));
		return $result;
	}
	public function updateInfo($data)
	{
		extract($data);
		
		$sql = "UPDATE ab_users SET First_Name = ?, Last_Name = ?, CompanyName = ?, Is_Telegram_Member = ?, CompanyAddress = ? WHERE User_No=?";
		$result = $this->db->query($sql,array($Fname,$Lname,$CompanyName,$TelegramID,$CompanyAddress,$UserNo));
		return $result;
	}
	public function UpdateICO($data)
	{
		extract($data);
		
		$sql = "UPDATE ab_users SET CompanyName = ?, CompanyAddress = ? , isICO = ? WHERE User_No=?";
		$result = $this->db->query($sql,array($CompanyName,$CompanyAddress,$RegisterICO,$UserNo));
		return $result;
	}
	public function UpdateCode($data)
	{
		extract($data);
		
		$sql = "UPDATE ab_users SET VerificationCode = ? WHERE User_No=? AND Email_Address = ?";
		$result = $this->db->query($sql,array($VerificationCode,$UserNo,$Email));
		return $result;
	}
	public function UpdateVerifyStatus($data)
	{
		extract($data);
		
		$sql = "UPDATE ab_users SET VerifyStatus = 1 WHERE User_No=? AND Email_Address = ?";
		$result = $this->db->query($sql,array($UserNo,$Email_Address));
		return $result;
	}
	
	public function UpdatePayment($data)
	{
		extract($data);

		$data = array(
			'TxID' => $TxID,
		);

		$this->db->where(array('AirdropID' => $AirdropID ,'EmailAddress' => $EmailAddress));
		$result = $this->db->update('ab_payments', $data);
		return $result;
	}
	public function ChangetoExpired($AirdropID)
	{
		$data = array(
			'RequestStatus' => 'Expired',
			 );
		$this->db->where('airdrop_id' ,$AirdropID);
		$result = $this->db->update('ab_airdrops', $data);
		return $result;
	}
	public function UpdateExtendAirdrop($data)
	{
		extract($data);
		$data = array(
			'AddedBy' => $AddedBy,
			'RequestStatus' => $RequestStatus,
			'PaymentDetails' => $PaymentDetails,
			'PostPrio' => $PostPrio,
			'ExpirationDate' => 'Not Set',
		);
		$this->db->where('airdrop_id' ,$airdrop_id);
		$result = $this->db->update('ab_airdrops', $data);
		return $result;
	}

	public function updatedlike($postid,$like,$userid)
	{
		$sql = "UPDATE ab_rates SET ratepoints = '$like' WHERE userid = '$userid' AND ratepostid = '$postid'";
		$result = $this->db->query($sql);
		return $result;
	}
}
