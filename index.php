<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/serviciosTecnicos.controlador.php";
require_once "controladores/marcas.controlador.php";
require_once "controladores/modelos.controlador.php";
require_once "controladores/cotizacion.controlador.php";
require_once "controladores/alertas.controlador.php";
require_once "controladores/envios.controlador.php";
require_once "controladores/almacenes.controlador.php";
require_once "controladores/faltantes.controlador.php";
require_once "controladores/pasajeros.controlador.php";
require_once "controladores/compras.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/existencias.controlador.php";
require_once "controladores/listados.controlador.php";



require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/serviciosTecnicos.modelo.php";
require_once "modelos/marcas.modelo.php";
require_once "modelos/modelos.modelo.php";
require_once "modelos/cotizacion.modelo.php";
require_once "modelos/alertas.modelo.php";
require_once "modelos/envios.modelo.php";
require_once "modelos/almacenes.modelo.php";
require_once "modelos/faltantes.modelo.php";
require_once "modelos/pasajeros.modelo.php";
require_once "modelos/compras.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/existencias.modelo.php";
require_once "modelos/listados.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();