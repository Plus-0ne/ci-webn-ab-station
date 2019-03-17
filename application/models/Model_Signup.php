<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Signup extends CI_Model {
	
	public function Check_EmailAdd($Email_Add)
	{
		$query = "SELECT * FROM ab_users WHERE Email_Address = ?";
		$result = $this->db->query($query,$Email_Add);
		return $result->row();
	}
	public function register_user($data)
	{
		extract($data);
		
		$sqlq = "INSERT INTO ab_users (First_Name,Last_Name,Email_Address,Password,Is_Telegram_Member,Is_Subscriber,Hydro_ID,Hydro_Auth,Active_Status,Account_Status,isICO) 
				VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$sqlresult = $this->db->query($sqlq,array($First_Name,$Last_Name,$Email_Address,$Password,$Is_Telegram_Member,$Is_Subscriber,$Hydro_ID,$Hydro_Auth,$Active_Status,$Account_Status,$isICO));
		return $sqlresult;
	}
}