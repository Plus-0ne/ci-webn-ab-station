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
			<div class="container animated fadeIn">
				<div class="row">
					<div class="col-lg-12 col-sm-12 p-5">


					</div>
				</div>
				<div class="row mt-5">
					<div class="col-lg-12 title-page-here">
						<h3 class="text-center">
							<i class="fas fa-user-circle" style="color: #1821D7;"></i> &nbsp Account Settings
						</h3>
						<br>
					</div>
					<style type="text/css">
						table td
						{
							padding: 10px;
						}
						strong
						{
							color: #4F4F4F;
						}
					</style>
					<?php
					if (isset($_SESSION['isActive'])) { ?>
						<div class="col-sm-12 p-5">
							<h5>
								<i class="fas fa-table"></i> &nbsp Information
							</h5>
							<br>
							<?php echo $this->session->flashdata('changepassprompt'); ?>
							<table>
								<tr>
									<td>
										<strong>Email Address</strong>  &nbsp 
									</td>
									<td>
										<?php if ($this->session->userdata('VerifyStatus') == 0) { ?>
											<a style="color: white;" class="btn btn-warning" href="#" data-toggle="modal" data-target="#modalVerifyEmail">
												<i class="fas fa-envelope"></i>&nbsp Verify Email </a>
											<?php } else { ?>
												&nbsp <?php echo $this->session->userdata('Email');?> <i class="fas fa-check" style="color: #5EC830;"></i>
											<?php } ?>
										</td>
									</tr>
									<?php if (is_array($getUserData)) { ?>
										<?php if ($getUserData['ok'] == 'true') { 

											$chkID = $getUserData['result']['user']['id'];
											$chkStatus = $getUserData['result']['status'];

											if ($chkID == $this->session->userdata('Is_Telegram_Member') && $chkStatus == "member") {
												echo '<tr><td><strong>Telegram</strong>  &nbsp </td> <td> &nbsp <i class="fas fa-check" style="color: #5EC830;"></i></td></tr>';
											}
											elseif ($chkID == $this->session->userdata('Is_Telegram_Member') && $chkStatus == "left") {
												echo '<tr> <td><strong>Telegram</strong> &nbsp </td> <td> &nbsp <i class="fas fa-times" style="color: #DD4103;"></i></td></tr>';
											}
										}
										else
										{
											echo '<tr> <td><strong>Telegram</strong> &nbsp </td> <td> &nbsp <i class="fas fa-times" style="color: #DD4103;"></i></td></tr>';
										}
										?>
									<?php } ?>
									<?php
									if ($this->session->userdata('Is_Subscriber') == 1) {
										echo '<tr><td><strong>WEBN Subscriber</strong> &nbsp </td> <td> &nbsp <i class="fas fa-check" style="color: #5EC830;"></i></td></tr>';
									}
									else
									{
										echo '<tr><td><strong>WEBN Subscriber</strong> &nbsp </td> <td> &nbsp <i class="fas fa-times" style="color: #DD4103;"></i></td></tr>';
									}
									?>
									<?php
									if ($this->session->userdata('Hydro_Auth') == 1) {
										echo '<tr><td><strong>Hydro Authentication</strong> &nbsp </td> <td> &nbsp <i class="fas fa-check" style="color: #5EC830;"></i></td></tr>';
									}
									else
									{
										echo '<tr><td><strong>Hydro Authentication</strong> &nbsp </td> <td> &nbsp <i class="fas fa-times" style="color: #DD4103;"></i></td></tr>';
									}
									?>
									<tr>
										<td>
											<strong>Password</strong>  &nbsp 
										</td>
										<td>
											&nbsp <button style="color: #fff;" class="btn btn-warning" data-toggle="modal" data-target="#modalChangepass">
												<i class="fas fa-unlock-alt"></i> &nbsp Change Password
											</button>
										</td>
									</tr>
								</table>
							</div>
						<?php } ?>
						<div class="col-sm-12 p-5">
							<?php if ($this->session->userdata('Hydro_Auth') == 0) { ?>
								<h5>
									<i class="fas fa-tint" style="color: #1e7ef5;"></i> &nbsp Activate Hydro MFA
								</h5>
								<br/>
								<?php echo form_open(base_url().'SubmitHydroID','method="POST"','id="hydroform"');?>
								<div class="form-row">
									<div class="form-group">
										<input class="form-control" type="text" name="HydroID" placeholder="Hydro ID" autocomplete="off"><?php echo $this->session->flashdata('promptInfo');?>
										<br>
										<button class="btn btn-primary" type="submit">
											<i class="fas fa-link"></i> Link
										</button>
									</div>
								</div>
								<?php echo form_close()?>
							<?php } else { ?>
								<?php echo form_open(base_url().'UnregisterHydro','method="POST"','id="hydroform"');?>
								<h5>
									<i class="fas fa-tint" style="color: #1e7ef5;"></i> &nbsp Deactivate Hydro MFA
								</h5>
								<div class="form-row">
									<div class="form-group">
										<br>
										<button class="btn btn-danger" type="submit">
											<i class="fas fa-unlink"></i> Unlink
										</button>
									</div>
								</div>
								<?php echo form_close();?>
							<?php } ?>
						</div>
						<?php if (isset($_SESSION['isActive']) AND $_SESSION['Hydro_Auth'] == 1 AND $_SESSION['VerifyStatus'] == 1) { ?>
							<?php if ($getAirdoprequest->num_rows() > 0) { ?>
								<div class="col-sm-12 p-5">
									<div class="table-responsive-sm">
										<h5>
											<i class="fas fa-boxes" style="color: #59C14B;">&nbsp</i> Airdrop Requests
										</h5>
										<br>
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
													Payments
												</th>
											</thead>
											<tbody>
												<?php foreach ($getAirdoprequest->result() as $row) { ?>
													<tr>
														<td>
															<?php echo $row->ProjectName; ?>
														</td>
														<td>
															<?php if ($row->RequestStatus == 'Approved') {
																echo '<span style="color: #3BAA19;">Approved</span>';
															}
															else
															{
																echo '<span style="color: #DA2525;">Waiting for schedule</span>';
															} ?>
														</td>
														<td>
															<?php echo $row->PaymentDetails; ?>
														</td>
														<td>
															<?php if ($row->PostPrio == 'hot') {
																echo '<span style="color: #DA2525;">Hot</span>';
															}
															else
															{
																echo '<span style="color: #3BAA19;">Latest</span>';
															} ?>
														</td>
														<td>
															<a href="">
																View Payments
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
		<?php if (isset($_SESSION['isActive'])) { ?>
			<!-- Change Password -->
			<div class="modal fade animated fadeInDownBig faster" id="modalChangepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle"> Change Password </h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body text-center pl-5 pr-5">
							<?php echo form_open(base_url().'ChangePassword','method="POST"');?>
							<div class="form-group">
								<label>Current Password</label>
								<input class="text-center form-control" type="password" name="cpass" autocomplete="off">
							</div>
							<div class="form-group">
								<label>New Password</label>
								<input class="text-center form-control" type="password" name="npass" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Re-type Password</label>
								<input class="text-center form-control" type="password" name="retypepass" autocomplete="off">
							</div>
						</div>
						<div class="modal-footer">
							<input class="btn btn-primary" type="submit" name="cp_submit" value="Change Password">
							<?php echo form_close();?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php $this->load->view('pages/users/_template/_footer'); ?>
		<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
	</body>
	</html>