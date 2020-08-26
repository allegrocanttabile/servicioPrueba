<?php

require_once "../controladores/pasajeros.controlador.php";
require_once "../modelos/pasajeros.modelo.php";

class AjaxPasajeros{

	/*=============================================
	EDITAR PASAJEROS
	=============================================*/	

	public $idPasajero;

	public function ajaxEditarPasajero(){

		$item = "id";
		$valor = $this->idPasajero;

		$respuesta = ControladorPasajeros::ctrMostrarPasajeros($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR PASAJEROS
=============================================*/	
if(isset($_POST["idPasajero"])){

	$pasajero = new AjaxPasajeros();
	$pasajero -> idPasajero = $_POST["idPasajero"];
	$pasajero -> ajaxEditarPasajero();
}
