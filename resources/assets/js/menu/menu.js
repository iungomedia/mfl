$(document).ready(function(){
  	$(".listResultCenterBottomBar").owlCarousel({
  		margin:0,
	    loop:true,
	    autoWidth:true,
	    items:6,
	    nav:false,
	    dots:false,
	    autoplay:true
  	});

  	$('.triggerNavbar').click(function(){
  		$('.mflNavbarCollapse').addClass('open');
  	});

  	$('.closeMenuResponsive').click(function(){
  		$('.mflNavbarCollapse').removeClass('open');
  	});
});