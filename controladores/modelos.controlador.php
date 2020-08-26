<?php

class ControladorModelos{

	/*=============================================
	CREAR MODELOS
	=============================================*/

	static public function ctrCrearModelos(){

		if(isset($_POST["nuevoModelo"])){

			

				$tabla = "modelos";

				$datos = $_POST["nuevoModelo"];

				$respuesta = ModeloModelos::mdlIngresarModelos($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El modelo ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "";

									}
								})

					</script>';

				}


			else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El modelo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR MODELOS
	=============================================*/

	static public function ctrMostrarModelos($item, $valor){

		$tabla = "modelos";

		$respuesta = ModeloModelos::mdlMostrarModelos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR MODELOS
	=============================================*/

	static public function ctrEditarModelo(){

		if(isset($_POST["editarModelo"])){

			

				$tabla = "modelos";

				$datos = array("modelo_nombre"=>$_POST["editarModelo"],
							   "id"=>$_POST["editarIdModelo"]);

				$respuesta = ModeloModelos::mdlEditarModelo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El modelo ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias-marcas-modelos";

									}
								})

					</script>';

				


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El modelo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias-marcas-modelos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR MODELOS
	=============================================*/

	static public function ctrBorrarModelo(){

		if(isset($_GET["idModelo"])){

			$tabla ="Modelos";
			$datos = $_GET["idModelo"];

			$respuesta = ModeloModelos::mdlBorrarModelo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El modelo ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias-marcas-modelos";

									}
								})

					</script>';
			}
		}

	}
}
