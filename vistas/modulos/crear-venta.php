      <div class="content-wrapper">

        <section class="content-header">

          <h1>

            Crear venta

          </h1>

          <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Crear venta</li>

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

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
              </br>
              <div class="row">
                <div class="col-lg-3 col-xs-12">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div> 

                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================--> 

                <div class="col-lg-3 col-xs-12">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <?php

                    $item = null;
                    $valor = null;

                    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                    if(!$ventas){

                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';


                    }else{

                      foreach ($ventas as $key => $value) {



                      }

                      $codigo = $value["codigo"] + 1;



                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';


                    }

                    ?>
                    
                    
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

                          <option value="">Seleccionar cliente</option>

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
                      <span class="input-group-addon"><button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>

                    </div>

                  </td>


                </div>
              </div>


            </div>



                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 

                <div class="form-group row nuevoProducto">
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

                              <input type="number" class="form-control input-lg" required value="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0"  required>

                              <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                            </div>

                          </td>

                          <td style="width: 33%">

                            <div class="input-group">

                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta">
                              

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
                        <!--<option value="TC">Tarjeta Crédito</option>
                          <option value="TD">Tarjeta Débito</option>      -->      
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

                                <input type="number" class="form-control input" id="nuevoDesp" name="nuevoDesp" required value="0" required>


                              </div>

                            </td>

                            <td style="width: 33%">

                              <div class="input-group">

                               <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                               <input type="number" class="form-control input" id="nuevoAdelanto" name="nuevoAdelanto" required value="0" required>


                             </div>

                           </td>


                           <td style="width: 33%">

                            <div class="input-group">

                              <select class="form-control" id="nuevoProviene" name="nuevoProviene" required>
                                <option>Cliente</option>
                                <option>Mercado Libre</option>
                                <option>FanPage</option>
                                <option>Linio</option>
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
                                  <option>En Stock</option>
                                  <option>Por Comprar</option>
                                  <option>Ya Compre</option>                        
                                </select>              
                              </div>

                            </td>

                            <td style="width: 33%">

                              <div class="input-group">

                                <select class="form-control" id="nuevoTipo" name="nuevoTipo" required>
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

                                <input type="date" required class="form-control" id="nuevaFecha" name="nuevaFecha"  value="<?php echo date("Y-m-d");?>" required>

                              </div>

                            </td>

                            <td style="width: 10%">

                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                                <input type="date" class="form-control" id="nuevaEntrega" name="nuevaEntrega">

                              </div>

                            </td>


                            <td style="width: 33%">

                              <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-edit"></i></span> 

                                <input type="text" class="form-control input" id="nuevaObservacion" name="nuevaObservacion" required value="---" required>           
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

                <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>

              </div>

            </form>

            <?php

            $guardarVenta = new ControladorVentas();
            $guardarVenta -> ctrCrearVenta();

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

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="row">
              <div class="col-xs-12">
                <table class="table">
                 <thead>

                  <tr>
                    <th>Nombres y Apellidos</th>
                  </tr>
                </thead>

                <tbody>

                  <tr>

                    <td style="width: 33%">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control input-lg" name="nuevoCliente" maxlength="40" onkeypress="return checkLetras(event)" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar nombres y apellidos" autocomplete="off" required>

                      </div>

                    </td>

                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- ENTRADA PARA EL DNI o RUC -->

          <div class="row">
            <div class="col-xs-12">
              <table class="table">
               <thead>

                <tr>
                  <th>DNI/RUC</th>
                </tr>
              </thead>

              <tbody>

                <tr>

                  <td style="width: 33%">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>

                      <input type="text" min="0" maxlength="11" onkeypress="return checkNumeroRaya(event)" class="form-control input-lg" name="nuevoDocumento" id="nuevoDocumento" placeholder= "Ingrese el DNI o RUC" value="---" autocomplete="off" required>

                    </div>

                  </td>

                </tr>
              </tbody>
            </table>
          </div>
        </div>


        <!-- ENTRADA PARA EL EMAIL -->

        <div class="row">
          <div class="col-xs-12">
            <table class="table">
             <thead>

              <tr>
                <th>Email</th>
              </tr>
            </thead>

            <tbody>

              <tr>

                <td style="width: 33%">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                    <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" autocomplete="off" required>

                  </div>

                </td>

              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- ENTRADA PARA LOS PUNTOS -->

      <div class="row">
        <div class="col-xs-12">
          <table class="table">
           <thead>

            <tr>
              <th>Puntos</th>
            </tr>
          </thead>

          <tbody>

            <tr>

              <td style="width: 33%">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-circle"></i></span>

                  <input type="text" onkeypress="return checkNumero(event)" class="form-control input-lg" name="nuevoPuntos" maxlength="6" value="0" required>

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

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>



      </form>

      <?php

      $crearCliente = new ControladorClientes();
      $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

</div>