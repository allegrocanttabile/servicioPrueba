<?php

require_once "conexion.php";

class ModeloExistencias
{

	/*=============================================
	MOSTRAR EXISTENCIAS
	=============================================*/

	static public function mdlMostrarExistencias($tabla, $item, $valor, $orden)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("select id, imagen, id_categoria, id_marca, marca, id_modelo, modelo, sum(stock),
			AVG(precio_compra), AVG(traida) from $tabla where stock > 0 GROUP BY id_modelo ORDER BY id desc");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("select id, imagen, id_categoria, id_marca, marca, id_modelo, modelo, sum(stock),
			AVG(precio_compra), AVG(traida) from $tabla where stock > 0 GROUP BY id_modelo ORDER BY id desc");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}
}
