<?php

Class ControladorTraductor{

	/*=============================================
	TRADUCTOR
	=============================================*/

	static public function ctrTraducir($idioma, $texto){

		if($idioma == "es"){

			return $texto;
		
		}else{

			$archivoIdiomas = file_get_contents("idiomas.json");

			$jsonIdiomas = json_decode($archivoIdiomas);

			switch ($idioma) {
				case 'en':
					$i = 0;
					break;
				case 'pt':
					$i = 1;
					break;			
			
			}

			$resultado = $jsonIdiomas->$texto[$i]->$idioma;

			return $resultado;


		}


	}


}