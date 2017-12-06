var datos = new Array();
var jsonObj = [];
jQuery(document).ready(function($){
	$(".campo-busqueda").on('change',function(e){
		/*var campo=$(this).data("busqueda");
		var valor=$(this).val();
		alert('campo: '+campo+ ' - valor: '+valor);*/

		$("#modal_enviando").modal("show");
		$(".campo-busqueda").each(function(){
			var campo=$(this).data("busqueda");
			var categoria= $(this).data("categoria"); 
			var valor=$(this).val();	 
			/*if($(this).is('select')){
				console.log('es select');
				var valor=$(this).find(":selected").val();	 
			}
			else{
				console.log('no es select'); 
				var valor=$(this).val();	
			}*/
			//console.log('campo: '+campo+ ' - valor: '+valor);


			if(valor!="Todos" && valor!=""){
				//console.log('campo: '+campo+ ' - valor: '+valor+' - categoria: '+categoria);
				//datos[campo] = valor;

		        item = {}
		        item ["campo"] = campo;
		        item ["valor"] = valor;				
		        item ["categoria"] = categoria;	
				jsonObj.push(item);
			}
		});

		busqueda(1);

		//console.log('jsonObj: '+jsonObj); 

		/*$.post(ajaxurl, { action: 'busqueda', campos: jsonObj }, function(output) {
		     console.log(output); 		     
		     $("#resultado-busqueda").html(output); 
		     jsonObj = [];
		 });	*/ 	

 

		
	});

	function busqueda(npagina){
		$.ajax({
			url:ajaxurl,
			type:'POST',
			data: { action: 'busqueda', campos: jsonObj, pagina: npagina},
			success: function(output){					
				console.log(output);
			    $("#resultado-busqueda").html(output); 
			    jsonObj = [];	
			    $("#modal_enviando").modal("hide");			
			},
			error: function( jqXHR, textStatus, errorThrown){			
				alert('No se puede mostrar los contenidos, mensaje: ('+textStatus+ '/ '+errorThrown+')');	
				$("#modal_enviando").modal("hide");							
			} 
		});	 
	}

	$(document).on('click','.pagination a.page-numbers',function(e){
	    e.preventDefault(); 
	    url=$(this).attr('href');
	    pagina=url.substring(url.indexOf('=')+1);
	    busqueda(pagina); 
	    //alert(url.substring(url.indexOf('=')+1));     
	    /*if ($(this).hasClass('prev')||$(this).hasClass('next')) {
	        paginateNum = $(this).find('.prev-next').data('attr');
	        post_filter(paginateNum);
	    }
	    else{
	        paginateNum = $(this).text();
	        post_filter(paginateNum);
	    }*/
	    $("html, body").animate({ scrollTop: 0 }, "slow");
	});

});