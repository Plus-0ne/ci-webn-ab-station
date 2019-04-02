<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Insert extends CI_Model {
	
	public function RequestForList($dataa)
	{
		extract($dataa);
		$data = array(
			'TokenImage' => $TokenImage,
			'ProjectName' => $ProjectName,
			'Description' => $Description,
			'DateStart' => $DateStart,
			'DateEnd' => $DateEnd,
			'Link' => $AirdropsLink,
			'WebsiteUrl' => $WebsiteSource,
			'MaxParticipants' => $MaxParticipants,
			'ToBeDistributed' => $ToBeDistributed,
			'RewardQuantity' => $RewardQuantity,
			'CompleteInstruction' => $CompleteInstruction,
			'DateAdded' => $DateAdded,
			'AddedBy' => $AddedBy,
			'Rate' => $Rate,
			'RequestStatus' => $RequestStatus,
			'PaymentDetails' => $PaymentDetails,
			'PostPrio' => $PostPrio,
			'ExpirationDate' => $ExpirationDate ,
			'ApproveDate' => $ApproveDate ,
			 );
		$this->db->insert('ab_airdrops', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	public function SaveRate($userid,$ratepoints,$ratepostid)
	{
		extract($data);
		$sql = "INSERT INTO ab_rates(userid,ratepoints,ratepostid) VALUES ('$userid','$ratepoints','$ratepostid')";
		$result = $this->db->query($sql);
		return $result;
	}
	public function addTopayment($data)
	{
		extract($data);
		$data = array(
			'AirdropID' => $AirdropID,
			'TxID' => $TxID,
			'EmailAddress' => $EmailAddress,
			'PaymentDetails' => $PaymentDetails,
			'ListAsHot' => $ListAsHot,
			'Date' => $Date,
			 );
		$result = $this->db->insert('ab_payments', $data);
		return $result;
	}
	public function savePayment($data)
	{
		extract($data);

		$data = array(
			'TxID' => $TxID,
			 );

		$this->db->where(array('AirdropID' => $AirdropID ,'EmailAddress' => $EmailAddress));
		$result = $this->db->update('ab_payments', $data);
		return $result;
	}

	public function AddNewPayment($data)
	{
		extract($data);
		$data = array(
			'AirdropID' => $AirdropID,
			'TxID' => $TxID,
			'EmailAddress' => $EmailAddress,
			'PaymentDetails' => $PaymentDetails,
			'ListAsHot' => $ListAsHot,
			'Date' => $Date,
			 );
		$result = $this->db->insert('ab_payments', $data);
		return $result;
	}
}
