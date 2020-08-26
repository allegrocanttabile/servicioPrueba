<?php error_reporting(0);?>
<?php

require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";


class TablaProveedores{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PROVEEDORES
  	=============================================*/

	public function mostrarTablaProveedores(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor, $orden);

  		if(count($proveedores) == 0){

  			echo '{"data": []}';

		  	return;
  		}

  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($proveedores); $i++){

		  	/*=============================================
 	 		TRAEMOS ID MODELO
  			=============================================*/

  			$id = "<button class='btn btn-dark'>".$proveedores[$i]["id"]."</button>";

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Vendedor"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProveedor' idProveedor='".$proveedores[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProveedor'><i class='fa fa-pencil'></i></button></div>";

  			}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial") {
  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProveedor' idProveedor='".$proveedores[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProveedor'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProveedor' idProveedor='".$proveedores[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";
  				
  			}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador") {
  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProveedor' idProveedor='".$proveedores[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProveedor'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProveedor' idProveedor='".$proveedores[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";
  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProveedor' idProveedor='".$proveedores[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProveedor'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProveedor' idProveedor='".$proveedores[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";

  			}


		  	$datosJson .='[

			      "'.$id.'",
			      "'.$proveedores[$i]["proveedor_nombre"].'",
            "'.$proveedores[$i]["fecha"].'",
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
ACTIVAR TABLA DE PROVEEDORES
=============================================*/
$activarProveedores = new TablaProveedores();
$activarProveedores -> mostrarTablaProveedores();
