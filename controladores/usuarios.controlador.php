<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	public function ctrIngresoUsuario(){

		if(isset($_POST["usuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){

				$tabla = "usuarios";
				$item = "usuario";
				$valor = $_POST["usuario"];

				$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

				if($respuesta["usuario"] == $_POST["usuario"] && $respuesta["password"] == $_POST["password"]){

					$_SESSION["validarSesion"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["password"] = $respuesta["password"];

					echo '<script>
						
						window.location = "backend";

					</script>';

				}else{

					echo '<script> 

						swal({
					  		type:"error",
					  		title: "¡ERROR!",
					  		text: "EL usuario o la contraseña no son válidos",
					 		showConfirmButton: true,
							confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "backend";
								  } 
						});

					</script>';

				}

			}else{

				echo '<script> 

						swal({
					  		type:"error",
					  		title: "¡ERROR!",
					  		text: "¡Error al ingresar al sistema, no se permiten caracteres especiales!",
					 		showConfirmButton: true,
							confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    window.location = "backend";
								  } 
						});

					</script>';
			
			}


		}


	}

}