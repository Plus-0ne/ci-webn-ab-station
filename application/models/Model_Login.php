<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login extends CI_Model {

	public function get_email_add($Email_Address)
	{
		$query = "SELECT * FROM ab_users WHERE Email_Address = ?";
		$result = $this->db->query($query,$Email_Address);
		return $result->row();
	}

	public function check_user($data)
	{
		extract($data);
		$query = "SELECT * FROM ab_users WHERE Email_Address = ? AND Password = ?";
		$result = $this->db->query($query,array($Email_Address,$Password));
		return $result->row();
	}
}
