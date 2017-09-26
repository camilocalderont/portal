$(document).ready(function(e){

	//Header con Scroll 
 

  	$('.navbarra').scrollToFixed({
        preFixed: function() { 
        	$(this).css('background', '#219cd3'); 
        	$('#menu-top').children('li').children('a').css('color','#ffffff');
        }, 
        postFixed: function() { 
        	$(this).css('background', '#ffffff'); 
			$('#menu-top').children('li').children('a').css('color','#525252'); 
        }
    }); 

	//Añadir efecto Espejo a imagenes Carousel, se elimina de la propia Api
	$(".imagenCategoria img").reflect();


	//Codigo para Menu Responsive
	var menuAbierto=false;
	$("#boton_menu").click(function(e){
		//alert("h");
		if(!menuAbierto){
			$("#contenedorMenu").animate({
				left: '0'
			});
			menuAbierto=true;
		}
		else{
			$("#contenedorMenu").animate({
				left: '-100%'
			});			
			menuAbierto=false;
		}
	});

	$("#menu-top li a").click(function(e){
		$("#contenedorMenu").animate({
			left: '-100%'
		});		
		menuAbierto=false;	
	});


	//Efectos para Descripción
	//inicia Ocultando Descripciones
	$(".imagenCategoria > .descripcionCategoria").addClass("hidden");

	//Asigna Alto de Imagenes a la descripción:
	var altoImg=$(".imagenCategoria img").first().outerHeight(true);
	//console.log('altoImg: '+altoImg);
	$(".imagenCategoria > .descripcionCategoria").each(function(){
		$(this).css('height',(altoImg-5)+'px');
	});


	$(".imagenCategoria").mousemove(function(e){
		var descripcion=$(this).children(".descripcionCategoria").eq(0);
		if(!descripcion.hasClass("fadeInUp")){
			var childOffset = $(this).children("div").children("img").offset(); 
			var altoImg = $(this).children("div").children("img").outerHeight(true);
			var relY = e.pageY - childOffset.top;			
			if(relY<=altoImg){
						
				//descripcion=$(this).nextAll(".descripcionCategoria").eq(0);
				descripcion.removeClass("hidden animated fadeOutDown");
				descripcion.addClass("visible animated fadeInUp");
			}
		}			
	});

	$(".imagenCategoria").hover(
		function(e){
			var childOffset = $(this).children("div").children("img").offset(); 
			var altoImg = $(this).children("div").children("img").outerHeight(true);
			var relY = e.pageY - childOffset.top;	
			console.log(' relY:'+relY+' - altoImg: '+altoImg); 
			if(relY<=altoImg){
				descripcion=$(this).children(".descripcionCategoria").eq(0);			
				//descripcion=$(this).nextAll(".descripcionCategoria").eq(0);
				descripcion.removeClass("hidden animated fadeOutDown");
				descripcion.addClass("visible animated fadeInUp");
			}
		},	
		function(e){ 
			descripcion=$(this).children(".descripcionCategoria").eq(0);	
			//descripcion=$(this).nextAll(".descripcionCategoria").eq(0);
			descripcion.removeClass("animated fadeInUp");
			descripcion.addClass("animated fadeOutDown"); 	
		}			
	);

	//Función para Anclas Generales
	$('a.ancla').click(function(){
		link=this.getAttribute('href').substr(this.getAttribute('href').indexOf("#"));
		$( window ).scrollTo( link, {
					duration: 500
		});
		return false;
	});

	//Si se redirecciona con enlace Ancla, hacer efecto Scroll
	if(window.location.href.indexOf("#")!==-1 && window.location.href.indexOf("#sf")===-1){
		link=window.location.href.substr(window.location.href.indexOf("#"));
		console.log("link inicial: "+link);
		$( window ).scrollTo( link, {
			duration: 500 //,
			//offset: { top: menuTop - navigationOuterHeight }
		});	
	}

	else
		$('a[href="#inicio"]').trigger("click");

	//Redireccionar cuando el ancla no esta en el inicio, o hacer Scroll en caso contrario
	$('.menu-item > a[href*="#"]').click(function(){
		
	//meniItem.bind('click',function( e ) {
		
		if(this.getAttribute('href')!=='#content'){
			//e.preventDefault(); 
			//obtener la base URL
			if (typeof location.origin === 'undefined')
			    location.origin = location.protocol + '//' + location.host;				
			baseUrl = location.origin + '/';

			//console.log("baseUrl: "+baseUrl+" | window.location.href: "+window.location.href);

			//baseUrl: http://localhost:4321/ | window.location.href: http://localhost:4321/portal/
			if(window.location.href.length > baseUrl.length && window.location.href.indexOf('#')===-1)
			{

				link=baseUrl+this.getAttribute('href');
				console.log("link 1:"+link);
				window.location.href=link;
			}
			else
			{	

				//link=this.getAttribute('href'); 
				link=this.getAttribute('href').substr(this.getAttribute('href').indexOf("#"));
				console.log("link 2:"+link);
				//$('html, body').animate({
				//	scrollTop: $( link ).offset().top
				//}, 500);
				
				$( window ).scrollTo( link, {
					duration: 500 //,
					//offset: { top: menuTop - navigationOuterHeight }
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
		/*mirror: {
			gap: 12,
			height: 0.2
		},*/
		buttonLeft: $("#nav > .left"),
		buttonRight: $("#nav > .right"),
		autoPlay: 1,
		autoPlayDelay: 3000,
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