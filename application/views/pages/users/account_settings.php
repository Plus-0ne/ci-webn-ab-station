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
					<div class="col-md-12 m-auto" style="border-bottom: 2px solid #4F4E4E;">
						
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
					if ($this->session->userdata('isActive')) { ?>
						<div class="col-sm-12 p-5">
							<?php echo $this->session->flashdata('changepassprompt'); ?>
							<h5>
								<i class="fas fa-table"></i> &nbsp Information
							</h5>
							<br>
							<table>
								<tr>
									<td>
										<strong>Name</strong>  &nbsp  
									</td>
									<td>
										 &nbsp <?php echo $this->session->userdata('Fname'); ?> <?php echo $this->session->userdata('Lname'); ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Company Name</strong>  &nbsp  
									</td>
									<td>
										 &nbsp <?php if ($this->session->userdata('CompanyName') == 0) {
										 	echo "Not Set";
										 }
										 else{
										 	echo $this->session->userdata('CompanyName');
										 } ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Company Address</strong>  &nbsp 
									</td>
									<td>
										 &nbsp <?php if ($this->session->userdata('CompanyAddress') == 0) {
										 	echo "Not Set";
										 }
										 else{
										 	echo $this->session->userdata('CompanyAddress');
										 } ?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Email Address</strong>  &nbsp 
									</td>
									<td>
										 &nbsp <?php echo $this->session->userdata('Email');?>
									</td>
								</tr>
								<?php if (is_array($getUserData)) { ?>
									<?php if ($getUserData['ok'] == 'true') { 

										$chkID = $getUserData['result']['user']['id'];
										$chkStatus = $getUserData['result']['status'];

										if ($chkID == $this->session->userdata('Is_Telegram_Member') && $chkStatus == "member") {
											echo '<tr> <td><strong>Telegram</strong>  &nbsp </td> <td> &nbsp <i class="fas fa-check" style="color: #5EC830;"></i></td></tr>';
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
										 &nbsp <button class="btn btn-danger" data-toggle="modal" data-target="#modalChangepass">
												<i class="fas fa-unlock-alt"></i> &nbsp Change Password
												</button>
									</td>
								</tr>
							</table>
							<br>
							<button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdateInfo">
								<i class="fas fa-edit"></i> &nbsp Edit Info
							</button>
						</div>
						<div class="col-md-12 m-auto" style="border-bottom: 2px solid #4F4E4E;">			
						</div>

					<?php } ?>
					<?php if ($this->session->userdata('isICO') == 'no') { ?>
						<div class="col-sm-12 p-5">
								<h5>
									<i class="fas fa-user-tie"></i> &nbsp Register as ICO ?
								</h5>
								<br>
								<?php echo form_open(base_url().'UpdateCompany','method="POST"','id="hydroform"'); ?>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>COMPANY NAME</label>
										<input class="form-control" type="text" name="CompanyName" required="">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-5">
										<label>COMPANY ADDRESS</label>
										<textarea class="form-control" rows="5" name="CompanyAddress" required=""></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<input class="btn btn-primary" type="submit" name="RegisterICO" value="Register">
									</div>
								</div>
							</div><?php echo form_close(); ?>
						<div class="col-md-12 m-auto" style="border-bottom: 2px solid #4F4E4E;">
						</div>
					<?php } ?>
					<div class="col-sm-12 p-5">
						<h5>
							<i class="fas fa-tint"></i> &nbsp HYDRO Authentication
						</h5>
						<br>
						<?php echo $this->session->flashdata('promptInfo');?>
						<?php if ($this->session->userdata('Hydro_Auth') == 0) { ?>
							<?php echo form_open(base_url().'SubmitHydroID','method="POST"','id="hydroform"');?>
							<div class="form-row">
								<div class="form-group">
									<input class="form-control" type="text" name="HydroID" placeholder="Hydro ID" autocomplete="off">
									<br>
									<input class="btn btn-primary" type="submit" name="" value="Register">
								</div>
							</div>
							<?php echo form_close()?>
						<?php } else { ?>
						<?php echo form_open(base_url().'UnregisterHydro','method="POST"','id="hydroform"');?>
						<div class="form-row">
							<div class="form-group">
								<br>
								<input class="btn btn-danger" type="submit" name="" value="X Unregister">
							</div>
						</div>
						<?php echo form_close();?>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
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
	<!-- Update Information -->
	<div class="modal fade animated fadeInDownBig faster" id="modalUpdateInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle"> Update Information </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					<?php echo form_open(base_url().'UpdateInformation','method="POST"');?>
					<div class="form-group">
						<label>First Name</label>
						<input class="form-control" type="text" name="Fname" autocomplete="off" value="<?php echo $this->session->userdata('Fname');?>">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input class="form-control" type="text" name="Lname" autocomplete="off" value="<?php echo $this->session->userdata('Lname');?>">
					</div>
					<div class="form-group">
						<label>Company Name</label>
						<input class="form-control" type="text" name="CompanyName" autocomplete="off" value="<?php echo $this->session->userdata('CompanyName');?>">
					</div>
					<div class="form-group">
						<label>Telegram ID</label>
						<input class="form-control" type="text" name="TelegramID" autocomplete="off" value="<?php echo $this->session->userdata('Is_Telegram_Member');?>">
					</div>
					<div class="form-group">
						<label>Company Address</label>
						<textarea class="form-control" name="CompanyAddress" autocomplete="off" rows="6"><?php echo $this->session->userdata('CompanyAddress');?></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input class="btn btn-primary" type="submit" name="ui_submit" value="Update Info">
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('pages/users/_template/_footer'); ?>
	<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
</body>
</html>