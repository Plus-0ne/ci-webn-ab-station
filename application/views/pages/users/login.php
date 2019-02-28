<?php $user_header;?>
<style type="text/css">
	body
	{
		background: #FFFFFF;
	}
	.login-header img
	{

	}
	.input-holder
	{
		width: 100%;
		border: 1px solid #A4A4A4;
		margin: 16px;
	}
	.input-holder .form-control:focus
	{
		
	}
	.submit-holder
	{
		width: 100%;
		margin: 16px;
	}
	.signup-holder
	{
		width: 100%;
		margin: 16px;
	}
	.form-control
	{
		padding: 25px;
		width: 100%;
		border: none;
		background-color: transparent;
		border-radius: 1px;
		font-size: 16px;
	}
	.form-control:focus
	{
		outline: none;
		box-shadow: none;
		border-botom: 1px solid #000000;
		background-color: transparent;
	}
	.btn-submit
	{
		width: 100%;
		padding: 12px;
		border-radius: 1px;
	}
	.btn-sign
	{
		width: 100%;
		padding: 12px;
		border-radius: 1px;
	}
	.linediv
	{
		width:  100%;
		border-bottom: 1px solid #DADADA;
	}
</style>
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
						<form action="<?=base_url()?>Login_Validation" method="POST">
							<div class="input-holder">
								<input class="form-control" type="email" name="Email_Address" placeholder="Email Address" required="">
							</div>
							<div class="input-holder">
								<input class="form-control" type="password" name="Password" placeholder="Password" required="">
							</div>
							<div class="submit-holder">
								<input class="btn btn-primary btn-submit" type="submit" name="SubmitLogin" value="Login">
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
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $user_jsscripts;?>
</body>