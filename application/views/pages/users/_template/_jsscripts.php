<!-- Scripts -->
<script type="text/javascript" src="<?=base_url()?>assets/users/js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/popper.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/navigation.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/jquery-3.3.1.min.js"></script>

<?php $this->load->view('pages/users/_template/_modals'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/fhdkshfksdf.js"></script>


<script type="text/javascript">
	$(document).ready(function () {
		$('#btt-scrolltop').click(function () {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});


		$('.newdt , .newdm').mouseenter(function () {
			$('.newdm').addClass('zoomIn');
			$('.newdm').addClass('show');
		});
		$('.newdt , .newdm').mouseleave(function () {
			$('.newdm').removeClass('show');
		});
		function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
	                $('#img-preview').attr('src', e.target.result);
	            }
	            
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    $("#image-input").change(function(){
	        readURL(this);
	    });
	});

</script>