<?php

require_once "../controladores/serviciosTecnicos.controlador.php";
require_once "../modelos/serviciosTecnicos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxServiciosTecnicos{

   /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoServicioTecnico(){

    $item = "id_categoria";
    $valor = $this->idCategoria;
    $orden = "id";

    $respuesta = ControladorServiciosTecnicos::ctrMostrarServiciosTecnicos($item, $valor, $orden);

    echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR SERVICIO TECNICO
  =============================================*/ 

  public $idServicioTecnico;
  public $traerServiciosTecnicos;
  public $nombreServicioTecnico;

  public function ajaxEditarServicioTecnico(){

    if($this->traerServiciosTecnicos == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorServiciosTecnicos::ctrMostrarServiciosTecnicos($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreServicioTecnico != ""){

      $item = "marca";
      $valor = $this->nombreServicioTecnico;
      $orden = "id";

      $respuesta = ControladorServiciosTecnicos::ctrMostrarServiciosTecnicos($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idServicioTecnico;
      $orden = "id";

      $respuesta = ControladorServiciosTecnicos::ctrMostrarServiciosTecnicos($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

}

/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/ 

if(isset($_POST["idCategoria"])){

  $codigoServicioTecnico = new AjaxServiciosTecnicos();
  $codigoServicioTecnico -> idCategoria = $_POST["idCategoria"];
  $codigoServicioTecnico -> ajaxCrearCodigoServicioTecnico();

}

/*=============================================
EDITAR SERVICIO TECNICO
=============================================*/ 

if(isset($_POST["idServicioTecnico"])){

  $editarServicioTecnico = new AjaxServiciosTecnicos();
  $editarServicioTecnico -> idServicioTecnico = $_POST["idServicioTecnico"];
  $editarServicioTecnico -> ajaxEditarServicioTecnico();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["traerServiciosTecnicos"])){

  $traerServiciosTecnicos = new AjaxServiciosTecnicos();
  $traerServiciosTecnicos -> traerServiciosTecnicos = $_POST["traerServiciosTecnicos"];
  $traerServiciosTecnicos -> ajaxEditarServicioTecnico();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["nombreServicioTecnico"])){

  $traerServiciosTecnicos = new AjaxServiciosTecnicos();
  $traerServiciosTecnicos -> nombreServicioTecnico= $_POST["nombreServicioTecnico"];
  $traerServiciosTecnicos -> ajaxEditarServicioTecnico();

}






