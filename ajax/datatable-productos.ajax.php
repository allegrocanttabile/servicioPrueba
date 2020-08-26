<?php error_reporting(0); ?>
<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";
require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";
require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";
class TablaProductos
{
	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/
	public function mostrarTablaProductos()
	{
		$item = null;
		$valor = null;
		$orden = "id";
		$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
		if (count($productos) == 0) {
			echo '{"data": []}';
			return;
		}
		$datosJson = '{
		  "data": [';
		for ($i = 0; $i < count($productos); $i++) {
			/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/

			$imagen = "<a href='" . $productos[$i]["imagen"] . "' target='" . _blank . "'>" . "<img src='" . $productos[$i]["imagen"] . "' width='40px'>" . "</a>";

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
			$marcas = "<strong>" . $marcas["marca_nombre"] . "</strong>";
			/*=============================================
 	 		TRAEMOS EL MODELO
  			=============================================*/
			$item = "id";
			$valor = $productos[$i]["id_modelo"];
			$modelos = ControladorModelos::ctrMostrarModelos($item, $valor);
			$modelos = "<strong>" . $modelos["modelo_nombre"] . "</strong>";
			/*=============================================
 	 		STOCK
  			=============================================*/
			if ($productos[$i]["stock"] <= 0) {
				$stock = "<button class='btn btn-danger'>" . $productos[$i]["stock"] . "</button>";
			} else if ($productos[$i]["stock"] == 1) {
				$stock = "<button class='btn btn-warning'>" . $productos[$i]["stock"] . "</button>";
			} else {
				$stock = "<button class='btn btn-success'>" . $productos[$i]["stock"] . "</button>";
			}
			/*=============================================
 	 		FECHA COMPRA
			  =============================================*/

			if (!empty((int) $productos[$i]["fecha_compra"])) {
				$fecha_compra = "<button class='btn btn-primary black bg-gray'>" . date("d-m-Y", strtotime($productos[$i]["fecha_compra"])) . "</button>";
			} else {
				$fecha_compra = "---";
			}

			/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

			if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Vendedor") {
				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='" . $productos[$i]["id"] . "' data-toggle='modal' data-target='#'><i class='fa fa-pencil'></i></button></div>";
			} elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial") {
				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='" . $productos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>";
			} elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador") {
				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='" . $productos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>";
			} else {
				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='" . $productos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='" . $productos[$i]["id"] . "' codigo='" . $productos[$i]["codigo"] . "' imagen='" . $productos[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";
			}
			$datosJson .= '[

			      "' . $productos[$i]["id"] . '",
			      "' . $stock . '",
			      "' . $categorias["categoria_nombre"] . '",
			      "' . $marcas . '",
			      "' . $modelos . '",
			      "' . $productos[$i]["descripcion"] . '",
			      "' . $productos[$i]["serie"] . '",
				  "' . $productos[$i]["serie02"] . '",
			      "' . $productos[$i]["proveedor"] . '",
			      "' . $fecha_compra . '",
			      "$ ' . number_format($productos[$i]["precio_compra"], 2) . '",
			      "$ ' . number_format($productos[$i]["traida"], 2) . '",
			      "' . $productos[$i]["courier"] . '",
			      "S/. ' . number_format($productos[$i]["precio_venta"], 2) . '",
			      "' . $productos[$i]["condicion"] . '",
			      "' . $productos[$i]["obs"] . '",
			      "' . $imagen . '",
			      "' . $productos[$i]["fecha"] . '",
			      "' . $botones . '"
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
$activarProductos->mostrarTablaProductos();
