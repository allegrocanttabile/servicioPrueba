<?php error_reporting(0);?>
<?php

require_once "../controladores/envios.controlador.php";
require_once "../modelos/envios.modelo.php";

class TablaEnvios{

 	/*=============================================
 	 MOSTRAR LA TABLA DE ENVIOS
  	=============================================*/

	public function mostrarTablaEnvios(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$envios = ControladorEnvios::ctrMostrarEnvios($item, $valor, $orden);

  		if(count($envios) == 0){

  			echo '{"data": []}';

		  	return;
  		}

  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($envios); $i++){

		  	/*=============================================
 	 		TRAEMOS ID ENVIOS
  			=============================================*/

  			$id = "<button class='btn btn-dark'>".$envios[$i]["idEnvios"]."</button>";


  			$pago = "<button class='btn btn-success'>".$envios[$i]["pago"]."</button>";

		  	$datosJson .='[


			      
			      "'.$id.'",
			      "'.$envios[$i]["distrito"].'",
			      "'.$pago.'"
			     
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   ']

		 }';

		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE ENVIOS
=============================================*/
$activarEnvios = new TablaEnvios();
$activarEnvios -> mostrarTablaEnvios();
