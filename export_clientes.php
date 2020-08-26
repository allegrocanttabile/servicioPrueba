<?php


//export.php  
$connect = mysqli_connect("localhost", "wienerst_store", "W86c9x6xg6$", "wienerst_store");
$output = '';
if(isset($_POST["export"]))
{
 $query = "select * from clientes";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="0"> 
                    <tr>



                         <th>NOMBRE-APELLIDOS-DNI</th>  
                         <th>EMAIL</th>
                         
       
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["nombre"].'</td>  
                         <td>'.$row["email"].'</td>  
                           
       
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Lista-Total-Clientes.xls');
  echo $output;
 }
}
?>