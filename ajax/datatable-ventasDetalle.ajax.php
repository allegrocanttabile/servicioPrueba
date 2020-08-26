<?php error_reporting(0);?>
<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";


class TablaVentasDetalle{

 	/*=============================================
 	 MOSTRAR LA TABLA VENTAS DETALLE
  	=============================================*/

	public function mostrarTablaVentasDetalle(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$detalles = ControladorVentas::ctrMostrarVentas($item, $valor, $orden);

  		if(count($detalles) == 0){

  			echo '{"data": []}';

		  	return;
  		}

  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($detalles); $i++){

		  	/*=============================================
 	 		TRAEMOS ID DETALLE DE VENTA
  			=============================================*/

  			$id = "<button class='btn btn-dark'>".$detalles[$i]["id"]."</button>";

  					  	
		  	/*=============================================
 	 		TRAEMOS EL CLIENTE
  			=============================================*/
		  	$item = "id";
		  	$valor = $detalles[$i]["id_cliente"];
		  	$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);


		  	/*=============================================
 	 		TRAEMOS LOS PRODUCTOS
  			=============================================*/


			$productos = json_decode($detalles[$i]["productos"], true);

				$p0 = $productos[0]['categoria']." ".$productos[0]['marca']." ".$productos[0]['modelo']." ".$productos[0]['serie']."<br>";
				$p1 = $productos[1]['categoria']." ".$productos[1]['marca']." ".$productos[1]['modelo']." ".$productos[1]['serie']."<br>";
				$p2 = $productos[2]['categoria']." ".$productos[2]['marca']." ".$productos[2]['modelo']." ".$productos[2]['serie']."<br>";
				$p3 = $productos[3]['categoria']." ".$productos[3]['marca']." ".$productos[3]['modelo']." ".$productos[3]['serie']."<br>";
				$p4 = $productos[4]['categoria']." ".$productos[4]['marca']." ".$productos[4]['modelo']." ".$productos[4]['serie']."<br>";
				$p5 = $productos[5]['categoria']." ".$productos[5]['marca']." ".$productos[5]['modelo']." ".$productos[5]['serie']."<br>";
				$p6 = $productos[6]['categoria']." ".$productos[6]['marca']." ".$productos[6]['modelo']." ".$productos[6]['serie']."<br>";
				$p7 = $productos[7]['categoria']." ".$productos[7]['marca']." ".$productos[7]['modelo']." ".$productos[7]['serie']."<br>";

				if (($p0 != "") || ($p1 != "")) {
					$prod = $p0.$p1.$p2.$p3.$p4.$p5.$p6.$p7;
				}


		
			//$prod = $p1.$p2.$p3;



		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='".$detalles[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button></div>";

  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='".$detalles[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='".$detalles[$i]["id"]."' ><i class='fa fa-times'></i></button></div>";

  			}


		  	$datosJson .='[


			      "'.($i+1).'",
			      "'.$id.'",
			      "'.$detalles[$i]["fecha"].'",
			      "'.$clientes["nombre"].'",
			      "'.$detalles[$i]["proviene"].'",
			      "'.$prod.'",

			      "'.$detalles[$i]["desp"].'",
			      "'.$detalles[$i]["adelanto"].'",
			      "'.$detalles[$i]["total"].'",
			      "'.$detalles[$i]["estado"].'",
			      "'.$detalles[$i]["tipo"].'",
			      "'.$detalles[$i]["entrega"].'",
			      "'.$detalles[$i]["obs"].'",
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
ACTIVAR TABLA DE DETALLE DE VENTAS
=============================================*/
$activarVentasDetalles = new TablaVentasDetalle();
$activarVentasDetalles -> mostrarTablaVentasDetalle();
