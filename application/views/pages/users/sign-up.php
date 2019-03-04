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
						<form action="<?=base_url()?>submit_form_signup" method="POST">
							<div class="signup-holder text-center">
								<p>
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
								<input class="form-control" type="password" name="Password" placeholder="Password*" required="">
							</div>
							<div class="submit-holder">
								<input class="btn btn-primary btn-submit" type="submit" value="Register">
							</div>
							<br>
							<a href="https://t.me/joinchat/AAAAAFTK0rkJxVaEK7rn_Q">dd</a>
							<div class="signup-holder text-center">
								<p>
									<label> Already registered ?</label><a href="<?=base_url()?>Login"> Sign-in </a>
								</p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
</body>