<?php error_reporting(0);?>
<?php
require_once "../controladores/alertas.controlador.php";
require_once "../modelos/alertas.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";
require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";
require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";
class TablaProductos{
 	/*=============================================
 	 MOSTRAR LA TABLA LISTADO STOCK
 	 =============================================*/
 	 public function mostrarTablaProductos(){
 	 	$item = null;
 	 	$valor = null;
 	 	$orden = "id";
 	 	$productos = ControladorAlertas::ctrMostrarAlertas($item, $valor, $orden);
 	 	if(count($productos) == 0){
 	 		echo '{"data": []}';
 	 		return;
 	 	}
 	 	$datosJson = '{
 	 		"data": [';
 	 		for($i = 0; $i < count($productos); $i++){
 	 			
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
 	 		if($productos[$i]["sum(stock)"] <= 0){
 	 			$stock = "<button class='btn btn-danger'>".$productos[$i]["sum(stock)"]."</button>";
 	 		}else{
 	 			$stock = "<button class='btn btn-warning'>".$productos[$i]["sum(stock)"]."</button>";
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

 	 		


 	 		$datosJson .='[

 	 		"'.($i+1).'",
 	 		"'.$categorias["categoria_nombre"].'",
 	 		"'.$marcas.'",
 	 		"'.$modelos.'",
 	 		"'.$stock.'"
 	 		
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
