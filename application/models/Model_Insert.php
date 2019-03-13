<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Insert extends CI_Model {
	
	public function RequestForList($dataa)
	{
		extract($dataa);

		$sql = "INSERT INTO ab_airdrops(TokenImage, ProjectName, Description, DateStart, DateEnd, Link, WebsiteUrl, MaxParticipants, ToBeDistributed, RewardQuantity, CompleteInstruction, DateAdded, AddedBy ,Rate,RequestStatus) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql,array($TokenImage, $ProjectName, $Description, $DateStart, $DateEnd, $AirdropsLink, $WebsiteSource, $MaxParticipants, $ToBeDistributed, $RewardQuantity, $CompleteInstruction, $DateAdded, $AddedBy,$Rate,$RequestStatus));
		return $result;
	}

	public function SaveRate($userid,$ratepoints,$ratepostid)
	{
		extract($data);
		$sql = "INSERT INTO ab_rates(userid,ratepoints,ratepostid) VALUES ('$userid','$ratepoints','$ratepostid')";
		$result = $this->db->query($sql);
		return $result;
	}
}
