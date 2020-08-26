<?php

require_once "../controladores/compras.controlador.php";
require_once "../modelos/compras.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCompras{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoCompra(){

  	$item = "id_categoria";
  	$valor = $this->idCategoria;
    $orden = "id";

  	$respuesta = ControladorCompras::ctrMostrarCompras($item, $valor, $orden);

  	echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR COMPRAS
  =============================================*/ 

  public $idCompra;
  public $traerCompras;
  public $nombreCompra;

  public function ajaxEditarCompra(){

    if($this->traerCompras == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorCompras::ctrMostrarCompras($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreCompra != ""){

      $item = "nuevoDetalle";
      $valor = $this->nombreCompra;
      $orden = "id";

      $respuesta = ControladorCompras::ctrMostrarCompras($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idCompra;
      $orden = "id";

      $respuesta = ControladorCompras::ctrMostrarCompras($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$codigoCompra = new AjaxCompras();
	$codigoCompra -> idCategoria = $_POST["idCategoria"];
	$codigoCompra -> ajaxCrearCodigoCompra();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idCompra"])){

  $editarCompra = new AjaxCompras();
  $editarCompra -> idCompra = $_POST["idCompra"];
  $editarCompra -> ajaxEditarCompra();

}

/*=============================================
TRAER COMPRA
=============================================*/ 

if(isset($_POST["traerCompras"])){

  $traerCompras = new AjaxCompras();
  $traerCompras -> traerCompras = $_POST["traerCompras"];
  $traerCompras -> ajaxEditarCompra();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["nombreCompra"])){

  $traerCompras = new AjaxCompras();
  $traerCompras -> nombreCompra = $_POST["nombreCompra"];
  $traerCompras -> ajaxEditarCompra();

}






