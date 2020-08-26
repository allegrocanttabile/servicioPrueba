<?php error_reporting(0);?>


<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar ventas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar ventas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <a href="crear-venta">

          <button class="btn btn-primary">
            
            Agregar venta

          </button>

        </a>

         <button type="button" class="btn btn-default pull-right" id="daterangeParcial-btn">
           
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

         </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaVentasDetalles" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>ID</th>
           <th>Fecha Compra</th>
           <th>Cliente</th>
           <th>Proviene</th>
           <th>Producto</th>

           <th>Despacho</th>
           <th>Adelanto</th>
           <th>Total</th>
           <th>Estado</th>
           <th>Tipo</th>
           <th>Fecha Entrega</th>
           <th>Obs</th>
           <th>Acciones</th>

         </tr> 

        </thead>

       </table>

       <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();

      ?>
       

      </div>

    </div>

  </section>

</div>