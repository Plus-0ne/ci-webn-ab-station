<?php $user_header;?>
<?php $this->load->view('pages/users/_template/_login_style');?>

<body>
	<div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	</div>
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
				<div class="col-md-12 col-lg-5 m-auto">
					<div class="login-container">
						<div id="loginMessage" class="messages">
						</div>
						<?php echo form_open(base_url().'Login_Validation', 'method="POST"');?>
						<div class="input-holder">
							<input id="Email_Address" class="form-control" type="Email" name="Email_Address" placeholder="Email Address" value="">
						</div>
						<div class="input-holder">
							<input id="Password" class="form-control" type="password" name="Password" placeholder="Password" value="">
						</div>
						<div class="submit-holder">
							<input id="submit" class="btn btn-primary btn-submit" type="submit" value="Login">
						</div>
						<div class="signup-holder text-center">
							<p>
								<a href="#"> Forgot password ? </a>
							</p>
						</div>
						<br>
						<div class="signup-holder text-center">
							<p>
								<label> Not registered ?</label><a href="<?=base_url()?>Sign-Up"> Sign-up</a> now.
							</p>
						</div>
						<?php form_close()?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
</body>
