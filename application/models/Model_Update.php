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
}
