<?php


//export.php
$connect = mysqli_connect("localhost", "wienerst_p03", "W86c9x6xg6$", "wienerst_p03");
$output = '';
if(isset($_POST["export"]))
{
 $query = "select categoria_nombre, marca_nombre, modelo_nombre, descripcion, serie, precio_compra, stock, obs  from productos
inner join categorias on productos.id_categoria = categorias.id
inner join marcas on productos.id_marca = marcas.id
inner join modelos on productos.id_modelo = modelos.id";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="0">
                    <tr>

                         <th>CATEGORIA</th>
                         <th>MARCA</th>
                         <th>MODELO</th>
                         <th>DESCRIPCION</th>
                         <th>SERIE</th>
                         <th>S/. VENTA</th>
                         <th>STOCK</th>
                         <th>OBS.</th>

                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>
                         <td>'.$row["categoria_nombre"].'</td>
                         <td>'.$row["marca_nombre"].'</td>
                         <td>'.$row["modelo_nombre"].'</td>
       <td>'.$row["descripcion"].'</td>
       <td>'.$row["serie"].'</td>
       <td>'.$row["precio_compra"].'</td>
       <td>'.$row["stock"].'</td>
       <td>'.$row["obs"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Inventario-Total.xls');
  echo $output;
 }
}
?>
