<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Servicio Tecnico
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Servicio Tecnico</li>
    
    </ol>
    
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
           <th>Reporte</th>
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
                <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar nombre del cliente..." required>
              </div>
            </div>

            
          
            <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>
                <tr>
                <th>Nro Contacto</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="number" class="form-control input-lg" id="nro_contacto" name="nro_contacto" placeholder="Ingresar numero contacto...">
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
                <th>Email</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="email" name="email" placeholder="example@example.com">
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
                <th>Categoria</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="categoria" name="categoria" placeholder="Ingrese la categoria..." onkeyup="this.value=this.value.toUpperCase();" required>
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
                <th>Marca</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="marca" name="marca" placeholder="Ingrese la marca..." onkeyup="this.value=this.value.toUpperCase();" required>
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
                <th>Modelo</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="modelo" name="modelo" placeholder="Ingrese el modelo..." onkeyup="this.value=this.value.toUpperCase();" required>
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
                <th>Numero de Serie</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="number" class="form-control input-lg" id="nro_serie" name="nro_serie" placeholder="Ingrese el numero de serie..." required>
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
                <th>Reporte</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <textarea id="reporte" name="reporte" rows="3"></textarea>
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
                <th>Obs.</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <textarea id="obs" name="obs" rows="3"></textarea>
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
                <th>Nombre Tecnico</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="tecnico" name="tecnico" placeholder="Ingrese el nombre del tecnico..." onkeyup="this.value=this.value.toUpperCase();" required>
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
                <th>Estado</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <div class="input-group">
                    <select class="form-control" id="estado" name="estado" required>
                      <option>Abierto</option>
                      <option>Cerrado</option>
                    </select>              
                </div>
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

            


          <div class="row">
            <div class="col-xs-12">
            <table class="table">
               <thead>
                <tr>
                <th>Fecha Registro</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="date" required class="form-control" id="fecha_registro" name="fecha_registro"  value="<?php echo date("Y-m-d");?>" required>
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
                <th>Nombre Cliente</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente" onkeyup="this.value=this.value.toUpperCase();" placeholder="Ingresar nombre del cliente..." required>
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
                <th>Nro Contacto</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="number" class="form-control input-lg" id="nro_contacto" name="nro_contacto" placeholder="Ingresar numero contacto...">
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
                <th>Email</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="email" name="email" placeholder="example@example.com">
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
                <th>Categoria</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="categoria" name="categoria" placeholder="Ingrese la categoria..." onkeyup="this.value=this.value.toUpperCase();" required>
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
                <th>Marca</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="marca" name="marca" placeholder="Ingrese la marca..." onkeyup="this.value=this.value.toUpperCase();" required>
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
                <th>Modelo</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="modelo" name="modelo" placeholder="Ingrese el modelo..." onkeyup="this.value=this.value.toUpperCase();" required>
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
                <th>Numero de Serie</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="number" class="form-control input-lg" id="nro_serie" name="nro_serie" placeholder="Ingrese el numero de serie..." required>
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
                <th>Reporte</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <textarea id="reporte" name="reporte" rows="3"></textarea>
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
                <th>Obs.</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <textarea id="obs" name="obs" rows="3"></textarea>
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
                <th>Nombre Tecnico</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                <input type="text" class="form-control input-lg" id="tecnico" name="tecnico" placeholder="Ingrese el nombre del tecnico..." onkeyup="this.value=this.value.toUpperCase();" required>
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
                <th>Estado</th>
                </tr>
               </thead>
            <tbody>
              <tr>
            <td style="width: 33%">
              <div class="input-group">
                <div class="input-group">
                    <select class="form-control" id="estado" name="estado" required>
                      <option>Abierto</option>
                      <option>Cerrado</option>
                    </select>              
                </div>
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
