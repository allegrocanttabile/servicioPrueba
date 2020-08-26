<?php error_reporting(0);?>
<?php

require_once "../controladores/almacenes.controlador.php";
require_once "../modelos/almacenes.modelo.php";


class TablaAlmacenes{

 	/*=============================================
 	 MOSTRAR LA TABLA DE ALMACEN
  =============================================*/

	public function mostrarTablaAlmacenes(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$almacenes = ControladorAlmacenes::ctrMostrarAlmacenes($item, $valor, $orden);

  		if(count($almacenes) == 0){

  			echo '{"data": []}';

		  	return;
  		}

  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($almacenes); $i++){

		  	/*=============================================
 	 		TRAEMOS ID ALMACEN
  			=============================================*/

  			$id = "<button class='btn btn-dark'>".$almacenes[$i]["id"]."</button>";

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Vendedor"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarAlmacen' idAlmacen='".$almacenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarAlmacen'><i class='fa fa-pencil'></i></button></div>";


  			}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial") {
  				
          $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarAlmacen' idAlmacen='".$almacenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarAlmacen'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarAlmacen' idAlmacen='".$almacenes[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";

  				
  			}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador") {
  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarAlmacen' idAlmacen='".$almacenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarAlmacen'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarAlmacen' idAlmacen='".$almacenes[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";
          
  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarAlmacen' idAlmacen='".$almacenes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarAlmacen'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarAlmacen' idAlmacen='".$almacenes[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";

  			}


		  	$datosJson .='[

			      "'.$id.'",
			      "'.$almacenes[$i]["almacen_nombre"].'",
            	  "'.$almacenes[$i]["fecha"].'",
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
ACTIVAR TABLA DE ALMACEN
=============================================*/
$activarAlmacen = new TablaAlmacenes();
$activarAlmacen -> mostrarTablaAlmacenes();
