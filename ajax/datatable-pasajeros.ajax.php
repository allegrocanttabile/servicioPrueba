<?php error_reporting(0);?>
<?php

require_once "../controladores/pasajeros.controlador.php";
require_once "../modelos/pasajeros.modelo.php";


class TablaPasajeros{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PASAJEROS
  	=============================================*/

	public function mostrarTablaPasajeros(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$pasajeros = ControladorPasajeros::ctrMostrarPasajeros($item, $valor, $orden);

  		if(count($pasajeros) == 0){

  			echo '{"data": []}';

		  	return;
  		}

  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($pasajeros); $i++){

		  	/*=============================================
 	 		TRAEMOS ID MODELO
  			=============================================*/

  			$id = "<button class='btn btn-dark'>".$pasajeros[$i]["id"]."</button>";

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Vendedor"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarPasajero' idPasajero='".$pasajeros[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPasajero'><i class='fa fa-pencil'></i></button></div>";

  			}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial") {
  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarPasajero' idPasajero='".$pasajeros[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPasajero'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarPasajero' idPasajero='".$pasajeros[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";
  				
  			}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador") {
  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarPasajero' idPasajero='".$pasajeros[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPasajero'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarPasajero' idPasajero='".$pasajeros[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";
  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarPasajero' idPasajero='".$pasajeros[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPasajero'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarPasajero' idPasajero='".$pasajeros[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";

  			}


		  	$datosJson .='[

			      "'.$id.'",
			      "'.$pasajeros[$i]["pasajero_nombre"].'",
            "'.$pasajeros[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   ']

		 }';

		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE PASAJEROS
=============================================*/
$activarPasajeros = new TablaPasajeros();
$activarPasajeros -> mostrarTablaPasajeros();
