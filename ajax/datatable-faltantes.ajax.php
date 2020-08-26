<?php error_reporting(0);?>
<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";

require_once "../controladores/faltantes.controlador.php";
require_once "../modelos/faltantes.modelo.php";


class TablaFaltantes{
 	/*=============================================
 	 MOSTRAR LA TABLA DE FALTANTES
  	=============================================*/
	public function mostrarTablaFaltantes(){
		$item = null;
    	$valor = null;
    	$orden = "id";
  		$faltantes = ControladorFaltantes::ctrMostrarFaltantes($item, $valor, $orden);
  		if(count($faltantes) == 0){
  			echo '{"data": []}';
		  	return;
  		}
  		$datosJson = '{
		  "data": [';
		  for($i = 0; $i < count($faltantes); $i++){
		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/

				$imagen = "<a href='".$faltantes[$i]["imagen"]."' target='"._blank."'>"."<img src='".$faltantes[$i]["imagen"]."' width='40px'>"."</a>";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/
		  	$item = "id";
		  	$valor = $faltantes[$i]["id_categoria"];
		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
		  	/*=============================================
 	 		TRAEMOS LA MARCA
  			=============================================*/
		  	$item = "id";
		  	$valor = $faltantes[$i]["id_marca"];
		  	$marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);
		  	$marcas = "<strong>".$marcas["marca_nombre"]."</strong>";
		  	/*=============================================
 	 		TRAEMOS EL MODELO
  			=============================================*/
		  	$item = "id";
		  	$valor = $faltantes[$i]["id_modelo"];
		  	$modelos = ControladorModelos::ctrMostrarModelos($item, $valor);
		  	$modelos = "<strong>".$modelos["modelo_nombre"]."</strong>";

		  	/*=============================================
 	 		TRAEMOS SERIE
  			=============================================*/
		  	$item = "id";
		  	$valor = $faltantes[$i]["id_serie"];
		  	$series = ControladorProductos::ctrMostrarProductos($item, $valor);
		  	$series = "<strong>".$series["serie"]."</strong>";



		
		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Vendedor"){
  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarFaltante' idFaltante='".$faltantes[$i]["id"]."' data-toggle='modal' data-target='#'><i class='fa fa-pencil'></i></button></div>";

  			}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "vendedorEspecial") {
  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarFaltante' idFaltante='".$faltantes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarFaltante'><i class='fa fa-pencil'></i></button></div>";

  			}elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador") {
  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarFaltante' idFaltante='".$faltantes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarFaltante'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarFaltante' idFaltante='".$faltantes[$i]["id"]."' codigo='".$faltantes[$i]["codigo"]."' imagen='".$faltantes[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";
  			}else{
  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarFaltante' idFaltante='".$faltantes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarFaltante'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarFaltante' idFaltante='".$faltantes[$i]["id"]."' codigo='".$faltantes[$i]["codigo"]."' imagen='".$faltantes[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";
  			}
		  	$datosJson .='[

			      "'.$faltantes[$i]["id"].'",
			      "'.$categorias["categoria_nombre"].'",
			      "'.$marcas.'",
			      "'.$modelos.'",
			      "'.$series.'",
			      "'.$imagen.'",		      
			      "'.$faltantes[$i]["obs"].'",
			      "'.$faltantes[$i]["fecha"].'",
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
ACTIVAR TABLA DE FALTANTES
=============================================*/
$activarFaltantes = new TablaFaltantes();
$activarFaltantes -> mostrarTablaFaltantes();
