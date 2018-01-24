function ResizeWindows() {
	var Xwidth=$(window).width();
	var Yheight=$(window).height();
}


$(document).ready(function() {
	
	
	$(window).on('resize load',function() {
		ResizeWindows();
	});
	
	$('ul.navbar-nav > li > a').on('click',function() {
		var Xwidth=$(window).width();
		if(Xwidth>990) {
			var url = $(this).attr('href');
			window.location.href = url;
		}	
	});
	


	setTimeout(function() {

		if($('.owl-partner').length) {
			$('.owl-partner').owlCarousel({
				items : 6,
				itemsDesktop : [1199, 6],
				itemsDesktopSmall : [979, 5],
				itemsTablet : [768, 4],
				itemsTabletSmall : false,
				itemsMobile : [479, 2],
				navigation : true,
				navigationText : ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
				pagination:false,
				rewindNav:true,
				autoHeight : false,
				autoPlay:true,
				stopOnHover : true,
				afterAction: function(){
				
				}
			});	
		}	
		
	},300);

			
});