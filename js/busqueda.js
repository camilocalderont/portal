var datos = new Array();
var jsonObj = [];
jQuery(document).ready(function($){
	$(".campo-busqueda").on('change',function(e){
		/*var campo=$(this).data("busqueda");
		var valor=$(this).val();
		alert('campo: '+campo+ ' - valor: '+valor);*/


		$(".campo-busqueda").each(function(){
			var campo=$(this).data("busqueda");
			var categoria= $(this).data("categoria"); 
			var valor=$(this).val();	
			//console.log('campo: '+campo+ ' - valor: '+valor);


			if(valor!="Todos" && valor!=""){
				console.log('campo: '+campo+ ' - valor: '+valor+' - categoria: '+categoria);
				//datos[campo] = valor;

		        item = {}
		        item ["campo"] = campo;
		        item ["valor"] = valor;				
		        item ["categoria"] = categoria;	
				jsonObj.push(item);
			}
		});

		console.log('jsonObj: '+jsonObj); 

		$.post(ajaxurl, { action: 'busqueda', campos: jsonObj }, function(output) {
		     console.log(output);
		     jsonObj = [];
		 });	 	

		/*$.ajax({
			url:ajaxurl,
			type:'POST',
			data: datos,
			success: function(data){					
				console.log(data);
			},
			error: function( jqXHR, textStatus, errorThrown){			
				alert('No se puedo guardar la prioridad, mensaje: ('+textStatus+ '/ '+errorThrown+')');					
			} 
		});	*/


	});
});