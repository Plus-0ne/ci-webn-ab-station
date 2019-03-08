<?php $user_header;?>
<?php $this->load->view('pages/users/_template/_login_style');?>
<body>
	<div class="wrapper">
		<div class="login-header">
			<div class="col-sm-12 p-5 text-center">
				<div class="" style="color: white;">
					<a href="<?=base_url()?>/Home">
						<img class="logo" src="<?=base_url()?>assets/users/img/logo.png"></a>
					</a>
				</div>
			</div>
		</div>
		<div class="linediv mt-5 mb-5"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-5 m-auto p-5">
					<div class="login-container">
						<?php echo form_open(base_url().'submit_form_signup','method="POST"','id="sform"');?>
						<div class="signup-holder text-center">
							<p>
								<?php echo $this->session->flashdata('promptInfo');?>
							</p>
						</div>
						<br>

						<div class="input-holder">
							<input class="form-control" type="text" name="First_Name" placeholder="First Name*" required="">
						</div>
						<div class="input-holder">
							<input class="form-control" type="text" name="Last_Name" placeholder="Last Name*" required="">
						</div>
						<div class="input-holder">
							<input class="form-control" type="email" name="Email_Address" placeholder="Email Address*" required="">
						</div>
						<div class="input-holder">
							<input id="password" class="form-control" type="password" name="Password" placeholder="Password*" required="">
						</div>
						<div class="input-holder">
							<input id="repassword" class="form-control" type="password" name="rePassword" placeholder="Re-type Password*" required="">
						</div>
						<div class="submit-holder">
							<input class="btn btn-primary btn-submit" type="submit" value="Register">
						</div>
						<br>
						<div class="signup-holder text-center">
							<p>
								<label> Already registered ?</label><a href="<?=base_url()?>Login"> Sign-in </a>
							</p>
						</div>
						<?php echo form_close()?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
</body>