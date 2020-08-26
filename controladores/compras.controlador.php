<?php

class ControladorCompras{

	/*=============================================
	MOSTRAR COMPRAS
	=============================================*/

	static public function ctrMostrarCompras($item, $valor, $orden){

		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarCompras($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	/*=============================================
	CREAR COMPRAS
	=============================================*/

	static public function ctrCrearCompra(){

		if(isset($_POST["nuevoDetalle"])){

			if(
				preg_match('/^[0-9]+$/', $_POST["nuevaCantidad"]) &&
				preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) &&
				preg_match('/^[0-9.]+$/', $_POST["nuevoPagoCourier"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "vistas/img/compras/default/anonymous.png";

				if(isset($_FILES["nuevaImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/compras/".$_POST["nuevoCodigo"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/compras/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/compras/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "compras";

				$datos = array(
					"codigo" => $_POST["nuevoCodigo"],
					"imagen" => $ruta,
					"id_categoria" => $_POST["nuevaCategoria"],
					"id_marca" => $_POST["nuevaMarca"],
					"id_modelo" => $_POST["nuevoModelo"],
					"detalles" => $_POST["nuevoDetalle"],
					"id_proveedor" => $_POST["nuevoProveedor"],
					"numero_orden" => $_POST["nuevoNumeroOrden"],
					"id_almacen" => $_POST["nuevoAlmacen"],
					"fecha_compra" => $_POST["nuevaFechaCompra"],
					"precio_compra" => $_POST["nuevoPrecioCompra"],
					"fecha_entrega" => $_POST["nuevaFechaEntrega"],
					"cantidad" => $_POST["nuevaCantidad"],
					"pago_courier" => $_POST["nuevoPagoCourier"]		
				);

				$respuesta = ModeloCompras::mdlIngresarCompra($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						type: "success",
						title: "La compra ha sido guardado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value) {

								window.location = "compras";

							}
							})

							</script>';

						}


					}else{

						echo'<script>

						swal({
							type: "error",
							title: "¡La compra no puede ir con los campos vacíos o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {

									window.location = "compras";

								}
								})

								</script>';
								return;
							}
						}

					}

	/*=============================================
	EDITAR COMPRA
	=============================================*/

	static public function ctrEditarCompra(){

		if(isset($_POST["nuevoDetalle"])){

			if(
				preg_match('/^[0-9]+$/', $_POST["nuevaCantidad"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["imagenActual"];

				if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/compras/".$_POST["editarCodigo"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/compras/default/anonymous.png"){

						unlink($_POST["imagenActual"]);

					}else{

						mkdir($directorio, 0755);

					}

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarImagen"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/compras/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarImagen"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/compras/".$_POST["editarCodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "compras";

				$datos = array(
					"id" => $_POST["editarId"],
					"codigo" => $_POST["editarCodigo"],
					"imagen" => $ruta,
					"id_categoria" => $_POST["editarCategoria"],
					"id_marca" => $_POST["editarMarca"],
					"id_modelo" => $_POST["editarModelo"],
					"detalles" => $_POST["editarDetalle"],
					"id_proveedor" => $_POST["editarProveedor"],
					"numero_orden" => $_POST["editarNumeroOrden"],
					"id_almacen" => $_POST["editarAlmacen"],
					"fecha_compra" => $_POST["editarFechaCompra"],
					"precio_compra" => $_POST["editarPrecioCompra"],
					"fecha_entrega" => $_POST["editarFechaEntrega"],
					"cantidad" => $_POST["editarCantidad"],
					"pago_courier" => $_POST["editarPagoCourier"]	
				);

				$respuesta = ModeloCompras::mdlEditarCompra($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						type: "success",
						title: "La compra ha sido editado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value) {

								window.location = "compras";

							}
							})

							</script>';

						}


					}else{

						echo'<script>

						swal({
							type: "error",
							title: "¡La compra no puede ir con los campos vacíos o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {

									window.location = "compras";

								}
								})

								</script>';

								return;
							}
						}

					}

	/*=============================================
	BORRAR COMPRA
	=============================================*/
	static public function ctrEliminarCompra(){

		if(isset($_GET["idCompra"])){

			$tabla ="compras";
			$datos = $_GET["idCompra"];

			if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/compras/default/anonymous.png"){

				unlink($_GET["imagen"]);
				rmdir('vistas/img/compras/'.$_GET["codigo"]);

			}

			$respuesta = ModeloCompras::mdlBorrarCompra($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					type: "success",
					title: "La compra ha sido borrado correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {

							window.location = "compras";
						}
						})

						</script>';

					}
				}


			}

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaVentas(){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

		return $respuesta;

	}


}
