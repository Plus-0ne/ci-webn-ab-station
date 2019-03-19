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
						<h3 class="text-center pb-4">
							<i class="fas fa-parachute-box" style="color: green;"></i> &nbsp Latest Airdrops
						</h3>
					</div>
					<?php foreach ($GetAirdrops->result() as $row) { ?>
						<div class="col-lg-3 col-sm-12 pt-4 pb-4">
							<a href="<?=base_url()?>Airdrop_Details?aide=<?php echo $row->airdrop_id;?>" style="text-decoration: none;">
								<div class="content-widget animated fadeIn">
									<div class="content-image">
										<img class="ratio rounded-circle" src="" style="background-image: url('<?php echo $row->TokenImage;?>')">
									</div>
									<div class="content-details">
										<?php echo $row->ProjectName;?>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('pages/users/_template/_footer'); ?>
	<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
</body>
</html>