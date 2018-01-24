$(document).ready(function() {
	if($(".form-download").length) {
		var error1 = $('.form-download #captcha').attr('error');
		var error2 = $('.form-download #captcha').attr('error1');
		
		$(".form-download").validate({
			rules: {
				captcha: {
					required: true,
					equalTo: "#re_captcha",
				},
			},
			messages: {
				captcha: {
					required: error1,
					equalTo: error2,
				},
			},
			highlight : function (element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight : function (element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			submitHandler : function(form) {
				$(".form-download #captcha").val('');
				form.submit();
			}		
		});	
	}
	
	$('.img-refresh-captcha').on('click',function() {
		var url = $(this).attr('url');

		$.ajax({
			url: url,
			type: "POST",
			dataType: "json",
			success:function(data){
				$('.load-captcha-img').html(data.image);
				$('.show-re-captcha').val(data.word);
			}
		});

	});			
})