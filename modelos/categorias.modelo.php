<?php

require_once "conexion.php";

/*=============================================
MODELO DE CATEGORIAS Y SUBCATEGORIAS
=============================================*/

class ModeloCategorias{

	/*=============================================
	MOSTRAR CATEGORIAS Y SUBCATEGORIAS
	=============================================*/

	static public function mdlMostrarCATySUB($tabla, $item, $valor){

		if($item == null && $valor == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt = null;

	}

	/*=============================================
	CAMBIAR OFERTAS A CATEGORÍAS Y SUBCATEGORÍAS
	=============================================*/

	static public function mdlActualizarOfertas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET oferta = :oferta, descuento = :descuento, finOferta = :finOferta");

		$stmt -> bindParam(":oferta", $datos["oferta"], PDO::PARAM_STR);
		$stmt -> bindParam(":descuento", $datos["descuento"], PDO::PARAM_STR);
		$stmt -> bindParam(":finOferta", $datos["finOferta"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, descripcion = :descripcion, palabrasClaves = :palabrasClaves, icono = :icono, imgOferta = :imgOferta, imgBanner = :imgBanner, oferta = :oferta, descuento = :descuento, finOferta = :finOferta WHERE categoria = :categoria");

		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":palabrasClaves", $datos["palabrasClaves"], PDO::PARAM_STR);
		$stmt -> bindParam(":icono", $datos["icono"], PDO::PARAM_STR);
		$stmt -> bindParam(":imgOferta", $datos["imgOferta"], PDO::PARAM_STR);
		$stmt -> bindParam(":imgBanner", $datos["imgBanner"], PDO::PARAM_STR);
		$stmt -> bindParam(":oferta", $datos["oferta"], PDO::PARAM_STR);
		$stmt -> bindParam(":descuento", $datos["descuento"], PDO::PARAM_STR);
		$stmt -> bindParam(":finOferta", $datos["finOferta"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;

	}

	/*=============================================
	EDITAR SUBCATEGORIA
	=============================================*/

	static public function mdlEditarSubcategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET oferta = :oferta, descuento = :descuento, finOferta = :finOferta WHERE subcategoria = :subcategoria");

		$stmt -> bindParam(":subcategoria", $datos["subcategoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":oferta", $datos["oferta"], PDO::PARAM_STR);
		$stmt -> bindParam(":descuento", $datos["descuento"], PDO::PARAM_STR);
		$stmt -> bindParam(":finOferta", $datos["finOferta"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;

	}

}