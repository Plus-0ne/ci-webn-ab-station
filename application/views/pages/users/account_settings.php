<?php $user_header;?>
<body>
	<div class="wrapper">
		<div id="header-container" class="header-container">
			<div class="container">
				<div class="row">
					<div id="cccc" class="cccc col-lg-12 col-sm-12 pt-5 pb-5">
						<?php $this->load->view('pages/users/_template/_navbar'); ?>
					</div>	
				</div>
			</div>
		</div>
		<div class="ads-container">
			<div class="container">

			</div>
		</div>
		<div class="content-container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 p-5">


					</div>
				</div>
				<div class="row mt-5">
					<div class="col-lg-12 title-page-here">
						<h4 class="text-center">
							<i class="fas fa-user-circle" style="color: #1821D7;"></i> &nbsp <?php echo $this->session->userdata('Fname'); ?> <?php echo $this->session->userdata('Lname'); ?>
						</h4>
						<br>
					</div>
					<div class="col-sm-12 p-5">
						<h5> Subscribe to WEBN Innovation PH &nbsp<i class="fas fa-check" style="color: #5EC830;"></i></h5>
						<?php
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
									echo '<h5> Verified Telegram Member &nbsp<i class="fas fa-check" style="color: #5EC830;"></i></h5>';
								}
								elseif ($chkID == $idid && $chkStatus == "left") {
									echo '<h5> You Left the telegram Channel</h5>';
								}
							}
							else
							{
								echo '<h5> You must join our Telegram Channel</h5>';
							}
						}
						else
						{
							echo '<h5> You must join our Telegram Channel</h5>';
						}
						?>
					</div>
					<div class="col-md-8 m-auto" style="border-bottom: 2px solid #4F4E4E;">
						
					</div>
					<?php
					if ($this->session->userdata('isActive') == 3) {
						echo '<div class="col-sm-12 p-5">
									<h5> Company Name : <br><i class="fas fa-circle"></i>&nbsp '.$this->session->userdata('CompanyName').' </h5>
									<h5> Company Address : <br><i class="fas fa-circle"></i>&nbsp '.$this->session->userdata('CompanyAddress').' </h5>
									<br
								</div>';
						echo '<div class="col-sm-12 p-5">
									<button class="btn btn-primary">
										Update
									</button>
							  </div>';
						echo '<div class="col-md-8 m-auto" style="border-bottom: 2px solid #4F4E4E;">
									
								</div>';

					}
					else
					{
						echo '<div class="col-sm-12 p-5">
								<h5>
									Register as ICO ?
								</h5>
								<br>';
								echo form_open(base_url().'','method="POST"','id="hydroform"').'
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>COMPANY NAME</label>
										<input class="form-control" type="text" name="" required="">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-5">
										<label>COMPANY ADDRESS</label>
										<textarea class="form-control" rows="5" required=""></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<input class="btn btn-primary" type="submit" name="" value="Register">
									</div>
								</div>
							</div>'. form_close();
						echo '<div class="col-md-8 m-auto" style="border-bottom: 2px solid #4F4E4E;">
									
								</div>';
					}
					?>
					<div class="col-sm-12 p-5">
						<h5>
							HYDRO Authentication
						</h5>
						<br>
						<?php echo $this->session->flashdata('promptInfo');?>
						<?php if ($this->session->userdata('Hydro_Auth') == 0) { ?>
							<?php echo form_open(base_url().'SubmitHydroID','method="POST"','id="hydroform"');?>
							<div class="form-row">
								<div class="form-group">
									<input class="form-control" type="text" name="HydroID" placeholder="Hydro ID">
									<br>
									<input class="btn btn-primary" type="submit" name="" value="Register">
								</div>
							</div>
							<?php echo form_close()?>
						<?php } else { ?>
						<?php echo form_open(base_url().'UnregisterHydro','method="POST"','id="hydroform"');?>
						<div class="form-row">
							<div class="form-group">
								<input class="form-control" type="hidden" name="HydroID" placeholder="Hydro ID" value="<?php echo $this->session->userdata('Hydro_ID');?>">
								<br>
								<input class="btn btn-primary" type="submit" name="" value="Unregister">
							</div>
						</div>
						<?php echo form_close()?>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('pages/users/_template/_footer'); ?>
	<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
</body>

</html>