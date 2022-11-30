$(document).ready(function() {
    "use strict";
	
	
	/*----------------------------- Scroll To Top -----------------------*/
	$(window).on('scroll',function () {
		if ($(this).scrollTop() > 600) {
			$('#scrollup').fadeIn();
		} else {
			$('#scrollup').fadeOut();
		}
	});

	$('#scrollup').on('click',function(){
		$('html, body').animate({
		scrollTop: 0
	}, 1500);
	return false;
	});
	
	
	/*-------------- Counterup ------------------*/	
	$('.counter').counterUp({
		delay: 10,
		time: 10000
	});
	
	/*-7.372034, 112.656812
	-------------- Gmaps ------------------*/	
	var map;
	$('.ev-map-display').each(function() {
	  	var element = $(this).attr('id');
	  	map = new GMaps({
	  		el: '#' + element,
		lat: -7.372162,
		lng: 112.656445,
		scrollwheel: false,
	});
	  //locations request
	  map.getElevations({
		locations : [[-7.372162,112.656445]],
		  callback : function (result, status){
		  if (status == google.maps.ElevationStatus.OK) {
			for (var i in result){
			 map.addMarker({
			  lat: result[i].location.lat(),
			  lng: result[i].location.lng(),
			  title: 'Marker with InfoWindow',
				icon:'assets/images/icon/mapicon.png',
			  infoWindow: {
				content: 'PT. WIDAYA INTI PLASMA'
			  }
			});
		   }
		  }
		}
	  });    
	});
	
	
    /*----------------------------- wow  -----------------------*/
	var wow = new WOW(
		{
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true,       // act on asynchronously loaded content (default is true)
			callback:     function(box) {
				// the callback is fired every time an animation is started
				// the argument that is passed in is the DOM node being animated
			},
			scrollContainer: null // optional scroll container selector, otherwise use window
		}
	);
	wow.init();
	
	
	/*-------------- Search-box ------------------*/	
	var submitIcon = $('.searchbox-icon');
	var inputBox = $('.searchbox-input');
	var searchBox = $('.searchbox');
	var isOpen = false;
	submitIcon.click(function(){
		if(isOpen == false){
			searchBox.addClass('searchbox-open');
			inputBox.focus();
			isOpen = true;
		} else {
			searchBox.removeClass('searchbox-open');
			inputBox.focusout();
			isOpen = false;
		}
	});  
	submitIcon.mouseup(function(){
		return false;
	});
	searchBox.mouseup(function(){
		return false;
	});
	$(document).mouseup(function(){
		if(isOpen == true){
			$('.searchbox-icon').css('display','block');
			submitIcon.click();
		}
	});
		
	function buttonUp(){
		var inputVal = $('.searchbox-input').val();
		inputVal = $.trim(inputVal).length;
		if( inputVal !== 0){
			$('.searchbox-icon').css('display','none');
		} else {
			$('.searchbox-input').val('');
			$('.searchbox-icon').css('display','block');
		}
	}
		
	$('#myTabs a').on('click',function (e) {
	  e.preventDefault()
	  $(this).tab('fast')
	})
	
	
	/*-------------- lsb lightbox ------------------*/	
	$.fn.lightspeedBox();
	
	
	/*-------------- Responsive-Menu ------------------*/	
	jQuery(function ($) {
		var menu = $('.rm-nav').rMenu({
		});
	});
	
	
	/*-------------- Pre-loader ------------------*/	
	$("#loading").delay(200).fadeOut(500);
	$("#loading-center").on('click',function() {
	$("#loading").fadeOut(500);
	});
	
	
}(jQuery));