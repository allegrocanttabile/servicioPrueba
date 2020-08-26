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


class TablaCategorias
{

	/*=============================================
 	 MOSTRAR LA TABLA DE CATEGORIAS
  	=============================================*/

	public function mostrarTablaCategorias()
	{

		$item = null;
		$valor = null;
		$orden = "id";

		$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor, $orden);

		if (count($categorias) == 0) {

			echo '{"data": []}';

			return;
		}

		$datosJson = '{
		  "data": [';

		for ($i = 0; $i < count($categorias); $i++) {

			/*=============================================
 	 		TRAEMOS ID CATEGORIA
  			=============================================*/

			$id = "<button class='btn btn-dark'>" . $categorias[$i]["id"] . "</button>";

			/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

			if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Vendedor") {

				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='" . $categorias[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button></div>";
			} elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial") {
				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='" . $categorias[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button></div>";
			} elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador") {

				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='" . $categorias[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='" . $categorias[$i]["id"] . "' ><i class='fa fa-times'></i></button></div>";
			} else {

				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCategoria' idCategoria='" . $categorias[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarCategoria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCategoria' idCategoria='" . $categorias[$i]["id"] . "' ><i class='fa fa-times'></i></button></div>";
			}


			$datosJson .= '[


			      
			      "' . $id . '",
			      "' . $categorias[$i]["categoria_nombre"] . '",
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
$activarCategorias = new TablaCategorias();
$activarCategorias->mostrarTablaCategorias();
