// Global Script
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
	$(".password1").keyup(function(){
		$password1 = $('.password1').val();
		$password2 = $('.password2').val();

		var number = /([0-9])/;
		var alphabets = /([a-zA-Z])/;
		var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
		if ($(this).val() == "") 
		{
			$('.passwordprompts').remove();
		}
		else if ($(this).val().length < 6) 
		{
			$('#passwordprompt').html('<div style="padding: 0px;" class="prompt-warning passwordprompts"><i class="fas fa-exclamation-circle"></i> Weak Password </div>');
		}
		else if ($(this).val().match(number) && $(this).val().match(alphabets) && $(this).val().match(special_characters))
		{
			$('#passwordprompt').html('<div style="padding: 0px;" class="prompt-success passwordprompts"><i class="fas fa-check-circle"></i> Password Strong </div>');
		}
		else if ($(this).val().length > 6)
		{
			$('#passwordprompt').html('<div style="padding: 0px;" class="prompt-info passwordprompts"><i class="fas fa-info-circle"></i> Medium password</div>');
		}
		else if ($(this).val() == $password2) 
		{
			$('#passwordprompt').html('<div style="padding: 0px;" class="prompt-success passwordprompts"><i class="fas fa-check-circle"></i> Password Match </div>');
		}
	});
	$(".password2").keyup(function(){
		$password1 = $('.password1').val();
		$password2 = $('.password2').val();
		if ($password2 == "" || $password1 == "") 
		{
			$('.passwordprompts').remove();
		}
		else if ($password1 == $password2) 
		{
			$('#passwordprompt').html('<div style="padding: 0px;" class="prompt-success passwordprompts"><i class="fas fa-check-circle"></i> Password Match </div>');
		}
		else
		{
			$('#passwordprompt').html('<div style="padding: 0px;" class="prompt-warning passwordprompts"><i class="fas fa-exclamation-circle"></i> Password didn\'t Match</div>');
		}
	});
	$('#summernote').summernote({
		placeholder: '',
		tabsize: 1,
		height : 150
	});
	
	$('#payment1').click(function(){
		if($('#input1').prop('checked'))
		{
			$('#input1').prop("checked", false);
			$(this).removeClass('paymentselected');
			$('#checked-icon1').removeClass('checked-payments-colored');
			$('#checked-icon2').removeClass('checked-payments-colored');
			$('#checked-icon3').removeClass('checked-payments-colored');
		}
		else
		{
			$('#input1').prop("checked", true);
			$(this).addClass('paymentselected');
			$('#checked-icon1').addClass('checked-payments-colored');
			$('#checked-icon2').removeClass('checked-payments-colored');
			$('#checked-icon3').removeClass('checked-payments-colored');
			$('#payment2').removeClass('paymentselected');
			$('#payment3').removeClass('paymentselected');
		}
	});
	$('#payment2').click(function(){
		if($('#input2').prop('checked')){
			$('#input2').prop("checked", false);
			$(this).removeClass('paymentselected');
			$('#checked-icon1').removeClass('checked-payments-colored');
			$('#checked-icon2').removeClass('checked-payments-colored');
			$('#checked-icon3').removeClass('checked-payments-colored');
		}
		else
		{
			$('#input2').prop("checked", true);
			$(this).addClass('paymentselected');
			$('#checked-icon1').removeClass('checked-payments-colored');
			$('#checked-icon2').addClass('checked-payments-colored');
			$('#checked-icon3').removeClass('checked-payments-colored');
			$('#payment1').removeClass('paymentselected');
			$('#payment3').removeClass('paymentselected');
			
		}
	});
	$('#payment3').click(function(){
		if($('#input3').prop('checked')){
			$('#input3').prop("checked", false);
			$(this).removeClass('paymentselected');
			$('#checked-icon1').removeClass('checked-payments-colored');
			$('#checked-icon2').removeClass('checked-payments-colored');
			$('#checked-icon3').removeClass('checked-payments-colored');
		}
		else
		{
			$('#input3').prop("checked", true);
			$(this).addClass('paymentselected');
			$('#checked-icon1').removeClass('checked-payments-colored');
			$('#checked-icon2').removeClass('checked-payments-colored');
			$('#checked-icon3').addClass('checked-payments-colored');
			$('#payment1').removeClass('paymentselected');
			$('#payment3').removeClass('paymentselected');
		}
	});	
});