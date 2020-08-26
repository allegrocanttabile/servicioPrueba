<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
         
    </ol>
    
   

  </section>

  <section class="content">

    <div class="box">

      

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaProductosCliente" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Stock</th>
           <th>Categoría</th>
           <th>Marca</th>
           <th>Modelo</th>
           <th>Descripción</th>
           <th>N° Serie</th>
           <th>Precio de venta</th> 
           <th>Imagen</th>           
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



