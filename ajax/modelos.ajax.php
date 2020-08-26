<?php

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";

class AjaxModelos{

	/*=============================================
	EDITAR MODELOS
	=============================================*/	

	public $idModelo;

	public function ajaxEditarModelo(){

		$item = "id";
		$valor = $this->idModelo;

		$respuesta = ControladorModelos::ctrMostrarModelos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR MODELOS
=============================================*/	
if(isset($_POST["idModelo"])){

	$modelo = new AjaxModelos();
	$modelo -> idModelo = $_POST["idModelo"];
	$modelo -> ajaxEditarModelo();
}
