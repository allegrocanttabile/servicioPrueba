<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Alertas

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Alertas</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      
      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablaAlertas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Categoría</th>
           <th>Marca</th>
           <th>Modelo</th>
           <th>Stock</th>
           

         </tr>

        </thead>



       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

      </div>

    </div>

  </section>

</div>