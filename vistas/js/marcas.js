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

$(".tablaMarcas").DataTable({
  ajax: "ajax/datatable-marcas.ajax.php?perfilOculto=" + perfilOculto,
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
EDITAR MARCA
=============================================*/
$(".tablaMarcas").on("click", ".btnEditarMarca", function() {
  var idMarca = $(this).attr("idMarca");

  var datos = new FormData();
  datos.append("idMarca", idMarca);

  $.ajax({
    url: "ajax/marcas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      $("#editarIdMarca").val(respuesta["id"]);
      $("#editarMarca").val(respuesta["marca_nombre"]);
    }
  });
});

/*=============================================
ELIMINAR MARCA
=============================================*/
$(".tablaMarcas tbody").on("click", ".btnEliminarMarca", function() {
  var idMarca = $(this).attr("idMarca");

  swal({
    title: "¿Está seguro de borrar la marca?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar marca!"
  }).then(function(result) {
    if (result.value) {
      window.location =
        "index.php?ruta=categorias-marcas-modelos&idMarca=" + idMarca;
    }
  });
});
