<?php

class ControladorServiciosTecnicos{

	/*=============================================
	MOSTRAR SERVICIOS TECNICOS
	=============================================*/

	static public function ctrMostrarServiciosTecnicos($item, $valor, $orden){

		$tabla = "garantias";

		$respuesta = ModeloServiciosTecnicos::mdlMostrarServiciosTecnicos($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	/*=============================================
	CREAR SERVICIO TECNICO
	=============================================*/

	static public function ctrCrearServicioTecnico(){

		if(isset($_POST["nombre_cliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre_cliente"])){

		   				   				   

				$tabla = "garantias";

				$datos = array("fecha_registro" => $_POST["fecha_registro"],
								"nombre_cliente" => $_POST["nombre_cliente"],
								"nro_contacto" => $_POST["nro_contacto"],
								"email" => $_POST["email"],
							   "categoria" => $_POST["categoria"],
							   "marca" => $_POST["marca"],
							   "modelo" => $_POST["modelo"],
							   "nro_serie" => $_POST["nro_serie"],
							   "reporte" => $_POST["reporte"],
							   "obs" => $_POST["obs"],
							   "tecnico" => $_POST["tecnico"],
				 			   "estado" => $_POST["estado"]);

				$respuesta = ModeloServiciosTecnicos::mdlIngresarServicioTecnico($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El Servicio Tecnico ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "serviciosTecnicos";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Servicio Tecnico no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "serviciosTecnicos";

							}
						})

			  	</script>';
			  	return;
			}
		}

	}

	/*=============================================
	EDITAR SERVICIO TECNICO
	=============================================*/

	static public function ctrEditarServicioTecnico(){

		if(isset($_POST["nombre_cliente"])){
			
			if(
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ: ]+$/', $_POST["nombre_cliente"])){

		   					   	

				$tabla = "garantias";

				$datos = array("fecha_registro" => $_POST["fecha_registro"],
								"nombre_cliente" => $_POST["nombre_cliente"],
								"nro_contacto" => $_POST["nro_contacto"],
								"email" => $_POST["email"],
							   "categoria" => $_POST["categoria"],
							   "marca" => $_POST["marca"],
							   "modelo" => $_POST["modelo"],
							   "nro_serie" => $_POST["nro_serie"],
							   "reporte" => $_POST["reporte"],
							   "obs" => $_POST["obs"],
							   "tecnico" => $_POST["tecnico"],
				 			   "estado" => $_POST["estado"]);


				$respuesta = ModeloServiciosTecnicos::mdlEditarServicioTecnico($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El Servicio Tecnico ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "serviciosTecnicos";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Servicio Tecnico no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "serviciosTecnicos";

							}
						})

			  	</script>';
			  	
			  	return;
			}
		}

	}

	/*=============================================
	ELIMINAR SERVICIO TECNICO
	=============================================*/
	static public function ctrEliminarServicioTecnico(){

		if(isset($_GET["idServicioTecnico"])){

			$tabla ="garantias";
			$datos = $_GET["idServicioTecnico"];

			
			$respuesta = ModeloServiciosTecnicos::mdlEliminarServicioTecnico($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Servicio Tecnico ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "serviciosTecnicos";

								}
							})

				</script>';

			}		
		}


	}


}