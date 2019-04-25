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
							<i class="fas fa-info" style="color: #195CCB; margin-right: 5px;"></i> Details
						</h4>
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
						<p class="text-justify" style="text-indent: 50px;">
							<?php echo $ai_details->Description;?>
						</p>
					</div>
					<div class="col-sm-12">
						<div id="message"></div>
					</div>
					<div class="col-sm-12 col-md-3 ard_title">
						Rate
					</div>
					<div class="col-sm-12 col-md-9 ard_descrip">
						<?php switch ($ai_details->Rate) {
							case '1':
							echo '<span id="span1" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span2" class="fa fa-star ratebutton"></span>
							<span id="span3" class="fa fa-star ratebutton"></span>
							<span id="span4" class="fa fa-star ratebutton"></span>
							<span id="span5" class="fa fa-star ratebutton"></span>
							';
							break;
							
							case '2':
							echo '<span id="span1" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span2" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span3" class="fa fa-star ratebutton"></span>
							<span id="span4" class="fa fa-star ratebutton"></span>
							<span id="span5" class="fa fa-star ratebutton"></span>
							';
							break;
							
							case '3':
							echo '<span id="span1" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span2" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span3" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span4" class="fa fa-star ratebutton"></span>
							<span id="span5" class="fa fa-star ratebutton"></span>
							';
							break;
							
							case '4':
							echo '<span id="span1" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span2" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span3" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span4" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span5" class="fa fa-star ratebutton"></span>
							';
							break;
							
							case '5':
							echo '<span id="span1" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span2" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span3" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span4" class="fa fa-star ratebutton" style="color: red;"></span>
							<span id="span5" class="fa fa-star ratebutton" style="color: red;"></span>
							';
							break;

							default:
							echo '<span id="span1" class="fa fa-star ratebutton"></span>
							<span id="span2" class="fa fa-star ratebutton"></span>
							<span id="span3" class="fa fa-star ratebutton"></span>
							<span id="span4" class="fa fa-star ratebutton"></span>
							<span id="span5" class="fa fa-star ratebutton"></span>
							';
							break;
						} ?>
					</div>
					<div class="col-sm-12 col-md-3 ard_title">
						Date Start
					</div>
					<div class="col-sm-12 col-md-9 ard_descrip">
						<?php echo $ai_details->DateStart;?>
					</div>
					<div class="col-sm-12 col-md-3 ard_title">
						Date End
					</div>
					<div class="col-sm-12 col-md-9 ard_descrip">
						<?php echo $ai_details->DateEnd;?>
					</div>
					<div class="col-sm-12 col-md-3 ard_title">
						Link
					</div>
					<div class="col-sm-12 col-md-9 ard_descrip">
						<a class="cls_weburl" href="<?php echo $ai_details->Link;?>" target="_blank"><?php echo $ai_details->Link;?></a>
					</div>
					<div class="col-sm-12 col-md-3 ard_title">
						Website
					</div>
					<div class="col-sm-12 col-md-9 ard_descrip">
						<a class="cls_weburl" href="<?php echo $ai_details->WebsiteUrl;?>" target="_blank"><?php echo $ai_details->WebsiteUrl;?></a>
					</div>
					<div class="col-sm-12 pt-4 pb-4 text-center">
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
							<i class="fas fa-dollar-sign" style="color: #F1C245;"></i> Token to be distributed
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
					<?php if (isset($_SESSION['isActive']) AND $_SESSION['VerifyStatus'] == 1) {
						echo '<div class="col-sm-12 col-md-12 pt-5 pb-5 text-justify">
								<h3 class="pb-4">
									How to join <i class="fas fa-question-circle"></i>
								</h3>
								<p>
								'.$ai_details->CompleteInstruction.'<p>
							</div>';
					} ?>
					<?php if (!isset($_SESSION['isActive'])) {
						echo '<div class="col-sm-12 col-md-12 text-center">
								<a href="'.base_url().'Login" class="btn btn-primary" style="text-decoration: none; color: #FFFFFF; font-size: 16px;">
								<i class="fas fa-sign-in-alt"></i> Login to learn How
								</a>
							</div>';
					}
					elseif (isset($_SESSION['isActive']) AND $_SESSION['VerifyStatus'] == 0) {
						echo '<div class="col-sm-12 col-md-12 text-center">
								<a href="'.base_url().'AccountSettings" class="btn btn-primary" style="text-decoration: none; color: #FFFFFF; font-size: 16px;">
								<i class="fas fa-envelope"></i> Verify Email Address
								</a>
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
    $('#span1').on('click', function() {
    	var rate = '1';
    	var postid = <?php echo $ai_details->airdrop_id;?>;
    	var csrf = $("input[name=csrf_test_name]").val();
    	$.ajax({
    		url:"<?php echo base_url()?>Postthisrate",
    		type:"POST",
    		data: {'rate' : rate , 'postid' : postid , 'csrf_test_name' : csrf },
    		success: function(data)
    		{
    			if (data == "HASRATE") 
    			{
    				var response = $('<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Airdrop already rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    			else if (data == "RATED") 
    			{
    				var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop Rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    			else
    			{
    				var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop Rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    		}
    	});
    });
    $('#span2').on('click', function() {
    	var rate = '2';
    	var postid = <?php echo $ai_details->airdrop_id;?>;
    	var csrf = $("input[name=csrf_test_name]").val();
    	$.ajax({
    		url:"<?php echo base_url()?>Postthisrate",
    		type:"POST",
    		data: {'rate' : rate , 'postid' : postid , 'csrf_test_name' : csrf },
    		success: function(data)
    		{
    			if (data == "HASRATE") 
    			{
    				var response = $('<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Airdrop already rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    			else if (data == "RATED") 
    			{
    				var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop Rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    			else
    			{
    				var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop Rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    		}
    	});
    });
    $('#span3').on('click', function() {
    	var rate = '3';
    	var postid = <?php echo $ai_details->airdrop_id;?>;
    	var csrf = $("input[name=csrf_test_name]").val();
    	$.ajax({
    		url:"<?php echo base_url()?>Postthisrate",
    		type:"POST",
    		data: {'rate' : rate , 'postid' : postid , 'csrf_test_name' : csrf },
    		success: function(data)
    		{
    			if (data == "HASRATE") 
    			{
    				var response = $('<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Airdrop already rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    			else if (data == "RATED") 
    			{
    				var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop Rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    			else
    			{
    				var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop Rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    		}
    	});
    });
    $('#span4').on('click', function() {
    	var rate = '4';
    	var postid = <?php echo $ai_details->airdrop_id;?>;
    	var csrf = $("input[name=csrf_test_name]").val();
    	$.ajax({
    		url:"<?php echo base_url()?>Postthisrate",
    		type:"POST",
    		data: {'rate' : rate , 'postid' : postid , 'csrf_test_name' : csrf },
    		success: function(data)
    		{
    			if (data == "HASRATE") 
    			{
    				var response = $('<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Airdrop already rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    			else if (data == "RATED") 
    			{
    				var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop Rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    			else
    			{
    				var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop Rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    		}
    	});
    });
    $('#span5').on('click', function() {
    	var rate = '5';
    	var postid = <?php echo $ai_details->airdrop_id;?>;
    	var csrf = $("input[name=csrf_test_name]").val();
    	$.ajax({
    		url:"<?php echo base_url()?>Postthisrate",
    		type:"POST",
    		data: {'rate' : rate , 'postid' : postid , 'csrf_test_name' : csrf },
    		success: function(data)
    		{
    			if (data == "HASRATE") 
    			{
    				var response = $('<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Airdrop already rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    			else if (data == "RATED") 
    			{
    				var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop Rated.</div>');
    				$("#message").html(response).show();
    				window.location.reload();
    			}
    			else
    			{
    				var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop Rated.</div>');
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