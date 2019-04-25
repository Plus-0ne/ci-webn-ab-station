<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_ModelDelete extends CI_Model {
	
	public function removeAirdrops($AirdropID)
	{

		$sql = "DELETE FROM ab_airdrops WHERE airdrop_id = ?";
		$result = $this->db->query($sql,$AirdropID);
		return $result;
	}
	public function RemovethisUser($UserID)
	{
		$sql = "DELETE FROM ab_users WHERE User_No = ?";
		$result = $this->db->query($sql,$UserID);
		return $result;
	}
	public function RemovedAdmin($UserID)
	{
		$sql = "DELETE FROM ab_admin WHERE No = ?";
		$result = $this->db->query($sql,$UserID);
		return $result;
	}
}