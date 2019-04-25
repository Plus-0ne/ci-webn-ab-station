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
							<i class="fab fa-btc" style="color: #EA861B; margin-right: 5px;"></i> Apply to Hot list (Additional 500K WEBN Tokens per day)
						</h4>
					</div>
					<div class="col-sm-12 p-5">
						<?php echo $this->session->flashdata('promptInfo');?>
                        <?php echo form_open_multipart(base_url().'RequestForHotlisting', 'method="POST"');?>
						<div class="form-group col-sm-12 col-md-4">
							<img id="img-preview" src="<?=base_url()?>assets/users/img/3744.png" style="padding: 13px; border: 1px solid #E2E2E2; width: 150px; height: 150px;"/>
							<br>
							<br>
							<input id="image-input" type="file" name="TokenImage">
							<label>Recomended size (500 X 500)</label>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-4">
								<label for="ProjectName">Project Name</label>
								<input type="text" class="form-control" id="ProjectName" name="ProjectName">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-6">
								<label for="ShortDescription">Description</label>
								<textarea class="form-control" id="ShortDescription" rows="6" name="Description"></textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-2">
								<label for="ShortDescription">Date Start</label>
								<input class="form-control" type="date" name="DateStart">
							</div>
							<div class="form-group col-sm-12 col-md-2">
								<label for="ShortDescription">Date End</label>
								<input class="form-control" type="date" name="DateEnd">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-4">
								<label for="ShortDescription">Link</label>
								<input class="form-control" type="url" name="Link" placeholder="Paste URL">
							</div>
							<div class="form-group col-sm-12 col-md-4">
								<label for="ShortDescription">Website</label>
								<input class="form-control" type="url" name="Website" placeholder="Paste URL">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-3">
								<label for="MaxParticipants">Max Participants</label>
								<input type="number" class="form-control" id="MaxParticipants" name="MaxParticipant">
							</div>
							<div class="form-group col-sm-12 col-md-3">
								<label for="TotalAirdroptoken">Total Airdrop token</label>
								<input type="number" class="form-control" id="TotalAirdroptoken" name="ToBeDistributed">
							</div>
							<div class="form-group col-sm-12 col-md-3">
								<label for="TokenRewardQuantity">Token Reward Quantity</label>
								<input type="number" class="form-control" id="TokenRewardQuantity" name="RewardQuantity">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-12">
								<label for="Instruction">Instruction</label>
								<textarea class="form-control" id="summernote" rows="5" name="CompleteInstruction"></textarea>
								<p>
									Powered by : Summernote - Super Simple WYSIWYG editor
								</p>
							</div>
						</div>
						<input id="input24" type="radio" name="PaymentDetails" value="24hrs" style="display: none;">
						<input id="input48" type="radio" name="PaymentDetails" value="48hrs" style="display: none;">
						<input id="input1w" type="radio" name="PaymentDetails" value="1week" style="display: none;">
						<input id="inputlisthot" type="radio" name="ListAsHot" value="hot" style="display: none;">
					</div>
					<div class="col-sm-12 col-md-4 p-5">
						<div id="payment24" class="pricing-card bgcolor-24 text-center">
							<div class="pricing-header">
								<h2>
									<i class="far fa-clock"></i> 24 hrs
								</h2>
							</div>
							<div class="pricingbody">
								500k WEBN Tokens
							</div>
							<div id="checked-icon1" class="checked-payments">
								<h1>
									<i class="fas fa-check-circle icon-size"></i>
								</h1>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-4 p-5">
						<div id="payment48" class="pricing-card bgcolor-48 text-center">
							<div class="pricing-header">
								<h2>
									<i class="far fa-clock"></i> 48 hrs
								</h2>
							</div>
							<div class="pricingbody">
								1M WEBN Tokens
							</div>
							<div id="checked-icon2" class="checked-payments">
								<h1>
									<i class="fas fa-check-circle icon-size"></i>
								</h1>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-4 p-5">
						<div id="payment1w" class="pricing-card bgcolor-1w text-center">
							<div class="pricing-header">
								<h2>
									<i class="far fa-calendar-alt"></i> 1 Week
								</h2>
							</div>
							<div class="pricingbody">
								2M WEBN Tokens
							</div>
							<div id="checked-icon3" class="checked-payments">
								<h1>
									<i class="fas fa-check-circle icon-size"></i>
								</h1>
							</div>
						</div>
					</div>
					<!-- <div class="col-sm-12 col-md-7 m-auto p-5">
						<div id="listhot" class="pricing-card bgcolor-hot text-center">
							<div class="pricing-header">
								<h2>
									List as Hot Airdrop
								</h2>
							</div>
							<div class="pricingbody">
								Additional 500K WEBN Tokens per day (Optional)
							</div>
							<div id="checked-icon4" class="checked-payments">
								<h1>
									<i class="fas fa-check-circle icon-size"></i>
								</h1>
							</div>
						</div>
					</div> -->
					<div class="col-sm-12 p-5">
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-9">
								<button type="submit" class="butt button-primary fsmall"><i class="fas fa-paper-plane">&nbsp</i> Request for Listing </button>
							</div>
						</div>
					</div>
				<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('pages/users/_template/_footer'); ?>
	<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
<script>
$(document).ready(function () {
	<?php if($this->session->flashdata('showModalPayment') == 'true'):?>
		$('#modalpaymentdetails').modal('show');
	<?php endif;?>
});
</script>
<div class="modal fade animated fadeInUp faster" id="modalpaymentdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"> Payment details </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="fas fa-times"></i>
				</button>
			</div>
			<?php echo form_open(base_url().'SendtxidForApporval2', 'method="POST"');?>
			<div class="modal-body">
				<p>
					Send your WEBN Payment to this Address: 0xc06f5144cd4e0deefc5336f04f8d05ffc47035cb
				</p>
				<p>
					After you send your payment, paste your TXID here for checking:
				</p>
				<div class="form-group">
					<input type="text" name="txid" class="form-control" required="">
					<input type="hidden" name="submitrequest" value="45was45yg5hf45x">
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Send TXID</button>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>
</body>
</html>