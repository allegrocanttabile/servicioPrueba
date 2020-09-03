<?php


//export.php  
$connect = mysqli_connect("localhost", "wienerst_tecnico", "W86c9x6xg6$", "wienerst_tecnico");
$output = '';
if(isset($_POST["export"]))
{
 $query = "select * from garantias";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1"> 
                    <tr>



                         <th>Fecha Registro</th>  
                         <th>Cliente</th>  
                         <th>Nro Contacto</th>  
                         <th>Email</th>  
                         <th>Producto</th>
                         <th>Desperfecto</th>
                         <th>Observaciones</th>
                         <th>Tecnico</th>
                         <th>Estado</th>
                         
       
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["fecha_registro"].'</td>  
                         <td>'.$row["nombre_cliente"].'</td>  
                         <td>'.$row["nro_contacto"].'</td>  
                         <td>'.$row["email"].'</td>  
                         <td>'.$row["cantidad"] ." ".$row["categoria"]." ".$row["marca"]." ".$row["modelo"].' </td>  
                         <td>'.$row["reporte"].'</td>  
                         <td>'.$row["obs"].'</td>  
                         <td>'.$row["tecnico"].'</td>
                         <td>'.$row["estado"].'</td>
                           
       
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Lista-Total-ServicioTecnico.xls');
  echo $output;
 }
}
?>