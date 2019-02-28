<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Signup extends CI_Model {

	public function register_user($data)
	{
		extract($data);
		$Active_Status = 0;
		$Account_Status = 1;
		$query = "INSERT INTO ab_users(First_Name,Last_Name,Email_Address,Password,Active_Status,Account_Status) VALUES (?,?,?,?,?,?)";
		$result = $this->db->query($query,array($First_Name,$Last_Name,$Email_Address,$Password,$Active_Status,$Account_Status));
		return $result;
	}
}
