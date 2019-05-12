<?php $user_header;?>
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
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 p-5">


					</div>
				</div>
				<div class="row mt-5">
					<div class="col-lg-12 title-page-here">
						<h4 class="text-center">
							<i class="fas fa-exclamation" style="color: #EA251B;  margin-right: 5px;"></i> Your Account is Limited. &nbsp Check account settings
						</h4>
						<br>
					</div>
					<div class="col-sm-12 col-md-5 m-auto">
						<ul>
							<?php if ($_SESSION['VerifyStatus'] == 0) {
								echo '<li> Verify Email Address </li>';
							}
							?>
							<?php if ($_SESSION['Hydro_Auth'] == 0) {
								echo '<li> Activate Hydro MFA (Multi Factor Authentication) </li>';
							}
							?>
						</ul>
					</div>
					<div class="col-lg-12 col-sm-12 p-5">


					</div>
					<div class="col-sm-12 text-center">
						<?php if (isset($_SERVER['HTTP_REFERER'])) { ?>
							<a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-info">
								<h5>
									<i class="fas fa-chevron-left"></i> Back
								</h5>
							</a>
						<?php } else { ?>
							<a href="<?=base_url()?>Home" class="btn btn-info">
								<h5>
									<i class="fas fa-chevron-left"></i> Back
								</h5>
							</a>
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