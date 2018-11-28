<!--=====================================
FOOTER
======================================-->

<footer class="container-fluid bg-dark text-white">
	
	<div class="container">
	
		<div class="row">

			<!--=====================================
			CONTÁCTENOS
			======================================-->

			<div class="col-12 col-md-4 py-5">
			<!--	
				<ul class="text-left">
					
					<li>
						<i class="fas fa-map-marker-alt pr-2"></i> Calle 27 # 40 - 46
					</li>
					<li>
						<i class="fas fa-globe pr-2"></i> Medellín - Colombia
					</li>
					<li>
						<i class="fas fa-envelope pr-2"></i> cursos@tutorialesatualcance.com
					</li>

				</ul>
-->
				<h4 class="text-uppercase"><?php echo ControladorTraductor::ctrTraducir($idioma, "Síguenos");?></h4>

				<!--=====================================
				REDES SOCIALES
				======================================-->

				<div class="col-12">
					
					<ul class="list-inline">	

						<li class="list-inline-item">
							
							<a href="https://www.facebook.com/tutorialesatualcance" target="_blank">
								
								<h3><i class="text-white fab fa-facebook-square redSocial" ></i></h3>
							
							</a>
						
						</li>

						<li class="list-inline-item">
							
							<a href="https://www.youtube.com/c/TutorialesatuAlcance" target="_blank">
								
								<h3><i class="text-white fab fa-youtube-square redSocial"></i></h3>
							
							</a>
						
						</li>

						<li class="list-inline-item">
							
							<a href="https://twitter.com/juanfurrego" target="_blank">
								
								<h3><i class="text-white fab fa-twitter-square redSocial"></i></h3>
							
							</a>
						
						</li>

						<li class="list-inline-item">
							
							<a href="https://www.linkedin.com/in/juanfernandourrego/" target="_blank">
								
								<h3><i class="text-white fab fa-linkedin redSocial"></i></h3>
							
							</a>
						
						</li>

						<li class="list-inline-item">
							
							<a href="https://plus.google.com/+TutorialesatuAlcanceOficial" target="_blank">
								
								<h3><i class="text-white fab fa-google-plus-square redSocial"></i></h3>
							
							</a>
						
						</li>
									
					</ul>

				</div>

			</div>

			<!--=====================================
			CATEGORÍAS
			======================================-->

			<div class="col-12 col-md-4 py-5">
				
				<h4 class="text-uppercase"><?php echo ControladorTraductor::ctrTraducir($idioma, "¿Hoy qué quieres aprender?");?></h4>

				<ul class="row list-unstyled" style="border:1px solid #666">
					
				<?php

					$categorias = ControladorCategorias::ctrMostrarCATySUB("categorias", null, null);

					for($i = 0; $i < count($categorias)/2; $i ++){

	   					echo '<li class="bg-dark col-6 small py-2" style="border:1px solid #666">

						 		<a href="'.$url.$idioma.'/'.$categorias[$i]["ruta"].'" class="text-white">

						 			<i class="'.$categorias[$i]["icono"].'"></i> '.ControladorTraductor::ctrTraducir($idioma, $categorias[$i]["categoria"]).'

					 			</a>

			 				</li>';
	   				}

	   				for($i = count($categorias)/2+1; $i < count($categorias); $i ++){

	   					echo '<li class="bg-dark col-6 small py-2" style="border:1px solid #666">

						 		<a href="'.$url.$idioma.'/'.$categorias[$i]["ruta"].'" class="text-white">

						 			<i class="'.$categorias[$i]["icono"].'"></i> '.ControladorTraductor::ctrTraducir($idioma, $categorias[$i]["categoria"]).'

					 			</a>

			 				</li>';
	   				}


				?>

				</ul>


			</div>

			<!--=====================================
			FORMULARIO
			======================================-->

			<div class="col-12 col-md-4 py-5">
				
				<h4 class="text-uppercase"><?php echo ControladorTraductor::ctrTraducir($idioma, "Resuelve tu inquietud");?></h4>

				<form method="post" onsubmit="return validarContactenos()">
			            		            
			        <input type="text" id="nombreContactenos" name="nombreContactenos" class="form-control mt-3" placeholder="<?php echo ControladorTraductor::ctrTraducir($idioma, "Escriba su nombre");?>" required>  
		        	      
		           <input type="email" id="emailContactenos" name="emailContactenos" class="form-control mt-3" placeholder="<?php echo ControladorTraductor::ctrTraducir($idioma, "Escriba su correo electrónico");?>" required>  
		        		     	          
		           <textarea id="mensajeContactenos" name="mensajeContactenos" class="form-control mt-3" placeholder="<?php echo ControladorTraductor::ctrTraducir($idioma, "Escriba su mensaje");?>" rows="5" required ></textarea>  
		        	
		           <input type="submit" value="<?php echo ControladorTraductor::ctrTraducir($idioma, "Enviar");?>" class="btn btn-danger backColor mt-3">


		            <?php

		           		$contactenos = new ControladorPlantilla();
		           		$contactenos -> ctrFormularioContactenos();

		           ?>	

		           

			        </form>	         	


			</div>

		</div>

	</div>

</footer>