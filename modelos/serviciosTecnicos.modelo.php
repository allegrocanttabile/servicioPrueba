<?php

require_once "conexion.php";

class ModeloServiciosTecnicos{

	/*=============================================
	MOSTRAR SERVICIOS TECNICOS
	=============================================*/

	static public function mdlMostrarServiciosTecnicos($tabla, $item, $valor, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id desc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	AGREGAR SERVICIO TECNICO
	=============================================*/
	static public function mdlIngresarServicioTecnico($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha_registro, nombre_cliente, nro_contacto, email, categoria, marca, modelo, nro_serie, reporte, obs, tecnico, estado) 
		VALUES (:fecha_registro, :nombre_cliente, :nro_contacto, :email, :categoria, :marca, :modelo, :nro_serie, :reporte, :obs, :tecnico, :estado)");

		
		$stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_cliente", $datos["nombre_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_contacto", $datos["nro_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_serie", $datos["nro_serie"], PDO::PARAM_STR);
		$stmt->bindParam(":reporte", $datos["reporte"], PDO::PARAM_STR);
		$stmt->bindParam(":obs", $datos["obs"], PDO::PARAM_STR);
		$stmt->bindParam(":tecnico", $datos["tecnico"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR SERVICIO TECNICO
	=============================================*/
	static public function mdlEditarServicioTecnico($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha_registro = :fecha_registro, nombre_cliente = :nombre_cliente, nro_contacto = :nro_contacto, email = :email, categoria = :categoria, marca = :marca, modelo = :modelo, nro_serie = :nro_serie, reporte = :reporte, obs = :obs, tecnico = :tecnico, estado = :estado WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_registro", $datos["fecha_registro"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_cliente", $datos["nombre_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_contacto", $datos["nro_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":nro_serie", $datos["nro_serie"], PDO::PARAM_STR);
		$stmt->bindParam(":reporte", $datos["reporte"], PDO::PARAM_STR);
		$stmt->bindParam(":obs", $datos["obs"], PDO::PARAM_STR);
		$stmt->bindParam(":tecnico", $datos["tecnico"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR SERVICIO TECNICO
	=============================================*/

	static public function mdlEliminarServicioTecnico($tabla, $datos){

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