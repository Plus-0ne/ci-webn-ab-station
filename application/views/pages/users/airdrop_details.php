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

						<?php
							
						?>
					</div>
				</div>
				<div id="message">
					
				</div>
				<div class="row mt-5">
					<div class="col-lg-12 title-page-here">
						<h3 class="text-center">
							<i class="fas fa-info" style="color: #195CCB;"></i> &nbsp Details
						</h3>
						<br>
					</div>
					<div class="col-sm-12 col-md-5 pt-5 pb-5">
						<div class="mid-img">
							<img width="200" height="200" src="<?php echo $ai_details->TokenImage;?>" style="background-image: url('');" />
						</div>
					</div>
					<div class="col-sm-12 col-md-7 pt-5 pb-5">
						<h3>
							<?php echo $ai_details->ProjectName;?> is Airdropping
						</h3>
						<p class="text-justify">
							<?php echo $ai_details->Description;?>
						</p>
					</div>
					<div class="col-sm-12 col-md-11 pt-5 pb-5">
						<table>
							<tr>
								<td>
									Rate
								</td>
								<td>
									&nbsp:&nbsp 
									<?php if ($ai_details->Rate == 1) {	
										echo '&nbsp 
											<span id="star1" class="fa fa-star" style="color: red;"></span>
											<span id="star2" class="fa fa-star"></span>
											<span id="star3" class="fa fa-star"></span>
											<span id="star4" class="fa fa-star"></span>
											<span id="star5" class="fa fa-star"></span>
											';
									}
									elseif ($ai_details->Rate == 2) {
										echo '&nbsp 
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											';
									}
									elseif ($ai_details->Rate == 3) {
										echo '&nbsp 
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											';
									}
									elseif ($ai_details->Rate == 4) {
										echo '&nbsp 
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star"></span>
											';
									}
									elseif ($ai_details->Rate == 5) {
										echo '&nbsp 
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star" style="color: red;"></span>
											<span class="fa fa-star" style="color: red;"></span>
											';
									}
									else
									{
										
										echo 'Not Rated';
										echo '&nbsp 
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											';
									}
									?>
									&nbsp
								</td>
								<td>
									<?php echo form_open(base_url().'Postthisrate','method="POST"','id="sform"');?>
										&nbsp<select id="rate">
											<option selected="" hidden="" disabled="" value="">Rate</option>
											<option value="1">1 Star</option>
											<option value="2">2 Star</option>
											<option value="3">3 Star</option>
											<option value="4">4 Star</option>
											<option value="5">5 Star</option>
										</select>
									<?php echo form_close();?>
								</td>
							</tr>
							<tr>
								<td>
									Date Start
								</td>
								<td>
									&nbsp:&nbsp <?php echo $ai_details->DateStart;?>
								</td>
							</tr>
							<tr>
								<td>
									Date End
								</td>
								<td>
									&nbsp:&nbsp <?php echo $ai_details->DateEnd;?>
								</td>
							</tr>
							<tr>
								<td>
									Link
								</td>
								<td>
									&nbsp:&nbsp <a href="<?php echo $ai_details->Link;?>"> <?php echo $ai_details->Link;?> </a>
								</td>
							</tr>
							<tr>
								<td>
									Website
								</td>
								<td>
									&nbsp:&nbsp <a href="<?php echo $ai_details->WebsiteUrl;?>"> <?php echo $ai_details->WebsiteUrl;?> </a>
								</td>
							</tr>
							<tr>
								<td>
									Days Remaining
								</td>
								<td>
									<?php
										date_default_timezone_set("Asia/Manila");
										$today = date("Y-m-d");
										$endDate = $ai_details->DateEnd;
										$datetime1 = new DateTime($today);

										$datetime2 = new DateTime($endDate);

										$difference = $datetime1->diff($datetime2);

										if ($datetime2 < $datetime1) {
											echo '&nbsp:&nbsp <span style="color: red;"><strong> Expired </strong></span>';
										}
										else
										{
											echo '&nbsp:&nbsp '.$difference->days;
										}
									?>
									 
								</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-12 col-md-4 pt-5 pb-5 text-center">
						<h3>
							<i class="fas fa-users" style="color: #BA45F1;"></i> Max Participants
							<br>
							<br>
							<?php echo $ai_details->MaxParticipants;?>
						</h3>
					</div>
					<div class="col-sm-12 col-md-4 pt-5 pb-5 text-center">
						<h3>
							<i class="fas fa-dollar-sign style="color: #F1C245;"></i> Token to be distributed
							<br>
							<br>
							<?php echo $ai_details->ToBeDistributed;?>
						</h3>
					</div>
					<div class="col-sm-12 col-md-4 pt-5 pb-5 text-center">
						<h3>
							<i class="fas fa-hand-holding-usd" style="color: #1FDC35;"></i> Reward
							<br>
							<br>
							<?php echo $ai_details->RewardQuantity;?>
						</h3>
					</div>
					<?php if ($this->session->userdata('isActive') == false) {
						echo '<div class="col-sm-12 col-md-12 text-center">
								<h2>
									<a href="'.base_url().'Login" style="text-decoration: none; color: #4C4C4C;">
										Login to learn How
									</>
								</h2>
							</div>';
					} else {
						echo '<div class="col-sm-12 col-md-12 pt-5 pb-5 text-justify">
								<h3 class="pb-4">
									How to join <i class="fas fa-question-circle"></i>
								</h3>
								<p>
								'.$ai_details->CompleteInstruction.'<p>
							</div>';
					} ?>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('pages/users/_template/_footer'); ?>
	<?php $this->load->view('pages/users/_template/_jsscripts'); ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#rate').on('change', function() {
      var rate = $(this).val();
      var postid = <?php echo $ai_details->airdrop_id;?>;
      var csrf = $("input[name=csrf_test_name]").val();

      $.ajax({
        url:"<?php echo base_url()?>Postthisrate",
        type:"POST",
        data: {'rate' : rate , 'postid' : postid , 'csrf_test_name' : csrf },
        success: function(data)
        {
          if (data == "RATED") 
          {
          	var response = $('<div class="alert alert-success alert-dismissible fade show animated bounceInDown" role="alert"><strong> Success! </strong> You rate this Airdrop <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	        $("#message").html(response).show();
	        window.location.reload();
          }
          else if (data == "HASRATE") 
          {
          	var response = $('<div class="alert alert-warning alert-dismissible fade show animated bounceInDown" role="alert"><strong> Opsss! </strong> You rated this airdrop <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	        $("#message").html(response).show();
	        window.location.reload();
          }
          else
          {
          	var response = $('<div class="alert alert-success alert-dismissible fade show animated bounceInDown" role="alert"><strong> Success! </strong> Airdrop Rated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	        $("#message").html(response).show();
          	window.location.reload();
          }
        }
      });
    });
});
</script>
</body>
</html>