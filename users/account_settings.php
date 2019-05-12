<?php $user_header;?>
<style type="text/css">
	th
	{
		vertical-align: middle;
		text-align: center;
	}
	td
	{
		text-align: center;
		vertical-align: middle;
	}
</style>
<body>
	<div class="wrapper">
		<div id="header-container" class="header-container">
			<div class="container">
				<div class="row">
					<div id="cccc" class="cccc col-lg-12 col-sm-12 nav-pad">
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
			<div class="container animated fadeIn">
				<div class="row">
					<?php echo $this->session->flashdata('ApplyToListPrompt'); ?>
					<div class="col-lg-12 col-sm-12 p-5">


					</div>
				</div>
				<div class="row mt-5">
					<div class="col-sm-12 col-md-12 title-page-here">
						<h4 class="text-center">
							<i class="fas fa-user-circle" style="color: #1821D7; margin-right: 5px;"></i> Account Settings
						</h4>
						<br>
					</div>
					<?php
					if (isset($_SESSION['isActive'])) { ?>
						
						<div class="col-sm-12">
							<?php echo $this->session->flashdata('changepassprompt'); ?>
							<?php echo $this->session->flashdata('promptInfo');?>
						</div>
						<div class="col-sm-4 col-md-4 pl-5 pt-3 infoTitle">
							<strong>Email Address</strong>
						</div>
						<div class="col-sm-8 col-md-8 pl-5 pt-3 infoDetails">
							<?php if ($this->session->userdata('VerifyStatus') == 0) { ?>
								<a style="color: white;" class="btn btn-warning" href="#" data-toggle="modal" data-target="#modalVerifyEmail">
									<i class="fas fa-envelope"></i>&nbsp Verify Email </a>
								<?php } else { ?>
									<h5><i class="fas fa-check" style="color: #5EC830;"></i></h5>
								<?php } ?>
							</div>
							<div class="col-sm-4 col-md-4 pl-5 pt-3 infoTitle">
								<strong>Telegram</strong>
							</div>
							<div class="col-sm-8 col-md-8 pl-5 pt-3 infoDetails">
								<?php if (is_array($getUserData)) { ?>
									<?php if ($getUserData['ok'] == 'true') { 

										$chkID = $getUserData['result']['user']['id'];
										$chkStatus = $getUserData['result']['status'];

										if ($chkID == $this->session->userdata('Is_Telegram_Member') && $chkStatus == "member") {
											echo '<h5><i class="fas fa-check" style="color: #5EC830;"></i></h5>';
										}
										elseif ($chkID == $this->session->userdata('Is_Telegram_Member') && $chkStatus == "left") {
											echo '<h5><i class="fas fa-times" style="color: #DD4103;"></i></h5>';
										}
									}
									else
									{
										echo '<h5><i class="fas fa-times" style="color: #DD4103;"></i></h5>';
									}
									?>
								<?php } ?>
							</div>
							<div class="col-sm-4 col-md-4 pl-5 pt-3 infoTitle">
								<strong>Subscriber</strong>
							</div>
							<div class="col-sm-8 col-md-8 pl-5 pt-3 infoDetails">
								<?php
								if ($this->session->userdata('Is_Subscriber') == 1) {
									echo '<h5><i class="fas fa-check" style="color: #5EC830;"></i></h5>';
								}
								else
								{
									echo '<h5><i class="fas fa-times" style="color: #DD4103;"></i></h5>';
								}
								?>
							</div>
							<div class="col-sm-4 col-md-4 pl-5 pt-3 infoTitle">
								<strong> Hydro MFA </strong>
							</div>
							<div class="col-sm-8 col-md-8 pl-5 pt-3 infoDetails">
								<?php
								if ($this->session->userdata('Hydro_Auth') == 1) {
									echo '<h5><i class="fas fa-check" style="color: #5EC830;"></i></h5>';
								}
								else
								{
									echo '<h5><i class="fas fa-times" style="color: #DD4103;"></i></h5>';
								}
								?>
							</div>
							<div class="col-sm-4 col-md-4 pl-5 pt-3 infoTitle">
								<strong> Password </strong>
							</div>
							<div class="col-sm-8 col-md-8 pl-5 pt-3 infoDetails">
								<button style="color: #fff;" class="btn btn-warning" data-toggle="modal" data-target="#modalChangepass">
									<i class="fas fa-unlock-alt"></i> &nbsp Change Password
								</button>
							</div>
						<?php } ?>
						<?php if ($this->session->userdata('Hydro_Auth') == 0) { ?>
							<div class="col-sm-12 col-md-4 p-5 hdyroContainer">
								<h5>
									<i class="fas fa-tint" style="color: #1e7ef5;"></i> &nbsp Activate Hydro MFA
								</h5>
								<br/>
								<?php echo form_open(base_url().'SubmitHydroID','method="POST"','id="hydroform"');?>
								<div class="form-group">
									<input class="form-control" type="text" name="HydroID" placeholder="Hydro ID" autocomplete="off">
									<br>
									<button class="btn btn-primary" type="submit">
										<i class="fas fa-link"></i> Link
									</button>
								</div>
								<?php echo form_close()?>
							</div>
						<?php } else { ?>
							<div class="col-sm-12 col-md-4 p-5 hdyroContainer">
								<?php echo form_open(base_url().'UnregisterHydro','method="POST"','id="hydroform"');?>
								<h5>
									<i class="fas fa-tint" style="color: #1e7ef5;"></i> &nbsp Deactivate Hydro MFA
								</h5>
								<div class="form-group">
									<br>
									<button class="btn btn-danger" type="submit">
										<i class="fas fa-unlink"></i> Unlink
									</button>
								</div>
								<?php echo form_close();?>
							</div>
						<?php } ?>
						<?php if (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] == 1 AND $_SESSION['VerifyStatus'] == 1) { ?>
							<?php if ($getAirdoprequest->num_rows() > 0) { ?>
								<div class="col-sm-12 p-5">
									<h5>
										<i class="fas fa-boxes" style="color: #59C14B;">&nbsp</i> Airdrop Requests
									</h5>
									<br>
									<div class="table-responsive">
										<table id="airdroptable" class="table table-bordered">
											<thead>
												<th>
													Project Name
												</th>
												<th>
													Request Status
												</th>
												<th>
													Payment Details
												</th>
												<th>
													Priority
												</th>
												<th>
													Date/Time Remaining
												</th>
												<th>
													Option
												</th>
											</thead>
											<tbody>

												<?php foreach ($getAirdoprequest->result() as $row) { ?>
													<tr>
														<td>
															<?php echo $row->ProjectName; ?>
														</td>
														<td>
															<?php switch ($row->RequestStatus) {
																case 'Approved':
																echo '<span style="color: #3BAA19;">Approved</span>';
																break;
																case 'For Approval':
																echo '<span style="color: #DA2525;">Waiting for schedule</span>';
																break;
																case 'Expired':
																echo '<span style="color: #DA2525;">Expired</span>';
																break;
																default:
																echo '<span style="color: #DA2525;">...</span>';
																break;
															}?>
														</td>
														<td>
															<?php
															switch ($row->PaymentDetails) {
																case '24hrs':
																echo '<span style="color: #3BAA19;"> 24 Hrs (500K WEBN Tokens)</span>';
																break;
																case '48hrs':
																echo '<span style="color: #3BAA19;"> 48 Hrs (1M WEBN Tokens)</span>';
																break;
																case '1week':
																echo '<span style="color: #3BAA19;"> 1 Week (2M WEBN Tokens)</span>';
																break;
																default:
																	# code...
																break;
															}
															?>
														</td>
														<td>
															<?php switch ($row->PostPrio) {
																case 'latest':
																echo '<span style="color: #3BAA19;">Latest</span>';
																break;
																case 'hot':
																echo '<span style="color: #DA2525;">Hot (Additional 500K WEBN Tokens per day)</span>';
																break;
																case 'featured':
																echo '<span style="color: #E9D81A;">Featured (Additional 1M WEBN Tokens)</span>';
																break;
																default:
																	# code...
																break;
															}?>
														</td>
														<td>
															<?php
															if ($row->RequestStatus == 'For Approval') {
																echo '<span style="color: #DA2525;"> Waiting </span>';
															} elseif ($row->RequestStatus == 'Approved') {
																$data = array(
																	'AirdropID' => $row->airdrop_id,
																	'Expiration' => $row->ExpirationDate,
																	'PaymentDetails' => $row->PaymentDetails,
																);
																$this->load->view('pages/users/_template/_datetime_remaining',$data);
															} else if ($row->RequestStatus == 'Expired') {
																echo '<span style="color: #DA2525;"> Expired </span>';
															}
															?>
														</td>
														<td style="width: 150px;">
															<a href="<?=base_url()?>Airdrop_Details?aide=<?php echo $row->airdrop_id;?>">
																View
															</a>
															<br>
															<a href="<?=base_url()?>Payments?aide=<?php echo $row->airdrop_id;?>">
																Details
															</a>
														</td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							<?php } ?>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('pages/users/_template/_footer'); ?>
		<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
		<?php $this->load->view('pages/users/_template/_modal_accountSettings'); ?>
	</body>
	</html>