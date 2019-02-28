<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login extends CI_Model {

	public function check_user($data)
	{
		extract($data);
		$query = "SELECT * FROM ab_users WHERE Email_Address = ? AND Password = ?";
		$result = $this->db->query($query,array($Email_Address,$Password));
		return $result->row();
	}
}
