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
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>ID</th>
           <th>Fecha Compra</th>
           <th>Vendedor</th>
           <th>Cliente</th>
           <th>Proviene</th>
           <th>Producto</th>
           <th>Despacho</th>
           <th>Adelanto</th>
           <th>Total</th>            
           <th>Estado</th>
           <th>Tipo Doc.</th>
           <th>Fecha Entrega</th>
           <th>Obs.</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

          $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

          foreach ($respuesta as $key => $value) {
           
           echo '<tr>

                  <td>'.($key+1).'</td>';

                  $here = json_decode($value["productos"], true);
                  $p0 = $here[0]['id'];
                  echo '<td style="font-weight:bold">'.$p0.'</td>';

                  $originalDate = $value["fecha"];
                  $newDate = date("d-m-Y", strtotime($originalDate));

                  echo '<td style="font-weight:bold" bgcolor="#D9D7D7">'.$newDate.'</td>';

                 

                  $itemUsuario = "id";
                  $valorUsuario = $value["id_vendedor"];

                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                  echo '<td>'.$respuestaUsuario["nombre"].'</td>';

                  $itemCliente = "id";
                  $valorCliente = $value["id_cliente"];

                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                  echo '<td>'.$respuestaCliente["nombre"].'</td>

        
                  <td>'.$value["proviene"].'</td>';

                  
                  $here = json_decode($value["productos"], true);

                  $p0 = $here[0]['categoria']." ".$here[0]['marca'] ." ".$here[0]['modelo']." ".$here[0]['serie'];
                  $p1 = $here[1]['categoria']." ".$here[1]['marca'] ." ".$here[1]['modelo']." ".$here[1]['serie'];
                  $p2 = $here[2]['categoria']." ".$here[2]['marca'] ." ".$here[2]['modelo']." ".$here[2]['serie'];
                  $p3 = $here[3]['categoria']." ".$here[3]['marca'] ." ".$here[3]['modelo']." ".$here[3]['serie'];
                  $p4 = $here[4]['categoria']." ".$here[4]['marca'] ." ".$here[4]['modelo']." ".$here[4]['serie'];
                  $p5 = $here[5]['categoria']." ".$here[5]['marca'] ." ".$here[5]['modelo']." ".$here[5]['serie'];
                                   
                  echo '<td style="font-weight:bold">'.$p0."</br>".$p1."</br>".$p2."</br>".$p3."</br>".$p4."</br>".$p5.'</td>

                   


                  <td>S/.'.number_format($value["desp"],2).'</td>
                  <td style="font-weight:bold" bgcolor="#D9D7D7">S/.'.number_format($value["adelanto"],2).'</td>
                  <td>S/. '.number_format($value["total"] + $value["desp"] - $value["descuento"]  ,2).'</td>';

                  if($value["estado"] == "Por Comprar"){

                      $estado = "<button class='btn btn-danger'>".$value["estado"]."</button>";

                    }else if($value["estado"] == "Ya Compre"){

                      $estado = "<button class='btn btn-warning'>".$value["estado"]."</button>";

                    }else{

                      $estado = "<button class='btn btn-success'>".$value["estado"]."</button>";

                    }

                 echo '<td>'.$estado.'</td>
                 
                  <td>'.$value["tipo"].'</td>';


                  $fecha_actual = date("Y-m-d");
                  $fecha_actual2 = date("Y-m-d", strtotime($fecha_actual."+ 2 days"));  
                  $fecha_actual3 = date("Y-m-d", strtotime($fecha_actual."+ 5 days"));
                  $fecha_actual4 = date("Y-m-d", strtotime($fecha_actual."- 4 days"));

                    if($value["entrega"] <= $fecha_actual4){

                    $fecha_entrega = date("d-m-Y", strtotime($value["entrega"]));

                    }else if ($value["entrega"] <= $fecha_actual){
                      
                    $fecha_entrega ="<button class='parpadea button botonRojo'>".date("d-m-Y", strtotime($value["entrega"]))."</button>";

                    }else if ($value["entrega"] <= $fecha_actual2 ){

                      $fecha_entrega = "<button class='parpadea button botonMorado'>".date("d-m-Y", strtotime($value["entrega"]))."</button>";

                    }else if ($value["entrega"] <= $fecha_actual3 ) {

                      $fecha_entrega = "<button class='button botonAmarillo'>".date("d-m-Y", strtotime($value["entrega"]))."</button>";

                    }else{

                      $fecha_entrega = "<button class='button botonVerde'>".date("d-m-Y", strtotime($value["entrega"]))."</button>";

                    }

                 echo '<td style="font-weight:bold">'.$fecha_entrega.'</td>

                  <td style="font-weight:bold" bgcolor="#D9D7D7">'.$value["obs"].'</td>
                  

                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["codigo"].'">

                        <i class="fa fa-print"></i>

                      </button>';

                      if($_SESSION["perfil"] == "administradorEspecial"){

                      echo '<button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                    }


                    if($_SESSION["perfil"] == "Administrador"){

                      echo '<button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                    }

                    if($_SESSION["perfil"] == "vendedorEspecial"){

                      echo '<button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                    }

                     if($_SESSION["perfil"] == "Vendedor"){

                      echo '<button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                    }


                    echo '</div>  

                  </td>

                </tr>';
            }

        ?>
               
        </tbody>

       </table>

       <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();

      ?>
       

      </div>

    </div>

  </section>

</div>