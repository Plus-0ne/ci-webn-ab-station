<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_ModelInsert extends CI_Model {
	
	public function InserNewAdmin($data)
	{
		extract($data);

		$sql = "INSERT INTO ab_admin(FName,LName,EmailAddress,Password,is_Admin) VALUES (?,?,?,?,?)";
		$result = $this->db->query($sql,array($fname,$lname,$emailaddress,$password,$al_value));
		return $result;
	}

	public function InsertNewAirdrops($dataa)
	{
		extract($dataa);

		$sql = "INSERT INTO ab_airdrops(TokenImage, ProjectName, Description, DateStart, DateEnd, Link, WebsiteUrl, MaxParticipants, ToBeDistributed, RewardQuantity, CompleteInstruction, DateAdded, AddedBy,Rate,RequestStatus) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql,array($TokenImage, $ProjectName, $Description, $DateStart, $DateEnd, $AirdropsLink, $WebsiteSource, $MaxParticipants, $ToBeDistributed, $RewardQuantity, $CompleteInstruction, $DateAdded, $AddedBy,$Rate,$RequestStatus));
		return $result;
	}
	public function FaqAddResult($data)
	{
		extract($data);
		
		$sql = "INSERT INTO ab_faqs(Question,Answer) VALUES (?,?)";
		$result = $this->db->query($sql,array($Question,$Answer));
		return $result;
	}
}