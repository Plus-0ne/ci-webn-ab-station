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
						<h4 class="text-center">
							<i class="fas fa-money-check" style="color: #18D7BE; margin-right: 5px;"></i> Extend Airdrop
						</h4>
						<br>
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
					<div class="col-sm-12 col-md-7 m-auto p-5">
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
					</div>
					<div class="col-sm-12 p-5">
						<?php echo form_open(base_url().'submittxidextend','method="POST"');?>
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
									<input id="input24" type="radio" name="PaymentDetails" value="24hrs" style="display: none;">
									<input id="input48" type="radio" name="PaymentDetails" value="48hrs" style="display: none;">
									<input id="input1w" type="radio" name="PaymentDetails" value="1week" style="display: none;">
									<input id="inputlisthot" type="radio" name="ListAsHot" value="hot" style="display: none;">

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
		<script type="text/javascript">
			$(document).ready(function(){
				$('#payment24').click(function(){
					if($('#input24').prop('checked'))
					{
						$('#input24').prop("checked", false);
						$(this).removeClass('paymentselected');
						$('#checked-icon1').removeClass('checked-payments-colored');
						$('#checked-icon2').removeClass('checked-payments-colored');
						$('#checked-icon3').removeClass('checked-payments-colored');
					}
					else
					{
						$('#input24').prop("checked", true);
						$(this).addClass('paymentselected');
						$('#checked-icon1').addClass('checked-payments-colored');
						$('#checked-icon2').removeClass('checked-payments-colored');
						$('#checked-icon3').removeClass('checked-payments-colored');
						$('#payment48').removeClass('paymentselected');
						$('#payment1w').removeClass('paymentselected');
					}
				});
				$('#payment48').click(function(){
					if($('#input48').prop('checked')){
						$('#input48').prop("checked", false);
						$(this).removeClass('paymentselected');
						$('#checked-icon1').removeClass('checked-payments-colored');
						$('#checked-icon2').removeClass('checked-payments-colored');
						$('#checked-icon3').removeClass('checked-payments-colored');
					}
					else
					{
						$('#input48').prop("checked", true);
						$(this).addClass('paymentselected');
						$('#checked-icon1').removeClass('checked-payments-colored');
						$('#checked-icon2').addClass('checked-payments-colored');
						$('#checked-icon3').removeClass('checked-payments-colored');
						$('#payment24').removeClass('paymentselected');
						$('#payment1w').removeClass('paymentselected');

					}
				});
				$('#payment1w').click(function(){
					if($('#input1w').prop('checked')){
						$('#input1w').prop("checked", false);
						$(this).removeClass('paymentselected');
						$('#checked-icon1').removeClass('checked-payments-colored');
						$('#checked-icon2').removeClass('checked-payments-colored');
						$('#checked-icon3').removeClass('checked-payments-colored');
					}
					else
					{
						$('#input1w').prop("checked", true);
						$(this).addClass('paymentselected');
						$('#checked-icon1').removeClass('checked-payments-colored');
						$('#checked-icon2').removeClass('checked-payments-colored');
						$('#checked-icon3').addClass('checked-payments-colored');
						$('#payment24').removeClass('paymentselected');
						$('#payment48').removeClass('paymentselected');


					}
				});
				$('#listhot').on('click', function() {
					if ($('#inputlisthot').prop("checked")) 
					{
						$('#inputlisthot').prop("checked", false);
						$(this).removeClass('paymentselected');
						$('#checked-icon4').removeClass('checked-payments-colored');
					}
					else
					{
						$('#inputlisthot').prop("checked", true);
						$(this).addClass('paymentselected');
						$('#checked-icon4').addClass('checked-payments-colored');
					}
				});
			});
		</script>
	</body>
</html>