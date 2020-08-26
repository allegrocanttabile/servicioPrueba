<!DOCTYPE html>
<html>
<head>
  <style>
.select2-dropdown
{
  top: 0px !important;
  left: 8px !important;
  width:20vw !important;
}
.pintandoStock {
  background-color: #F9DFDF;
}
</style>
</head>
<body>
  <div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar cotizacion

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar cotizacion</li>

    </ol>

    

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">

          Agregar Cotizacion

        </button>

        
      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablaCotizacion" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>

           <th>Stock</th>
           <th>Categoría</th>
           <th>Marca</th>
           <th>Marca2</th>
           <th>Modelo</th>
           <th>Modelo2</th>
           <th>Descripción</th>
           <th>N° Serie</th>
           <th>Proveedor</th>
           <th>Fecha Compra</th>
           <th>Precio de compra</th>
           <th>Precio Traida</th>
           <th>Courier</th>
           <th>Precio de venta</th>
           <th>Obs</th>
           <th>Imagen</th>
           <th>Agregado</th>
           <th>Acciones</th>

         </tr>

        </thead>



       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cotizacion</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CÓDIGO -->

            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Código</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="---" readonly required>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Categoria</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select style="width:430px" class="form-control" id="nuevaCategoria" name="nuevaCategoria" required>

                  <option value="">Selecionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {

                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>

                </select>


              </div>

            </td>

                    <script>
                      $("#nuevaCategoria").select2( {
                      placeholder: "Seleccionar Categoria",
                      allowClear: true
                       });
                    </script>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

            <!-- ENTRADA PARA LA MARCA -->

            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Marca</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select style="width:430px" class="form-control" id="nuevaMarca" name="nuevaMarca" required>

                  <option value="">Selecionar marca</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);

                  foreach ($marcas as $key => $value) {

                    echo '<option value="'.$value["id"].'">'.$value["marca"].'</option>';
                  }

                  ?>

                </select>


              </div>

            </td>

                    <script>
                      $("#nuevaMarca").select2( {
                      placeholder: "Seleccionar Marca",
                      allowClear: true
                       });
                    </script>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

          <!-- ENTRADA PARA LA MARCA 2 -->
          <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Marca 2</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaMarca2" name="nuevaMarca2" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar Marca 2" value="---" required>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>


            <!-- ENTRADA EL MODELO -->

            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Modelo</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select style="width:430px" class="form-control" id="nuevoModelo" name="nuevoModelo" required>

                  <option value="">Selecionar modelo</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $modelos = ControladorModelos::ctrMostrarModelos($item, $valor);

                  foreach ($modelos as $key => $value) {

                    echo '<option value="'.$value["id"].'">'.$value["modelo"].'</option>';
                  }

                  ?>

                </select>


              </div>



            </td>

                    <script>
                      $("#nuevoModelo").select2( {
                      placeholder: "Seleccionar Modelo",
                      allowClear: true
                       });
                    </script>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

 <!-- ENTRADA PARA LA MODELO 2 -->
          <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Modelo 2</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoModelo2" name="nuevoModelo2" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar Modelo 2" value="---" required>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>




            <!-- ENTRADA PARA LA DESCRIPCIÓN -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Descripción</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaDescripcion" name="nuevaDescripcion" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar descripción" value="---" required>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>


            <!-- ENTRADA PARA EL NUMERO DE SERIE -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>N° Serie</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaSerie" name="nuevaSerie" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar N° Serie" value="---" required>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

            <!-- ENTRADA PARA STOCK -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Stock</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input type="number" class="pintandoStock form-control input-lg" id="nuevoStock" name="nuevoStock" value="1" placeholder="Stock" required>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>


            <!-- ENTRADA PARA EL PROVEEDOR -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Proveedor</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoProveedor" name="nuevoProveedor" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar el Proveedor" value="COTIZACION" readonly required>
              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>



            <!-- ENTRADA PARA LA FECHA -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Fecha Compra</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="date" class="form-control" id="nuevaFecha_compra"
                name="nuevaFecha_compra">
              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

            <!-- ENTRADA PARA COURIER -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Courier</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCourier" name="nuevoCourier" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar el Courier" value="---" required>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>



            <!-- ENTRADA PARA LA OBS -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Observación</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaObs" name="nuevaObs" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar la Obs." value="---" required>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>


             <!-- ENTRADA PARA PRECIO COMPRA Y TRAIDA-->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Precio Compra</th>
                <th>Precio Traida</th>
                <th>Precio Venta</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

               <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" placeholder="Precio de compra" value="0" required>

            </td>

            <td style="width: 33%">

              <div class="input-group">

               <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="number" class="form-control input-lg" id="nuevoPrecioTraida" name="nuevoPrecioTraida" min="0" placeholder="Precio de traida" value="0" required>

            </td>

            <td style="width: 33%">

              <div class="input-group">

               <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" placeholder="Precio de venta" value="0" required>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="nuevaImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cotizacion</button>

        </div>




      </form>

        <?php

          $crearCotizacion = new ControladorCotizacion();
          $crearCotizacion -> ctrCrearCotizacion();

        ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR COTIZACION
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cotizacion</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA EDITAR PARA EL ID -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>ID</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="editarId" name="editarId" readonly required>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

            <!-- ENTRADA EDITAR PARA EL CÓDIGO -->

            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Código</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>


            <!-- ENTRADA EDITAR PARA SELECCIONAR CATEGORÍA -->
            
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Categoria</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                 <select class="form-control input-lg"  name="editarCategoria" required>

                  <option id="editarCategoria"></option>

                   <?php

                   $item = null;
                   $valor = null;

                   $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                   foreach ($categorias as $key => $value) {

                     echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                   }

                   ?>

                </select>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>



             <!-- ENTRADA EDITAR PARA LA MARCA -->

            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Marca</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                 <select class="form-control input-lg"  name="editarMarca" required>

                  <option id="editarMarca"></option>

                   <?php

                   $item = null;
                   $valor = null;

                   $marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);

                   foreach ($marcas as $key => $value) {

                     echo '<option value="'.$value["id"].'">'.$value["marca"].'</option>';
                   }

                   ?>

                </select>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

              <!-- ##################################### -->

             <div class="row">
             <div class="col-xs-12">
             <table class="table">
                <thead>

                 <tr>
                 <th>Marca2</th>
                 </tr>
                </thead>

             <tbody>

               <tr>

            <td style="width: 33%">

               <div class="input-group">

                 <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                 <input type="text" class="form-control input-lg" id="editarMarca2" name="editarMarca2" onkeyup="this.value=this.value.toUpperCase();" required>

               </div>

             </td>

             </tr>
             </tbody>
             </table>
             </div>
             </div>




            <!-- ENTRADA EDITAR EL MODELO -->

            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Modelo</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                 <select class="form-control input-lg"  name="editarModelo" required>

                  <option id="editarModelo"></option>

                  <?php

                  $item = null;
                  $valor = null;

                  $modelos = ControladorModelos::ctrMostrarModelos($item, $valor);

                  foreach ($modelos as $key => $value) {

                    echo '<option value="'.$value["id"].'">'.$value["modelo"].'</option>';
                  }

                  ?>


                </select>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

<!-- ##################################### -->

            <div class="row">
             <div class="col-xs-12">
             <table class="table">
                <thead>

                 <tr>
                 <th>Modelo2</th>
                 </tr>
                </thead>

             <tbody>

               <tr>

             <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="editarModelo2" name="editarModelo2" onkeyup="this.value=this.value.toUpperCase();" required>

              </div>

            </td>

             </tr>
             </tbody>
             </table>
             </div>
             </div>


            <!-- ENTRADA EDITAR PARA LA DESCRIPCIÓN -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Descripción</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" onkeyup="this.value=this.value.toUpperCase();" required>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>


            <!-- ENTRADA EDITAR PARA EL NUMERO DE SERIE -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>N° Serie</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="editarSerie" name="editarSerie" onkeyup="this.value=this.value.toUpperCase();" required>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

            <!-- ENTRADA EDITAR PARA STOCK -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Stock</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input type="number" class="pintandoStock form-control input-lg" id="editarStock" name="editarStock" required>

              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>


            <!-- ENTRADA EDITAR PARA EL PROVEEDOR -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Proveedor</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="editarProveedor" name="editarProveedor" onkeyup="this.value=this.value.toUpperCase();" required>
              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>



            <!-- ENTRADA EDITAR PARA LA FECHA -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Fecha Compra</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="date" class="form-control" id="editarFecha_compra"
                name="editarFecha_compra">
              </div>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>

            <!-- ENTRADA EDITAR PARA COURIER -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Courier</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="editarCourier" name="editarCourier" onkeyup="this.value=this.value.toUpperCase();" required>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>



            <!-- ENTRADA EDITAR PARA LA OBS -->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Observación</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

               <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input type="text" class="form-control input-lg" id="editarObs" name="editarObs" onkeyup="this.value=this.value.toUpperCase();" required>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>


             <!-- ENTRADA EDITAR PARA PRECIO COMPRA Y TRAIDA-->
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Precio Compra</th>
                <th>Precio Traida</th>
                <th>Precio Venta</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

               <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" min="0" required>

            </td>

            <td style="width: 33%">

              <div class="input-group">

               <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="number" class="form-control input-lg" id="editarPrecioTraida" name="editarPrecioTraida" min="0" required>

            </td>

            <td style="width: 33%">

              <div class="input-group">

               <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" min="0" required>

            </td>

            </tr>
            </tbody>
            </table>
            </div>
            </div>



            <!-- ENTRADA EDITAR PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR IMAGEN</div>

              <input type="file" class="nuevaImagen" name="editarImagen">

              <p class="help-block">Peso máximo de la imagen 2MB</p>

              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cotizacion</button>

        </div>

      </form>

        <?php

          $editarCotizacion = new ControladorCotizacion();
          $editarCotizacion -> ctrEditarCotizacion();

        ?>

    </div>

  </div>

</div>

<?php

  $eliminarCotizacion = new ControladorCotizacion();
  $eliminarCotizacion -> ctrEliminarCotizacion();

?>


</body>
</html>
