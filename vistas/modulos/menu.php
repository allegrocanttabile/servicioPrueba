<aside class="main-sidebar">

	<section class="sidebar">

		<ul class="sidebar-menu">

			<?php


			if($_SESSION["perfil"] == "administradorEspecial" || $_SESSION["perfil"] == "Administrador"){

				echo '<li>
			<a href="inicio">
			<i class="fa fa-tachometer"></i>
			<span>TABLERO</span>
			</a>
			</li>';

		}

		if($_SESSION["perfil"] == "administradorEspecial" || $_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "vendedorEspecial" 
			|| $_SESSION["perfil"] == "Vendedor"){

			echo '<li>
			<a href="alertas">
			<i class="fa fa-bell"></i>
			<span>ALERTAS</span>
			</a>
			</li>';

		}


		if($_SESSION["perfil"] == "administradorEspecial" || $_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "vendedorEspecial" 
			|| $_SESSION["perfil"] == "Vendedor"){
			echo '<li>
			<a href="envios">
			<i class="fa fa-motorcycle"></i>
			<span>TARIFARIO ENVIOS</span>
			</a>
			</li>';

		}

		if($_SESSION["perfil"] == "administradorEspecial" || $_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "vendedorEspecial" 
			|| $_SESSION["perfil"] == "Vendedor"){

			echo '<li>

			<a href="clientes">
			<i class="fa fa-users"></i>
			<span>CLIENTE</span>
			</a>
			</li>';

		}

		if($_SESSION["perfil"] == "administradorEspecial" || $_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Tecnico"){

			echo '<li>
			<a href="serviciosTecnicos">
			<i class="fa fa-wrench"></i>
			<span>SERVICIO TECNICO</span>
			</a>
			</li>';

		}

		if($_SESSION["perfil"] == "administradorEspecial" || $_SESSION["perfil"] == "Administrador"){

			echo '<li class="treeview">
			<a href="#">
			<i class="fa fa-usd"></i>
			<span>COMPRAS</span>
			<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
			</span>
			</a>
			<ul class="treeview-menu">

			<li>
			<a href="compras">
			<i class="fa fa-circle-o"></i>
			<span>LISTA DE COMPRAS</span>
			</a>
			</li>

			<li>
			<a href="crear-listado">
			<i class="fa fa-circle-o"></i>
			<span>AGREGAR LISTA</span>
			</a>
			</li>

			<li>
			<a href="listados">
			<i class="fa fa-circle-o"></i>
			<span>LISTADOS</span>
			</a>
			</li>

			</ul>
			</li>';

		}


		if($_SESSION["perfil"] == "administradorEspecial" || $_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "vendedorEspecial"){

			echo '<li class="treeview">
			<a href="#">
			<i class="fa fa-product-hunt"></i>
			<span>PRODUCTO</span>
			<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
			</span>
			</a>
			<ul class="treeview-menu">

			<li>
			<a href="productos">
			<i class="fa fa-circle-o"></i>
			<span>LISTA PRODUCTOS</span>
			</a>
			</li>

			<li>
			<a href="existencias">
			<i class="fa fa-circle-o"></i>
			<span>LISTA EXISTENCIAS</span>
			</a>
			</li>

			<li>
			<a href="categorias-marcas-modelos">
			<span>Categoria-Marca-Modelo</span>
			</a>
			</li>

			
			</li>
			</ul>';

		}


		if($_SESSION["perfil"] == "administradorEspecial" || $_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "vendedorEspecial" 
			|| $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">
			<a href="#">
			<i class="fa fa-shopping-cart"></i>
			<span>VENTA</span>
			<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
			</span>
			</a>
			<ul class="treeview-menu">

			<li>
			<a href="ventas-parcial">
			<i class="fa fa-circle-o"></i>
			<span>LISTA VENTAS PARCIAL</span>
			</a>
			</li>

			<li>
			<a href="ventas-total">
			<i class="fa fa-circle-o"></i>
			<span>LISTA VENTAS TOTAL</span>
			</a>
			</li>

			<li>
			<a href="crear-venta">
			<i class="fa fa-circle-o"></i>
			<span>AGREGAR VENTA</span>
			</a>
			</li>

			<li>
			<a href="ventas-prueba">
			<i class="fa fa-circle-o"></i>
			<span>Ventas-Prueba</span>
			</a>
			</li>


			</ul>';

		}


		if($_SESSION["perfil"] == "administradorEspecial" || $_SESSION["perfil"] == "Administrador"){

			echo '<li class="treeview">
			<a href="#">
			<i class="fa fa-clipboard"></i>
			<span>INFORMES</span>
			<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
			</span>
			</a>
			<ul class="treeview-menu">

			<li>
			<a href="reportes">
			<i class="fa fa-circle-o"></i>
			<span>REPORTE DE VENTAS</span>
			</a>
			</li>
			</li>
			</ul>';

		}


		if($_SESSION["perfil"] == "administradorEspecial" || $_SESSION["perfil"] == "Administrador"){

			echo '<li class="treeview">
			<a href="#">
			<i class="fa fa-cogs"></i>
			<span>AJUSTES</span>
			<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
			</span>
			</a>
			<ul class="treeview-menu">

			<li>
			<a href="usuarios">
			<i class="fa fa-user"></i>
			<span>USUARIOS</span>
			</a>
			</li>

			<li>
			<a href="pasajeros">
			<i class="fa fa-address-book-o"></i>
			<span>COURIERS</span>
			</a>
			</li>


			<li>
			<a href="almacenes">
			<i class="fa fa-home"></i>
			<span>ALMACENES</span>
			</a>
			</li>

			<li>
			<a href="proveedores">
			<i class="fa fa-truck"></i>
			<span>PROVEEDORES</span>
			</a>
			</li>


			</ul>';

		}
		
		
		if($_SESSION["perfil"] == "Cliente"){

			echo '<li>
			<a href="productos-cliente">
			<i class="fa fa-product-hunt"></i>
			<span>Productos</span>
			</a>
			</li>
			</li>
			</ul>';

		}

		?>
		
		
		

	</ul>

</section>

</aside>
