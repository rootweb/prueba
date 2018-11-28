<!--=====================================
ELEGIR CATEGORÍA
======================================-->
<?php

$tabla = "categorias";
$item = "ruta";
$valor = $rutas[1];

$traerCategoria = ControladorCategorias::ctrMostrarCATySUB($tabla, $item, $valor);

/*=============================================
VALIDAR FECHAS DE OFERTA
=============================================*/

$fecha = date('Y-m-d');
$hora = date('H:i:s');

$fechaActual = $fecha.' '.$hora;

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
BANNER
======================================-->
<div class="banner">
	
	<img src="<?php echo $url.$traerCategoria[0]["imgBanner"];?>" class="img-fluid" width="100%">

	<div class="textoBanner textoIzq">
		
		<h1 class="text-uppercase text-white"><?php echo ControladorTraductor::ctrTraducir($idioma, "Cursos de").' '.ControladorTraductor::ctrTraducir($idioma, $traerCategoria[0]["categoria"]);?></h1>

	</div>

	<?php

	if($traerCategoria[0]["finOferta"] > $fecha){

		echo '<div class="textoBanner textoDer">
		
				<h1 class="text-white text-uppercase">'.ControladorTraductor::ctrTraducir($idioma, "Ofertas Especiales").'</h1>';

				if($traerCategoria[0]["descuento"] == 0 || $traerCategoria[0]["oferta"] != 0 ){

					echo '<h2 class="text-white text-uppercase"><strong>'.ControladorTraductor::ctrTraducir($idioma, "Todos los cursos a").' $'.$traerCategoria[0]["oferta"].'</strong></h2>';

				}

				if($traerCategoria[0]["descuento"] != 0 || $traerCategoria[0]["oferta"] == 0 ){


					echo '<h2 class="text-white text-uppercase"><strong>'.ControladorTraductor::ctrTraducir($idioma, "Cursos con").' '.$traerCategoria[0]["descuento"].'% '.ControladorTraductor::ctrTraducir($idioma, "de descuento").'</strong></h2>';

				}

				
				echo '<h3 class="text-white d-none d-lg-block">'.ControladorTraductor::ctrTraducir($idioma, "La oferta termina en").'

					<br>

					<div class="countdown" finOferta="'.$traerCategoria[0]["finOferta"].'"></div>

				</h3>';

				/*=============================================
				EXTRAER LOS DÍAS QUE FALTAN PARA CULMINAR LA OFERTA
				=============================================*/

				$tiempo1 = new DateTime($traerCategoria[0]["finOferta"]);
				$tiempo2 = new DateTime($fechaActual);
				$diferenciaTiempo = date_diff($tiempo1, $tiempo2);
				$finOferta = $diferenciaTiempo->format('%a');

				if($finOferta == 0){

					echo '<h3 class="d-lg-none text-white">'.ControladorTraductor::ctrTraducir($idioma, "La oferta termina hoy").'</h3>';

				}else if($finOferta == 1){

					echo '<h3 class="d-lg-none text-white">'.ControladorTraductor::ctrTraducir($idioma, "La oferta termina en").' '.$finOferta.' '.ControladorTraductor::ctrTraducir($idioma, "día").'</h3>';

				}else{

					echo '<h3 class="d-lg-none text-white">'.ControladorTraductor::ctrTraducir($idioma, "La oferta termina en").' '.$finOferta.' '.ControladorTraductor::ctrTraducir($idioma, "días").'</h3>';

				}

			echo '</div>';

	}

	?>


</div>

<!--=====================================
CURSOS
======================================-->

<div class="container-fluid">

	<div class="container">
		
		<div class="row">
			
			<div class="col-sm-9 col-lg-6 pt-sm-2 pt-xl-4 px-0 d-none d-sm-block">

				<h5>

					<small class="bg-success text-white p-2 rounded">
				
						<?php echo ControladorTraductor::ctrTraducir($idioma, "Los mejores cursos de");?> <strong><?php echo ControladorTraductor::ctrTraducir($idioma, $traerCategoria[0]["categoria"]);?></strong>

					</small>

				</h5>

			</div>

			<div class="col-12 col-sm-3 col-lg-6 text-right px-0 pt-0 pt-xl-4 ">
				
				<div class="dropdown dropleft float-right">
						
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		      			<?php echo ControladorTraductor::ctrTraducir($idioma,"Ordenar Cursos");?>
		    		</button>

		    		<div class="dropdown-menu">
		    		  	
		    		  	<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/highest-rated"; ?>">
		    		  		
							<?php echo ControladorTraductor::ctrTraducir($idioma,"Mejor calificado");?></a>

		    		  	</a>

		    		  	<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/newest"; ?>">
		    		  		
							<?php echo ControladorTraductor::ctrTraducir($idioma,"Más nuevo");?></a>

		    		  	</a>

		    		  	<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/most-reviewed"; ?>">
		    		  		
							<?php echo ControladorTraductor::ctrTraducir($idioma,"Más revisado");?></a>

		    		  	</a>

		    		  	<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/price-low-to-high"; ?>">
		    		  		
							<?php echo ControladorTraductor::ctrTraducir($idioma,"Precio bajo a alto");?></a>

		    		  	</a>

		    		  	<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/price-high-to-low"; ?>">
		    		  		
							<?php echo ControladorTraductor::ctrTraducir($idioma,"Precio alto a bajo");?></a>

		    		  	</a>

	    		  		<a class="dropdown-item" href="<?php echo $url.$idioma."/".$rutas[1]."/relevance"; ?>">
		    		  		
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
		$page = 1; 
		$page_size = 15; 
		$type = "category"; 
		$category =  $traerCategoria[0]["api"];
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

					    		echo '<br>

			    				<a href="https://click.linksynergy.com/link?id='.$afiliado["id"].'&offerid='.$afiliado["offerid"].'.'.$value->id.'&type=2&murl=https%3A%2F%2Fwww.udemy.com'.$value->url.'" class="btn btn-danger backColor btn-sm verCurso" target="_blank">'.ControladorTraductor::ctrTraducir($idioma, "Ver Curso").'</a>		

					  		</div>

						</div>';

			}

		}


		?>

			<!--	<a href="<?php echo "https://click.linksynergy.com/deeplink?id=".$afiliado["id"]."&mid=".$afiliado["mid"]."&murl=https%3A%2F%2Fwww.udemy.com%2Fcourses%2F".$traerCategoria[0]["ruta"]."%2F%3Fpersist_locale%26locale%3D".$idioma.";"?>" target="_blank" class="mx-auto p-3">

					<button class="btn backColor verTodo btn-lg">
					
						<?php echo ControladorTraductor::ctrTraducir($idioma,"Ver más cursos de").' '.ControladorTraductor::ctrTraducir($idioma,$traerCategoria[0]["categoria"]); ?> <i class="fas fa-chevron-right"></i>

					</button>

				</a> -->

		<?php

		$pagProductos = ceil($mostrarCursos->count/20);

		?>

	
				<div class="container">

					<ul class="pagination justify-content-center mx-auto pt-4" id="paginacion" totalPag="<?php echo $pagProductos; ?>" pagina="<?php echo $page; ?>" buscador="<?php echo $traerCategoria[0]["ruta"]; ?>" tipo="category" orden="<?php echo $ordering;?>">
					
					</ul>

				</div>

		</div>
		
	</div>

</div>



