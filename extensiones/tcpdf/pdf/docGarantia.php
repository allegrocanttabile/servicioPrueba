<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

$fechapdf = date("d/m/y",time());
//$fechapdf = substr($respuestaVenta["fechapdf"],0,-8);
$productos = json_decode($respuestaVenta["productos"], true);
$neto = number_format($respuestaVenta["neto"],2);
$impuesto = number_format($respuestaVenta["impuesto"],2);
$total = number_format($respuestaVenta["total"],2);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "id";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();


// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:150px"><img src="images/logo-negro-bloque.png"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Dirección:
					Calle Rapallo 136

					<br>
					Urb. Sol de La Molina - La Molina
					<br>
					Lima

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: 368-5172
					<br>
					Celular: 996-672111	
					
					<br>
					wienerstech1107@gmail.com

				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>DOCUMENTO GARANTÍA N°<br>$valorVenta</td>

		</tr>

	</table>

EOF;



$pdf->writeHTML($bloque1, false, false, false, false, '');




// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Cliente: $respuestaCliente[nombre] DNI/RUC: $respuestaCliente[documento]

			</td>

			

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				Fecha: $fechapdf

			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">Vendedor: $respuestaVendedor[nombre]</td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------


$bloque3 = <<<EOF

	
	<table style="font-size:9px; padding:5px 10px;">
	
		<tr>
		
			<td  align="justify" style="border: 1px solid #666; background-color:white; width:540px">
			Mediante el presente Contrato Privado Yo Luis Alfredo Wiener Sergesbol con DNI 08184865, sirva el presente documento como garantía de la compra efectuada la misma que tiene una vigencia por 12 meses contados   (con excepcion Audífonos y Celulares que son 6 Meses) a partir de la firma del presente contrato, por cualquier desperfecto de fábrica que tuviese el equipo. Será responsabilidad del vendedor la orientación para la ejecución de ser necesario de dicha garantía, la que no cubre problemas como consecuencia de daños físicos.
				Se Declara haber vendido el y/o los siguiente(s) producto(s):
			</td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Categoría</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Marca</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Modelo</td>
		<td style="border: 1px solid #666; background-color:white; width:110px; text-align:center">N° Serie</td>
		<td style="border: 1px solid #666; background-color:white; width:50px; text-align:center">Cant.</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Sub.Total</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

// ---------------------------------------------------------

foreach ($productos as $key => $item) {

$itemProducto = "descripcion";
$valorProducto = $item["marca"];
$orden = null;

$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

$valorUnitario = number_format($respuestaProducto["precio_venta"], 2);

$precioTotal = number_format($item["total"], 2);

$bloque5 = <<<EOF

	<table style="font-size:9px; padding:4px 8px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$item[categoria]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$item[marca]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$item[modelo]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:110px; text-align:center">
				$item[serie]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:50px; text-align:center">
				$item[cantidad]
			</td>

			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">S/. 
				$precioTotal
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

		</tr>
		


		



		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Total:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				S/. $total
			</td>

		</tr>


		<tr align="right">
		
		
		
		
		
	
		

			<td style="width:320px"><img src="images/firmaydni.png"> </td>

		</tr>

		<tr>
		
			<td align="justify" style="border: 1px solid #666; background-color:white; width:540px"><font size="7">
		***Condiciones***
El Producto no entra en Garantía si tiene golpes, caídas y le haya caído Agua o Restos de Agua.
*El Producto no entra en Garantía si fue cambiado el software ó Sistema Operativo Original de Fabrica.
*El Producto no entra en Garantía si fue abierto por un Servicio Técnico “AJENO” al Nuestro. *El Producto no entra en Garantía por “DETERIORO” por uso ordinario del producto.

			</font></td>

		</tr>









	</table>

EOF;

$pdf->writeHTML($bloque6, false, false, false, false, '');



// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

$pdf->Output('docGarantia.pdf');

}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();

?>