<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaSubcategorias{

  /*=============================================
  MOSTRAR LA TABLA DE SUBCATEGORÍAS
  =============================================*/ 

 	public function mostrarTabla(){	

 	$tabla = "subcategorias";
 	$item = null;
 	$valor = null;

 	$subcategorias = ControladorCategorias::ctrMostrarCATySUB($tabla, $item, $valor);


 	if(count($subcategorias)== 0){

 		$datosJson = '{"data": []}';

 		echo $datosJson;

 	}else{	

	 	$datosJson = '{
			 
			  "data": [ ';

		for($i = 0; $i < count($subcategorias); $i++){

			if($subcategorias[$i]["gratis"] != 1){

				/*=============================================
	  			CATEGORIA
	  			=============================================*/

	  			$tabla = "categorias";
			 	$item = "id";
			 	$valor = $subcategorias[$i]["id_categoria"];

			 	$categoria = ControladorCategorias::ctrMostrarCATySUB($tabla, $item, $valor);

				/*=============================================
	  			CREAR LAS ACCIONES
	  			=============================================*/
		    
			    $acciones = "<button class='btn btn-danger btn-sm editarSubcategoria' idSubcategoria='".$subcategorias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSubcategoria'>Editar</button>";
					    
				$datosJson	 .= '[
					      "'.($i+1).'",
					      "'.$subcategorias[$i]["subcategoria"].'",	
					      "'.$categoria[0]["categoria"].'",	      
					      "$ '.$subcategorias[$i]["oferta"].'",
					      "'.$subcategorias[$i]["descuento"].' %",
					      "'.$subcategorias[$i]["finOferta"].'",
					      "'.$acciones.'"		    
					    ],';

			}

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
$activar = new TablaSubcategorias();
$activar -> mostrarTabla();