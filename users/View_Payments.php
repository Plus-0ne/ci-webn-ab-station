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
						<h3 class="text-center">
							<i class="fas fa-money-check" style="color: #18D7BE; margin-right: 5px;"></i> Payments
						</h3>
						<br>
					</div>
					<div class="col-sm-12 p-5">
						<h5 class="pb-5">
							<?php echo 'Project Name : <strong>'.$Airdrop_Details->ProjectName.'</strong>'; ?>
						</h5>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<th>TXID</th>
									<th>Payment Details</th>
									<th>Priority</th>
									<th>Date</th>
									<th>Status</th>
								</thead>
								<tbody>
									<?php foreach ($PaymentFields->result_array() as $row) { ?>
										<tr>
											<td>
												<?php echo $row['TxID']; ?>
											</td>
											<td>
												<?php echo $row['PaymentDetails']; ?>
											</td>
											<td>
												<?php if ($row['ListAsHot'] == 'hot') {
													echo '<strong style="color: #D57D15;">Hot</strong>';
												}
												else
												{
													echo '<strong style="color: #42D515;">Latest</strong>';
												} ?>
											</td>
											<td>
												<?php echo $row['Date']; ?>
											</td>
											<td>
												<?php if ($row['TxID'] == null) {
													echo 'Not paid yet';
												} else {
													echo 'Paid';
												} ?>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-sm-12 col-md-2 ml-auto p-5">
						<a href="<?=base_url()?>AccountSettings" class="btn btn-info">
							<i class="fas fa-arrow-circle-left">&nbsp</i> Back
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('pages/users/_template/_footer'); ?>
		<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
	</body>
	</html>