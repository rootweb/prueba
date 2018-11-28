<!--=====================================
FORMULARIO DE INGRESO
======================================-->

<form method="post" class="m-auto formLogin">
	
	<h3>Ingresar al backend</h3>

	<hr>

	<div class="input-group mb-3">
		
		<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>

		<div class="input-group-prepend">
			
			<span class="input-group-text">
				
				<i class="fas fa-user"></i>
			
			</span>

		</div>

	</div>

	<div class="input-group mb-3">
		
		<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>

		<div class="input-group-prepend">
			
			<span class="input-group-text">
				
				<i class="fas fa-lock"></i>
			
			</span>

		</div>

	</div>

	<input type="submit" class="btn btn-default backColor btn-block" value="Ingresar">

	<?php

		$ingreso = new ControladorUsuarios();
		$ingreso -> ctrIngresoUsuario();

	?>

</form>