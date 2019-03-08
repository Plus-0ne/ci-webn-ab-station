<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_Controller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		
	}
	public function CheckTelegramStatus()
	{
		$idid = $this->session->userdata('Is_Telegram_Member');
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

				if ($chkID == $idid && $chkStatus == "member") {
					echo '<a class="dropdown-item">
					<i class="fab fa-telegram-plane" style="color: #247CDF;"></i> Verified <i class="fas fa-check" style="color: #5EC830;"></i></a>';
				}
				elseif ($chkID == $idid && $chkStatus == "left") {
					echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalJoinTelegram">
					<i class="fab fa-telegram-plane" style="color: #247CDF;"></i> Join Telegram </a>';
				}
			}
			else
			{
				echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalJoinTelegram">
				<i class="fab fa-telegram-plane" style="color: #247CDF;"></i> Join Telegram </a>';
			}
		}
		else
		{
			echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalJoinTelegram">
			<i class="fab fa-telegram-plane" style="color: #247CDF;"></i> Join Telegram </a>';
		}

		curl_close($ch);
	}
}
