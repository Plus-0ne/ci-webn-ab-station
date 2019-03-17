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
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 p-5">


					</div>
				</div>
				<div class="row mt-5">
					<div class="col-lg-12 title-page-here">
						<h4 class="text-center">
							<img src="<?=base_url()?>assets/users/img/3744.png" width="28">  &nbsp Buy WEBN Token
						</h4>
						<br>
					</div>
					<div class="col-sm-12 col-md-6 p-5 text-center">
						<div class="img-holder">
							<a href="https://www.hotbit.io/register?ref=19499" target="_blank">
								<img class="buy-webn-img" src="<?=base_url()?>assets/users/img/hobit-logo.png">
							</a>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 p-5 text-center">
						<div class="img-holder">
							<a href="https://www.altilly.com/?a=f8a81" target="_blank">
								<img class="buy-webn-img" src="<?=base_url()?>assets/users/img/altilly-logo.png">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('pages/users/_template/_footer'); ?>
	<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
</body>
</html>