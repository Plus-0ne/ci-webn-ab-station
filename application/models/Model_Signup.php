<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Signup extends CI_Model {
	
	public function register_user($data)
	{
		extract($data);
		
		$sqlq = "INSERT INTO ab_users (First_Name,Last_Name,Email_Address,Password,Hydro_ID,Active_Status,Account_Status) 
				VALUES (?,?,?,?,?,?,?)";
		$sqlresult = $this->db->query($sqlq,array($First_Name,$Last_Name,$Email_Address,$Password,$Hydro_ID,$Active_Status,$Account_Status));
		return $sqlresult;
	}
}
