<?php error_reporting(0);?>
<?php
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";


class TablaProductosVentas{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/

	public function mostrarTablaProductosVentas(){

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
 	 		STOCK
  			=============================================*/

  			if($productos[$i]["stock"] <= 0){

  				$stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

  			}else if($productos[$i]["stock"] >= 1 && $productos[$i]["stock"] <= 2){

  				$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";

  			}


  			/*=============================================
 	 			CATEGORIA
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
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

		  	$botones =  "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$productos[$i]["id"]."'>Agregar</button></div>";



		  	$datosJson .='[





		  		  "'.($i+1).'",
			      "'.$stock.'",
			      "'.$categorias["categoria_nombre"].'",
					"'.$marcas["marca_nombre"].'",
					"'.$modelos["modelo_nombre"].'",
			      "'.$productos[$i]["descripcion"].'",
			      "'.$productos[$i]["serie"].'",
			      "'.$productos[$i]["precio_venta"].'",
			      "'.$imagen.'",
			     
			      
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
$activarProductosVentas = new TablaProductosVentas();
$activarProductosVentas -> mostrarTablaProductosVentas();
