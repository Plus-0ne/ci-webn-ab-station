<?php $user_header;?>
<?php $this->load->view('pages/users/_template/_login_style');?>
<style type="text/css">
	.form-control:focus { border: none; }
</style>
<body>
	<div class="wrapper">
		<div class="login-header">
			<div class="col-sm-12 p-5 text-center">
				<div class="" style="color: white;">
					<a href="<?=base_url()?>Home">
						<img class="logo" src="<?=base_url()?>assets/users/img/logo.png"></a>
					</a>
				</div>
			</div>
		</div>
		<div class="container animated fadeIn">
			<div class="row">
				<div class="col-md-12 col-lg-5 m-auto">
					<div class="login-container pt-5">
						<div id="loginMessage text-center" class="messages">
						</div>
						<div class="text-center">
							<p>
								<?php echo $this->session->flashdata('LoginResponse');?>
							</p>
						</div>
						<?php echo form_open(base_url().'Login_Validation', 'method="POST"');?>
						<div class="input-holder">
							<input id="Email_Address" class="form-control" type="Email" name="Email_Address" placeholder="Email Address" value="">
						</div>
						<div class="input-holder">
							<input id="Password" class="form-control" type="password" name="Password" placeholder="Password" value="">
						</div>
						<div class="submit-holder">
							<input id="submit" class="butt button-primary fmedium btn-submit" type="submit" value="Login">
						</div>
						<br>
						<div class="signup-holder text-center">
							<p>
								<label> Not registered ?</label><a class="cls_weburl" href="<?=base_url()?>Sign-Up"> Sign-up</a> now.
							</p>
						</div>
						<?php form_close()?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('pages/users/_template/_footer'); ?>
	<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
</body>