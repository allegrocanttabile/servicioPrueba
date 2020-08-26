
  <div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar faltantes

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar faltantes</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" id="btn_agregarFaltante" data-toggle="modal" data-target="#modalAgregarFaltante">

          Agregar faltante

        </button>


      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablaFaltantes" width="100%">

        <thead>

         <tr>
           <th>Id</th>
           <th>Categoría</th>
           <th>Marca</th>
           <th>Modelo</th>
           <th>N° Serie</th>
           <th>Imagen</th>
           <th>Obs</th>
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
MODAL AGREGAR FALTANTES
======================================-->

<div id="modalAgregarFaltante" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar faltantes</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CODIGO -->

            <div class="form-group">
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="---" readonly required>

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

            <!-- ENTRADA SERIE -->

            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Serie</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <select class="selectpicker" data-show-subtext="true" data-live-search="true" id="nuevaSerie" name="nuevaSerie" required>

                  <option value="">Selecionar serie</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $series = ControladorProductos::ctrMostrarProductos($item, $valor);

                  foreach ($series as $key => $value) {

                    echo '<option value="'.$value["id"].'">'.$value["serie"].'</option>';
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

            <!-- ENTRADA PARA LA SUBIR FOTO -->

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

                <img src="vistas/img/faltantes/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

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


            





          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" id="btn_guardarFaltante" class="btn btn-primary">Guardar faltante</button>

        </div>




      </form>

        <?php

          $crearFaltante = new ControladorFaltantes();
          $crearFaltante -> ctrCrearFaltante();

        ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarFaltante" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar faltante</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

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


                <input type="hidden" id="editarId" name="editarId">
                <input type="hidden" id="editarCodigo" name="editarCodigo">

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

           
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Foto</th>
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


            <!-- ENTRADA EDITAR PARA EL NUMERO DE SERIE01 -->
          
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>

                <tr>
                <th>Numero Serie</th>
                </tr>
               </thead>

            <tbody>

              <tr>

            <td style="width: 33%">

              <div class="input-group">

                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="editarSerie" required>


                   <option id="editarSerie"></option>

                  <?php

                  $item = null;
                  $valor = null;

                  $series = ControladorProductos::ctrMostrarProductos($item, $valor);

                  foreach ($series as $key => $value) {

                    echo '<option value="'.$value["id"].'">'.$value["serie"].'</option>';
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



             <!-- EDITAR PARA LA OBS -->
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

                <input type="text" class="form-control input-lg" id="editarObs" name="editarObs" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar la Obs." required>

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

          $editarFaltante = new ControladorFaltantes();
          $editarFaltante -> ctrEditarFaltante();

        ?>

    </div>

  </div>

</div>

<?php

  $eliminarFaltante = new ControladorFaltantes();
  $eliminarFaltante -> ctrEliminarFaltante();

?>

