
<?php


require_once "controladores/plantilla.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/traductor.controlador.php";
require_once "controladores/ruta.controlador.php";
require_once "controladores/credenciales.controlador.php";
require_once "controladores/udemy.controlador.php";
require_once "controladores/usuarios.controlador.php";

require_once "modelos/categorias.modelo.php";
require_once "modelos/usuarios.modelo.php";

require_once "extensiones/PHPMailer/PHPMailerAutoload.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();

