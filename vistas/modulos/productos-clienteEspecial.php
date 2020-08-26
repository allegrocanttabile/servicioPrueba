<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar productos</li>
    
    </ol>
    
    <form method="post" action="./export.php">
     <input type="submit" name="export" class="btn btn-success" value="Exportar Todo Excel" />
    </form>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaProductosClienteEspecial" width="100%">
         
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
           <th>Obs</th>
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



