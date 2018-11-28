$('.datepicker').datepicker({
	startDate: '0d',
	format: 'yyyy-mm-dd 23:59:59'
});

/*=============================================
TRADUCTOR
=============================================*/

var idioma = $("#idioma").val();
var url = $("#ruta").val();


$.ajax({

	url: url+"idiomas.json",
	method: "GET",
	dataType: "json",
	success: function(respuesta) {

		function traducir(texto) {

			if (idioma == "es") {
				return texto;
			} else if (idioma == "en") {

				return (respuesta[texto][0].en)


			} else {
				return (respuesta[texto][1].pt)
			}
		}



		/*=============================================
		IDENTIFICAR LA PANTALLA
		=============================================*/

		if (window.matchMedia("(min-width:1200px)").matches) {

			$(document).on("mouseover", ".listaCategorias li", function() {

				var enlace = $(this).attr("idCategoria");

				verSubcategorias(enlace);

			})

		} else {

			$(document).on("click", ".listaCategorias li", function() {

				var enlace = $(this).attr("idCategoria");

				verSubcategorias(enlace);

			})

		}

		/*=============================================
		CAMBIOS EN LA VENTANA MODAL DE CATEGORÍAS
		=============================================*/

		function verSubcategorias(enlace) {

			/*=============================================
			CAMBIOS EN SUBCATEGORIAS
			=============================================*/

			var datosSubcategorias = new FormData();
			datosSubcategorias.append("idCategoria", enlace);
			datosSubcategorias.append("item", "id_categoria");
			datosSubcategorias.append("tabla", "subcategorias");

			$.ajax({

				url: url+"ajax/categorias.ajax.php",
				method: "POST",
				data: datosSubcategorias,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta) {

					/*=============================================
					CAMBIOS SÓLO EN MÓVIL VERTICAL
					=============================================*/

					if (window.matchMedia("(max-width:575px)").matches) {

						$(".listaCategorias").hide();

						$(".listaSubcategorias").parent().removeClass("d-none");

						$(".listaSubcategorias").parent().show();

						$(".listaSubcategorias").parent().append(

							'<button class="btn btn-default btn-sm regresarCategorias">'+traducir("Regresar")+'</button>'

						)

						$(".regresarCategorias").click(function() {

							$(this).remove();

							$(".listaCategorias").show();
							$(".listaSubcategorias").parent().hide();

						})

					}

					$(".listaSubcategorias").html("");

					for (var i = 0; i < respuesta.length; i++) {

						$(".listaSubcategorias").append(

							'<a href="'+url+idioma+'/'+respuesta[i]["ruta"]+'" class="text-secondary">' +
							'<li class="small my-2">' + traducir(respuesta[i]["subcategoria"]) + '</li>' +
							'</a>'
						)

					}

				}

			})

			/*=============================================
			CAMBIOS EN CATEGORIAS
			=============================================*/

			var datosCategorias = new FormData();
			datosCategorias.append("idCategoria", enlace);
			datosCategorias.append("item", "id");
			datosCategorias.append("tabla", "categorias");

			$.ajax({

				url: url+"ajax/categorias.ajax.php",
				method: "POST",
				data: datosCategorias,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta) {

					$(".tituloCategoria").html(traducir(respuesta[0]["categoria"]));
					$(".desCategoria").html(traducir(respuesta[0]["descripcion"]));
					$(".imgCategoria").attr("src", url+respuesta[0]["imgOferta"]);
					$(".verCursos").attr("href", url+idioma+'/'+respuesta[0]["ruta"]);

				}

			})

		}

		/*=============================================
		BOTONERA AUXILIAR CATEGORIAS
		=============================================*/

		var datosCategorias = new FormData();
		datosCategorias.append("idCategoria", "");
		datosCategorias.append("item", "");
		datosCategorias.append("tabla", "categorias");

		$.ajax({

			url: url+"ajax/categorias.ajax.php",
			method: "POST",
			data: datosCategorias,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function(respuesta) {

				if (window.matchMedia("(min-width:1200px)").matches) {

					var longitud = 8;

				} else if (window.matchMedia("(max-width:1199px) and (min-width:992px)").matches) {

					var longitud = 6;

				} else if (window.matchMedia("(max-width:991px) and (min-width:768px)").matches) {

					var longitud = 5;

				} else {

					var longitud = 0;

				}

				for (var i = 0; i < longitud; i++) {

					$(".botoneraAuxiliar").before(

						'<li class="nav-item">' +

						'<a class="nav-link text-secondary p-0 py-2 small" href="'+url+idioma+'/'+respuesta[i]["ruta"]+'">' +

						'<span class="badge badge-pill">' +

						'<i class="' + respuesta[i]["icono"] + '"></i>' +

						'</span>' + traducir(respuesta[i]["categoria"]) +

						'</a>' +

						'</li>'

					)

				}

				for (var i = longitud; i < respuesta.length; i++) {

					$(".botoneraOtros").append(

						'<a class="dropdown-item text-secondary small" href=""'+url+idioma+'/'+respuesta[i]["ruta"]+'">' +

						'<span class="badge badge-pill">' +

						'<i class="' + respuesta[i]["icono"] + '"></i>' +

						'</span>' + traducir(respuesta[i]["categoria"]) +

						'</a>'

					)

				}
			}

		})


	}
})


/*=============================================
GESTOR DE CATEGORÍAS Y SUBCATEGORIAS
=============================================*/

var tabla = "tablaCategorias";
verTabla(tabla);	

$(document).on("click", ".verTabla", function(){

	var tabla = $(this).attr("tipo");

	verTabla(tabla);

	$(".verTabla").removeClass('active');
	$(this).addClass("active");

})

function verTabla(tabla){

	if(tabla == "tablaCategorias"){

		$(".visorTablaCategoria").show()
		$(".visorTablaSubcategoria").hide()

	}else{

		$(".visorTablaSubcategoria").show()
		$(".visorTablaCategoria").hide()
	
	}

	// $.ajax({

	// 	url:url+"ajax/tablaCategorias.ajax.php?url="+url,
	// 	success: function(respuesta){
			
	// 		console.log("respuesta", respuesta);

	// 	}

	// })

	$("."+tabla).DataTable({
		"ajax":url+"ajax/"+tabla+".ajax.php?url="+url,
		"deferRender": true,
		"retrieve": true,
		"processing": true,
		"language": {

		 	"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

		 }

	});

}

/*=============================================
EDITAR CATEGORÍA
=============================================*/

$(document).on("click", ".editarCategoria", function(){

	var idCategoria = $(this).attr("idCategoria");
	var item = "id";
	var tabla = "categorias";

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);
	datos.append("item", item);
	datos.append("tabla", tabla);

	$.ajax({
		url:url+"ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			console.log("respuesta", respuesta[0]["categoria"]);

			$("input[name='categoria']").val(respuesta[0]["categoria"]);
			$("textarea[name='titulo']").val(respuesta[0]["titulo"]);
			$("textarea[name='descripcion']").val(respuesta[0]["descripcion"]);
			$("textarea[name='palabrasClaves']").val(respuesta[0]["palabrasClaves"]);
			$("input[name='icono']").val(respuesta[0]["icono"]);
			$("input[name='antiguaImgOferta']").val(respuesta[0]["imgOferta"]);
			$(".prevImgOferta").attr("src", url+respuesta[0]["imgOferta"]);
			$("input[name='antiguaImgBanner']").val(respuesta[0]["imgBanner"]);
			$(".prevImgBanner").attr("src", url+respuesta[0]["imgBanner"]);
			$("input[name='oferta']").val(respuesta[0]["oferta"]);
			$("input[name='descuento']").val(respuesta[0]["descuento"]);
			$("input[name='finOferta']").val(respuesta[0]["finOferta"]);

		}

	})

})

/*=============================================
SUBIENDO LA IMAGEN DE OFERTA
=============================================*/

$(".imgOferta").change(function(){

	var imagen = this.files[0];

	$("[for='customFile']").html(imagen["name"]);

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".imgOferta").val("");

  		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else if(imagen["size"] > 2000000){

  		$(".imgOferta").val("");

		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen no debe pesar más de 2MB!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".prevImgOferta").attr("src", rutaImagen);

  		})

  	}
  	
})

/*=============================================
SUBIENDO LA IMAGEN DE BANNER
=============================================*/

$(".imgBanner").change(function(){

	var imagen = this.files[0];

	$("[for='customFile2']").html(imagen["name"]);

	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/
  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".imgBanner").val("");

  		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen debe estar en formato JPG o PNG!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else if(imagen["size"] > 2000000){

  		$(".imgBanner").val("");

		swal({
	      title: "Error al subir la imagen",
	      text: "¡La imagen no debe pesar más de 2MB!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".prevImgBanner").attr("src", rutaImagen);

  		})

  	}
  	
})

/*=============================================
EDITAR SUBCATEGORÍA
=============================================*/

$(document).on("click", ".editarSubcategoria", function(){

	var idCategoria = $(this).attr("idSubcategoria");
	var item = "id";
	var tabla = "subcategorias";

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);
	datos.append("item", item);
	datos.append("tabla", tabla);

	$.ajax({

		url:url+"ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("input[name='subcategoria']").val(respuesta[0]["subcategoria"]);
			$("input[name='oferta']").val(respuesta[0]["oferta"]);
			$("input[name='descuento']").val(respuesta[0]["descuento"]);
			$("input[name='finOferta']").val(respuesta[0]["finOferta"]);

		}

	})

})