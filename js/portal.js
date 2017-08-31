$(document).ready(function(e){
	$('a').click(function(){
		/*$('html, body').animate({
			scrollTop: $( $(this).attr('href') ).offset().top
		}, 500);*/
		$( window ).scrollTo( $(this).attr('href'), {
					duration: 500
		});
		return false;
	});
	$('a[href="#inicio"]').trigger("click");



	//Esta version no admite .on
	$('.menu-item a[href^="#"]').on('click', function(e) {
	//$( "body" ).delegate( '.menu-item a[href^="#"]', "click", function(e) {		
	//meniItem.bind('click',function( e ) {
		if(this.getAttribute('href')!=='#content'){
			e.preventDefault(); 
			//obtener la base URL
			if (typeof location.origin === 'undefined')
			    location.origin = location.protocol + '//' + location.host;				
			baseUrl = location.origin + '/';

			//alert("baseUrl: "+baseUrl+" | window.location.href: "+window.location.href);

			//baseUrl: http://localhost:4321/ | window.location.href: http://localhost:4321/portal/
			if(window.location.href.length > baseUrl.length && window.location.href.indexOf('#')===-1)
			{

				link=baseUrl+this.getAttribute('href');

				window.location.href=link;
			}
			else
			{					
				link=this.getAttribute('href');
				
				/*$('html, body').animate({
					scrollTop: $( link ).offset().top
				}, 500);*/
				
				$( window ).scrollTo( link, {
					duration: 1000 /*,
					offset: { top: menuTop - navigationOuterHeight }*/
				});					
				
			}					
						
		}

	});		



});

$(function() {
	var showcase = $("#showcase"), title = $('#item-title')

	showcase.Cloud9Carousel( {
		yOrigin: 42,
		yRadius: 48,
		mirror: {
			gap: 12,
			height: 0.2
		},
		buttonLeft: $("#nav > .left"),
		buttonRight: $("#nav > .right"),
		autoPlay: 1,
		bringToFront: true,
		onRendered: rendered,
		onLoaded: function() {
			showcase.css( 'visibility', 'visible' )
			showcase.css( 'display', 'none' )
			showcase.fadeIn( 1500 )
		}
	} );

	function rendered( carousel ) {
		title.text( carousel.nearestItem().element.alt )
		// Fade in based on proximity of the item
		var c = Math.cos((carousel.floatIndex() % 1) * 2 * Math.PI)
		title.css('opacity', 0.5 + (0.5 * c))
	}

	//
	// Simulate physical button click effect
	//
	$('#nav > button').click( function( e ) {
		var b = $(e.target).addClass( 'down' )
		setTimeout( function() { b.removeClass( 'down' ) }, 80 )
	});

	$(document).keydown( function( e ) {
	//
	// More codes: http://www.javascripter.net/faq/keycodes.htm
	//
	switch( e.keyCode ) {
		/* left arrow */
		case 37:
		$('#nav > .left').click()
		break

		/* right arrow */
		case 39:
		$('#nav > .right').click()
	}
	});
});