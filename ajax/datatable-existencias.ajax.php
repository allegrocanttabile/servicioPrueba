<?php error_reporting(0); ?>
<?php
require_once "../controladores/existencias.controlador.php";
require_once "../modelos/existencias.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";

class TablaExistencias
{
	/*=============================================
 	 MOSTRAR LA TABLA EXISTENCIAS
 	 =============================================*/
	public function mostrarTablaExistencias()
	{
		$item = null;
		$valor = null;
		$orden = "id";
		$existencias = ControladorExistencias::ctrMostrarExistencias($item, $valor, $orden);
		if (count($existencias) == 0) {
			echo '{"data": []}';
			return;
		}
		$datosJson = '{
 	 		"data": [';
		for ($i = 0; $i < count($existencias); $i++) {

			/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/

			$imagen = "<a href='" . $existencias[$i]["imagen"] . "' target='" . _blank . "'>" . "<img src='" . $existencias[$i]["imagen"] . "' width='40px'>" . "</a>";


			/*=============================================
 	 		TRAEMOS LA CATEGORÍA
 	 		=============================================*/
			$item = "id";
			$valor = $existencias[$i]["id_categoria"];
			$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

			/*=============================================
 	 		TRAEMOS LA MARCA
 	 		=============================================*/
			$item = "id";
			$valor = $existencias[$i]["id_marca"];
			$marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);
			$marcas = "<strong>" . $marcas["marca_nombre"] . "</strong>";

			/*=============================================
 	 		TRAEMOS EL MODELO
 	 		=============================================*/
			$item = "id";
			$valor = $existencias[$i]["id_modelo"];
			$modelos = ControladorModelos::ctrMostrarModelos($item, $valor);
			$modelos = "<strong>" . $modelos["modelo_nombre"] . "</strong>";

			/*=============================================
 	 		STOCK
 	 		=============================================*/
			if ($existencias[$i]["sum(stock)"] <= 1) {
				$stock = "<button class='btn btn-warning'>" . $existencias[$i]["sum(stock)"] . "</button>";
			} else {
				$stock = "<button class='btn btn-success'>" . $existencias[$i]["sum(stock)"] . "</button>";
			}

			/*=============================================
 	 		TRAEMOS EL PRECIO COMPRA
 	 		=============================================*/
			$precio_compra = "<strong>" . number_format($existencias[$i]["AVG(precio_compra)"], 2) . "</strong>";

			/*=============================================
 	 		TRAEMOS EL PRECIO TRAIDA
 	 		=============================================*/
			$traida = "<strong>" . number_format($existencias[$i]["AVG(traida)"], 2) . "</strong>";

			$datosJson .= '[

		      "' . ($i + 1) . '",
		      "' . $imagen . '",
 	 	      "' . $categorias["categoria_nombre"] . '",
 	 		  "' . $marcas . '",
			  "' . $modelos . '",
			  "$ ' . $precio_compra . '",
			  "$ ' . $traida . '",	  
			  "' . $stock . '"
 	 		
 	 	],';
		}
		$datosJson = substr($datosJson, 0, -1);
		$datosJson .=   ']
 	}';
		echo $datosJson;
	}
}
/*=============================================
ACTIVAR TABLA DE EXISTENCIAS
=============================================*/
$activarExistencias = new TablaExistencias();
$activarExistencias->mostrarTablaExistencias();
