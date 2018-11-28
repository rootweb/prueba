/*=============================================
PAGINACIÓN
=============================================*/

var buscador = $("#paginacion").attr("buscador");
var pagina = Number($("#paginacion").attr("pagina"));
var totalPag = Number($("#paginacion").attr("totalPag"));

var tipo = $("#paginacion").attr("tipo");
var orden = $("#paginacion").attr("orden");

if(idioma == "es"){

	var first = "Primero";
	var last = "Último";

}else{

	var first = "First";
	var last = "Last";
}

if(window.matchMedia("(max-width:575px)").matches){

 	var visiblePages = 3;

}else{

	var visiblePages = 5;
}


if($("#paginacion").length != 0){

	$("#paginacion").twbsPagination({
		totalPages: totalPag,
		visiblePages: visiblePages,
		startPage: pagina,
		first: first,
		last: last,
		prev: '<i class="fas fa-angle-left"></i>',
		next: '<i class="fas fa-angle-right"></i>'

	}).on('page', function(evt, page){

		if(tipo == "search"){
		
			window.location = url+idioma+"/search/"+orden+"/"+buscador+"/"+page;

		}else{

			window.location = url+idioma+"/"+buscador+"/"+orden+"/"+page;
		}

	});

}