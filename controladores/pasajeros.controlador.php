<?php

class ControladorPasajeros{

	/*=============================================
	CREAR PASAJERO
	=============================================*/

	static public function ctrCrearPasajero(){

		if(isset($_POST["nuevoPasajero"])){

			

				$tabla = "pasajeros";

				$datos = $_POST["nuevoPasajero"];

				$respuesta = ModeloPasajeros::mdlIngresarPasajero($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El pasajero ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "pasajeros";

									}
								})

					</script>';

				}


			else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El pasajero no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "pasajeros";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR PASAJEROS
	=============================================*/

	static public function ctrMostrarPasajeros($item, $valor){

		$tabla = "pasajeros";

		$respuesta = ModeloPasajeros::mdlMostrarPasajeros($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR MODELOS
	=============================================*/

	static public function ctrEditarPasajero(){

		if(isset($_POST["editarPasajero"])){

			

				$tabla = "pasajeros";

				$datos = array("pasajero_nombre"=>$_POST["editarPasajero"],
							   "id"=>$_POST["editarIdPasajero"]);

				$respuesta = ModeloPasajeros::mdlEditarPasajero($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El pasajero ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "pasajeros";

									}
								})

					</script>';

				


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El pasajero no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "pasajeros";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR PASAJERO
	=============================================*/

	static public function ctrBorrarPasajero(){

		if(isset($_GET["idPasajero"])){

			$tabla ="pasajeros";
			$datos = $_GET["idPasajero"];

			$respuesta = ModeloPasajeros::mdlBorrarPasajero($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El pasajero ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "pasajeros";

									}
								})

					</script>';
			}
		}

	}
}
