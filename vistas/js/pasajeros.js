/*=============================================
CARGAR LA TABLA DINÁMICA DE PASAJEROS
=============================================*/

// $.ajax({

//  url: "ajax/datatable-productos.ajax.php",
//  success:function(respuesta){

//    console.log("respuesta", respuesta);

//  }

// })

var perfilOculto = $("#perfilOculto").val();


$('.tablaPasajeros').DataTable( {
    "ajax": "ajax/datatable-pasajeros.ajax.php?perfilOculto="+perfilOculto,
    "deferRender": true,
  "retrieve": true,
  "processing": true,
  "order": [[ 3, "desc" ]],
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
EDITAR PASAJEROS
=============================================*/
$(".tablaPasajeros").on("click", "button.btnEditarPasajero", function(){

	var idPasajero = $(this).attr("idPasajero");

	var datos = new FormData();
	datos.append("idPasajero", idPasajero);

	$.ajax({
		url: "ajax/pasajeros.ajax.php",
		method: "POST",
      		data: datos,
      		cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

        $("#editarIdPasajero").val(respuesta["id"]);
     		$("#editarPasajero").val(respuesta["pasajero_nombre"]);
     		

     	}

	})


})

/*=============================================
ELIMINAR PASAJERO
=============================================*/
$(".tablaPasajeros tbody").on("click", ".btnEliminarPasajero", function(){

	 var idPasajero = $(this).attr("idPasajero");

	 swal({
	 	title: '¿Está seguro de borrar el pasajero?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar pasajero!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=pasajeros&idPasajero="+idPasajero;

	 	}

	 })

})

