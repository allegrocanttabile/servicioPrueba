<?php

class ControladorAlertas{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarAlertas($item, $valor, $orden){

		$tabla = "productos";

		$respuesta = ModeloAlertas::mdlMostrarAlertas($tabla, $item, $valor, $orden);

		return $respuesta;

	}



}









