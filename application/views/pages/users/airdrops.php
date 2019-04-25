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
						<h4 class="text-center pb-4">
							<i class="fas fa-parachute-box" style="color: green; margin-right: 5px;"></i> Latest Airdrops
						</h4>
					</div>
					<?php if ($GetAirdrops->num_rows() >= 1) { ?>
						<?php foreach ($GetAirdrops->result_array() as $row) { ?>
							<div class="col-lg-3 col-sm-12 pt-4 pb-4">
								<a href="<?=base_url()?>Airdrop_Details?aide=<?php echo $row['airdrop_id'];?>" style="text-decoration: none; color: #323232;">
									<div class="content-widget animated fadeIn" style="height: 100%;">
										<?php if ($row['isFeatured'] == 'yes') { ?>
											<?php echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #12DF17;"><i class="far fa-star">&nbsp</i>Featured</span>'; ?>
										<?php } else { ?>
											<?php echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #12DF17;">&nbsp</span>';?>
										<?php } ?>
										<div class="content-image">
											<img class="ratio rounded-circle" src="" style="background-image: url('<?php echo $row['TokenImage'];?>')">
										</div>
										<div class="content-details">
											<?php echo $row['ProjectName'];?>
											<br>
											<?php 
											if ($row['Rate'] == 1) {	
												echo ' 
												<span id="star1" class="fa fa-star" style="color: #FF8400;"></span>
												<span id="star2" class="fa fa-star"></span>
												<span id="star3" class="fa fa-star"></span>
												<span id="star4" class="fa fa-star"></span>
												<span id="star5" class="fa fa-star"></span>
												';
											}
											elseif ($row['Rate'] == 2) {
												echo ' 
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												';
											}
											elseif ($row['Rate'] == 3) {
												echo ' 
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star"></span>
												<span class="fa fa-star"></span>
												';
											}
											elseif ($row['Rate'] == 4) {
												echo ' 
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star" style="color: #FF8400;"></span>
												<span class="fa fa-star"></span>
												';
											}
											elseif ($row['Rate'] == 5) {
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
											if ($row['ApproveDate'] != 'Not Set') {
												$data = array(
													'ApproveDate' => $row['ApproveDate'],
												);
												$this->load->view('pages/users/_template/_datetime_approved',$data);
											}
											?>
										</div>
									</div>
								</a>
							</div>
						<?php } ?>
					<?php } else { ?>
						<div class="col-sm-12 pt-4 pb-4 text-center">
							<h5>
								<strong>No Airdrop Yet</strong>
							</h5>
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