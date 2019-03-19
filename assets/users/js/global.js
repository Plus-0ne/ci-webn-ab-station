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
	$("#hydrocheck").change(function(){
		$("#hydroform").submit();
	});
});