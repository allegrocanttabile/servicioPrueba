<?php error_reporting(0);?>
<?php

require_once "../controladores/cotizacion.controlador.php";
require_once "../modelos/cotizacion.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";


class TablaCotizacion{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/

	public function mostrarTablaCotizacion(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$productos = ControladorCotizacion::ctrMostrarCotizacion($item, $valor, $orden);

  		if(count($productos) == 0){

  			echo '{"data": []}';

		  	return;
  		}

  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($productos); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/

		  	$imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/

		  	$item = "id";
		  	$valor = $productos[$i]["id_categoria"];
		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		  	/*=============================================
 	 		TRAEMOS LA MARCA
  			=============================================*/

		  	$item = "id";
		  	$valor = $productos[$i]["id_marca"];
		  	$marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);

		  	/*=============================================
 	 		TRAEMOS EL MODELO
  			=============================================*/

		  	$item = "id";
		  	$valor = $productos[$i]["id_modelo"];
		  	$modelos = ControladorModelos::ctrMostrarModelos($item, $valor);


		  	/*=============================================
 	 		STOCK
  			=============================================*/

  			if($productos[$i]["stock"] <= 0){

  				$stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

  			}else if($productos[$i]["stock"] >=1 && $productos[$i]["stock"] <= 2){

  				$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";

  			}

  			/*=============================================
 	 		FECHA COMPRA
  			=============================================*/

  			$fecha_actual = date("Y-m-d");
			$fecha_actual2 = date("Y-m-d", strtotime("$fecha_actual - 6 month"));
			$fecha_actual3 = date("Y-m-d", strtotime("$fecha_actual - 3 month"));


  			if($productos[$i]["fecha_compra"] <= $fecha_actual2 ){

  				$fecha_compra = "<button class='button botonRojo'>".date("d-m-Y", strtotime($productos[$i]["fecha_compra"]))."</button>";



  			}else if ($productos[$i]["fecha_compra"] <= $fecha_actual3 ){

  				$fecha_compra = "<button class='button botonAmarillo'>".date("d-m-Y", strtotime($productos[$i]["fecha_compra"]))."</button>";

  			}else{

  				$fecha_compra = "<button class='button botonVerde'>".date("d-m-Y", strtotime($productos[$i]["fecha_compra"]))."</button>";

  			}



		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";

  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";

  			}


		  	$datosJson .='[


			      "'.($i+1).'",
			      "'.$stock.'",
			      "'.$categorias["categoria"].'",
			      "'.$marcas["marca"].'",
						"'.$productos[$i]["marca"].'",
			      "'.$modelos["modelo"].'",
						"'.$productos[$i]["modelo"].'",
			      "'.$productos[$i]["descripcion"].'",
			      "'.$productos[$i]["serie"].'",
			      "'.$productos[$i]["proveedor"].'",
			      "'.$fecha_compra.'",
			      "$ '.number_format($productos[$i]["precio_compra"],2).'",
			      "$ '.number_format($productos[$i]["traida"],2).'",
			      "'.$productos[$i]["courier"].'",
			      "S/. '.number_format($productos[$i]["precio_venta"],2).'",
			      "'.$productos[$i]["obs"].'",
			      "'.$imagen.'",
			      "'.$productos[$i]["fecha"].'",
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
ACTIVAR TABLA DE PRODUCTOS
=============================================*/
$activarCotizacion = new TablaCotizacion();
$activarCotizacion -> mostrarTablaCotizacion();
