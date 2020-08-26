  <div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar almacen

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar almacen</li>

    </ol>


  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAlmacen">

          Agregar almacen

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablaAlmacenes" width="100%">

        <thead>

         <tr>

           <th>Id</th>
           <th>Almacen</th>
           <th>Fecha Registro</th>
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
MODAL AGREGAR ALMACEN
======================================-->

<div id="modalAgregarAlmacen" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar almacen</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE ALMACEN -->

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

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAlmacen" maxlength="40" onkeypress="return checkEspecial(event)" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar el almacen" autocomplete="off" required>

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

          <button type="submit" class="btn btn-primary">Guardar almacen</button>

        </div>

      </form>

      <?php

        $crearAlmacen = new ControladorAlmacenes();
        $crearAlmacen -> ctrCrearAlmacen();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR ALMACEN
======================================-->

<div id="modalEditarAlmacen" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar almacen</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE ALMACEN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarAlmacen"  id="editarAlmacen" maxlength="40" onkeypress="return checkEspecial(event)" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar nombre almacen" required>
                <input type="hidden" id="editarIdAlmacen" name="editarIdAlmacen">


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

        $editarAlmacen = new ControladorAlmacenes();
        $editarAlmacen -> ctrEditarAlmacen();

      ?>



    </div>

  </div>

</div>

<?php

  $eliminarAlmacen = new ControladorAlmacenes();
  $eliminarAlmacen -> ctrBorrarAlmacen();

?>
