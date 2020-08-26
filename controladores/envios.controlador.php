<?php

class ControladorEnvios{

	/*=============================================
	MOSTRAR ENVIOS
	=============================================*/

	static public function ctrMostrarEnvios($item, $valor, $orden){

		$tabla = "envios";

		$respuesta = ModeloEnvios::mdlMostrarEnvios($tabla, $item, $valor, $orden);

		return $respuesta;

	}




}
