<?php $user_header;?>
<?php $this->load->view('pages/users/_template/_login_style');?>
<style type="text/css">
	.form-control:focus { border: none; }
</style>
<body>
	<div class="wrapper">
		<div class="login-header">
			<div class="container">
				<div class="col-sm-12 p-5 text-center">
					<div style="color: white;">
						<a href="<?=base_url()?>/Home">
							<img class="logo" src="<?=base_url()?>assets/users/img/logo.png"></a>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container animated fadeIn">
			<div class="row">
				<div class="col-md-12 col-lg-5 m-auto p-5">
					<div class="login-container">
						<h4 class="text-center p-5">
							<i class="fas fa-user-plus" style="color: #1C9C16; margin-right: 5px;"></i> Register
						</h4>
						<?php echo form_open(base_url().'submit_form_signup','method="POST"','id="sform"');?>
						<div class="signup-holder text-center">
							<p>
								<?php echo $this->session->flashdata('promptInfo');?>
							</p>
						</div>
						<div style="padding: 15px;">
							<div class="text-center">
								Like us on Facebook
							</div>
							<div class="text-center">
								<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fweb.facebook.com%2Fwebnproject&width=93&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId=197327284398293" width="93" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
							</div>
						</div>
						<div style="padding: 15px;">
							<div class="text-center">
								Follow us on Twitter
							</div>
							<div class="text-center">
								<a href="https://twitter.com/WebnProject?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @WebnProject</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							</div>
						</div>
						<div style="padding: 15px;">
							<div class="text-center">
								Join our Telegram Channel
							</div>
							<div class="text-center">
								<a class="cls_weburl" href="https://t.me/joinchat/AAAAAE9QPMta208WboZq0w" target="_blank">&nbsp<i class="fas fa-external-link-square-alt"></i> link</a>
							</div>
						</div>
						<div style="padding: 15px;">
							<div class="text-center">
								To get your Telegram ID
							</div>
							<div class="text-center">
								<a class="cls_weburl" href="https://telegram.me/userinfobot" target="_blank">&nbsp<i class="fas fa-external-link-square-alt"></i> link</a>
							</div>
						</div>
						<div class="input-holder">
							<input class="form-control" type="text" name="TelegramID" placeholder="Telegram ID*" required="">
						</div>
						<div class="input-holder">
							<input class="form-control" type="email" name="Email_Address" placeholder="Email Address*" required="">
						</div>
						<div class="input-holder">
							<input id="password" class="form-control password1" type="password" name="Password" placeholder="Password*" required="">
						</div>
						
						<div class="input-holder">
							<input id="repassword" class="form-control password2" type="password" name="rePassword" placeholder="Re-type Password*" required="">
						</div>
						<div id="passwordprompt" class="text-center" style=""></div>
						<br>
						<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key');?>"></div>
						<div class="submit-holder">
							<input class="btn btn-primary btn-submit" type="submit" value="Register">
						</div>
						<br>
						<div class="signup-holder text-center" style="">
							<p>
								<label> Already registered ?</label><a class="cls_weburl" href="<?=base_url()?>Login"> Sign-in </a>
							</p>
						</div>
						<?php echo form_close()?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('pages/users/_template/_footer'); ?>
	<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>