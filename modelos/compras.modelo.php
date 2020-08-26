<?php

require_once "conexion.php";

class ModeloCompras{

	/*=============================================
	CREAR COMPRAS
	=============================================*/

	static public function mdlIngresarCompra($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, imagen, id_categoria, id_marca, id_modelo, detalles, id_proveedor, numero_orden, id_almacen, fecha_compra, precio_compra, fecha_entrega, cantidad, pago_courier) VALUES (:codigo, :imagen, :id_categoria, :id_marca, :id_modelo, :detalles, :id_proveedor, :numero_orden, :id_almacen, :fecha_compra, :precio_compra, :fecha_entrega, :cantidad, :pago_courier)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":id_marca", $datos["id_marca"], PDO::PARAM_INT);
		$stmt->bindParam(":id_modelo", $datos["id_modelo"], PDO::PARAM_INT);
		$stmt->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);
		$stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
		$stmt->bindParam(":numero_orden", $datos["numero_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id_almacen", $datos["id_almacen"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_compra", $datos["fecha_compra"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_entrega", $datos["fecha_entrega"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
		$stmt->bindParam(":pago_courier", $datos["pago_courier"], PDO::PARAM_INT);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR COMPRAS
	=============================================*/

	static public function mdlMostrarCompras($tabla, $item, $valor){

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
	EDITAR COMPRA
	=============================================*/

	static public function mdlEditarCompra($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, imagen = :imagen, id_categoria= :id_categoria, id_marca= :id_marca, id_modelo= :id_modelo, detalles= :detalles, id_proveedor= :id_proveedor, numero_orden= :numero_orden, id_almacen= :id_almacen, fecha_compra= :fecha_compra, precio_compra= :precio_compra, fecha_entrega= :fecha_entrega, cantidad= :cantidad, pago_courier= :pago_courier WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":id_marca", $datos["id_marca"], PDO::PARAM_INT);
		$stmt->bindParam(":id_modelo", $datos["id_modelo"], PDO::PARAM_INT);
		$stmt->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);
		$stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
		$stmt->bindParam(":numero_orden", $datos["numero_orden"], PDO::PARAM_INT);
		$stmt->bindParam(":id_almacen", $datos["id_almacen"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_compra", $datos["fecha_compra"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_entrega", $datos["fecha_entrega"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
		$stmt->bindParam(":pago_courier", $datos["pago_courier"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR COMPRA
	=============================================*/

	static public function mdlBorrarCompra($tabla, $datos){

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


	/*=============================================
	ACTUALIZAR COMPRAS
	=============================================*/

	static public function mdlActualizarCompras($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

		$stmt = null;

	}


}

