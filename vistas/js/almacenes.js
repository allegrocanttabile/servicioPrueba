/*=============================================
CARGAR LA TABLA DINÁMICA DE ALMACEN
=============================================*/

// $.ajax({

//  url: "ajax/datatable-productos.ajax.php",
//  success:function(respuesta){

//    console.log("respuesta", respuesta);

//  }

// })

var perfilOculto = $("#perfilOculto").val();


$('.tablaAlmacenes').DataTable( {
    "ajax": "ajax/datatable-almacenes.ajax.php?perfilOculto="+perfilOculto,
    "deferRender": true,
  "retrieve": true,
  "processing": true,
  "order": [[ 2, "desc" ]],
   "language": {

      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }

  }

} );


/*=============================================
EDITAR ALMACEN
=============================================*/
$(".tablaAlmacenes").on("click", "button.btnEditarAlmacen", function(){

  var idAlmacen = $(this).attr("idAlmacen");

  var datos = new FormData();
    datos.append("idAlmacen", idAlmacen);

    $.ajax({

      url:"ajax/almacenes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

         $("#editarIdAlmacen").val(respuesta["id"]);
         $("#editarAlmacen").val(respuesta["almacen_nombre"]);




    }

    })

})

/*=============================================
ELIMINAR ALMACEN
=============================================*/
$(".tablaAlmacenes").on("click", ".btnEliminarAlmacen", function(){

  var idAlmacen = $(this).attr("idAlmacen");

  swal({
        title: '¿Está seguro de borrar el almacen?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar almacen!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=almacenes&idAlmacen="+idAlmacen;
        }

  })

})
