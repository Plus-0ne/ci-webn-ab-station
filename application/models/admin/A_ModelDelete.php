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
	public function removeFAQs($FaqNo)
	{
		$sql = "DELETE FROM ab_faqs WHERE FaqNo = ?";
		$result = $this->db->query($sql,$FaqNo);
		return $result;
	}
	public function RemovePayments($PriceNo)
	{
		$sql = "DELETE FROM ab_prices WHERE PriceNo = ?";
		$result = $this->db->query($sql,$PriceNo);
		return $result;
	}
	public function removeaddPay($ad_PriceNo)
	{
		$sql = "DELETE FROM ab_adprices WHERE ad_PriceNo = ?";
		$result = $this->db->query($sql,$ad_PriceNo);
		return $result;
	}
	
}