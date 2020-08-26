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

$(".tablaCategorias").DataTable({
  ajax: "ajax/datatable-categorias.ajax.php?perfilOculto=" + perfilOculto,
  deferRender: true,
  retrieve: true,
  processing: true,
  order: [[2, "desc"]],
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
EDITAR CATEGORIA
=============================================*/
$(".tablaCategorias").on("click", "button.btnEditarCategoria", function() {
  var idCategoria = $(this).attr("idCategoria");

  var datos = new FormData();
  datos.append("idCategoria", idCategoria);

  $.ajax({
    url: "ajax/categorias.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      $("#editarIdCategoria").val(respuesta["id"]);
      $("#editarCategoria").val(respuesta["categoria_nombre"]);
    }
  });
});

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablaCategorias tbody").on("click", ".btnEliminarCategoria", function() {
  var idCategoria = $(this).attr("idCategoria");

  swal({
    title: "¿Está seguro de borrar la categoría?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar categoría!"
  }).then(function(result) {
    if (result.value) {
      window.location =
        "index.php?ruta=categorias-marcas-modelos&idCategoria=" + idCategoria;
    }
  });
});
