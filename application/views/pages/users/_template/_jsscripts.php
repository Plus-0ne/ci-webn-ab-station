<!-- Scripts -->
<script type="text/javascript" src="<?=base_url()?>assets/users/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/popper.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/owlcarousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/navigation.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/users/js/global.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
		$( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
		$('.owl-carousel').owlCarousel({
			autoplay:true,
			rtl: false,
			autoplayHoverPause:true,
			autoplayTimeout:3000,
			smartSpeed :450,
			rewind:true,
			dots : true,
			margin: 5,
			responsiveClass:true,
			responsive:{
		        0:{
		            items:1,
		        },
		        768:{
		            items:3,
		        },
		        992:{
		            items:5,
		        },
		        1200:{
		            items:5,
		        }
		    }
		});
		var owl = $('.owl-carousel');
		owl.owlCarousel();
		// Go to the next item
		$('.customNextBtn').click(function() {
			owl.trigger('next.owl.carousel');
		})
		// Go to the previous item
		$('.customPrevBtn').click(function() {
  		// With optional speed parameter
    	// Parameters has to be in square bracket '[]'
    		owl.trigger('prev.owl.carousel', [300]);
		})
	});
</script>