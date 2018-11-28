/*=====================================
			BUSCADOR CON CLICK
======================================-*/


$(".buscador").change(function(){

	var busqueda = $(this).val();

	var expresion = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/;

	if(!expresion.test(busqueda)){

		$(".buscador").val("");

	}else{

		var evaluarBusqueda = busqueda.replace(/[áéíóúÁÉÍÓÚ ]/g, "-");

		var rutaBuscador = evaluarBusqueda;
		
		$(".buscar").click(function(){

			if($(".buscador").val() != ""){

				window.location = url+idioma+"/search/relevance/"+rutaBuscador+"/1";

			}


		})

	}

})


/*=====================================
			BUSCADOR CON ENTER
======================================-*/ 


$(document).on("keyup", ".buscador", function(event){

	event.preventDefault();

	if(event.keyCode == 13 && $(".buscador").val() != ""){

		var busqueda = $(".buscador").val();

		var expresion = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(busqueda)){

			$(".buscador").val("");

		}else{

			var evaluarBusqueda = busqueda.replace(/[áéíóúÁÉÍÓÚ ]/g, "-");

			var rutaBuscador = evaluarBusqueda;
			
			window.location = url+idioma+"/search/relevance/"+rutaBuscador+"/1";

		}

	}

})


