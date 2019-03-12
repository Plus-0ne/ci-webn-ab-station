<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Insert extends CI_Model {
	
	// public function SaveRate($userid,$ratepoints,$ratepostid)
	// {
	// 	extract($dataa);
	// 	$sql = "UPDATE ab_airdrops SET Rate = ? WHERE airdrop_id = ?";
	// 	$result = $this->db->query($sql);
	// 	return $result;
	// }

	public function SaveRate($userid,$ratepoints,$ratepostid)
	{
		extract($data);
		$sql = "INSERT INTO ab_rates(userid,ratepoints,ratepostid) VALUES ('$userid','$ratepoints','$ratepostid')";
		$result = $this->db->query($sql);
		return $result;
	}
}
