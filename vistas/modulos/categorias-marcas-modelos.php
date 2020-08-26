  <!--=====================================
  CATEGORIAS
  ======================================-->

  <div class="content-wrapper">

      <section class="content-header">

          <h1>

              Administrar Categorías-Marcas-Modelos

          </h1>

          <ol class="breadcrumb">

              <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

              <li class="active">Administrar categorías-marcas-modelos</li>

          </ol>

      </section>

      <section class="content-wrapper">


          <div class="col-lg-4 col-xs-12">

              <div class="content-wrapper">

                  <section class="content">

                      <div class="box">

                          <div class="box-header with-border">

                              <button class="btn btn-primary" data-toggle="modal" id="btn_agregarCategoria" data-target="#modalAgregarCategoria">

                                  Agregar categoria

                              </button>


                          </div>

                          <div class="box-body">

                              <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">

                                  <thead>

                                      <tr>


                                          <th>Código</th>
                                          <th>Categoría</th>
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
MODAL AGREGAR CATEGORIA
======================================-->

              <div id="modalAgregarCategoria" class="modal fade" role="dialog">

                  <div class="modal-dialog">

                      <div class="modal-content">

                          <form role="form" method="post" enctype="multipart/form-data">

                              <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                  <h4 class="modal-title">Agregar categoria</h4>

                              </div>

                              <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

                              <div class="modal-body">

                                  <div class="box-body">



                                      <!-- ENTRADA PARA LA CATEGORIA -->

                                      <div class="form-group">

                                          <div class="input-group">

                                              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                              <input type="text" class="form-control input-lg" name="nuevaCategoria" onkeypress="return checkEspecial(event)" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar categoria" required>

                                          </div>

                                      </div>

                                  </div>

                              </div>

                              <!--=====================================
      PIE DEL MODAL
      ======================================-->

                              <div class="modal-footer">

                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                  <button id="btn_guardarCategoria" type="submit" class="btn btn-primary">Guardar categoria</button>

                              </div>

                          </form>

                          <?php

                            $crearCategoria = new ControladorCategorias();
                            $crearCategoria->ctrCrearCategoria();

                            ?>

                      </div>

                  </div>

              </div>

              <!--=====================================
MODAL EDITAR CATEGORIA
======================================-->

              <div id="modalEditarCategoria" class="modal fade" role="dialog">

                  <div class="modal-dialog">

                      <div class="modal-content">

                          <form role="form" method="post" enctype="multipart/form-data">

                              <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                  <h4 class="modal-title">Editar categoria</h4>

                              </div>

                              <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

                              <div class="modal-body">

                                  <div class="box-body">

                                      <!-- ENTRADA PARA LA CATEGORIA -->

                                      <div class="form-group">

                                          <div class="input-group">

                                              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                              <input type="text" class="form-control input-lg" id="editarCategoria" name="editarCategoria" onkeypress="return checkEspecial(event)" onkeyup="this.value=this.value.toUpperCase();" required>
                                              <input type="hidden" id="editarIdCategoria" name="editarIdCategoria">

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

                            $editarCategoria = new ControladorCategorias();
                            $editarCategoria->ctrEditarCategoria();

                            ?>

                      </div>

                  </div>

              </div>

              <?php

                $eliminarCategoria = new ControladorCategorias();
                $eliminarCategoria->ctrBorrarCategoria();

                ?>

          </div>


          <!--=====================================
MARCA
======================================-->
          <div class="col-lg-4 col-xs-12">

              <div class="content-wrapper">

                  <section class="content">

                      <div class="box">

                          <div class="box-header with-border">

                              <button class="btn btn-primary" data-toggle="modal" id="btn_agregarMarca" data-target="#modalAgregarMarca">

                                  Agregar marca

                              </button>


                          </div>

                          <div class="box-body">

                              <table class="table table-bordered table-striped dt-responsive tablaMarcas" width="100%">

                                  <thead>

                                      <tr>


                                          <th>Código</th>
                                          <th>Marca</th>
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
MODAL AGREGAR MARCA
======================================-->

              <div id="modalAgregarMarca" class="modal fade" role="dialog">

                  <div class="modal-dialog">

                      <div class="modal-content">

                          <form role="form" method="post" enctype="multipart/form-data">

                              <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                  <h4 class="modal-title">Agregar marca</h4>

                              </div>

                              <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

                              <div class="modal-body">

                                  <div class="box-body">



                                      <!-- ENTRADA PARA LA MARCA -->

                                      <div class="form-group">

                                          <div class="input-group">

                                              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                              <input type="text" class="form-control input-lg" name="nuevaMarca" onkeypress="return checkLetrasNumeros(event)" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar marca" required>

                                          </div>

                                      </div>

                                  </div>

                              </div>

                              <!--=====================================
      PIE DEL MODAL
      ======================================-->

                              <div class="modal-footer">

                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                  <button id="btn_guardarMarca" type="submit" class="btn btn-primary">Guardar marca</button>

                              </div>

                          </form>

                          <?php

                            $crearMarca = new ControladorMarcas();
                            $crearMarca->ctrCrearMarca();

                            ?>

                      </div>

                  </div>

              </div>

              <!--=====================================
MODAL EDITAR MARCA
======================================-->

              <div id="modalEditarMarca" class="modal fade" role="dialog">

                  <div class="modal-dialog">

                      <div class="modal-content">

                          <form role="form" method="post" enctype="multipart/form-data">

                              <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                  <h4 class="modal-title">Editar marca</h4>

                              </div>

                              <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

                              <div class="modal-body">

                                  <div class="box-body">


                                      <!-- ENTRADA EDITAR LA MARCA -->

                                      <div class="form-group">

                                          <div class="input-group">

                                              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                              <input type="text" class="form-control input-lg" id="editarMarca" name="editarMarca" onkeypress="return checkLetrasNumeros(event)" onkeyup="this.value=this.value.toUpperCase();" required>

                                              <input type="hidden" id="editarIdMarca" name="editarIdMarca">

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

                            $editarMarca = new ControladorMarcas();
                            $editarMarca->ctrEditarMarca();

                            ?>

                      </div>

                  </div>

              </div>

              <?php

                $eliminarMarca = new ControladorMarcas();
                $eliminarMarca->ctrBorrarMarca();

                ?>

          </div>

          <!--=====================================
MODELO
======================================-->

          <div class="col-lg-4 col-xs-12">

              <div class="content-wrapper">

                  <section class="content">

                      <div class="box">

                          <div class="box-header with-border">

                              <button class="btn btn-primary" data-toggle="modal" id="btn_agregarModelo" data-target="#modalAgregarModelo">

                                  Agregar modelo

                              </button>


                          </div>

                          <div class="box-body">

                              <table class="table table-bordered table-striped dt-responsive tablaModelos" width="100%">

                                  <thead>

                                      <tr>


                                          <th>Código</th>
                                          <th>Modelo</th>
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
MODAL AGREGAR MODELO
======================================-->

              <div id="modalAgregarModelo" class="modal fade" role="dialog">

                  <div class="modal-dialog">

                      <div class="modal-content">

                          <form role="form" method="post" enctype="multipart/form-data">

                              <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                  <h4 class="modal-title">Agregar modelo</h4>

                              </div>

                              <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

                              <div class="modal-body">

                                  <div class="box-body">



                                      <!-- ENTRADA PARA LA MODELO -->

                                      <div class="form-group">

                                          <div class="input-group">

                                              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                              <input type="text" class="form-control input-lg" name="nuevoModelo" onkeypress="return checkEspecial(event)" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar modelo" required>

                                          </div>

                                      </div>

                                  </div>

                              </div>

                              <!--=====================================
      PIE DEL MODAL
      ======================================-->

                              <div class="modal-footer">

                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                  <button id="btn_guardarModelo" type="submit" class="btn btn-primary">Guardar modelo</button>

                              </div>

                          </form>

                          <?php

                            $crearModelo = new ControladorModelos();
                            $crearModelo->ctrCrearModelos();

                            ?>

                      </div>

                  </div>

              </div>

              <!--=====================================
MODAL EDITAR MODELO
======================================-->

              <div id="modalEditarModelo" class="modal fade" role="dialog">

                  <div class="modal-dialog">

                      <div class="modal-content">

                          <form role="form" method="post" enctype="multipart/form-data">

                              <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

                              <div class="modal-header" style="background:#3c8dbc; color:white">

                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                  <h4 class="modal-title">Editar modelo</h4>

                              </div>

                              <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

                              <div class="modal-body">

                                  <div class="box-body">


                                      <!-- ENTRADA PARA EDITAR EL MODELO -->

                                      <div class="form-group">

                                          <div class="input-group">

                                              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                              <input type="text" class="form-control input-lg" id="editarModelo" name="editarModelo" onkeypress="return checkEspecial(event)" onkeyup="this.value=this.value.toUpperCase();" required>

                                              <input type="hidden" id="editarIdModelo" name="editarIdModelo">

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

                            $editarModelo = new ControladorModelos();
                            $editarModelo->ctrEditarModelo();

                            ?>

                      </div>

                  </div>

              </div>

              <?php

                $eliminarModelo = new ControladorModelos();
                $eliminarModelo->ctrBorrarModelo();

                ?>

          </div>

      </section>
  </div>