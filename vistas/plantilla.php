<?php

session_start();
$url = Ruta::ctrRuta();



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>API UDEMY</title>

	<!--=====================================
	PLUGINS DE CSS
	======================================-->

	<!-- Latest compiled and minified CSS -->

	 <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap.min.css">

	 <!-- Font Awesome -->

	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

	 <!-- Google Fonts -->

	 <link href="https://fonts.googleapis.com/css?family=Open+Sans|Ubuntu+Condensed" rel="stylesheet">

	 <!-- DSCountDown CSS -->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/dscountdown.css">

	<!-- bootstrap datepicker -->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/bootstrap-datepicker.standalone.min.css">

	<!-- DataTables -->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/dataTables.bootstrap4.min.css">	
	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plugins/responsive.bootstrap.min.css">

	


	<!--=====================================
	HOJAS DE ESTILO PERSONALIZADAS
	======================================-->

	<link rel="stylesheet" href="<?php echo $url; ?>vistas/css/plantilla.css">





	<!--=====================================
	PLUGINS DE JAVASCRIPT
	======================================-->

	<!-- jQuery library -->
  	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.min.js"></script>
	
	<!-- Popper JS -->
  	<script src="<?php echo $url; ?>vistas/js/plugins/popper.min.js"></script>
	
	<!-- Latest compiled JavaScript -->
  	<script src="<?php echo $url; ?>vistas/js/plugins/bootstrap.min.js"></script>

  	<!-- CountDown JavaScript -->
	<script src="<?php echo $url; ?>vistas/js/plugins/dscountdown.min.js"></script>

	<!-- Scroll Up JavaScript -->
	<script src="<?php echo $url; ?>vistas/js/plugins/scrollUP.js"></script>

	<!-- jQuery Easing JavaScript -->
	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.easing.js"></script>

	<!-- jQuery Pagination -->
	<script src="<?php echo $url; ?>vistas/js/plugins/pagination.min.js"></script>

	<!-- SweetAlert 2 -->
	<script src="<?php echo $url; ?>vistas/js/plugins/sweetalert2.all.js"></script> 	

	<!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  	<!-- bootstrap datepicker -->
	<script src="<?php echo $url; ?>vistas/js/plugins/bootstrap-datepicker.min.js"></script>

	<!-- DataTables https://datatables.net/-->
  	<script src="<?php echo $url; ?>vistas/js/plugins/jquery.dataTables.min.js"></script>
  	<script src="<?php echo $url; ?>vistas/js/plugins/dataTables.bootstrap4.min.js"></script> 
	<script src="<?php echo $url; ?>vistas/js/plugins/dataTables.responsive.min.js"></script>
  	<script src="<?php echo $url; ?>vistas/js/plugins/responsive.bootstrap.min.js"></script>
	
	

</head>
<body>

<?php


	$listaBlancaCategoria = null;
	$listaBlancaSubCategoria = null;


 	$rutas = array();

 	if(isset($_GET["ruta"])){

 		$rutas = explode("/", $_GET["ruta"]);

 		if($rutas[0] != "es" && $rutas[0] != "en" && $rutas[0] != "pt"){

 				include "modulos/error404.php";

 				return;

 		}

 	/*=============================================
	CABEZOTE
	=============================================*/

	include "modulos/cabezote.php";	


 		if(isset($rutas[1])){

 			

 			/*=============================================
			BUSCAR COINCIDENCIA DE LA RUTA CATEGORIA
			=============================================*/


 			$rutaCategoria = ControladorCategorias::ctrMostrarCATySUB("categorias", "ruta", $rutas[1]);

 			if(count($rutaCategoria) !=0){

 				$listaBlancaCategoria = $rutas[1];

 			}


 			/*=============================================
			BUSCAR COINCIDENCIA DE LA RUTA SUBCATEGORIA
			=============================================*/


 			$rutaSubCategoria = ControladorCategorias::ctrMostrarCATySUB("subcategorias", "ruta", $rutas[1]);

 			if(count($rutaSubCategoria) !=0){

 				$listaBlancaSubCategoria = $rutas[1];

 			}

		 	/*=============================================
			LISTA BLANCA DE URL'S AMIGABLES
			=============================================*/
			if ($listaBlancaCategoria != null){
				
					include "modulos/categorias.php";	

				}else if ($listaBlancaSubCategoria != null){

				include "modulos/subcategorias.php";


				}else if ($rutas[1] == "search" || $rutas[1] == "backend" || $rutas[1] == "logout"){

					include "modulos/".$rutas[1].".php";


				}else{

					include "modulos/error404.php";

				}
			
			}else{

			/*=============================================
			INICIO
			=============================================*/

			include "modulos/inicio-parte1.php";
			include "modulos/inicio-parte2.php";	
			include "modulos/inicio-parte3.php";		


			}

				/*=============================================
				BOTTOM
				=============================================*/

				include "modulos/bottom.php";	



				/*=============================================
				FOOTER
				=============================================*/

				include "modulos/footer.php";	


			 }else{


			/*=============================================
			CABEZOTE
			=============================================*/

			include "modulos/cabezote.php";	
			/*=============================================
			INICIO
			=============================================*/

				include "modulos/inicio-parte1.php";	
				include "modulos/inicio-parte2.php";	
				include "modulos/inicio-parte3.php";


			/*=============================================
			BOTTOM
			=============================================*/

			include "modulos/bottom.php";	



			/*=============================================
			FOOTER
			=============================================*/

			include "modulos/footer.php";	

			}

			

?>


<input type="hidden" id="ruta" value="<?php echo $url; ?>">

<!--=====================================
JAVASCRIPT PERSONALIZADO
======================================-->

<script src="<?php echo $url; ?>vistas/js/categorias.js"></script>
<script src="<?php echo $url; ?>vistas/js/cursos.js"></script>
<script src="<?php echo $url; ?>vistas/js/buscador.js"></script>
<script src="<?php echo $url; ?>vistas/js/paginacion.js"></script>
<script src="<?php echo $url; ?>vistas/js/formulario.js"></script>



<!--=====================================
CMP
======================================-->

<script src="<?php echo $url; ?>vistas/js/plugins/cmp.js"></script>
<script src='https://cdn.digitrust.mgr.consensu.org/1/cmp.complete.bundle.js' async></script>



	
</body>
</html>