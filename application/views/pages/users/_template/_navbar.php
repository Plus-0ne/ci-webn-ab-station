<nav class="navbar navbar-expand-xl navbar-light">
	<a class="navbar-brand" href="#">
		<img class="logo" src="<?=base_url()?>assets/users/img/logo.png" width="250"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="navbar-nav ml-auto"> 
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url()?>Home"> Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle newdt" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Airdrops
					</a>
					<div id="dropdown-menu" class="newdm dropdown-menu zoomIn animated faster" aria-labelledby="navbarDropdown" style="margin-top: -2px;">
						<a class="dropdown-item" href="<?=base_url()?>HOT"><i class="fas fa-fire-alt" style="color: red;"></i> Hot </a>
						<a class="dropdown-item" href="<?=base_url()?>LATEST"><i class="fas fa-parachute-box" style="color: green;"></i> Latest </a>

					</div>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" href=""> Bounty </a>
				</li> -->
				<?php
					if ($this->session->userdata('isICO') == 'yes') {
						echo '<li class="nav-item">
								<a class="nav-link" href="'.base_url().'List-Your-Coin-Token"> List Your Coin/Token </a>
							</li>';
					}
				?>
				
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url()?>BuyWEBN_Token"> Buy WEBN token </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url()?>Contact"> Contact </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?=base_url()?>FAQs"> FAQs </a>
				</li>

				<?php

				if ($this->session->userdata('isActive')) {
					echo '<li class="dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user"></i> &nbsp'.$this->session->userdata('Fname').'
					</a>
					<div id="dropdown-menu" class="dropdown-menu zoomIn animated faster" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="'.base_url().'AccountSettings">
					<i class="fas fa-cog" style="color: #2A7AF3;"></i> Account Settings </a>';

					echo '<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalSubscribe">
					<i class="fab fa-facebook-square"></i>  Subscribe </a>';
					$idid = $this->session->userdata('Is_Telegram_Member');
					$botToken = $bot_token;
					$website="https://api.telegram.org/bot".$botToken;
					$chatId=$chat_id;  //Receiver Chat Id 
												
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

					echo '<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="'.base_url().'Logout"><i class="fas fa-sign-out-alt" style="color: #FF5A00;"></i> Log-out</a>
					</div>
					</li>';
				}
				else
				{
					echo '<li class="nav-item">
					<a class="nav-link" href="'.base_url().'Login"> Login </a>
					</li>';
				}

				?>
			</ul>
		</div>
	</nav>

