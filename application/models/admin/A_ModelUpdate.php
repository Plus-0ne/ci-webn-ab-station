<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_ModelUpdate extends CI_Model {
	
	public function Approve_Airdrop($data)
	{
		extract($data);
		$data = array(
			'RequestStatus' => 'Approved' ,
			'ExpirationDate' => $ExpirationDate,
			'ApproveDate' => $ApproveDate,
		);
		$this->db->where('airdrop_id', $airdrop_id);
		$result = $this->db->update('ab_airdrops', $data);
		return $result;
	}
}