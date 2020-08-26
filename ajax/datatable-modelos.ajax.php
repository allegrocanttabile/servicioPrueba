<?php error_reporting(0); ?>
<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";


class TablaModelos
{

	/*=============================================
 	 MOSTRAR LA TABLA DE MODELOS
  	=============================================*/

	public function mostrarTablaModelos()
	{

		$item = null;
		$valor = null;
		$orden = "id";

		$modelos = ControladorModelos::ctrMostrarModelos($item, $valor, $orden);

		if (count($modelos) == 0) {

			echo '{"data": []}';

			return;
		}

		$datosJson = '{
		  "data": [';

		for ($i = 0; $i < count($modelos); $i++) {

			/*=============================================
 	 		TRAEMOS ID MODELO
  			=============================================*/

			$id = "<button class='btn btn-dark'>" . $modelos[$i]["id"] . "</button>";

			/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

			if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Vendedor") {

				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModelo' idModelo='" . $modelos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarModelo'><i class='fa fa-pencil'></i></button></div>";
			} elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial") {
				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModelo' idModelo='" . $modelos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarModelo'><i class='fa fa-pencil'></i></button></div>";
			} elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador") {
				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModelo' idModelo='" . $modelos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarModelo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarModelo' idModelo='" . $modelos[$i]["id"] . "' ><i class='fa fa-times'></i></button></div>";
			} else {

				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModelo' idModelo='" . $modelos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarModelo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarModelo' idModelo='" . $modelos[$i]["id"] . "' ><i class='fa fa-times'></i></button></div>";
			}


			$datosJson .= '[

			      "' . $id . '",
			      "' . $modelos[$i]["modelo_nombre"] . '",
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
ACTIVAR TABLA DE MODELOS
=============================================*/
$activarModelos = new TablaModelos();
$activarModelos->mostrarTablaModelos();
