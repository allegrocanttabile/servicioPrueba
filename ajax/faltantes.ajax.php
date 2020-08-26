<?php

require_once "../controladores/faltantes.controlador.php";
require_once "../modelos/faltantes.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxFaltantes{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoFaltante(){

  	$item = "id_categoria";
  	$valor = $this->idCategoria;
    $orden = "id";

  	$respuesta = ControladorFaltantes::ctrMostrarFaltantes($item, $valor, $orden);

  	echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR FALTANTE
  =============================================*/ 

  public $idFaltante;
  public $traerFaltantes;
  public $nombreFaltante;

  public function ajaxEditarFaltante(){

    if($this->traerFaltantes == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorFaltantes::ctrMostrarFaltantes($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreFaltante != ""){

      $item = "obs";
      $valor = $this->nombreFaltante;
      $orden = "id";

      $respuesta = ControladorFaltantes::ctrMostrarFaltantes($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idFaltante;
      $orden = "id";

      $respuesta = ControladorFaltantes::ctrMostrarFaltantes($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$codigoFaltante = new AjaxFaltantes();
	$codigoFaltante -> idCategoria = $_POST["idCategoria"];
	$codigoFaltante -> ajaxCrearCodigoFaltante();

}
/*=============================================
EDITAR FALTANTE
=============================================*/ 

if(isset($_POST["idFaltante"])){

  $editarFaltante = new AjaxFaltantes();
  $editarFaltante -> idFaltante = $_POST["idFaltante"];
  $editarFaltante -> ajaxEditarFaltante();

}

/*=============================================
TRAER FALTANTE
=============================================*/ 

if(isset($_POST["traerFaltantes"])){

  $traerFaltantes = new AjaxFaltantes();
  $traerFaltantes -> traerFaltantes = $_POST["traerFaltantes"];
  $traerFaltantes -> ajaxEditarFaltante();

}

/*=============================================
TRAER FALTANTE
=============================================*/ 

if(isset($_POST["nombreFaltante"])){

  $traerFaltantes = new AjaxFaltantes();
  $traerFaltantes -> nombreFaltante = $_POST["nombreFaltante"];
  $traerFaltantes -> ajaxEditarFaltante();

}






