<!--=====================================
BACKEND
======================================-->

<div class="container-fluid py-4">

	<div class="container">
		
		<div class="row">
			
			<div class="col-12 text-center">
				
			<?php

				if(isset($_SESSION["validarSesion"])){

					if($_SESSION["validarSesion"] == "ok"){

						include "vistas/modulos/gestor.php";

					}

				}else{

					include "vistas/modulos/login.php";

				}

			?>

			</div>

		</div>

	</div>

</div>