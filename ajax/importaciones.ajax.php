<?php

require_once "../controladores/importaciones.controlador.php";
require_once "../modelos/importaciones.modelo.php";

require_once "../controladores/almacen.controlador.php";
require_once "../modelos/almacen.modelo.php";

class AjaxImportaciones{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID ALMACEN
  =============================================*/
  public $idAlmacen;

  public function ajaxCrearCodigoImportacion(){

  	$item = "id_almacen";
  	$valor = $this->idAlmacen;
    $orden = "id";

  	$respuesta = ControladorImportaciones::ctrMostrarImportaciones($item, $valor, $orden);

  	echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR IMPORTACION
  =============================================*/

  public $idImportacion;
  public $traerImportaciones;
  public $nombreImportacion;

  public function ajaxEditarImportacion(){

    if($this->traerImportaciones == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorImportaciones::ctrMostrarImportaciones($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreImportacion != ""){

      $item = "obs";
      $valor = $this->nombreImportacion;
      $orden = "id";

      $respuesta = ControladorImportaciones::ctrMostrarImportaciones($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idAlmacen;
      $orden = "id";

      $respuesta = ControladorImportaciones::ctrMostrarImportaciones($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID ALMACEN
=============================================*/

if(isset($_POST["idAlmacen"])){

	$codigoAlmacen = new AjaxImportaciones();
	$codigoAlmacen -> idAlmacen = $_POST["idAlmacen"];
	$codigoAlmacen -> ajaxCrearCodigoImportacion();

}

/*=============================================
EDITAR IMPORTACION
=============================================*/

if(isset($_POST["idImportacion"])){

  $editarImportacion = new AjaxImportaciones();
  $editarImportacion -> idImportacion = $_POST["idImportacion"];
  $editarImportacion -> ajaxEditarImportacion();

}

/*=============================================
TRAER IMPORTACION
=============================================*/

if(isset($_POST["traerImportaciones"])){

  $traerImportaciones = new AjaxImportaciones();
  $traerImportaciones -> traerImportaciones = $_POST["traerProductos"];
  $traerImportaciones -> ajaxEditarImportacion();

}

/*=============================================
TRAER IMPORTACION
=============================================*/

if(isset($_POST["nombreImportacion"])){

  $traerImportaciones = new AjaxImportaciones();
  $traerImportaciones -> nombreImportacion = $_POST["nombreImportacion"];
  $traerImportaciones -> ajaxEditarImportacion();

}
