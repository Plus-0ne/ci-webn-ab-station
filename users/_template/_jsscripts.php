<!-- Scripts -->
<script type="text/javascript" src="<?=base_url()?>assets/users/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/popper.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/owlcarousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/navigation.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/global.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.myCarousel').carousel();
		
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
						var response = $('<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Airdrop already rated. </div>');
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
						var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop already rated. </div>');
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
						var response = $('<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Airdrop already rated. </div>');
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
						var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop already rated. </div>');
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
						var response = $('<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Airdrop already rated. </div>');
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
						var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop already rated. </div>');
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
						var response = $('<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Airdrop already rated. </div>');
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
						var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop already rated. </div>');
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
						var response = $('<div class="prompt-warning"><i class="fas fa-exclamation-circle"></i> Airdrop already rated. </div>');
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
						var response = $('<div class="prompt-success"><i class="fas fa-check-circle"></i> Airdrop already rated. </div>');
						$("#message").html(response).show();
						window.location.reload();
					}
				}
			});
		});
		$('#crLike').on('click',function(){

			var postid = <?php echo $ai_details->airdrop_id;?>;
			var cl = 'like';
			$.ajax({
				url:"<?php echo base_url()?>LikeThisPost",
				type:"POST",
				data: { 'postid' : postid ,'like' : cl },
				success: function(data)
				{
					window.location.reload();
				}
			});
		});
		$('#crDLike').on('click',function(){

			var postid = <?php echo $ai_details->airdrop_id;?>;
			var cl = 'dislike';
			$.ajax({
				url:"<?php echo base_url()?>DislikeThisPost",
				type:"POST",
				data: { 'postid' : postid ,'dislike' : cl },
				success: function(data)
				{
					window.location.reload();
				}
			});
		});
	});
</script>