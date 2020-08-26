/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

// $.ajax({

//  url: "ajax/datatable-productos.ajax.php",
//  success:function(respuesta){

//    console.log("respuesta", respuesta);

//  }

// })

var perfilOculto = $("#perfilOculto").val();

$(".tablaCompras").DataTable({
  ajax: "ajax/datatable-compras.ajax.php?perfilOculto=" + perfilOculto,
  deferRender: true,
  retrieve: true,
  processing: true,
  "order": [[ 15, "desc" ]],
  // "columnDefs": [
  // { "targets": [5,8,9,11,12,13,14,15,16,17], "searchable": false }
  // ],

  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior"
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending: ": Activar para ordenar la columna de manera descendente"
    }
  }
});

/*=============================================
CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO
=============================================*/
$("#nuevaCategoria").change(function() {
  var idCategoria = $(this).val();

  var datos = new FormData();
  datos.append("idCategoria", idCategoria);

  $.ajax({
    url: "ajax/compras.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      if (!respuesta) {
        var nuevoCodigo = idCategoria + "01";
        $("#nuevoCodigo").val(nuevoCodigo);
      } else {
        var nuevoCodigo = Number(respuesta["codigo"]) + 1;
        $("#nuevoCodigo").val(nuevoCodigo);
      }
    }
  });
});




/*=============================================
SUBIENDO LA FOTO COMPRA
=============================================*/

$(".nuevaImagen").change(function() {
  var imagen = this.files[0];

  /*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevaImagen").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!"
    });
  } else if (imagen["size"] > 2000000) {
    $(".nuevaImagen").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!"
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event) {
      var rutaImagen = event.target.result;

      $(".previsualizar").attr("src", rutaImagen);
    });
  }
});

/*=============================================
EDITAR COMPRAS
=============================================*/

$(".tablaCompras tbody").on("click", "button.btnEditarCompra", function() {
  var idCompra = $(this).attr("idCompra");

  var datos = new FormData();
  datos.append("idCompra", idCompra);

  $.ajax({
    url: "ajax/compras.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      var datosCategoria = new FormData();
      datosCategoria.append("idCategoria", respuesta["id_categoria"]);

      $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datosCategoria,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          $("#editarCategoria").val(respuesta["id"]);
          $("#editarCategoria").html(respuesta["categoria_nombre"]);
        }
      });

      var datosMarca = new FormData();
      datosMarca.append("idMarca", respuesta["id_marca"]);

      $.ajax({
        url: "ajax/marcas.ajax.php",
        method: "POST",
        data: datosMarca,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          $("#editarMarca").val(respuesta["id"]);
          $("#editarMarca").html(respuesta["marca_nombre"]);
        }
      });

      var datosModelo = new FormData();
      datosModelo.append("idModelo", respuesta["id_modelo"]);

      $.ajax({
        url: "ajax/modelos.ajax.php",
        method: "POST",
        data: datosModelo,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          $("#editarModelo").val(respuesta["id"]);
          $("#editarModelo").html(respuesta["modelo_nombre"]);
        }
      });

      var datosProveedor = new FormData();
      datosProveedor.append("idProveedor", respuesta["id_proveedor"]);

      $.ajax({
        url: "ajax/proveedores.ajax.php",
        method: "POST",
        data: datosProveedor,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          $("#editarProveedor").val(respuesta["id"]);
          $("#editarProveedor").html(respuesta["proveedor_nombre"]);
        }
      });

      var datosAlmacen = new FormData();
      datosAlmacen.append("idAlmacen", respuesta["id_almacen"]);

      $.ajax({
        url: "ajax/almacenes.ajax.php",
        method: "POST",
        data: datosAlmacen,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
          $("#editarAlmacen").val(respuesta["id"]);
          $("#editarAlmacen").html(respuesta["almacen_nombre"]);
        }
      });

      $("#editarId").val(respuesta["id"]);
      $("#editarCodigo").val(respuesta["codigo"]);
      $("#editarDetalle").val(respuesta["detalles"]);
      $("#editarNumeroOrden").val(respuesta["numero_orden"]);
      $("#editarFechaCompra").val(respuesta["fecha_compra"]);
      $("#editarPrecioCompra").val(respuesta["precio_compra"]);
      $("#editarFechaEntrega").val(respuesta["fecha_entrega"]);
      $("#editarCantidad").val(respuesta["cantidad"]);
      $("#editarPagoCourier").val(respuesta["pago_courier"]);

      if (respuesta["imagen"] != "") {
        $("#imagenActual").val(respuesta["imagen"]);

        $(".previsualizar").attr("src", respuesta["imagen"]);
      }
    }
  });
});

/*=============================================
ELIMINAR COMPRA
=============================================*/

$(".tablaCompras tbody").on("click", "button.btnEliminarCompra", function() {
  var idCompra = $(this).attr("idCompra");
  var codigo = $(this).attr("codigo");
  var imagen = $(this).attr("imagen");

  swal({
    title: "¿Está seguro de borrar la compra?",
    text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar compra!"
  }).then(function(result) {
    if (result.value) {
      window.location =
        "index.php?ruta=compras&idCompra=" +
        idCompra +
        "&imagen=" +
        imagen +
        "&codigo=" +
        codigo;
    }
  });
});
