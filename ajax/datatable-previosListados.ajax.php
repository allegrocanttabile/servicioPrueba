<?php error_reporting(0);?>
<?php
require_once "../controladores/compras.controlador.php";
require_once "../modelos/compras.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";

require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

require_once "../controladores/almacenes.controlador.php";
require_once "../modelos/almacenes.modelo.php";



class TablaPreviosListados{
 	/*=============================================
 	 MOSTRAR LA TABLA LISTADO COMPRAS
 	 =============================================*/
 	 public function mostrarTablaPreviosListados(){
 	 	$item = null;
 	 	$valor = null;
 	 	$orden = "id";
 	 	$listados = ControladorCompras::ctrMostrarCompras($item, $valor, $orden);
 	 	if(count($listados) == 0){
 	 		echo '{"data": []}';
 	 		return;
 	 	}
 	 	$datosJson = '{
 	 		"data": [';
 	 		for($i = 0; $i < count($listados); $i++){
		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
 	 		=============================================*/

 	 		$imagen = "<a href='".$listados[$i]["imagen"]."' target='"._blank."'>"."<img src='".$listados[$i]["imagen"]."' width='40px'>"."</a>";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
 	 		=============================================*/
 	 		$item = "id";
 	 		$valor = $listados[$i]["id_categoria"];
 	 		$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		  	/*=============================================
 	 		TRAEMOS LA MARCA
 	 		=============================================*/
 	 		$item = "id";
 	 		$valor = $listados[$i]["id_marca"];
 	 		$marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);
 	 		$marcas = "<strong>".$marcas["marca_nombre"]."</strong>";

		  	/*=============================================
 	 		TRAEMOS EL MODELO
 	 		=============================================*/
 	 		$item = "id";
 	 		$valor = $listados[$i]["id_modelo"];
 	 		$modelos = ControladorModelos::ctrMostrarModelos($item, $valor);
 	 		$modelos = "<strong>".$modelos["modelo_nombre"]."</strong>";

 	 		/*=============================================
 	 		TRAEMOS EL PROVEEDOR
 	 		=============================================*/
 	 		$item = "id";
 	 		$valor = $listados[$i]["id_proveedor"];
 	 		$proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);
 	 		
 	 		/*=============================================
 	 		TRAEMOS EL ALMACEN
 	 		=============================================*/
 	 		$item = "id";
 	 		$valor = $listados[$i]["id_almacen"];
 	 		$almacenes = ControladorAlmacenes::ctrMostrarAlmacenes($item, $valor);
 	 		$almacenes = "<strong>".$almacenes["almacen_nombre"]."</strong>";

		  	/*=============================================
 	 		CANTIDAD
 	 		=============================================*/
 	 		if($listados[$i]["cantidad"] <= 0){
 	 			$cantidad = "<button class='btn btn-danger'>".$listados[$i]["cantidad"]."</button>";
 	 		}else if($listados[$i]["cantidad"] >=1 && $listados[$i]["cantidad"] <= 2){
 	 			$cantidad = "<button class='btn btn-warning'>".$listados[$i]["cantidad"]."</button>";
 	 		}else{
 	 			$cantidad = "<button class='btn btn-success'>".$listados[$i]["cantidad"]."</button>";
 	 		}


		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
 	 		=============================================*/

 	 		$botones =  "<div class='btn-group'><button class='btn btn-primary agregarCompra recuperarBoton' idcompra='".$listados[$i]["id"]."'>Agregar</button></div>";


 	 		$datosJson .='[

 	 		"'.$listados[$i]["id"].'",
 	 		"'.$imagen.'",
 	 		"'.$categorias["categoria_nombre"].'",
 	 		"'.$marcas.'",
 	 		"'.$modelos.'",
 	 		"'.$listados[$i]["detalles"].'",
 	 		"'.$almacenes.'",
 	 		"'.$listados[$i]["fecha_compra"].'",
 	 		"'.$listados[$i]["precio_compra"].'",
 	 		"'.$cantidad.'",
 	 		"'.$listados[$i]["pago_courier"].'",
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
ACTIVAR TABLA DE LISTADOS
=============================================*/
$activarListados = new TablaPreviosListados();
$activarListados -> mostrarTablaPreviosListados();
