<?php

/*=============================================
CONTROLADOR DE CATEGORIAS Y SUBCATEGORÍAS
=============================================*/

class ControladorCategorias{

	/*=============================================
	MOSTRAR CATEGORIAS Y SUBCATEGORIAS
	=============================================*/

	static public function ctrMostrarCATySUB($tabla, $item, $valor){

		$respuesta = ModeloCategorias::mdlMostrarCATySUB($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CAMBIAR OFERTAS A CATEGORÍAS Y SUBCATEGORÍAS
	=============================================*/

	public function ctrActualizarOfertas(){

		if(isset($_POST["tipo"])){

			$tabla1 = "categorias";
			$tabla2 = "subcategorias";

			if($_POST["tipo"] == "oferta"){

				$oferta = $_POST["valor"];
				$descuento = 0;

			}else{

				$oferta = 0;
				$descuento = $_POST["valor"];
			}

			$datos = array("oferta"=>$oferta,
						   "descuento"=>$descuento,
				           "finOferta"=>$_POST["finOferta"]);

			$respuesta1 = ModeloCategorias::mdlActualizarOfertas($tabla1, $datos);
			$respuesta2 = ModeloCategorias::mdlActualizarOfertas($tabla2, $datos);

			if($respuesta1 == "ok" && $respuesta2 == "ok"){


				echo'<script>

							swal({
									type:"success",
								  	title: "¡CORRECTO!",
								  	text: "¡Las ofertas se han actualizado!",
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

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	public function ctrEditarCategoria(){

		if(isset($_POST["categoria"])){

			$tabla = "categorias";

			/*=============================================
			IMAGEN OFERTA
			=============================================*/

			$rutaImgOferta = $_POST["antiguaImgOferta"];

			if(isset($_FILES["imgOferta"]["tmp_name"]) && !empty($_FILES["imgOferta"]["tmp_name"])){

				/*=============================================
				BORRAMOS ANTIGUA IMAGEN OFERTA
				=============================================*/

				unlink($_POST["antiguaImgOferta"]);

				/*=============================================
				DEFINIMOS LAS MEDIDAS
				=============================================*/

				list($ancho, $alto) = getimagesize($_FILES["imgOferta"]["tmp_name"]);

				$nuevoAncho = 600;
				$nuevoAlto = 375;

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/	

				if($_FILES["imgOferta"]["type"] == "image/jpeg"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$rutaImgOferta = "vistas/img/ofertas/".strtolower($_POST["categoria"]).".jpg";

					$origen = imagecreatefromjpeg($_FILES["imgOferta"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $rutaImgOferta);

				}

				if($_FILES["imgOferta"]["type"] == "image/png"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$rutaImgOferta = "vistas/img/ofertas/".strtolower($_POST["categoria"]).".png";

					$origen = imagecreatefrompng($_FILES["imgOferta"]["tmp_name"]);	

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
			
					imagesavealpha($destino, TRUE);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $rutaImgOferta);	

				}


			}

			/*=============================================
			IMAGEN BANNER
			=============================================*/

			$rutaImgBanner = $_POST["antiguaImgBanner"];

			if(isset($_FILES["imgBanner"]["tmp_name"]) && !empty($_FILES["imgBanner"]["tmp_name"])){

				/*=============================================
				BORRAMOS ANTIGUA IMAGEN OFERTA
				=============================================*/

				unlink($_POST["antiguaImgBanner"]);

				/*=============================================
				DEFINIMOS LAS MEDIDAS
				=============================================*/

				list($ancho, $alto) = getimagesize($_FILES["imgBanner"]["tmp_name"]);

				$nuevoAncho = 1600;
				$nuevoAlto = 250;

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/	

				if($_FILES["imgBanner"]["type"] == "image/jpeg"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$rutaImgBanner = "vistas/img/banner/".strtolower($_POST["categoria"]).".jpg";

					$origen = imagecreatefromjpeg($_FILES["imgBanner"]["tmp_name"]);	

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $rutaImgBanner);

				}

				if($_FILES["imgBanner"]["type"] == "image/png"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$rutaImgBanner = "vistas/img/banner/".strtolower($_POST["categoria"]).".png";

					$origen = imagecreatefrompng($_FILES["imgBanner"]["tmp_name"]);						
					
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
			
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $rutaImgBanner);

				}

			}

			$datos = array("categoria"=>$_POST["categoria"],
							"titulo"=>$_POST["titulo"],
							"descripcion"=>$_POST["descripcion"],
							"palabrasClaves"=>$_POST["palabrasClaves"],
							"icono"=>$_POST["icono"],
							"imgOferta"=>$rutaImgOferta,
							"imgBanner"=>$rutaImgBanner,
							"oferta"=>$_POST["oferta"],
							"descuento"=>$_POST["descuento"],
							"finOferta"=>$_POST["finOferta"]);

			$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

				if($respuesta == "ok"){

				echo'<script>

					swal({
							type:"success",
						  	title: "¡CORRECTO!",
						  	text: "¡La categoría se ha actualizado correctamente!",
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

	/*=============================================
	EDITAR SUBCATEGORIA
	=============================================*/

	public function ctrEditarSubcategoria(){

		if(isset($_POST["subcategoria"])){

			$tabla = "subcategorias";

			$datos = array("subcategoria"=>$_POST["subcategoria"],
							"oferta"=>$_POST["oferta"],
							"descuento"=>$_POST["descuento"],
							"finOferta"=>$_POST["finOferta"]);

			$respuesta = ModeloCategorias::mdlEditarSubcategoria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
							type:"success",
						  	title: "¡CORRECTO!",
						  	text: "¡La Subcategoría se ha actualizado correctamente!",
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