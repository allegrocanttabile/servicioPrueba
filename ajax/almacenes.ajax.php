<?php

require_once "../controladores/almacenes.controlador.php";
require_once "../modelos/almacenes.modelo.php";

class AjaxAlmacenes{

	/*=============================================
	EDITAR ALMACENES
	=============================================*/	

	public $idAlmacen;
	public $traerAlmacen;

	public function ajaxEditarAlmacen(){

		if ($this->traerAlmacen == "ok") {
		
		$item = null;
      	$valor = null;
      	$orden = "id";

      	$respuesta = ControladorAlmacenes::ctrMostrarAlmacenes($item, $valor,
        $orden);

      	echo json_encode($respuesta);
		
		}else{
		
		$item = "id";
		$valor = $this->idAlmacen;
		$orden = "id";

		$respuesta = ControladorAlmacenes::ctrMostrarAlmacenes($item, $valor, $orden);

		echo json_encode($respuesta);
		}



		

	}
}

/*=============================================
EDITAR ALMACENES
=============================================*/	
if(isset($_POST["idAlmacen"])){

	$almacen = new AjaxAlmacenes();
	$almacen -> idAlmacen = $_POST["idAlmacen"];
	$almacen -> ajaxEditarAlmacen();
}

/*=============================================
TRAER ALMACEN
=============================================*/

if(isset($_POST["traerAlmacen"])){

  $traerAlmacen = new AjaxAlmacenes();
  $traerAlmacen -> traerAlmacen = $_POST["traerAlmacen"];
  $traerAlmacen -> ajaxEditarAlmacen();

}