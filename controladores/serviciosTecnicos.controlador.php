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
							   "cantidad" => $_POST["cantidad"],
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

		if(isset($_POST["editar_nombre_cliente"])){
			
			if(
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ: ]+$/', $_POST["editar_nombre_cliente"])){

		   					   	

				$tabla = "garantias";

				$datos = array("fecha_registro" => $_POST["editar_fecha_registro"],
									"id" => $_POST["editarId"],
								"nombre_cliente" => $_POST["editar_nombre_cliente"],
								"nro_contacto" => $_POST["editar_nro_contacto"],
								"email" => $_POST["editar_email"],
							   "categoria" => $_POST["editar_categoria"],
							   "marca" => $_POST["editar_marca"],
							   "modelo" => $_POST["editar_modelo"],
							   "nro_serie" => $_POST["editar_nro_serie"],
							   "cantidad" => $_POST["editar_cantidad"],
							   "reporte" => $_POST["editar_reporte"],
							   "obs" => $_POST["editar_obs"],
							   "tecnico" => $_POST["editar_tecnico"],
				 			   "estado" => $_POST["editar_estado"]);


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