<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";


class TablaProductos{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

	public function mostrarTablaProductos(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);	
		
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
		  	$marcas = "<strong>".$marcas["marca_nombre"]."</strong>";
		  	/*=============================================
 	 		TRAEMOS EL MODELO
  			=============================================*/
		  	$item = "id";
		  	$valor = $productos[$i]["id_modelo"];
		  	$modelos = ControladorModelos::ctrMostrarModelos($item, $valor);
		  	$modelos = "<strong>".$modelos["modelo_nombre"]."</strong>";

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
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "cliente"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto'  data-toggle='modal' data-target='#'><i class='fa fa-pencil'></i></button></div>";

  			}

		 
		  	$datosJson .='[


			      "'.($i+1).'",
			      "'.$stock.'",		  
			      "'.$categorias["categoria_nombre"].'",
			      "'.$marcas.'",
			      "'.$modelos.'",
			      "'.$productos[$i]["descripcion"].'",
			      "'.$productos[$i]["serie"].'",
			      "S/. '.number_format($productos[$i]["precio_venta"],2).'",     
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
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();

