<!DOCTYPE html>
<html>
<head>
 <style>
.select2-dropdown {top: 0px !important; left: 8px !important;}
</style>
</head>
<body>
    <div class="content-wrapper">

      <section class="content-header">

      <h1>

      Editar venta

      </h1>

      <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Editar venta</li>

      </ol>

      </section>

      <section class="content">

      <div class="row">


      <!--=====================================
      EL FORMULARIO
      ======================================-->

      <div class="col-lg-5 col-xs-12">

        <div class="box box-success">

          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">

              <div class="box">

                <?php

                    $item = "id";
                    $valor = $_GET["idVenta"];

                    $venta = ControladorVentas::ctrMostrarVentas($item, $valor);

                    $itemUsuario = "id";
                    $valorUsuario = $venta["id_vendedor"];

                    $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                    $itemCliente = "id";
                    $valorCliente = $venta["id_cliente"];

                    $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);
                    $porcentajeImpuesto = $venta["impuesto"] * 100 / $venta["neto"];


                ?>


                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
              </br>
                <div class="row">
                 <div class="col-lg-3 col-xs-12">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $vendedor["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $vendedor["id"]; ?>">

                  </div>

                </div>

                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================-->

                <div class="col-lg-3 col-xs-12">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                   <input type="text" class="form-control" id="nuevaVenta" name="editarVenta" value="<?php echo $venta["codigo"]; ?>" readonly>

                  </div>

                </div>
            </div>


                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================-->

              </br>
              <div class="row">
                <div class="col-xs-6">
                <div class="form-group">
                  <td style="width: 33%">
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="<?php echo $cliente["id"]; ?>"><?php echo $cliente["nombre"]; ?></option>

                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"]." DNI/RUC: ".$value["documento"].'</option>';

                       }

                    ?>

                    </select>

                     <script>
                      $("#seleccionarCliente").select2( {
                      placeholder: "Seleccionar cliente",
                      allowClear: true
                       });
                    </script>


                  </div>
                </td>

                </div>
              </div>
              </div>






              <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================-->

                <div class="form-group row nuevoProducto">

                <?php

                $listaProducto = json_decode($venta["productos"], true);

                foreach ($listaProducto as $key => $value) {

                  $item = "id";
                  $valor = $value["id"];
                  $orden = "id";

                  $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

                  $stockAntiguo = $respuesta["stock"] + $value["cantidad"];

                  echo '<div class="row" style="padding:5px 15px">


                      <div class="col-xs-3" style="padding-right:0px">

                          <div class="input-group">

                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'.$value["id"].'"><i class="fa fa-times"></i></button></span>

                            <input type="text" class="form-control nuevaCategoria" idProducto="'.$value["id"].'" name="agregarCategoria" value="'.$value["categoria"].'" readonly required>

                          </div>

                        </div>


                        <div class="col-xs-3" style="padding-right:0px">

                          <div class="input-group">

                            <input type="text" class="form-control nuevaMarca" idProducto="'.$value["id"].'" name="agregarMarca" value="'.$value["marca"].'" readonly required>

                          </div>

                        </div>



                        <div class="col-xs-4" style="padding-right:0px">

                          <div class="input-group">

                            <input type="text" class="form-control nuevoModelo" idProducto="'.$value["id"].'" name="agregarModelo" value="'.$value["modelo"].'" readonly required>

                          </div>

                        </div>

                        </br>
                        </br>


                        <div class="col-xs-3" style="padding-right:0px">

                          <div class="input-group">

                            <input type="text" class="form-control nuevoModeloSerie" idProducto="'.$value["id"].'" name="agregarSerie" value="'.$value["serie"].'" readonly required>

                          </div>

                      </div>


                        <div class="col-xs-2">

                          <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$value["cantidad"].'" stock="'.$stockAntiguo.'" nuevoStock="'.$value["stock"].'" required>

                        </div>


                        <div class="col-xs-3 ingresoPrecio" style="padding-left:0px">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="ion ion-checkmark"></i></span>

                            <input type="text" class="form-control nuevoPrecioProducto" precioReal="'.$respuesta["precio_venta"].'" name="nuevoPrecioProducto" value="'.$value["total"].'" required>

                          </div>

                        </div>



                      </div>


                      ';
                }


                ?>

                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!--=====================================
                BOTÓN PARA AGREGAR PRODUCTO
                ======================================-->

                <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>

                <hr>

                <div class="row">

                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->

                  <div class="col-xs-8">

                    <table class="table">

                      <thead>

                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>
                        </tr>

                      </thead>

                      <tbody>

                        <tr>

                          <td style="width: 33%">

                            <div class="input-group">

                               <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="<?php echo $porcentajeImpuesto; ?>" required>

                               <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" value="<?php echo $venta["impuesto"]; ?>" required>

                               <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" value="<?php echo $venta["neto"]; ?>" required>

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                            </div>

                          </td>

                           <td style="width: 33%">

                            <div class="input-group">

                              <span class="input-group-addon"><i class="ion ion-checkmark"></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" value="<?php echo $venta["total"]; ?>" readonly required>

                              <input type="hidden" name="totalVenta" value="<?php echo $venta["total"]; ?>" id="totalVenta">


                            </div>

                          </td>
                      </tr>

                      </tbody>

                    </table>

                  </div>


                </div>

                <hr>




                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->

                <div class="form-group row">

                  <div class="col-xs-6" style="padding-right:0px">

                     <div class="input-group">

                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Seleccione método de pago</option>
                        <option value="Efectivo">Efectivo</option>

                      </select>

                    </div>

                  </div>

                  <div class="cajasMetodoPago"></div>

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                </div>

                <br>


                  <!--=====================================
                  ENTRADA PRIMERA LINEA
                  ======================================-->

              <div class="row">


                  <div class="col-xs-12">

                    <table class="table">

                      <thead>

                        <tr>
                          <th>Despacho</th>
                          <th>Adelanto</th>
                          <th>Proviene</th>
                        </tr>

                      </thead>

                      <tbody>

                        <tr>

                          <td style="width: 33%">

                            <div class="input-group">
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="number" class="form-control input" id="nuevoDesp" name="nuevoDesp" value="<?php echo $venta["desp"]; ?>" required>


                            </div>

                          </td>

                           <td style="width: 33%">

                            <div class="input-group">

                             <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                             <input type="number" class="form-control input" id="nuevoAdelanto" name="nuevoAdelanto" value="<?php echo $venta["adelanto"]; ?>" required>


                            </div>

                          </td>


                          <td style="width: 33%">

                            <div class="input-group">

                            <select class="form-control" id="nuevoProviene" name="nuevoProviene" required>
                              <option><?php echo $venta["proviene"]; ?></option>
                              <option>Cliente</option>
                              <option>Mercado Libre</option>
                              <option>FanPage</option>
                              <option>Web</option>
                            </select>
                            </div>

                          </td>

                      </tr>

                      </tbody>

                    </table>

                  </div>


                </div>

                <!--=====================================
                  ENTRADA SEGUNDA LINEA
                  ======================================-->

              <div class="row">


                  <div class="col-xs-8">

                    <table class="table">

                      <thead>

                        <tr>
                          <th>Estado</th>
                          <th>Tipo Documento</th>
                        </tr>

                      </thead>

                      <tbody>

                        <tr>

                          <td style="width: 33%">

                            <div class="input-group">

                            <select class="form-control" id="nuevoEstado" name="nuevoEstado" required>
                              <option><?php echo $venta["estado"]; ?></option>
                              <option>En Stock</option>
                              <option>Por Comprar</option>
                              <option>Ya Compre</option>
                            </select>
                            </div>

                          </td>

                          <td style="width: 33%">

                            <div class="input-group">

                            <select class="form-control" id="nuevoTipo" name="nuevoTipo" required>
                              <option><?php echo $venta["tipo"]; ?></option>
                              <option>Garantia</option>
                              <option>Boleta</option>
                              <option>Factura</option>
                              <option>Nada</option>
                            </select>
                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>


                </div>

                  <!--=====================================
                  ENTRADA TERCERA LINEA
                  ======================================-->

              <div class="row">


                  <div class="col-xs-12">

                    <table class="table">

                      <thead>

                        <tr>
                          <th>Fecha Venta</th>
                          <th>Fecha Entrega</th>
                          <th>Observación</th>
                        </tr>

                      </thead>

                      <tbody>

                        <tr>

                          <td style="width: 10%">

                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                              <input type="date" required class="form-control" id="nuevaFecha" name="nuevaFecha"  value="<?php echo $venta["fecha"];?>" required>

                            </div>

                          </td>

                           <td style="width: 10%">

                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                              <input type="date" class="form-control" id="nuevaEntrega" name="nuevaEntrega"  value="<?php echo $venta["entrega"];?>" >

                            </div>

                          </td>


                          <td style="width: 33%">

                            <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-edit"></i></span>

                            <input type="text" class="form-control input" id="nuevaObservacion" name="nuevaObservacion" value="<?php echo $venta["obs"]; ?>" required>
                            </div>

                          </td>

                      </tr>

                      </tbody>

                    </table>

                  </div>


                </div>





          </div>

          </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-primary pull-right">Guardar cambios</button>

          </div>

        </form>

        <?php
          $editarVenta = new ControladorVentas();
          $editarVenta -> ctrEditarVenta();
        ?>


        </div>

      </div>




      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

        <div class="box box-warning">

          <div class="box-header with-border"></div>

          <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablaVentas" width="100%">

               <thead>

                 <tr>
                  <th>#</th>
                  <th>Stock</th>
                  <th>Categoria</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Descripción</th>
                  <th>S/N</th>
                  <th>S/.</th>
                  <th>Imagen</th>
                  <th>Acciones</th>
                </tr>

              </thead>

            </table>

          </div>

        </div>

      </div>





    </div>
  </section>

</div>


</body>
</html>
