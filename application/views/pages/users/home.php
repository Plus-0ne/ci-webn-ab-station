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
		<div class="content-container">
			<div class="container">
				<?php if ($GetFeatured->num_rows() != 0) { ?>
					<div class="row mt-5">
						<div class="col-lg-12 title-page-here">
							<h4 class="pb-4 pt-4">
								<i class="far fa-star" style="color: #12DF17; margin-right: 5px;"></i> Featured Airdrops
							</h4>
						</div>
						<div id="slider" class="owl-carousel owl-loaded animated fadeIn">
							<div class="owl-stage-outer">
								<div class="owl-stage">
									<?php foreach ($GetFeatured->result_array() as $row) { ?>
										<div class="owl-item" style="background-color: #f5fcff; border: 1px solid #D9D9D9;">
											<a href="<?=base_url()?>Airdrop_Details?aide=<?php echo $row['airdrop_id'];?>" class="text-center" style="text-decoration: none; color: #323232;">
												<img class="owl-img" src="<?php echo $row['TokenImage'];?>" style="border-radius: 100%;">
												<br>
												<h6>
													<?php echo $row['ProjectName'];?>
												</h6>
												<p>
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
												</p>
											</a>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-sm-12 p-3">
							<div class="customPrevBtn">
								<i class="fas fa-chevron-left"></i> Prev
							</div>
							<div class="customNextBtn">
								Next <i class="fas fa-chevron-right"></i>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="row mt-5">
					<div class="col-sm-12 title-page-here">
						<h4 class="pb-4 pt-5">
							<i class="fas fa-fire-alt" style="color: #FF4E00;"></i> &nbsp Hot Airdrops
						</h4>
					</div>
					<?php if ($GetAirdropsHot->num_rows() != 0) { ?>
						<?php foreach ($GetAirdropsHot->result_array() as $row) { ?>
							<div class="col-lg-3 col-sm-12 pt-4 pb-4">
								<a href="<?=base_url()?>Airdrop_Details?aide=<?php echo $row['airdrop_id'];?>" style="text-decoration: none; color: #323232;">
									<div class="content-widget animated fadeIn" style="height: 100%;">
										<?php if ($row['isFeatured'] == 'yes') { ?>
											<?php echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #12DF17;"><i class="far fa-star">&nbsp</i>Featured</span>'; ?>
										<?php } else { ?>
											<?php echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #12DF17;">&nbsp</span>';?>
										<?php } ?>
										<div class="content-image">
											<img class="ratio rounded-circle" src="" style="background-image: url('<?php echo $row['TokenImage'];?>');">
										</div>
										<div class="content-details">
											<strong><?php echo $row['ProjectName'];?></strong>
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
						<div class="col-sm-12 va-container">
							<a class="butt button-info fsmall" href="<?=base_url()?>HOT" style="text-decoration: none; color: #FFFFFF;">
								<i class="fas fa-arrow-alt-circle-right"></i> View All
							</a>
						</div>
					<?php } else { ?>
						<div class="col-sm-12 text-center">
							<h6>
								<strong>No Airdrops Yet</strong>
							</h6>
						</div>
					<?php } ?>
				</div>
				<div class="row mt-5">
					<div class="col-lg-12 title-page-here">
						<h4 class="pb-4 pt-4">
							<i class="fas fa-parachute-box" style="color: #25910C;"></i> &nbsp Latest Airdrops
						</h4>
					</div>
					<?php if ($GetAirdropsLatest->num_rows() != 0) { ?>
						<?php foreach ($GetAirdropsLatest->result_array() as $row) { ?>
							<div class="col-lg-3 col-sm-12 pt-4 pb-4">
								<a href="<?=base_url()?>Airdrop_Details?aide=<?php echo $row['airdrop_id'];?>" style="text-decoration: none; color: #323232;">
									<div class="content-widget animated fadeIn" style="height: 100%;">
										<?php if ($row['isFeatured'] == 'yes') { ?>
											<?php echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #12DF17;"><i class="far fa-star">&nbsp</i>Featured</span>'; ?>
										<?php } else { ?>
											<?php echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #12DF17;">&nbsp</span>';?>
										<?php } ?>
										<div class="content-image">
											<img class="ratio rounded-circle" src="" style="background-image: url('<?php echo $row['TokenImage'];?>');">
										</div>
										<div class="content-details">
											<strong><?php echo $row['ProjectName'];?></strong>
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
						<div class="col-sm-12 va-container">
							<a class="butt button-info fsmall" href="<?=base_url()?>LATEST" style="text-decoration: none; color: #FFFFFF;">
								<i class="fas fa-arrow-alt-circle-right"></i> View All
							</a>
						</div>
					<?php } else { ?>
						<div class="col-sm-12 text-center">
							<h6>
								<strong>No Airdrops Yet</strong>
							</h6>
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