function ResizeModule() {
	var Xwidth=$(window).width();
	var Yheight=$(window).height();
	var h = 0;
	$('.item-style3').attr('style','');
	$('.item-style3').each(function() {
		var i = $(this).innerHeight();
		if(i>h) h = i;
	});
	$('.item-style3').css({'height':h});
}

function get_royalSlider(id) {
	$(id).royalSlider({
		fullscreen: {
			enabled: true,
			nativeFS: true
		},
		autoPlay: {
    		enabled: true,
    		pauseOnHover: true,
			stopAtAction:false,
    	},
		controlNavigation: 'thumbnails',
		autoScaleSlider: true, 
		autoScaleSliderWidth: 800,     
		autoScaleSliderHeight: 700,
		loop: false,
		navigateByClick: true,
		numImagesToPreload:2,
		arrowsNav:true,
		arrowsNavAutoHide: true,
		arrowsNavHideOnTouch: true,
		keyboardNavEnabled: true,
		fadeinLoadedSlide: true,
		globalCaption: true,
		globalCaptionInside: false,
		thumbs: {
			appendSpan: true,
			firstMargin: true,
			paddingBottom: 4
		}
	});	
}

function validate_comment(target) {

	if($(target).length) {
		var url = $(target).attr('data-url');
		var error1=$(target + ' #name').attr('placeholder');
		var error2=$(target + ' #email').attr('placeholder');
		var error3=$(target + ' #phone').attr('placeholder');
		var error4=$(target + ' #body').attr('placeholder');
		var id_lang = $('body').attr('data-id_lang');
		
		$(target).validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				},
				phone: "required",
				body: "required",
			},
			messages: {
				name: error1,
				email: error2,
				phone: error3,
				body: error4,
			},
			highlight : function (element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight : function (element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			submitHandler : function(form) {				
				$.ajax({
					url: url,
					type: 'post',
					data: $(form).serialize() + "&id_lang="+id_lang,
					dataType: "json",
					success: function(data) {
						$(target).get(0).reset();	
						$(target + ' .alert').removeClass('hide');
						setTimeout(function(){ 
							$(target + ' .alert').addClass('hide'); 
						},1000);
					}  				
				});				
			}	
		}).resetForm();
	}

}
function comment() {
	validate_comment('.form-comment');
	$('.load-form-comment').on('click','.div-btn-comment .btn-del-comment',function() {
		$('.load-form-comment').html('');
	});
	$('.repply-comment').on('click',function() {
		var div_load = $(this).attr('data-load');
		var html = '<hr>'+$('.box-form-comment').html();
		var id_parent = $(this).attr('id_parent');
		$('.load-form-comment').html('');
		$(div_load).html(html);
		$('.load-form-comment' + div_load + ' .div-btn-comment').append('<button type="button" class="btn btn-danger btn-del-comment">Không gửi</button>');
		$('.load-form-comment' + div_load + ' #id_parent').val(id_parent);
		validate_comment('.load-form-comment' + div_load + ' .form-comment');
	});
}

function visited() {
	if($(".load-visited").length) {
		var url = $(".load-visited").attr('data-url');
		var id_lang = $('body').attr('data-id_lang');
		$.ajax({
			url: url,
			data: {'do':'visited','id_lang':id_lang},
			type: 'post',
			success: function(data) {
				setTimeout(function() {
					$('.load-visited').html(data);
				},200);
			}  				
		});			
	}	
}

function lang() {
	$('.change-lang').on('click',function(e) {
		e.preventDefault();
		var href = $(this).attr('data-href');
		var code = $(this).attr('data-code');
		var url = $(this).attr('data-url');
		var id_lang = $('body').attr('data-id_lang');
		
		$.ajax({
			url: url,
			type: "POST",
			data: {'code':code, 'href':href, 'id_lang':id_lang},	
			//dataType: "json",
			success:function(data){
				if(data=='home') {
					parent.window.location.reload(true);
				}
				else {
					window.location.href = data;
				}				
			}
		});		
	});
}

function sroll_top() {
	
	$('.fback-top').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 500);
		return false;
	});		
}


$(document).ready(function() {

	$(window).on('resize load',function() {
		ResizeModule();
	});
	
	$('[data-toggle="tooltip"]').tooltip();
	
	sroll_top();
	
	plyr.setup();
	
	comment();
	
	visited();
	
	lang();
	
	$("img.lazy").lazyload({
		effect : "fadeIn"
	});
	
	$('.icheck').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%'
	}).on('ifChanged', function(e) {
		$(this).valid(); 
	});
	
	$('.select2').select2();
	$("select").on("select2:close", function (e) {  
		$(this).valid(); 
	});	
		
	
	$('.view-user-module .hide-view-user').on('click',function() {
		$('.view-user-module').toggleClass('hide-view');
	})
	
		
	$('#royalSlider-1').royalSlider({
		fullscreen: {
			enabled: true,
			nativeFS: true
		},
		autoPlay: {
    		enabled: true,
    		pauseOnHover: true,
			stopAtAction:false,
    	},
		controlNavigation: 'thumbnails',
		autoScaleSlider: true, 
		autoScaleSliderWidth: 800,     
		autoScaleSliderHeight: 1200,
		loop: false,
		navigateByClick: true,
		numImagesToPreload:2,
		arrowsNav:true,
		arrowsNavAutoHide: true,
		arrowsNavHideOnTouch: true,
		keyboardNavEnabled: true,
		fadeinLoadedSlide: true,
		globalCaption: true,
		globalCaptionInside: false,
		thumbs: {
			appendSpan: true,
			firstMargin: true,
			paddingBottom: 4
		}
	});
	
	$('#royalSlider-2').royalSlider({
		fullscreen: {
			enabled: true,
			nativeFS: true
		},
		autoPlay: {
    		enabled: true,
    		pauseOnHover: true,
			stopAtAction:false,
    	},
		controlNavigation: 'thumbnails',
		autoScaleSlider: true, 
		autoScaleSliderWidth: 1000,     
		autoScaleSliderHeight: 600,
		loop: false,
		navigateByClick: true,
		numImagesToPreload:2,
		arrowsNav:true,
		arrowsNavAutoHide: true,
		arrowsNavHideOnTouch: true,
		keyboardNavEnabled: true,
		fadeinLoadedSlide: true,
		globalCaption: true,
		globalCaptionInside: false,
		thumbs: {
			appendSpan: true,
			firstMargin: true,
			paddingBottom: 4
		}
	});
	

	$('.ajax-list-content').on('click','.module-ajax-content a',function() {
		var page = $(this).attr('data-ci-pagination-page');
		var per_page = $(this).parent().attr('per_page');
		var target = $(this).parent().attr('target');
		var url = $(this).parent().attr('url');
		var id = $(this).parent().attr('id');
		var id_lang = $('body').attr('data-id_lang');

		$.ajax({
			url: url,
			type: "POST",
			data: {'id':id, 'page':page, 'per_page':per_page, 'id_lang':id_lang},	
			//dataType: "json",
			success:function(data){
				$(target).html(data);
			}
		});
		
		return false;
	});
	
	
	if($(".form-contact").length) {
		var error1=$('.form-contact #title').attr('error');
		var error2=$('.form-contact #name').attr('error');
		var error3=$('.form-contact #email').attr('error');
		var error4=$('.form-contact #phone').attr('error');
		var error5=$('.form-contact #address').attr('error');
		var error6=$('.form-contact #body').attr('error');
		var error7=$('.form-contact #captcha').attr('error');
		var error8=$('.form-contact #captcha').attr('error1');
		
		$(".form-contact").validate({
			rules: {
				title: "required",
				name: "required",
				email: {
					required: true,
					email: true
				},
				phone: "required",
				address: "required",
				body: "required",
				captcha: {
					required: true,
					equalTo: "#re_captcha",
				},
			},
			messages: {
				title: error1,
				name: error2,
				email: error3,
				phone: error4,
				address: error5,
				body: error6,
				captcha: {
					required: error7,
					equalTo: error8,
				},
			},
			highlight : function (element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight : function (element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
		});	
	}
	
	$('.img-refresh-captcha').on('click',function() {
		var url = $(this).attr('url');
		var id_lang = $('body').attr('data-id_lang');

		$.ajax({
			url: url,
			type: "POST",
			data: {'id_lang':id_lang},
			dataType: "json",
			success:function(data){
				$('.load-captcha-img').html(data.image);
				$('.show-re-captcha').val(data.word);
			}
		});

	});	
	
	
	
	$('.btn-addcart').on('click',function() {
		var token = $(this).attr('data-token');
		var url = $(this).attr('data-url');
		var id_lang = $('body').attr('data-id_lang');
		
		$.ajax({
			url: url,
			type: "POST",
			data: {'token':token,'id_lang':id_lang},
			//dataType: "json",
			success:function(data){
				$('#model_product .box').html('');
				$('#model_product .box').html(data);
				$('#model_product').modal('show');
				setTimeout(function() { get_royalSlider('#royalSlider-2') },400);
			}
		});		
	});
	
	$('.table-cart .del-row-cart').click(function() {
		var alert=$(this).attr('alert');
		var row=$(this).attr('row');
		var url=$(this).attr('url');
		var id_lang = $('body').attr('data-id_lang');
		
		swal({
			title: alert,
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'OK',
			closeOnConfirm: true
		},
		function(){
			$.ajax({
				url: url,
				type: "POST",
				data: {'row':row,'id_lang':id_lang},
				dataType: "json",
				success:function(data){
					if(data.item>0) {
						$('.row-cart'+row).remove();
						$('.total-cart-price').html(data.total);
					}
					else {
						location.reload();
					}
				}
			});
		});
	});
	
	$('.table-cart .del-all-cart').click(function() {
		var alert=$(this).attr('alert');
		var url=$(this).attr('url');
		var id_lang = $('body').attr('data-id_lang');
		
		swal({
			title: alert,
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'OK',
			closeOnConfirm: true
		},
		function(){
			$.ajax({
				url: url,
				data: {'id_lang':id_lang},
				type: "POST",
				dataType: "json",
				success:function(data){
					location.reload();
				}
			});
		});
	});

	$('.table-cart .update-cart').blur(function(){
		var qty=$(this).val();
		var row=$(this).attr('row');
		var url = $(this).attr('url');
		var alert = $(this).attr('alert');
		var id_lang = $('body').attr('data-id_lang');
		
		if(qty>0) {
			$.ajax({
				url: url,
				type: "POST",
				data: {'row': row, 'qty': qty, 'id_lang':id_lang},	
				dataType: "json",
				success:function(data){
					$('.row-cart'+row+' .subtotal-cart-price').html(data.subtotal);
					$('.total-cart-price').html(data.total);
				}
			});
		}
		else {
			swal(alert,"", "error");
			$(this).focus();
		}
	});	


	if($(".form-cart").length) {
		var error1=$('.form-cart #name').attr('error');
		var error2=$('.form-cart #email').attr('error');
		var error3=$('.form-cart #phone').attr('error');
		var error4=$('.form-cart #address').attr('error');
		var error5=$('.form-cart #body').attr('error');
		
		$(".form-cart").validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				},
				phone: "required",
				address: "required",
				body: "required",				
			},
			messages: {
				name: error1,
				email: error2,
				phone: error3,
				address: error4,
				body: error5,				
			},
			highlight : function (element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight : function (element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
		});	
	}
	
	$('.select-payment-cart').on('change',function() { 
		var token = $(this).val();
		var url = $(this).attr('data-url');
		var id_lang = $('body').attr('data-id_lang');
		
		$.ajax({
			url: url,
			type: "POST",
			data: {'token': token, 'id_lang':id_lang},	
			dataType: "json",
			success:function(data){
				$('.show-payment-cart').html(data.body);
			}
		})
	});
	
	
	$('.logout-user').on('click',function() {
		var url = $(this).attr('data-url');
		var id_lang = $('body').attr('data-id_lang');
		
		$.ajax({
			url: url,
			type: "POST",
			data: {'do': 'logout', 'id_lang':id_lang},	
			dataType: "json",
			success:function(data){
				if(data.ok=='ok') {
					window.location.href = data.url; 
				}
			}
		});
	})
	
	if($(".form-register").length) {
		var error1=$('.form-register #username').attr('data-error');
		var url_username=$('.form-register #username').attr('data-url');
		var error_username=$('.form-register #username').attr('data-error-1');
		var error2=$('.form-register #pass').attr('data-error');
		var error3=$('.form-register #re_pass').attr('data-error');
		var error4=$('.form-register #name').attr('data-error');
		var error5=$('.form-register #email').attr('data-error');
		var url_email=$('.form-register #email').attr('data-url');
		var error_email=$('.form-register #email').attr('data-error-1');
		var error6=$('.form-register #phone').attr('data-error');
		var error7=$('.form-register #address').attr('data-error');
		var error8=$('.form-register #captcha').attr('error');
		var error9=$('.form-register #captcha').attr('error1');
		var id_lang = $('body').attr('data-id_lang');
		
		$(".form-register").validate({
			rules: {
				username: {
					required: true,
					remote: {
						url: url_username,
						type: "post",
						data: {
							username: function() {
								return $('.form-register #username').val();
							},
							'id_lang':id_lang,
						}					
					}
				},
				pass: "required",
				re_pass: {
					required: true,
					equalTo: ".form-register #pass",
				},				
				name: "required",
				email: {
					required: true,
					email: true,
					remote: {
						url: url_email,
						type: "post",
						data: {
							email: function() {
								return $('.form-register #email').val();
							},
							token: function() {
								return $('.form-register').attr('token');
							},
							'id_lang':id_lang,
						}
						
					}
				},
				phone: "required",
				address: "required",
				day: "required",	
				month: "required",	
				year: "required",	
				gender: "required",	
				captcha: {
					required: true,
					equalTo: "#re_captcha",
				},	
			},
			messages: {
				username: {
					required: error1,
					remote: error_username
				},
				pass: error2,
				re_pass: {
					required: error2,
					equalTo: error3,
				},
				name: error4,
				email: {
					required: error5,
					email: error5,
					remote: error_email,
				},
				phone: error6,
				address: error7,
				day: '',
				month: '',
				year: '',
				gender: '',
				captcha: {
					required: error8,
					equalTo: error9,
				},	
			},
			highlight : function (element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight : function (element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			submitHandler : function(form) {				
				$.ajax({
					url: $(form).attr('action'),
					type: 'post',
					data: $(form).serialize() + "&id_lang="+id_lang,
					dataType: "json",
					beforeSend: function() {
						$('.custom-tab2 .mask').fadeIn();
					},
					success: function(data) {
						if(data=='ok') {
							$(form).get(0).reset();
							$(".form-register .alert").removeClass('hide');
							setTimeout(function() {
								$(".form-register .alert").addClass('hide');
								$('#model_user').modal('hide');
							},1000);
						}
						else {
							alert('error');
						}
					},
					complete: function() {
						$('.custom-tab2 .mask').hide();
					},					
				});				
			}
		});	
	}	
	
	
	if($(".form-login").length) {

		var error1=$('.form-login #username').attr('data-error');
		var error2=$('.form-login #pass').attr('data-error');
		var id_lang = $('body').attr('data-id_lang');
		
		$(".form-login").validate({
			rules: {
				username: "required",
				pass: "required",					
			},
			messages: {
				username: error1,
				pass: error2,
			},
			highlight : function (element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight : function (element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			submitHandler : function(form) {				
				$.ajax({
					url: $(form).attr('action'),
					type: 'post',
					data: $(form).serialize() + "&id_lang="+id_lang,
					dataType: "json",
					beforeSend: function() {
						$('.custom-tab2 .mask').fadeIn();
					},
					success: function(data) {
						if(data=='ok') {
							$(form).get(0).reset();
							$(".form-login .alert.alert-success").removeClass('hide');
							setTimeout(function() {
								$(".form-login .alert").addClass('hide');
								$('#model_user').modal('hide');
								parent.window.location.reload(true);
							},1000);
						}
						else {
							$(".form-login .alert.alert-danger").removeClass('hide');
							setTimeout(function() {
								$(".form-login .alert.alert-danger").addClass('hide');
							},1000);
						}
						$('.custom-tab2 .mask').hide();
					}  				
				});				
			}
		});	
	}	

	if($(".form-update-user").length) {

		var error1=$('.form-update-user #name').attr('data-error');
		var error2=$('.form-update-user #email').attr('data-error');
		var url_email=$('.form-update-user #email').attr('data-url');
		var error_email=$('.form-update-user #email').attr('data-error-1');
		var error3=$('.form-update-user #phone').attr('data-error');
		var error4=$('.form-update-user #address').attr('data-error');
		var id_lang = $('body').attr('data-id_lang');
		
		$(".form-update-user").validate({
			rules: {	
				name: "required",
				email: {
					required: true,
					email: true,
					remote: {
						url: url_email,
						type: "post",
						data: {
							email: function() {
								return $('.form-update-user #email').val();
							},
							token: function() {
								return $('.form-update-user #token').val();
							},
							'id_lang' : id_lang,
						}		
					}
				},
				phone: "required",
				address: "required",
				day: "required",	
				month: "required",	
				year: "required",	
				gender: "required",						
			},
			messages: {
				name: error1,
				email: {
					required: error2,
					email: error2,
					remote: error_email,
				},
				phone: error3,
				address: error4,
				day: '',
				month: '',
				year: '',
				gender: '',
			},
			highlight : function (element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight : function (element) {
				$(element).closest('.form-group').removeClass('has-error');
			}
		});	
		
		
		$('.delpic').click(function(){
			var token=$(this).attr('token');
			var title=$(this).attr('title');
			var url = $(this).attr('url');
			var id_lang = $('body').attr('data-id_lang');
			
			swal({
				title: title,
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'OK',
				closeOnConfirm: true
			},
			function(){
				$.ajax({
					url: url,
					data: {'token': token,'id_lang':id_lang},	
					type: 'post',
					dataType: "json",
					success:function(data){
						if(data.result=='ok') {
							$('.delpic').hide();
						}
						else {
							alert('không xóa được');
						}
							
					}
				});
			});

		});	
	
	}	

	if($(".form-change-pass-user").length) {

		var error1=$('.form-change-pass-user #pass').attr('data-error');
		var error2=$('.form-change-pass-user #re_pass').attr('data-error');
	
		$(".form-change-pass-user").validate({
			rules: {
				pass: "required",
				re_pass: {
					required: true,
					equalTo: ".form-change-pass-user #pass",
				},													
			},
			messages: {
				pass: error1,
				re_pass: {
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
			
		});			
	}
	
	if($(".form-forget-pass").length) {
		var error1=$('.form-forget-pass #email').attr('error');
		var error2=$('.form-forget-pass #captcha').attr('error');
		var error3=$('.form-forget-pass #captcha').attr('error1');
		
		$(".form-forget-pass").validate({
			rules: {
				email: {
					required: true,
					email: true
				},
				captcha: {
					required: true,
					equalTo: "#re_captcha",
				},
			},
			messages: {
				email: error1,
				captcha: {
					required: error2,
					equalTo: error3,
				},
			},
			highlight : function (element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight : function (element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
		});	
	}	

	$('.delete-confirm').click(function(event) {
		title=$(this).attr('title');
		success=$(this).attr('success');
		if($(this).attr('onclick')=='return false;')
		 	return false;
		event.preventDefault();
		var linkLocation = this.href;
			
		swal({
			title: title,
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'OK',
			closeOnConfirm: true
		},
		function(){
			//swal(success, "", "success");
			window.location = linkLocation;
		});
	})	
	
			
});