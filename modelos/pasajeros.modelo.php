<?php

require_once "conexion.php";

class ModeloPasajeros{

	/*=============================================
	CREAR PASAJERO
	=============================================*/

	static public function mdlIngresarPasajero($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(pasajero_nombre) VALUES (:pasajero_nombre)");

		$stmt->bindParam(":pasajero_nombre", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR PASAJEROS
	=============================================*/

	static public function mdlMostrarPasajeros($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR PASAJERO
	=============================================*/

	static public function mdlEditarPasajero($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET pasajero_nombre = :pasajero_nombre WHERE id = :id");

		$stmt -> bindParam(":pasajero_nombre", $datos["pasajero_nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR PASAJERO
	=============================================*/

	static public function mdlBorrarPasajero($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

