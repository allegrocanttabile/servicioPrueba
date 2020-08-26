<?php
require_once "conexion.php";

class ModeloAlertas{

	/*=============================================
	MOSTRAR ALERTAS
	=============================================*/

	static public function mdlMostrarAlertas($tabla, $item, $valor, $orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{
			

			$stmt = Conexion::conectar()->prepare("

				select id, id_categoria, id_marca, id_modelo, sum(stock)
				from $tabla
				where stock >=0 
				group by id_modelo
				HAVING SUM(stock) <= 1


				");

			
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

}

