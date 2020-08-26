<?php error_reporting(0);?>

<?php

require_once "../controladores/serviciosTecnicos.controlador.php";
require_once "../modelos/serviciosTecnicos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

require_once "../controladores/modelos.controlador.php";
require_once "../modelos/modelos.modelo.php";



class TablaServiciosTecnicos{

 	/*=============================================
 	 MOSTRAR LA TABLA DE SERVICIOS TECNICOS
  	=============================================*/ 

	public function mostrarTablaServiciosTecnicos(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$serviciosTecnicos = ControladorServiciosTecnicos::ctrMostrarServiciosTecnicos($item, $valor, $orden);	
		
  		if(count($serviciosTecnicos) == 0){

  			echo '{"data": []}';

		  	return;
  		}
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($serviciosTecnicos); $i++){

			
		  	/*=============================================
 	 		ESTADOS
  			=============================================*/

  			if($serviciosTecnicos[$i]["estado"] == "Cerrado"){

                     $estado = "<button class='btn btn-danger'>".$serviciosTecnicos[$i]["estado"]."</button>";
             }else{

                     $estado = "<button class='btn btn-success'>".$serviciosTecnicos[$i]["estado"]."</button>";
             }

            /*=============================================
 	 		FECHA REGISTRO
  			=============================================*/

  			$fecha_registro = "<div class='badge badge-info'>".date("d-m-Y", strtotime($serviciosTecnicos[$i]["fecha_registro"]))."</div>";

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Tecnico"){

				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarServicioTecnico' idServicioTecnico='".$serviciosTecnicos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarServicioTecnico'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarServicioTecnico' idServicioTecnico='".$serviciosTecnicos[$i]["id"]."'codigo='".$serviciosTecnicos[$i]["codigo"]."'><i class='fa fa-times'></i></button><button class='btn btn-info btnImprimirServicioTecnico' codigoServicio='".$serviciosTecnicos[$i]["codigo"]."'><i class='fa fa-print'></i></button></div>";

  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarServicioTecnico' idServicioTecnico='".$serviciosTecnicos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarServicioTecnico'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarServicioTecnico' idServicioTecnico='".$serviciosTecnicos[$i]["id"]."'codigo='".$serviciosTecnicos[$i]["codigo"]."'><i class='fa fa-times'></i></button><button class='btn btn-info btnImprimirServicioTecnico' codigoServicio='".$serviciosTecnicos[$i]["codigo"]."'><i class='fa fa-print'></i></button></div>"; 

  			}

		 
		  	$datosJson .='[

			     			      
			      "'.$serviciosTecnicos[$i]["id"].'",
			      "'.$fecha_registro.'",
			      "'.$serviciosTecnicos[$i]["nombre_cliente"].'",
			      "'.$serviciosTecnicos[$i]["nro_contacto"].'",
			      "'.$serviciosTecnicos[$i]["email"].'",
			      "'.$serviciosTecnicos[$i]["categoria"].'",
			      "'.$serviciosTecnicos[$i]["marca"].'",
			      "'.$serviciosTecnicos[$i]["modelo"].'",
			      "'.$serviciosTecnicos[$i]["nro_serie"].'",
			      "'.$serviciosTecnicos[$i]["reporte"].'",
			      "'.$serviciosTecnicos[$i]["obs"].'",
				  "'.$serviciosTecnicos[$i]["tecnico"].'",
				  "'.$estado.'",	
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
ACTIVAR TABLA DE SERVICIOS TECNICOS
=============================================*/ 
$activarServiciosTecnicos = new TablaServiciosTecnicos();
$activarServiciosTecnicos -> mostrarTablaServiciosTecnicos();

