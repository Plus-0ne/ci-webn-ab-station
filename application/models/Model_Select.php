<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Select extends CI_Model {
	
	public function get_userdata($User_No)
	{
		$sql = "SELECT * FROM ab_users WHERE User_No='$User_No'";
		$sqlres = $this->db->query($sql);
		return $sqlres->row();
	}
}
