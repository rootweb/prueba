<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaCategorias{

	/*=============================================
  	MOSTRAR LA TABLA DE CATEGORÍAS
  	=============================================*/ 

 	public function mostrarTabla(){	

 		if(!isset($_GET["url"])){

 			return;

 		}

 		$tabla = "categorias";
 		$item = null;
 		$valor = null;

 		$categorias = ControladorCategorias::ctrMostrarCATySUB($tabla, $item, $valor);

 		if(count($categorias)== 0){

			$datosJson = '{"data": []}';

			echo $datosJson;

 		}else{

 			$datosJson = '{

				 "data": [ ';

				for($i = 0; $i < count($categorias); $i++){	

					/*=============================================
				 	MOSTRAR ICONO
					=============================================*/ 

					$icono = "<span class='".$categorias[$i]["icono"]."'></span>";

					/*=============================================
				 	IMAGEN OFERTA
					=============================================*/ 

					$imgOferta = "<img class='img-thumbnail' src='".$_GET["url"].$categorias[$i]["imgOferta"]."'>";	

					/*=============================================
					IMAGEN BANNER
					=============================================*/ 

					$imgBanner = "<img class='img-thumbnail' src='".$_GET["url"].$categorias[$i]["imgBanner"]."'>";	

					/*=============================================
	  				CREAR LAS ACCIONES
	  				=============================================*/	

	  				$acciones = "<button class='btn btn-danger btn-sm editarCategoria' idCategoria='".$categorias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoria'>Editar</button>";


				
					$datosJson	 .= '[
						
							"'.($i+1).'",
							"'.$categorias[$i]["categoria"].'",
							"'.$categorias[$i]["titulo"].'",
							"'.$categorias[$i]["descripcion"].'",
							"'.$categorias[$i]["palabrasClaves"].'",
							"'.$icono.'",
							"'.$imgOferta.'",
							"'.$imgBanner.'",
							"$ '.$categorias[$i]["oferta"].'",
						 "'.$categorias[$i]["descuento"].' %",
						 "'.$categorias[$i]["finOferta"].'",
						 "'.$acciones.'"



					],';

				} 

			$datosJson = substr($datosJson, 0, -1);

			$datosJson.=  ']

			}';

			echo $datosJson;

 		}

 	}


}

/*=============================================
ACTIVAR TABLA DE CATEGORÍAS
=============================================*/ 

$activar = new TablaCategorias();
$activar -> mostrarTabla();