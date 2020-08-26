<?php

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

class AjaxMarcas{

	/*=============================================
	EDITAR MARCAS
	=============================================*/	

	public $idMarca;
	public $traerMarca;

	public function ajaxEditarMarca(){

		if ($this->traerMarca == "ok") {
		
		$item = null;
      	$valor = null;
      	$orden = "id";

      	$respuesta = ControladorMarcas::ctrMostrarMarcas($item, $valor,
        $orden);

      	echo json_encode($respuesta);
		
		}else{
		
		$item = "id";
		$valor = $this->idMarca;
		$orden = "id";

		$respuesta = ControladorMarcas::ctrMostrarMarcas($item, $valor, $orden);

		echo json_encode($respuesta);
		}



		

	}
}

/*=============================================
EDITAR MARCAS
=============================================*/	
if(isset($_POST["idMarca"])){

	$marca = new AjaxMarcas();
	$marca -> idMarca = $_POST["idMarca"];
	$marca -> ajaxEditarMarca();
}

/*=============================================
TRAER MARCA
=============================================*/

if(isset($_POST["traerMarca"])){

  $traerMarca = new AjaxMarcas();
  $traerMarca -> traerMarca = $_POST["traerMarca"];
  $traerMarca -> ajaxEditarMarca();

}