<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar pasajeros

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar pasajeros</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPasajero">

          Agregar pasajeros

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablaPasajeros" width="100%">

        <thead>

         <tr>

           
           <th>Id</th>
           <th>Nombre Pasajero</th>
           <th>Fecha ingreso</th>
           <th>Acciones</th>

         </tr>

        </thead>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PASAJERO
======================================-->

<div id="modalAgregarPasajero" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar pasajero</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL PASAJERO -->

            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Nombre Pasajero</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPasajero" maxlength="40" onkeypress="return checkLetras(event)" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar pasajero" autocomplete="off" required>

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

          <button type="submit" class="btn btn-primary">Guardar pasajero</button>

        </div>

      </form>

      <?php

        $crearPasajero = new ControladorPasajeros();
        $crearPasajero -> ctrCrearPasajero();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PASAJEROS
======================================-->

<div id="modalEditarPasajero" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar pasajero</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- EDITAR EL PASAJERO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarPasajero"  id="editarPasajero" maxlength="40" onkeypress="return checkLetras(event)" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar nombre pasajero" required>
                <input type="hidden" id="editarIdPasajero" name="editarIdPasajero">


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

        $editarPasajero = new ControladorPasajeros();
        $editarPasajero -> ctrEditarPasajero();

      ?>



    </div>

  </div>

</div>

<?php

  $eliminarPasajero = new ControladorPasajeros();
  $eliminarPasajero -> ctrBorrarPasajero();

?>
