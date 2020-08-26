<?php

class ControladorAlmacenes{

	/*=============================================
	MOSTRAR ALMACEN
	=============================================*/

	static public function ctrMostrarAlmacenes($item, $valor){

		$tabla = "almacenes";

		$respuesta = ModeloAlmacenes::mdlMostrarAlmacenes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	CREAR ALMACEN
	=============================================*/

	static public function ctrCrearAlmacen(){

		if(isset($_POST["nuevoAlmacen"])){



				$tabla = "almacenes";

				$datos = $_POST["nuevoAlmacen"];

				$respuesta = ModeloAlmacenes::mdlIngresarAlmacen($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El almacen ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "almacenes";

									}
								})

					</script>';




			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El almacen no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "almacenes";

							}
						})

			  	</script>';

			}

		}

	}



	/*=============================================
	EDITAR ALMACEN
	=============================================*/

	static public function ctrEditarAlmacen(){

		if(isset($_POST["editarAlmacen"])){



				$tabla = "almacenes";

				$datos = array("almacen_nombre"=>$_POST["editarAlmacen"],
							   "id"=>$_POST["editarIdAlmacen"]);

				$respuesta = ModeloAlmacenes::mdlEditarAlmacen($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El almacen ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "almacenes";

									}
								})

					</script>';




			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El almacen no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "almacenes";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR ALMACEN
	=============================================*/
	static public function ctrBorrarAlmacen(){

		if(isset($_GET["idAlmacen"])){

			$tabla ="almacenes";
			$datos = $_GET["idAlmacen"];

			$respuesta = ModeloAlmacenes::mdlBorrarAlmacen($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
							type: "success",
							title: "El almacen ha sido borrada correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
									if (result.value) {

									window.location = "almacenes";

									}
								})

					</script>';
			}
		}

	}
	}
