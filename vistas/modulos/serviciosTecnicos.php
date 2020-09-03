<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Servicio Tecnico
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Servicio Tecnico</li>
    
    </ol>

    <form method="post" action="./export_servicioTecnico.php">
     <input type="submit" name="export" class="btn btn-success" value="Exportar Todo Excel" />
    </form>
    
  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarServicioTecnico">
          
          Agregar Servicio Tecnico

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaServiciosTecnicos" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Id</th>
           <th>Fecha Registro</th>
           <th>Cliente</th>
           <th>Nro Contacto</th>
           <th>Email</th>
           <th>Categoria</th>
           <th>Marca</th>
           <th>Modelo</th>
           <th>Nro Serie</th>           
           <th>Cantidad</th>           
           <th>Desperfecto</th>
           <th>Observaciones</th>
           <th>Tecnico</th>
           <th>Estado</th>
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
MODAL AGREGAR SERVICIO TECNICO
======================================-->

<div id="modalAgregarServicioTecnico" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Servicio Tecnico</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="col-md-12">
              <div class="form-group">
                <label>Fecha Registro</label>
                <input type="date" required class="form-control" id="fecha_registro" name="fecha_registro"  value="<?php echo date("Y-m-d");?>" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Nombre Cliente</label>
                <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente" onkeypress="return checkLetras(event)" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar nombre del cliente..." required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Nro Contacto</label>
                <input type="text" class="form-control input-lg" id="nro_contacto" name="nro_contacto" placeholder="Ingresar numero contacto..." maxlength="9" onkeypress="return checkNumeros(event)">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control input-lg" id="email" name="email" placeholder="example@example.com">
              </div>
            </div>

            <div class="col-md-12">
            <div class="form-group">
                <label>Categoria</label>
                <input type="text" class="form-control input-lg" id="categoria" name="categoria" placeholder="Ingrese la categoria..." onkeypress="return checkLetras(event)" onkeyup="this.value=this.value.toUpperCase();" required>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label>Marca</label>
                <input type="text" class="form-control input-lg" id="marca" name="marca" placeholder="Ingrese la marca..." onkeyup="this.value=this.value.toUpperCase();" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Modelo</label>
                <input type="text" class="form-control input-lg" id="modelo" name="modelo" placeholder="Ingrese el modelo..." onkeypress="return checkEspecial(event)" onkeyup="this.value=this.value.toUpperCase();" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Numero de Serie</label>
                <input type="text" class="form-control input-lg" id="nro_serie" name="nro_serie" placeholder="Ingrese el numero de serie..." onkeypress="return checkLetrasNumeros(event)">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Cantidad</label>
                <input type="text" class="form-control input-lg" id="cantidad" name="cantidad" value="1"onkeypress="return checkNumeros(event)" required>
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="form-group">
                <label>Desperfecto</label>
                <textarea class="form-control" id="reporte" name="reporte" rows="2"></textarea>
              </div>
            </div>

            
            <div class="col-md-12">
              <div class="form-group">
                <label>Obs.</label>
                <textarea class="form-control" id="obs" name="obs" rows="3"></textarea>
              </div>
            </div>
            
          

            
            <div class="col-md-12">
              <div class="form-group">
                <label>Nombre Tecnico</label>
                <input type="text" class="form-control input-lg" id="tecnico" name="tecnico"  placeholder="Ingrese el nombre del tecnico..." onkeypress="return checkLetras(event)" onkeyup="this.value=this.value.toUpperCase();" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                      <option>Abierto</option>
                      <option>Cerrado</option>
                </select> 
              </div>
            </div>

                
            
                </div>

            </div>
  
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Servicio Tecnico</button>
        </div>
      </form>

        <?php
          $crearServicioTecnico = new ControladorServiciosTecnicos();
          $crearServicioTecnico -> ctrCrearServicioTecnico();
        ?>  

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR SERVICIO TECNICO
======================================-->

<div id="modalEditarServicioTecnico" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Servicio Tecnico</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            
          <div class="col-md-12">
              <div class="form-group">
                <label>Fecha Registro</label>
                <input type="date" required class="form-control" id="editar_fecha_registro" name="editar_fecha_registro" required>
                <input type="hidden" id="editarId" name="editarId">

              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Nombre Cliente</label>
                <input type="text" class="form-control input-lg" id="editar_nombre_cliente" name="editar_nombre_cliente" onkeypress="return checkLetras(event)" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar nombre del cliente..." required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Nro Contacto</label>
                <input type="text" class="form-control input-lg" id="editar_nro_contacto" name="editar_nro_contacto" onkeypress="return checkNumeros(event)" placeholder="Ingresar numero contacto...">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control input-lg" id="editar_email" name="editar_email" placeholder="example@example.com">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Categoria</label>
                <input type="text" class="form-control input-lg" id="editar_categoria" name="editar_categoria" placeholder="Ingrese la categoria..." onkeypress="return checkLetras(event)" onkeyup="this.value=this.value.toUpperCase();" required>
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label>Marca</label>
                <input type="text" class="form-control input-lg" id="editar_marca" name="editar_marca" placeholder="Ingrese la marca..." onkeypress="return checkLetras(event)" onkeyup="this.value=this.value.toUpperCase();" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Modelo</label>
                <input type="text" class="form-control input-lg" id="editar_modelo" name="editar_modelo" placeholder="Ingrese el modelo..." onkeypress="return checkEspecial(event)" onkeyup="this.value=this.value.toUpperCase();" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Numero de Serie</label>
                <input type="text" class="form-control input-lg" id="editar_nro_serie" name="editar_nro_serie" onkeypress="return checkLetrasNumeros(event)" placeholder="Ingrese el numero de serie..." required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Cantidad</label>
                <input type="text" class="form-control input-lg" id="editar_cantidad" name="editar_cantidad" value="1"onkeypress="return checkNumeros(event)" required>
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="form-group">
                <label>Desperfecto</label>
                <textarea class="form-control" id="editar_reporte" name="editar_reporte" rows="2"></textarea>
              </div>
            </div>

            
            <div class="col-md-12">
              <div class="form-group">
                <label>Obs.</label>
                <textarea class="form-control" id="editar_obs" name="editar_obs" rows="3"></textarea>
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="form-group">
                <label>Nombre Tecnico</label>
                <input type="text" class="form-control input-lg" id="editar_tecnico" name="editar_tecnico" onkeypress="return checkLetras(event)" placeholder="Ingrese el nombre del tecnico..." onkeyup="this.value=this.value.toUpperCase();" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Estado</label>
                <select class="form-control" id="editar_estado" name="editar_estado" required>
                      <option>Abierto</option>
                      <option>Cerrado</option>
                </select> 
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

          $editarServicioTecnico = new ControladorServiciosTecnicos();
          $editarServicioTecnico -> ctrEditarServicioTecnico();

        ?>      

    </div>

  </div>

</div>

<?php

  $eliminarServicioTecnico = new ControladorServiciosTecnicos();
  $eliminarServicioTecnico -> ctrEliminarServicioTecnico();

?>      
