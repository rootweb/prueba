<?php


class ControladorPlantilla{



/*=============================================
	INCLUIR A LA PLANTILLA
	=============================================*/

	public function ctrPlantilla(){

		include "vistas/plantilla.php";

	}


/*=============================================
	FORMULARIO CONTACTENOS
	=============================================*/

	public function ctrFormularioContactenos(){

		if(isset($_POST["mensajeContactenos"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreContactenos"]) &&
			 preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailContactenos"]) &&
			   preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["mensajeContactenos"])
			 ){

				/*=============================================
				ENVÍO CORREO ELECTRÓNICO CON PHP MAILER
				=============================================*/

				date_default_timezone_set("America/Bogota");

				$mail = new PHPMailer;

				$mail->CharSet = 'UTF-8';

				$mail->isMail();
				$mail->setFrom('cursos@tutorialesatualcance.com', 'Tutoriales a tu Alcance');

				$mail->addReplyTo($_POST["emailContactenos"], $_POST["nombreContactenos"]);

				$mail->Subject = "Ha recibido una consulta";

				$mail->addAddress("tucorreo@tudominio.com");

				$mail->msgHTML('<div style="width:700px; background:#9ac; position:relative; font-family:sans-serif; padding-bottom:40px">

						<center>

							<img style="padding:20px; width:25%" src="https://tutorialesatualcance.com/vistas/img/plantilla/tutoriales_a_tu_alcance_logo.png">

						</center>

						<div style="position:relative; margin:auto; width:600px; background:white; padding-bottom:20px">

							<center>
								
								<img style="padding-top:20px; width:15%" src="https://www.tutorialesatualcance.com/vistas/img/plantilla/icon-email.png">

								<h3 style="font-weight:100; color:#999;">HA RECIBIDO UNA CONSULTA</h3>

								<hr style="width:80%; border:1px solid #ccc">

								<h4 style="font-weight:100; color:#999; padding:0px 20px; text-transform:uppercase">'.$_POST["nombreContactenos"].'</h4>
								<h4 style="font-weight:100; color:#999; padding:0px 20px;">De: '.$_POST["emailContactenos"].'</h4>
								<h4 style="font-weight:100; color:#999; padding:0px 20px">'.$_POST["mensajeContactenos"].'</h4>

								<hr style="width:80%; border:1px solid #ccc">

							</center>

						</div>
						
					</div>');

				$envio = $mail->Send();

				if(!$envio){

					echo '<script> 

							swal({
								  	type:"error",
								  	title: "¡ERROR!",
								  	text: "¡Ha ocurrido un problema enviando el mensaje!",							 
							 		showConfirmButton: true,
									confirmButtonText: "Cerrar"
								
								}).then(function(result){

									if(result.value){
										history.back();
									}
							});

						</script>';


				}else{

					echo '<script> 

							swal({
								 	type: "success",
							  		title: "¡OK!",
							  		text: "¡Su mensaje ha sido enviado, muy pronto le responderemos!",					 
									showConfirmButton: true,
									confirmButtonText: "Cerrar"
								
								}).then(function(result){

									if(result.value){
										history.back();
									}
							});


						</script>';

				}


			}else{

				echo '<script>

					swal({
					 		type:"error",
							title: "¡ERROR!",
						  	text: "¡Problemas al enviar el mensaje, revise que no tenga caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						
						}).then(function(result){

							if(result.value){
								history.back();
							}
					});

				</script>';

			}

		}

	}

}