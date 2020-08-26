<?php error_reporting(0);?>
<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class TablaClientes{

 	/*=============================================
 	 MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/

	public function mostrarTablaClientes(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$clientes = ControladorClientes::ctrMostrarClientes($item, $valor, $orden);

  		if(count($clientes) == 0){

  			echo '{"data": []}';

		  	return;
  		}

  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($clientes); $i++){

		  	/*=============================================
 	 		TRAEMOS ID CLIENTE
  			=============================================*/

  			$id = "<button class='btn btn-dark'>".$clientes[$i]["id"]."</button>";

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Vendedor"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCliente' idCliente='".$clientes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCliente'><i class='fa fa-pencil'></i></button></div>";

  			}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial") {
  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCliente' idCliente='".$clientes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCliente'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCliente' idCliente='".$clientes[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";
  				
  			}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador") {
  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCliente' idCliente='".$clientes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCliente'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCliente' idCliente='".$clientes[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";
  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCliente' idCliente='".$clientes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCliente'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCliente' idCliente='".$clientes[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";

  			}


		  	$datosJson .='[


			      
			      "'.$id.'",
			      "'.$clientes[$i]["nombre"].'",
			      "'.$clientes[$i]["documento"].'",
			      "'.$clientes[$i]["email"].'",
			      "'.$clientes[$i]["puntos"].'",
			      "'.$clientes[$i]["compras"].'",
			      "'.$clientes[$i]["ultima_compra"].'",
			      "'.$clientes[$i]["fecha"].'",
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
ACTIVAR TABLA DE CLIENTES
=============================================*/
$activarClientes = new TablaClientes();
$activarClientes -> mostrarTablaClientes();
