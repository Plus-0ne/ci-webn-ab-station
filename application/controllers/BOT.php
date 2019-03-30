<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BOT extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model(array('Model_Update','Model_Select'));
	}
	public function index()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I/getMe');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$json_object= curl_exec($ch);
		curl_close($ch);

		$update = json_decode($json_object ,true);

		$assocArray= new RecursiveIteratorIterator(
			new RecursiveArrayIterator($update),
			RecursiveIteratorIterator::LEAVES_ONLY);

		
		foreach ($assocArray as $key => $value) {
			if ($key == 'id') {
				$id = $value;
			}
		}

		echo 'bot id'.$id;
	}
	public function getUserinChannel()
	{


		$idid = $this->input->post('User_ID');

		$botToken = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
		$website="https://api.telegram.org/bot".$botToken;
		$chatId='-1001489662009';  //Receiver Chat Id 
		
		$params=[
			'chat_id'=>$chatId,
			'user_id'=>$idid,
		];

		$ch = curl_init($website . '/getChatMember?');
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		
		$getUserData = json_decode($result ,true);

		if (is_array($getUserData)) {
			if ($getUserData['ok'] == true) {

				$chkID = $getUserData['result']['user']['id'];
				$chkStatus = $getUserData['result']['status'];

				if ($chkID == $idid AND $chkStatus == 'member') {

					$verifiedid = $getUserData['result']['user']['id'];
					$User_No = $this->session->userdata('UserNo');

					$this->Model_Update->update_telegram_id($verifiedid,$User_No);

					$get_userdata = $this->Model_Select->get_userdata($User_No);

					$this->session->set_userdata('Is_Telegram_Member',$get_userdata->Is_Telegram_Member);

					echo "member";
				}
				elseif ($chkID == $idid AND $chkStatus == 'left') {
					echo "left";
				}
				else
				{
					echo "ERROR";
				}
			}
		}

		curl_close($ch);
		
	}
	public function teleSendMessage()
	{
		// $chat_id = '-1001422578361';
		// $user_id = $this->input->post('user_id');
		// $message = $this->input->post('message_text');

		// $mURl = 'https://api.telegram.org/bot600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I/sendMessage?chat_id='.$chat_id.'&text='.$message.'';

		// $ch = curl_init();
		// 			curl_setopt($ch, CURLOPT_URL, $mURl);
		// 			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 			$json_object= curl_exec($ch);
		// 			curl_close($ch);

		// $update = json_decode($json_object ,true);

		// $assocArray= new RecursiveIteratorIterator(
		// 		    new RecursiveArrayIterator($update),
		// 		    RecursiveIteratorIterator::LEAVES_ONLY);

					
		// foreach ($assocArray as $key => $value) {
		// 	if ($key == 'id' and $value==$user_id) {
		// 		$id = $value;
		// 		echo $id;
		// 	}
		// 	if ($key == 'text' and $value == $message) {
		// 		$text = $value;
		// 		echo $text;
		// 	}
		// }
		
		// echo $this->input->post('user_id');
		// echo $this->input->post('message_text');
	}

	public function ExampleFun()
	{
		$newidid = '793394484';

		$botToken = '600810082:AAEUjCkkz8-ExUtIxS7jlslOhhUqVEX3J1I';
		$website="https://api.telegram.org/bot".$botToken;
		$chatId='-1001489662009';  //Receiver Chat Id 
		
		$params=[
		    'chat_id'=>$chatId,
		    'user_id'=>$newidid,
		];

		$ch = curl_init($website . '/getChatMember?');
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$resultsss = curl_exec($ch);
		

		$update = json_decode($resultsss ,true);

		// $assocArray= new RecursiveIteratorIterator(
		// 		    new RecursiveArrayIterator($update),
		// 		    RecursiveIteratorIterator::LEAVES_ONLY);
		if (is_array($update)) {
			if ($update['ok'] == true) {
				echo "TRUE";
			}
			else
			{
				echo "FALSE";
			}
		}
		
		// if(is_array($assocArray)){
		//     foreach($assocArray as $key => $value)
		//     {
		//         if ($key == 'id') 
		//         {
		// 			echo $value;
		// 		}
		// 		else
		// 		{
		// 			echo "ERROR";
		// 			break;
		// 		}
		//    		}
		//    }
		//    else
		//    	{
		//    		echo $key;
		//    	}
		curl_close($ch);
	}

}
