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
		<div class="content-container">
			<div class="container">
				<?php if ($GetFeatured->num_rows() >= 1) { ?>
					<div class="row mt-5">
						<div class="col-lg-12 title-page-here">
							<h4 class="pb-4 pt-4">
								<i class="far fa-star" style="color: #f1c410; margin-right: 5px;"></i> Featured Airdrops
							</h4>
						</div>
						<div class="col-sm-12">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="background-color: #102026; min-height: 200px;">
									<?php $i=0;foreach ($GetFeatured->result_array() as $row) { ?>
										<div class="carousel-item <?php if($i == 0) { echo "active"; $i++; }?>">
											<a href="<?=base_url()?>Airdrop_Details?aide=<?php echo $row['airdrop_id'];?>">
												<div class="text-center p-3">
													<img src="<?php echo $row['TokenImage'];?>" width="225" height="225" alt="First Slide" style="border-radius: 100%;">
												</div>
												<br>
												<br>
												<br>
												<br>
												<br>
												<br>
												<div class="carousel-caption" style="background-color: rgba(0,0,0,0.3);">
													<h5><?php echo $row['ProjectName'];?></h5>
													<div>
														Max Participants : <?php echo $row['MaxParticipants'];?>
													</div>
													<div>
														Token to be distributed : <?php echo $row['ToBeDistributed'];?>
													</div>
												</div>
											</a>
										</div>
									<?php } ?>
								</div>
								<!-- Carousel controls -->
								<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
									<i class="fas fa-chevron-left" style="font-size: 35px;"></i>
								</a>
								<a class="carousel-control-next" href="#myCarousel" data-slide="next">
									<i class="fas fa-chevron-right" style="font-size: 35px;"></i>
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="row mt-5">
					<div class="col-sm-12 title-page-here">
						<h4 class="pb-4 pt-5">
							<i class="fas fa-fire-alt" style="color: #f1c410;"></i> &nbsp Hot Airdrops
						</h4>
					</div>
					<?php if ($GetAirdropsHot->num_rows() != 0) { ?>
						<?php foreach ($GetAirdropsHot->result_array() as $row) { ?>
							<div class="col-lg-3 col-sm-12 pt-4 pb-4">
								<a href="<?=base_url()?>Airdrop_Details?aide=<?php echo $row['airdrop_id'];?>" style="text-decoration: none; color: #323232;">
									<div class="content-widget animated fadeIn" style="height: 100%;">
										<?php
										switch ($row['PostPrio']) {
											case 'hot':
												echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #e67e22;"><i class="fas fa-fire-alt">&nbsp</i>Hot</span>';
												break;
											case 'featured':
												echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #e74c3c;"><i class="far fa-star">&nbsp</i>Featured</span>';
												break;
											case 'latest':
												echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #2f2f2f;"><i class="fas fa-asterisk">&nbsp</i>New</span>';
												break;
											default:
												echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #12DF17;">&nbsp</span>';
												break;
										}
										?>
										<div class="content-image">
											<img class="ratio rounded-circle" src="" style="background-image: url('<?php echo $row['TokenImage'];?>');">
										</div>
										<div class="content-details">
											<strong><?php echo $row['ProjectName'];?></strong>
											<br>
											<br>
											<i class="fas fa-users" style="color: #353535;"></i> Participants : <?php echo $row['MaxParticipants'];?>
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
							<i class="fas fa-parachute-box" style="color: #f1c410;"></i> &nbsp Latest Airdrops
						</h4>
					</div>
					<?php if ($GetAirdropsLatest->num_rows() != 0) { ?>
						<?php foreach ($GetAirdropsLatest->result_array() as $row) { ?>
							<div class="col-lg-3 col-sm-12 pt-4 pb-4">
								<a href="<?=base_url()?>Airdrop_Details?aide=<?php echo $row['airdrop_id'];?>" style="text-decoration: none; color: #323232;">
									<div class="content-widget animated fadeIn" style="height: 100%;">
										<?php
										switch ($row['PostPrio']) {
											case 'hot':
												echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #e67e22;"><i class="fas fa-fire-alt">&nbsp</i>Hot</span>';
												break;
											case 'featured':
												echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #e74c3c;"><i class="far fa-star">&nbsp</i>Featured</span>';
												break;
											case 'latest':
												echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #2f2f2f;"><i class="fas fa-asterisk">&nbsp</i>New</span>';
												break;
											default:
												echo '<span style="position: relative; top: 10px; left: 10px; font-size: 16px; color: #12DF17;">&nbsp</span>';
												break;
										}
										?>
										<div class="content-image">
											<img class="ratio rounded-circle" src="" style="background-image: url('<?php echo $row['TokenImage'];?>');">
										</div>
										<div class="content-details">
											<strong><?php echo $row['ProjectName'];?></strong>
											<br>
											<br>
											<i class="fas fa-users" style="color: #353535;"></i> Participants : <?php echo $row['MaxParticipants'];?>
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