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
						<h3 class="text-center">
							<i class="fas fa-money-check" style="color: #18D7BE;"></i> &nbsp Submit TXID
						</h3>
						<br>
					</div>
					<div class="col-sm-12 p-5">
						<?php echo form_open(base_url().'SubmitTxidforAirdrop','method="POST"');?>
							<h5>
								<p>
									Send your WEBN Payment to this Address:
								</p>
								<p>
									<strong>0xc06f5144cd4e0deefc5336f04f8d05ffc47035cb</strong>
								</p>
							</h5>
							<div class="form-row pt-4">
								<div class="form-group">
									<label>Paste your TXID here for checking:</label>
									<input type="text" name="txid" class="form-control">
								</div>
							</div>
							<?php echo $this->session->flashdata('promptInfo');?>
							<div class="form-row">
								<div class="form-group">
									<input type="hidden" name="airdropid" value="<?php echo $Airdrop_Details->airdrop_id;?>">
									<input type="hidden" name="d2s45h7lf" class="form-control" value="ijkyo46tr">
									<button type="submit" class="btn btn-primary"><i class="fas fa-save">&nbsp</i> Submit </button>
								</div>
							</div>
						<?php echo form_close();?>
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