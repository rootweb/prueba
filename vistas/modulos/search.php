<?php

/*=============================================
PREGUNTAR SI VIENE O NO BÚSQUEDA
=============================================*/

if(isset($rutas[3])){

	$busqueda = str_replace("-", "%20", $rutas[3]);

}else{

	$busqueda = ControladorTraductor::ctrTraducir($idioma,"Todo");

}

/*=============================================
VALIDAR FECHAS DE OFERTA
=============================================*/

$fecha = date('Y-m-d');
$hora = date('H:i:s');

$fechaActual = $fecha.' '.$hora;

/*=============================================
TRAER CATEGORÍAS Y SUBCATEGORÍAS PARA AVERIGUAR SI HAY OFERTAS
=============================================*/

$ofertasCategorias = 0;
$ofertasSubcategorias = 0;

$traerCategoria = ControladorCategorias::ctrMostrarCATySUB("categorias", null, null);

foreach ($traerCategoria as $key => $value) {
	
	if($value["finOferta"] > $fecha){

		++$ofertasCategorias;

	}
}

$traerSubcategoria = ControladorCategorias::ctrMostrarCATySUB("subcategorias", null, null);

foreach ($traerSubcategoria as $key => $value) {
	
	if($value["finOferta"] > $fecha){

		++$ofertasSubcategorias;

	}
}

if($ofertasCategorias == count($traerCategoria) && $ofertasSubcategorias == count($traerSubcategoria)){

	$tiempo1 = new DateTime($traerCategoria[0]["finOferta"]);
	$tiempo2 = new DateTime($fechaActual);
	$diferenciaTiempo = date_diff($tiempo1, $tiempo2);
	$finOferta = $diferenciaTiempo->format('%a');

}

/*=============================================
CREDENCIALES API
=============================================*/

$api = ControladorCredenciales::ctrCredencialesApi();

/*=============================================
CREDENCIALES AFILIADO
=============================================*/

$afiliado = ControladorCredenciales::ctrCredencialesAfiliado();

?>

<!--=====================================
CURSOS
======================================-->

<div class="container-fluid">

	<div class="container">
		
		<div class="row">
			
			<div class="col-sm-9 col-lg-6 pt-sm-2 pt-xl-4 px-0 d-none d-sm-block">

				<h5>

					<small class="bg-success text-white p-2 rounded">
				
							<?php echo str_replace("%20", " ", $busqueda); ?>

					</small>

				</h5>

			</div>

			<div class="col-12 col-sm-3 col-lg-6 text-right px-0 pt-0 pt-xl-4 ">
				
				<div class="dropdown dropleft float-right">
						
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		      			<?php echo ControladorTraductor::ctrTraducir($idioma,"Ordenar Cursos");?>
		    		</button>

		    		<div class="dropdown-menu">
		    		  	
		    		  	<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/highest-rated/".$rutas[3]."/1"; ?>">
		    		  		
							<?php echo ControladorTraductor::ctrTraducir($idioma,"Mejor calificado");?></a>

		    		  	</a>

		    		  	<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/newest/".$rutas[3]."/1"; ?>">
		    		  		
							<?php echo ControladorTraductor::ctrTraducir($idioma,"Más nuevo");?></a>

		    		  	</a>

		    		  	<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/most-reviewed/".$rutas[3]."/1"; ?>">
		    		  		
							<?php echo ControladorTraductor::ctrTraducir($idioma,"Más revisado");?></a>

		    		  	</a>

		    		  	<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/price-low-to-high/".$rutas[3]."/1"; ?>">
		    		  		
							<?php echo ControladorTraductor::ctrTraducir($idioma,"Precio bajo a alto");?></a>

		    		  	</a>

		    		  	<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/price-high-to-low/".$rutas[3]."/1"; ?>">
		    		  		
							<?php echo ControladorTraductor::ctrTraducir($idioma,"Precio alto a bajo");?></a>

		    		  	</a>

	    		  		<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/relevance/".$rutas[3]."/1"; ?>">
		    		  		
							<?php echo ControladorTraductor::ctrTraducir($idioma,"Relevancia");?></a>

		    		  	</a>
						

		    		</div>

				</div>
				
			</div>

		</div>

		<!--=====================================
		VISTA DE CURSOS
		======================================-->

		<div class="row mt-2 mt-md-3 mb-5">

		<?php

		$idCliente = $api["idCliente"];
		$claveSecreta = $api["claveSecreta"];

		if(isset($rutas[4])){

			$page = $rutas[4];
		
		}else{

			$page = 1;
		}
		
		$page_size = 20; 
		$type = "search"; 
		$category =  $busqueda;
		$price = "price-paid"; 
		$language = $idioma;

		if(isset($rutas[2])){

			$ordering = $rutas[2];

		}else{

			$ordering = "relevance";

		}

		$mostrarCursos = ControladorUdemy::ctrMostrarCursos($idCliente, $claveSecreta, $page, $page_size, $type, $category, $price, $language, $ordering);
		

		if(isset($mostrarCursos->detail) && $mostrarCursos->detail != ""){

			echo '<div class="container" style="position:relative">

				<img src="'.$url.'vistas/img/plantilla/fondoUdemy.jpg" class="img-fluid" width="100%">

				<a href="https://click.linksynergy.com/deeplink?id='.$afiliado["id"].'&mid='.$afiliado["mid"].'&murl=https%3A%2F%2Fwww.udemy.com%2Fcourses%2F'.$traerCategoria[0]["ruta"].'%2F%3Fpersist_locale%26locale%3D'.$idioma.'" target="_blank" class="btn btn-success btn-lg text-uppercase fondoUdemy">
				
					'.ControladorTraductor::ctrTraducir($idioma, "Ir a cursos de").' '.ControladorTraductor::ctrTraducir($idioma, $traerCategoria[0]["categoria"]).'

				</a>

			</div>';

		

		}else{

			foreach ($mostrarCursos->results as $key => $value) {

						echo '<div class="card col-12 col-sm-6 col-5th border-0 mb-4"   style="background:#eee">

							<a href="https://click.linksynergy.com/link?id='.$afiliado["id"].'&offerid='.$afiliado["offerid"].'.'.$value->id.'&type=2&murl=https%3A%2F%2Fwww.udemy.com'.$value->url.'" target="_blank">

					  			<img class="card-img-top" src="'.$value->image_480x270.'" alt="Card image">

					  		</a>

					  		<div class="card-body border shadow-sm p-4 p-lg-3 p-xl-2 bg-white">

					    		<h6 class="card-title small tituloCurso">

					    			<a href="https://click.linksynergy.com/link?id='.$afiliado["id"].'&offerid='.$afiliado["offerid"].'.'.$value->id.'&type=2&murl=https%3A%2F%2Fwww.udemy.com'.$value->url.'" target="_blank" class="text-dark">
					    			
										<strong>'.$value->title.'</strong>

									</a>

					    		</h6>

					    		<p class="card-text small text-muted">'.$value->visible_instructors[0]->display_name.'</p>';

					    		if($ofertasCategorias == count($traerCategoria) && $ofertasSubcategorias == count($traerSubcategoria)){

									if($traerCategoria[0]["finOferta"] > $fecha){

										echo '<div class="clearfix">
					    			
											<h6 class="float-left">';

										
										if($traerCategoria[0]["descuento"] == 0 || $traerCategoria[0]["oferta"] != 0 ){

											echo '<kbd class="bg-info">
											
											<span class="valorDescuento">'.$traerCategoria[0]["descuento"].'</span>% OFF

											</kbd>';

										}

										if($traerCategoria[0]["descuento"] != 0 || $traerCategoria[0]["oferta"] == 0 ){

											echo '<kbd class="bg-info">
											
											<span class="valorDescuento">'.$traerCategoria[0]["descuento"].'</span>% OFF

											</kbd>';


										}

		
										echo '</h6>

										<h4 class="float-right precioFinal">$<span>'.$traerCategoria[0]["oferta"].'</span></h4>
										
										<h6 class="float-right precioReal p-1"><small>'.$value->price.'</small></h6>
										
									
							    		</div>';

							    		if($finOferta == 0){

							    				echo '<p class="small pb-3"><small>'.ControladorTraductor::ctrTraducir($idioma, "La oferta termina hoy").'</small></p>';

							    		}else if($finOferta == 1){

							    				echo '<p class="small pb-3"><small>'.ControladorTraductor::ctrTraducir($idioma, "La oferta termina en").' 1 '.ControladorTraductor::ctrTraducir($idioma, "día").'</small></p>';
							    		}else{

							    				echo '<p class="small pb-3"><small>'.ControladorTraductor::ctrTraducir($idioma, "La oferta termina en").' '.$finOferta.' '.ControladorTraductor::ctrTraducir($idioma, "días").'</small></p>';

							    		}

						    		}else{

						    				echo '<h4 class="float-left precioFinal"><span>'.$value->price.'</span></h4><br>';
											
									}

								}else{

						    				echo '<h4 class="float-left precioFinal"><span>'.$value->price.'</span></h4><br>';
											
									}

					    		echo '<br>

			    				<a href="https://click.linksynergy.com/link?id='.$afiliado["id"].'&offerid='.$afiliado["offerid"].'.'.$value->id.'&type=2&murl=https%3A%2F%2Fwww.udemy.com'.$value->url.'" class="btn btn-danger backColor btn-sm verCurso" target="_blank">'.ControladorTraductor::ctrTraducir($idioma, "Ver Ofertas").'</a>		

					  		</div>

						</div>';

			}

		}


		?>
	
		</div>

		<?php

		$pagProductos = ceil($mostrarCursos->count/20);

		?>

		<div class="container">

			<ul class="pagination justify-content-center" id="paginacion" totalPag="<?php echo $pagProductos; ?>" pagina="<?php echo $page; ?>" buscador="<?php  echo str_replace("%20", "-", $busqueda); ?>" style="margin-top:-50px" tipo="search" orden="<?php echo $ordering;?>">
		
			</ul>

		</div>
	
	</div>

</div>


