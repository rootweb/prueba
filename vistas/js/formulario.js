/*=============================================
VALIDACIÓN FORMULARIO CONTACTENOS
=============================================*/

$("#nombreContactenos").val("");
$("#emailContactenos").val("");
$("#mensajeContactenos").val("");

function validarContactenos(){

	$(".alert").remove();

	var nombre = $("#nombreContactenos").val();
	var email = $("#emailContactenos").val();
	var mensaje = $("#mensajeContactenos").val();

	/*=============================================
	VALIDACIÓN DEL NOMBRE
	=============================================*/	

	if(nombre == ""){

		$("#nombreContactenos").before('<h6 class="alert alert-danger">Escriba por favor el nombre</h6>');

		return false;

	}else{

		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;	

		if(!expresion.test(nombre)){

			$("#nombreContactenos").before('<h6 class="alert alert-danger">Escriba por favor sólo letras sin caracteres especiales</h6>');

			return false;

		}

	}

	/*=============================================
	VALIDACIÓN DEL EMAIL
	=============================================*/	

	if(email == ""){

		$("#emailContactenos").before('<h6 class="alert alert-danger">Escriba por favor el email</h6>');

		return false;

	}else{

		var expresion =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;	

		if(!expresion.test(email)){

			$("#emailContactenos").before('<h6 class="alert alert-danger">Escriba por favor correctamente el correo electrónico</h6>');

			return false;

		}

	}

	/*=============================================
	VALIDACIÓN DEL MENSAJE
	=============================================*/

	if(mensaje== ""){

		$("#mensajeContactenos").before('<h6 class="alert alert-danger">Escriba por favor el mensaje</h6>');
		
		return false;

	}else{

		var expresion = /^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(mensaje)){
			
			$("#mensajeContactenos").before('<h6 class="alert alert-danger">Escriba el mensaje sin caracteres especiales</h6>');
			
			return false;
		}	

	}	

	return true;

}