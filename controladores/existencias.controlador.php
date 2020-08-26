<?php

class ControladorExistencias{

	/*=============================================
	MOSTRAR EXISTENCIAS
	=============================================*/

	static public function ctrMostrarExistencias($item, $valor, $orden){

		$tabla = "productos";

		$respuesta = ModeloExistencias::mdlMostrarExistencias($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	


}
