<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar compras

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar compras</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" id="btn_agregarCompra" data-toggle="modal" data-target="#modalAgregarCompras">

          Agregar compras

        </button>


      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablaCompras" width="100%">

        <thead>

         <tr>


           <th>Id</th>
           <th>Imagen</th>
           <th>Categoría</th>
           <th>Marca</th>
           <th>Modelo</th>
           <th>Detalles</th>
           <th>Proveedor</th>
           <th>N° Orden</th>
           <th>Almacen</th>
           <th>Fecha Compra</th>
           <th>Precio Compra</th>
           <th>Fecha Entrega</th>
           <th>Cantidad</th>
           <th>Pago Courier</th>
           <th>Agregado</th>
           <th>Acciones</th>

         </tr>

       </thead>



     </table>

     

   </div>

 </div>

</section>

</div>

<!--=====================================
MODAL AGREGAR COMPRAS
======================================-->

<div id="modalAgregarCompras" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar compra</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CÓDIGO -->

            <div class="form-group">
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="---" readonly required>

              </div>
              
            </div>

            <!-- ENTRADA PARA SELECCIONAR LA IMAGEN -->
            <div class="row">
              <div class="col-xs-12">
                <table class="table">
                 <thead>

                  <tr>
                    <th>Imagen</th>
                  </tr>
                </thead>

                <tbody>

                  <tr>

                    <td style="width: 33%">

                      <div class="input-group">

                        <input type="file" class="nuevaImagen" name="nuevaImagen">
                        <img src="vistas/img/compras/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">


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

                     <select class="selectpicker" data-show-subtext="true" data-live-search="true" id="nuevaCategoria" name="nuevaCategoria" required>

                      <option value="">Selecionar categoría</option>

                      <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                      foreach ($categorias as $key => $value) {

                        echo '<option value="'.$value["id"].'">'.$value["categoria_nombre"].'</option>';
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


                  <select class="selectpicker" data-show-subtext="true" data-live-search="true" id="nuevaMarca" name="nuevaMarca" required>

                    <option value="">Selecionar marca</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);

                    foreach ($marcas as $key => $value) {

                      echo '<option value="'.$value["id"].'">'.$value["marca_nombre"].'</option>';
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

                <select class="selectpicker" data-show-subtext="true" data-live-search="true" id="nuevoModelo" name="nuevoModelo" required>

                  <option value="">Selecionar modelo</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $modelos = ControladorModelos::ctrMostrarModelos($item, $valor);

                  foreach ($modelos as $key => $value) {

                    echo '<option value="'.$value["id"].'">'.$value["modelo_nombre"].'</option>';
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

  <!-- ENTRADA PARA EL DETALLE DE COMPRA -->
  <div class="row">
    <div class="col-xs-12">
      <table class="table">
       <thead>

        <tr>
          <th>Detalles</th>
        </tr>
      </thead>

      <tbody>

        <tr>

          <td style="width: 33%">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

              <input type="text" class="form-control input-lg" id="nuevoDetalle" name="nuevoDetalle" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar el detalle" value="---" required>

            </div>

          </td>

        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- ENTRADA EL PROVEEDOR -->

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

            <select class="selectpicker" data-show-subtext="true" data-live-search="true" id="nuevoProveedor" name="nuevoProveedor" required>

              <option value="">Selecionar proveedor</option>

              <?php

              $item = null;
              $valor = null;

              $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

              foreach ($proveedores as $key => $value) {

                echo '<option value="'.$value["id"].'">'.$value["proveedor_nombre"].'</option>';
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



<!-- ENTRADA PARA EL NUMERO DE ORDEN -->
<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>N° ORDEN</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

            <input type="text" class="form-control input-lg" id="nuevoNumeroOrden" name="nuevoNumeroOrden" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar numero orden" value="---" required>

          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>



<!-- ENTRADA EL ALMACEN -->

<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>Almacen</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <select class="selectpicker" data-show-subtext="true" data-live-search="true" id="nuevoAlmacen" name="nuevoAlmacen" required>

              <option value="">Selecionar almacen</option>

              <?php

              $item = null;
              $valor = null;

              $almacenes = ControladorAlmacenes::ctrMostrarAlmacenes($item, $valor);

              foreach ($almacenes as $key => $value) {

                echo '<option value="'.$value["id"].'">'.$value["almacen_nombre"].'</option>';
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

<!-- ENTRADA PARA LA FECHA COMPRA -->
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

            <input type="date" class="form-control" id="nuevaFechaCompra"
            name="nuevaFechaCompra">
          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>

<!-- ENTRADA PARA EL PRECIO COMPRA -->
<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>Precio compra</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

            <input type="text" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar precio compra" value="0" required>

          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>


<!-- ENTRADA PARA LA FECHA ENTREGA -->
<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>Fecha entrega</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

            <input type="date" class="form-control" id="nuevaFechaEntrega"
            name="nuevaFechaEntrega">
          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>

<!-- ENTRADA PARA CANTIDAD DE PRODUCTOS COMPRADOS -->
<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>Cantidad</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-check"></i></span>

            <input type="number" class="pintandoStock form-control input-lg" id="nuevaCantidad" name="nuevaCantidad" value="1" placeholder="Ingrese la cantidad" required>

          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>


<!-- ENTRADA PARA EL PAGO DE LA TRAIDA AL COURIER -->
<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>PAGO COURIER</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

            <input type="text" class="form-control input-lg" id="nuevoPagoCourier" name="nuevoPagoCourier" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar el pago del courier" value="0" required>

          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>

</div>

</div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" id="btn_guardarCompras" class="btn btn-primary">Guardar compra</button>

        </div>




      </form>

      <?php

      $crearCompra = new ControladorCompras();
      $crearCompra -> ctrCrearCompra();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR COMPRA
======================================-->

<div id="modalEditarCompra" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar compra</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- EDITAR LA IMAGEN -->
            <div class="row">
              <div class="col-xs-12">
                <table class="table">
                 <thead>

                  <tr>
                    <th>Imagen</th>
                  </tr>
                </thead>

                <tbody>

                  <tr>

                    <td style="width: 33%">

                      <div class="input-group">




                        <input type="file" class="nuevaImagen" name="editarImagen">

                        <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                        <input type="hidden" name="imagenActual" id="imagenActual">



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

                      <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="editarCategoria" required>

                       <option id="editarCategoria"></option>

                       <?php

                       $item = null;
                       $valor = null;

                       $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["categoria_nombre"].'</option>';
                       }

                       ?>

                     </select>

                   </div>

                   <input type="hidden" id="editarId" name="editarId">
                   <input type="hidden" id="editarCodigo" name="editarCodigo">

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

                  <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="editarMarca" required>


                   <option id="editarMarca"></option>

                   <?php

                   $item = null;
                   $valor = null;

                   $marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);

                   foreach ($marcas as $key => $value) {

                     echo '<option value="'.$value["id"].'">'.$value["marca_nombre"].'</option>';
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

              <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="editarModelo" required>


               <option id="editarModelo"></option>


               <?php

               $item = null;
               $valor = null;

               $modelos = ControladorModelos::ctrMostrarModelos($item, $valor);

               foreach ($modelos as $key => $value) {

                 echo '<option value="'.$value["id"].'">'.$value["modelo_nombre"].'</option>';
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


<!-- EDITAR PARA LA DETALLES -->
<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>Detalles</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

            <input type="text" class="form-control input-lg" id="editarDetalle" name="editarDetalle" onkeyup="this.value=this.value.toUpperCase();" required>

          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>


<!-- ENTRADA EDITAR EL PROVEEDOR -->

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

            <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="editarProveedor" required>


             <option id="editarProveedor"></option>


             <?php

             $item = null;
             $valor = null;

             $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

             foreach ($proveedores as $key => $value) {

               echo '<option value="'.$value["id"].'">'.$value["proveedor_nombre"].'</option>';
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

<!-- ENTRADA EDITAR PARA EL NUMERO DE ORDEN -->
<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>N° Orden</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

            <input type="text" class="form-control input-lg" id="editarNumeroOrden" name="editarNumeroOrden" onkeyup="this.value=this.value.toUpperCase();" required>

          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>


<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>Almacen</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="editarAlmacen" required>


             <option id="editarAlmacen"></option>


             <?php

             $item = null;
             $valor = null;

             $almacenes = ControladorAlmacenes::ctrMostrarAlmacenes($item, $valor);

             foreach ($almacenes as $key => $value) {

               echo '<option value="'.$value["id"].'">'.$value["almacen_nombre"].'</option>';
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

<!-- ENTRADA EDITAR PARA LA FECHA COMPRA -->
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

            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

            <input type="date" class="form-control" id="editarFechaCompra"
            name="editarFechaCompra">
          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>

<!-- ENTRADA EDITAR PARA EL PRECIO COMPRA -->
<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>Precio Compra</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

            <input type="text" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" onkeyup="this.value=this.value.toUpperCase();" required>

          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>

<!-- ENTRADA EDITAR PARA LA FECHA ENTREGA -->
<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>Fecha entrega</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

            <input type="date" class="form-control" id="editarFechaEntrega"
            name="editarFechaEntrega">
          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>

<!-- ENTRADA EDITAR PARA CANTIDAD -->
<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>Cantidad</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <span class="input-group-addon"><i class="fa fa-check"></i></span>

            <input type="number" class="pintandoStock form-control input-lg" id="editarCantidad" name="editarCantidad" required>

          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>

<!-- ENTRADA EDITAR PARA EL PAGO COURIER -->
<div class="row">
  <div class="col-xs-12">
    <table class="table">
     <thead>

      <tr>
        <th>Pago courier</th>
      </tr>
    </thead>

    <tbody>

      <tr>

        <td style="width: 33%">

          <div class="input-group">

            <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

            <input type="text" class="form-control input-lg" id="editarPagoCourier" name="editarPagoCourier" onkeyup="this.value=this.value.toUpperCase();" required>

          </div>

        </td>

      </tr>
    </tbody>
  </table>
</div>
</div>

</div>

</div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

      $editarCompra = new ControladorCompras();
      $editarCompra -> ctrEditarCompra();

      ?>

    </div>

  </div>

</div>

<?php

$eliminarCompra = new ControladorCompras();
$eliminarCompra -> ctrEliminarCompra();

?>

