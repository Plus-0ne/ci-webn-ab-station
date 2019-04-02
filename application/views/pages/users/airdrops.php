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
			<div class="container animated fadeIn">
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
							<a href="<?=base_url()?>Airdrop_Details?aide=<?php echo $row->airdrop_id;?>" style="text-decoration: none; color: #323232;">
								<div class="content-widget animated fadeIn">
									<?php
									$data = array(
										'AirdropID' => $row->airdrop_id,
										'Expiration' => $row->ExpirationDate,
										'PaymentDetails' => $row->PaymentDetails,
									);
									$this->load->view('pages/users/_template/_datetime_remaining',$data);
									?>
									<div class="content-image">
										<img class="ratio rounded-circle" src="" style="background-image: url('<?php echo $row->TokenImage;?>')">
									</div>
									<div class="content-details">
										<?php echo $row->ProjectName;?>
										<br>
										<?php 
										if ($row->Rate == 1) {	
											echo ' 
												<span id="star1" class="fa fa-star" style="color: #FF8400;"></span>
												<span id="star2" class="fa fa-star"></span>
												<span id="star3" class="fa fa-star"></span>
												<span id="star4" class="fa fa-star"></span>
												<span id="star5" class="fa fa-star"></span>
												';
										}
										elseif ($row->Rate == 2) {
											echo ' 
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												';
										}
										elseif ($row->Rate == 3) {
											echo ' 
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												';
										}
										elseif ($row->Rate == 4) {
											echo ' 
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star"></span>
												';
										}
										elseif ($row->Rate == 5) {
											echo ' 
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												';
										}
										else
										{
											echo ' 
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												';
										}
										?>
										<?php
										$data = array(
											'ApproveDate' => $row->ApproveDate,
										);
										$this->load->view('pages/users/_template/_datetime_approved',$data);
										?>
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