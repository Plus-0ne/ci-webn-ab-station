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
			<div class="container animated fadeIn">
				<div class="row">
					<div class="col-lg-12 col-sm-12 p-5">


					</div>
				</div>
				<div class="row mt-5">
					<div class="col-lg-12 title-page-here">
						<h4 class="text-center pb-4">
							<i class="fas fa-question" style="color: #EA861B; margin-right: 5px;"></i> Frequently Asked Questions
						</h4>
						<br>
						<?php foreach ($GetAllfaqs->result() as $result) { ?>
							<div id="accordion<?php echo $result->FaqNo; ?>" role="tablist">
								<div class="card card-custom">
									<a id="toglepanel" class="toglepanel-custom" data-toggle="collapse" href="#c<?php echo $result->FaqNo; ?>" aria-expanded="true" aria-controls="c<?php echo $result->FaqNo; ?>">
										<div class="card-header" role="tab" id="headingOne">
											<h5 class="mb-0">
												<?php echo $result->Question; ?>
											</h5>
										</div>
									</a>
									<div id="c<?php echo $result->FaqNo; ?>" class="collapse custom-collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion<?php echo $result->FaqNo; ?>">
										<div class="card-body">
											<?php echo $result->Answer; ?>
										</div>
									</div>
								</div>
							</div>
							<br>
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