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


class TablaMarcas
{

	/*=============================================
 	 MOSTRAR LA TABLA DE MARCAS
  	=============================================*/

	public function mostrarTablaMarcas()
	{

		$item = null;
		$valor = null;
		$orden = "id";

		$marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor, $orden);

		if (count($marcas) == 0) {

			echo '{"data": []}';

			return;
		}

		$datosJson = '{
		  "data": [';

		for ($i = 0; $i < count($marcas); $i++) {

			/*=============================================
 	 		TRAEMOS ID MARCA
  			=============================================*/

			$id = "<button class='btn btn-dark'>" . $marcas[$i]["id"] . "</button>";

			/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

			if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Vendedor") {

				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMarca' idMarca='" . $marcas[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarMarca'><i class='fa fa-pencil'></i></button></div>";
			} elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial") {

				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMarca' idMarca='" . $marcas[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarMarca'><i class='fa fa-pencil'></i></button></div>";
			} elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador") {
				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMarca' idMarca='" . $marcas[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarMarca'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMarca' idMarca='" . $marcas[$i]["id"] . "' ><i class='fa fa-times'></i></button></div>";
			} else {

				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMarca' idMarca='" . $marcas[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarMarca'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMarca' idMarca='" . $marcas[$i]["id"] . "' ><i class='fa fa-times'></i></button></div>";
			}


			$datosJson .= '[

			      "' . $id . '",
			      "' . $marcas[$i]["marca_nombre"] . '",
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
ACTIVAR TABLA DE MARCAS
=============================================*/
$activarMarcas = new TablaMarcas();
$activarMarcas->mostrarTablaMarcas();
