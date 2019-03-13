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
							<i class="fab fa-btc" style="color: #EA861B;"></i> &nbsp List your Coin / Token
						</h4>
						<br>
					</div>
					<div class="col-sm-12 p-5">
						<?php echo $this->session->flashdata('promptInfo');?>
                        <?php echo form_open_multipart(base_url().'RequestForListing', 'method="POST"');?>
						<div class="form-group col-sm-12 col-md-4">
							<img id="img-preview" src="<?=base_url()?>assets/users/img/3744.png" style="padding: 13px; border: 1px solid #A0A0A0; width: 150px; height: 150px;"/>
							<br>
							<br>
							<input class="" id="image-input" class="" type="file" placeholder="" name="TokenImage">
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-4">
								<label for="ProjectName">Project Name</label>
								<input type="text" class="form-control" id="ProjectName" aria-describedby="" placeholder="" name="ProjectName">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-6">
								<label for="ShortDescription">Short Description</label>
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
								<input class="form-control" type="url" name="Link">
							</div>
							<div class="form-group col-sm-12 col-md-4">
								<label for="ShortDescription">Website</label>
								<input class="form-control" type="url" name="Website">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-3">
								<label for="MaxParticipants">Max Participants</label>
								<input type="number" class="form-control" id="MaxParticipants" aria-describedby="" placeholder="" name="MaxParticipant">
							</div>
							<div class="form-group col-sm-12 col-md-3">
								<label for="TotalAirdroptoken">Total Airdrop token</label>
								<input type="number" class="form-control" id="TotalAirdroptoken" aria-describedby="" placeholder="" name="ToBeDistributed">
							</div>
							<div class="form-group col-sm-12 col-md-3">
								<label for="TokenRewardQuantity">Token Reward Quantity</label>
								<input type="number" class="form-control" id="TokenRewardQuantity" aria-describedby="" placeholder="" name="RewardQuantity">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-9">
								<label for="Instruction">Instruction</label>
								<textarea class="form-control" id="summernote" rows="5" name="CompleteInstruction"></textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-sm-12 col-md-9">
								<input type="submit" name="" class="btn btn-primary" value="Request for Listing">
							</div>
						</div>
						<?php echo form_close();?>
					</div>
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
	$('#summernote').summernote({
		placeholder: '',
		tabsize: 1,
		height : 200
	});
});
</script>
</body>
</html>