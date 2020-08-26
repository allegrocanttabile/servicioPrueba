<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar clientes

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar clientes</li>

    </ol>

    <form method="post" action="./export_clientes.php">
     <input type="submit" name="export" class="btn btn-success" value="Exportar Todo Excel" />
    </form>



  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">

          Agregar cliente

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablaClientes" width="100%">

        <thead>

         <tr>

           
           <th>Id</th>
           <th>Nombre</th>
           <th>Documento</th>
           <th>Email</th>
           <th>Puntos</th>
           <th>Total compras</th>
           <th>Última compra</th>
           <th>Ingreso al sistema</th>
           <th>Acciones</th>

         </tr>

        </thead>

       </table>

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

            <!-- ENTRADA PARA EL DNI/RUC -->

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

               <input type="text" min="0" maxlength="11" onkeypress="return checkNumeroRaya(event)" class="form-control input-lg" name="nuevoDocumento" id="nuevoDocumento" placeholder= "Ingrese el DNI/RUC" value="---" autocomplete="off" required>

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

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarCliente"  id="editarCliente" maxlength="40" onkeypress="return checkLetras(event)" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar nombres y apellidos" required>
                <input type="hidden" id="idCliente" name="idCliente">


              </div>

            </div>


            <!-- ENTRADA EL DNI/RUC -->

           <div class="form-group">

              <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>

                <input min="0" maxlength="11" onkeypress="return checkNumeroRaya(event)" placeholder= "Ingrese el DNI/RUC" class="form-control input-lg" name="editarDocumento" id="editarDocumento" required>

              </div>

            </div>






            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" onkeyup="this.value=this.value.toUpperCase();" id="editarEmail" required>

              </div>

            </div>


                        <!-- ENTRADA PARA LOS PUNTOS -->

                        <div class="form-group">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-circle"></i></span>

                            <input type="number" onkeypress="return checkNumero(event)" class="form-control input-lg" name="editarPuntos" maxlength="6" value="0" required>

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

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>



    </div>

  </div>

</div>

<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>
