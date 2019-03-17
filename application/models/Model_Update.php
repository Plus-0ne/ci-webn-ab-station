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
		$sql = "UPDATE ab_users SET Hydro_Auth= 1 , Account_Status = 3 WHERE User_No='$UserNo'";
		$result = $this->db->query($sql);
		return $result;
	}
	public function UnregisterHydro($hydroId)
	{
		$UserNo = $this->session->userdata('UserNo');
		$sql = "UPDATE ab_users SET Hydro_Auth= 0 , Account_Status = 2 WHERE User_No=?";
		$result = $this->db->query($sql,$UserNo);
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
}
