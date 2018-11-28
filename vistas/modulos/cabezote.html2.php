<?php

if(isset($rutas[0])){


		$idioma = $rutas[0];
}else{

$idioma = "es";


}


?>

<input type="hidden" id="idioma" value="<?php echo $idioma;?>">

<!--=====================================
CABEZOTE
======================================-->

<header class="container-fluid bg-dark">
	
	<div class="container">
		
		<div class="row">
			
			<!--=====================================
			LOGOTIPO

			pantalla dispositivo movil (vertical 320 px (col) - horizontal 576 px (col-sm-))
			pantalla dispositivo tablet (vertical 768 px (col-md-) - horizontal 1024 px (col-lg-))
			pantalla de escritorio 1366 px (col-xl-)
			======================================-->

			<div class="col-12 col-sm-3 col-lg-2 py-1 py-sm-3 logotipo">

				<a href="<?php echo $url; ?>">
				
			<img src="<?php echo $url; ?>vistas/img/plantilla/logo.png" class="img-fluid pt-1">
				</a>
			
			</div>

			<!--=====================================
			CATEGORIAS Y BUSCADOR
			======================================-->
				
			<div class="col-12 col-sm-9 col-lg-5 pl-sm-4 pt-3">
				
				<div class="input-group mb-3">

					<div class="input-group-append">
				    
				    	<button class="btn backColor" type="button" data-toggle="modal" data-target="#modalCategorias">
				    		
							<span class="float-left pt-1 mx-2 small text-uppercase d-none d-md-block"><?php echo ControladorTraductor::ctrTraducir($idioma, "Categorías");?></span>

							<span class="float-right mx-2 ">
								<i class="fas fa-bars text-white"></i>
							</span>

				    	</button> 
				  
				  	</div>
				  
				  	<input type="text" class="form-control" placeholder="<?php echo ControladorTraductor::ctrTraducir($idioma, "Buscar cursos"); ?>">
				  
				  	<div class="input-group-append">
				    
				    	<button class="btn backColor" type="submit">

				    		<i class="fas fa-search"></i>

				    	</button> 
				  
				  	</div>

				</div>

			</div>	

			<!--=====================================
			REDES SOCIALES TOP
			======================================-->

			<div class="d-none d-lg-block col-lg-3 pt-lg-3 text-center">
				
				<ul class="list-inline pt-lg-1">
					
					<li class="list-inline-item">
						
						<a href="https://www.facebook.com/" target="_blank">

							<h3><i class="fab fa-facebook-square text-white"></i></h3>

						</a>

					</li>

					<li class="list-inline-item">

						<a href="https://www.youtube.com/" target="_blank">
						
							<h3><i class="fab fa-youtube-square text-white"></i></h3>

						</a>

					</li>

					<li class="list-inline-item">

						<a href="https://www.twitter.com/" target="_blank">
						
							<h3><i class="fab fa-twitter-square text-white"></i></h3>

						</a>

					</li>

					<li class="list-inline-item">

						<a href="https://www.linkedin.com/" target="_blank">
						
							<h3><i class="fab fa-linkedin text-white"></i></h3>

						</a>

					</li>

					<li class="list-inline-item">

						<a href="https://www.plus.google.com/" target="_blank">
						
							<h3><i class="fab fa-google-plus-square text-white"></i></h3>

						</a>

					</li>

				</ul>	

			</div>

			<!--=====================================
			INGRESOS DE USUARIOS TOP
			======================================-->
			
			<div class="d-none d-lg-block col-lg-2 pt-lg-4">
				
				<ul class="list-inline">
					
					<li class="list-inline-item text-white small">
						
						<?php echo ControladorTraductor::ctrTraducir($idioma, "Ingresar");?>

					</li>

					<li class="list-inline-item text-white small">
						
						|

					</li>

					<li class="list-inline-item text-white small">
						
						<?php echo ControladorTraductor::ctrTraducir($idioma, "Registro");?>

					</li>


				</ul>


			</div>

			<div class="fixed-bottom bg-dark d-lg-none text-center pt-2 row">

				<!--=====================================
				REDES SOCIALES BOTTOM
				======================================-->
				
				<ul class="list-inline col-12 col-sm-6 mb-0">
					
					<li class="list-inline-item">
						
						<a href="https://www.facebook.com/" target="_blank">

							<h3><i class="fab fa-facebook-square text-white"></i></h3>

						</a>

					</li>

					<li class="list-inline-item">

						<a href="https://www.youtube.com/" target="_blank">
						
							<h3><i class="fab fa-youtube-square text-white"></i></h3>

						</a>

					</li>

					<li class="list-inline-item">

						<a href="https://www.twitter.com/" target="_blank">
						
							<h3><i class="fab fa-twitter-square text-white"></i></h3>

						</a>

					</li>

					<li class="list-inline-item">

						<a href="https://www.linkedin.com/" target="_blank">
						
							<h3><i class="fab fa-linkedin text-white"></i></h3>

						</a>

					</li>

					<li class="list-inline-item">

						<a href="https://www.plus.google.com/" target="_blank">
						
							<h3><i class="fab fa-google-plus-square text-white"></i></h3>

						</a>

					</li>

				</ul>

				<!--=====================================
				INGRESOS USUARIOS BOTTOM
				======================================-->	

				<ul class="list-inline col-12 col-sm-6 mb-0">
					
					<li class="list-inline-item text-white small">
						
						<?php echo ControladorTraductor::ctrTraducir($idioma, "Ingresar");?>

					</li>

					<li class="list-inline-item text-white small">
						
						|

					</li>

					<li class="list-inline-item text-white small">
						
						<?php echo ControladorTraductor::ctrTraducir($idioma, "Registro");?>

					</li>

				</ul>

				<!--=====================================
				BOTONES DE IDIOMA
				======================================-->

				<div class="d-block d-md-none col-12 dropup p-sm-1 mt-1 mt-sm-0">

				 	<button type="button" class="btn btn-secondary dropdown-toggle w-50 btn-sm" data-toggle="dropdown">
			    	 <small class="text-uppercase"> 

			    	<?php 
		    	 		
		    	 		echo $idioma;
		    	 	
		    	 	?>	 	

		    	 </small>
			 	 	</button>

					<div class="dropdown-menu">

				<?php

				 if(isset($rutas[1])){

				 	 	echo '<a class="dropdown-item small" href="'.$url.'es/'.$rutas[1].'">'.ControladorTraductor::ctrTraducir($idioma, "Español").'</a>

						<a class="dropdown-item small" href="'.$url.'en/'.$rutas[1].'">'.ControladorTraductor::ctrTraducir($idioma, "Inglés").'</a>

						<a class="dropdown-item small" href="'.$url.'pt/'.$rutas[1].'">'.ControladorTraductor::ctrTraducir($idioma, "Portugués").'</a>';

				 }else{

				 	echo '<a class="dropdown-item small" href="es">'.ControladorTraductor::ctrTraducir($idioma, "Español").'</a>

					<a class="dropdown-item small" href="en">'.ControladorTraductor::ctrTraducir($idioma, "Inglés").'</a>
					
					<a class="dropdown-item small" href="pt">'.ControladorTraductor::ctrTraducir($idioma, "Portugués").'</a>';


				 }


				?>



					</div>
			
				</div>	

			</div>		

		</div>

	</div>

</header>

<!--=====================================
VENTANA MODAL CATEGORÍAS
======================================-->

<div class="modal" id="modalCategorias">
	
	<div class="modal-dialog modal-lg">
		
		<div class="modal-content rounded-0 border-0">

			<div class="modal-body p-0">

				<button type="button" class="close pr-2 d-sm-none" data-dismiss="modal">&times;</button>

				<div class="row">

					<!--=====================================
					CATEGORÍAS
					======================================-->
					
					<ul class="col-12 col-sm-6 col-lg-3 p-3 pl-4 listaCategorias">

					<?php

					$tabla = "categorias";
					$item = null;
					$valor = null;

					$categorias = ControladorCategorias::ctrMostrarCATySUB($tabla, $item, $valor);

					foreach ($categorias as $key => $value) {
						
						echo '<a href="'.$url.$idioma.'/'.$value["ruta"].'" class="text-secondary">

								<li class="small my-2" idCategoria="'.$value["id"].'">

									<span class="badge badge-pill">
										
										<i class="'.$value["icono"].'"></i>	

									</span>

							'.ControladorTraductor::ctrTraducir($idioma, $value["categoria"]).'						

								</li>

							</a>';
					}


					?>
						
					</ul>

					<!--=====================================
					SUBCATEGORÍAS
					======================================-->

					<div class="d-none d-sm-block col-12 col-sm-6 col-lg-4 bg-light p-3 pl-4">
						
						<h5 class="text-danger"><?php echo ControladorTraductor::ctrTraducir($idioma,"Cursos de");?> <span class="tituloCategoria"><?php echo ControladorTraductor::ctrTraducir($idioma, $categorias[0]["categoria"]);  ?></span></h5>

						<hr>

						<ul class="list-unstyled listaSubcategorias">

						<?php

							$tabla = "subcategorias";
							$item = "id_categoria";
							$valor = 1;

							$subcategorias = ControladorCategorias::ctrMostrarCATySUB($tabla, $item, $valor);

							foreach ($subcategorias as $key => $value) {
								
								echo '<a href="'.$url.$idioma.'/'.$value["ruta"].'" class="text-secondary">
										<li class="small my-2">'.ControladorTraductor::ctrTraducir($idioma, $value["subcategoria"]).'</li>	
									 </a>';
							}


						?>		

						</ul>

					</div>

					<!--=====================================
					DESCRIPCIÓN BREVE CATEGORIA
					======================================-->

					<div class="d-none d-lg-block col-lg-5 pt-3">
						
						<div class="card mr-lg-3">
							
							<img class="card-img-top imgCategoria" src="<?php echo $url.$categorias[0]["imgOferta"];?>">

							<div class="card-body">
								
								<h5 class="card-title text-danger"><?php echo ControladorTraductor::ctrTraducir($idioma,"Cursos de");?> <span class="tituloCategoria"><?php echo ControladorTraductor::ctrTraducir($idioma, $categorias[0]["categoria"]);  ?></span></h5>

								 <p class="card-text small desCategoria"><?php echo ControladorTraductor::ctrTraducir($idioma, $categorias[0]["descripcion"]);  ?></p>

								 <a href="<?php echo $url.$idioma.'/'.$categorias[0]["ruta"];?>" class="btn backColor verCursos"><?php echo ControladorTraductor::ctrTraducir($idioma, "Ver cursos"); ?></a>

							</div>

						</div>

					</div>

				</div>
				
			</div>

		</div>

	</div>

</div>

<!--=====================================
BOTONERA AUXILIAR
======================================-->
<div class="container-fluid">
<div class="container d-none d-md-block bg-white">
	
	<div class="row p-0">

		<!--=====================================
		CATEGORÍAS
		======================================-->
		
		<div class="col-md-11 p-0">
			
			<ul class="nav nav-tabs nav-justified border-bottom-0">

				<div class="nav-item dropdown botoneraAuxiliar">
					
					<a class="nav-link dropdown-toggle text-secondary small" href="#" data-toggle="dropdown">
						<?php echo ControladorTraductor::ctrTraducir($idioma,"Otros");?>

					</a>
					
					<div class="dropdown-menu dropdown-menu-right botoneraOtros ">

					</div>
				
				</div>

			</ul>

		</div>

		<!--=====================================
		IDIOMAS
		======================================-->

		<div class="col-md-1 dropdown p-sm-1 mt-1 mt-sm-0">

			 <button type="button" class="btn btn-secondary dropdown-toggle  btn-sm" data-toggle="dropdown">
		    	 <small class="text-uppercase">

		    	 <?php 
		    	 	echo $idioma;
		    	 ?>

		    	 </small>
		 	 </button>


			<div class="dropdown-menu dropdown-menu-right">

				<?php

				 if(isset($rutas[1])){

				 	 	echo '<a class="dropdown-item small" href="'.$url.'es/'.$rutas[1].'">'.ControladorTraductor::ctrTraducir($idioma, "Español").'</a>

						<a class="dropdown-item small" href="'.$url.'en/'.$rutas[1].'">'.ControladorTraductor::ctrTraducir($idioma, "Inglés").'</a>

						<a class="dropdown-item small" href="'.$url.'pt/'.$rutas[1].'">'.ControladorTraductor::ctrTraducir($idioma, "Portugués").'</a>';

				 }else{

				 	echo '<a class="dropdown-item small" href="es">'.ControladorTraductor::ctrTraducir($idioma, "Español").'</a>

					<a class="dropdown-item small" href="en">'.ControladorTraductor::ctrTraducir($idioma, "Inglés").'</a>

					<a class="dropdown-item small" href="pt">'.ControladorTraductor::ctrTraducir($idioma, "Portugués").'</a>';


				 }


				?>
			</div>

		</div>


	</div>


</div>



</div>