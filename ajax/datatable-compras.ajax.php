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



class TablaCompras{
 	/*=============================================
 	 MOSTRAR LA TABLA DE COMPRAS
 	 =============================================*/
 	 public function mostrarTablaCompras(){
 	 	$item = null;
 	 	$valor = null;
 	 	$orden = "id";
 	 	$compras = ControladorCompras::ctrMostrarCompras($item, $valor, $orden);
 	 	if(count($compras) == 0){
 	 		echo '{"data": []}';
 	 		return;
 	 	}
 	 	$datosJson = '{
 	 		"data": [';
 	 		for($i = 0; $i < count($compras); $i++){
		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
 	 		=============================================*/

 	 		$imagen = "<a href='".$compras[$i]["imagen"]."' target='"._blank."'>"."<img src='".$compras[$i]["imagen"]."' width='40px'>"."</a>";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
 	 		=============================================*/
 	 		$item = "id";
 	 		$valor = $compras[$i]["id_categoria"];
 	 		$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		  	/*=============================================
 	 		TRAEMOS LA MARCA
 	 		=============================================*/
 	 		$item = "id";
 	 		$valor = $compras[$i]["id_marca"];
 	 		$marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);
 	 		$marcas = "<strong>".$marcas["marca_nombre"]."</strong>";

		  	/*=============================================
 	 		TRAEMOS EL MODELO
 	 		=============================================*/
 	 		$item = "id";
 	 		$valor = $compras[$i]["id_modelo"];
 	 		$modelos = ControladorModelos::ctrMostrarModelos($item, $valor);
 	 		$modelos = "<strong>".$modelos["modelo_nombre"]."</strong>";

 	 		/*=============================================
 	 		TRAEMOS EL PROVEEDOR
 	 		=============================================*/
 	 		$item = "id";
 	 		$valor = $compras[$i]["id_proveedor"];
 	 		$proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);
 	 		
 	 		/*=============================================
 	 		TRAEMOS EL ALMACEN
 	 		=============================================*/
 	 		$item = "id";
 	 		$valor = $compras[$i]["id_almacen"];
 	 		$almacenes = ControladorAlmacenes::ctrMostrarAlmacenes($item, $valor);
 	 		$almacenes = "<strong>".$almacenes["almacen_nombre"]."</strong>";

		  	/*=============================================
 	 		CANTIDAD
 	 		=============================================*/
 	 		if($compras[$i]["cantidad"] <= 0){
 	 			$cantidad = "<button class='btn btn-danger'>".$compras[$i]["cantidad"]."</button>";
 	 		}else if($compras[$i]["cantidad"] >=1 && $compras[$i]["cantidad"] <= 2){
 	 			$cantidad = "<button class='btn btn-warning'>".$compras[$i]["cantidad"]."</button>";
 	 		}else{
 	 			$cantidad = "<button class='btn btn-success'>".$compras[$i]["cantidad"]."</button>";
 	 		}


		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
 	 		=============================================*/

 	 		if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Vendedor"){
 	 			$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCompra' idCompra='".$compras[$i]["id"]."' data-toggle='modal' data-target='#'><i class='fa fa-pencil'></i></button></div>";

 	 		}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial") {
 	 			$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCompra' idCompra='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompra'><i class='fa fa-pencil'></i></button></div>";

 	 		}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador") {
 	 			$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCompra' idCompra='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompra'><i class='fa fa-pencil'></i></button></div>";
 	 		}else{
 	 			$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCompra' idCompra='".$compras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCompra'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCompra' idCompra='".$compras[$i]["id"]."' codigo='".$compras[$i]["codigo"]."' imagen='".$compras[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";
 	 		}
 	 		$datosJson .='[

 	 		"'.$compras[$i]["id"].'",
 	 		"'.$imagen.'",
 	 		"'.$categorias["categoria_nombre"].'",
 	 		"'.$marcas.'",
 	 		"'.$modelos.'",
 	 		"'.$compras[$i]["detalles"].'",
 	 		"'.$proveedores["proveedor_nombre"].'",
 	 		"'.$compras[$i]["numero_orden"].'",
 	 		"'.$almacenes.'",
 	 		"'.$compras[$i]["fecha_compra"].'",
 	 		"'.$compras[$i]["precio_compra"].'",
 	 		"'.$compras[$i]["fecha_entrega"].'",
 	 		"'.$cantidad.'",
 	 		"'.$compras[$i]["pago_courier"].'",
 	 		"'.$compras[$i]["fecha"].'",
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
ACTIVAR TABLA DE COMPRAS
=============================================*/
$activarCompras = new TablaCompras();
$activarCompras -> mostrarTablaCompras();
