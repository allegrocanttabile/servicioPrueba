/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/
 
// $.ajax({

//  url: "ajax/datatable-serviciosTecnicos.ajax.php",
// success:function(respuesta){
    
// console.log("respuesta", respuesta);

// }

// })


var perfilOculto = $("#perfilOculto").val();


$('.tablaServiciosTecnicos').DataTable( {
    "ajax": "ajax/datatable-serviciosTecnicos.ajax.php?perfilOculto="+perfilOculto,
    "deferRender": true,
	"retrieve": true,
	"processing": true,
  "order": [[ 13, "desc" ]],
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
EDITAR SERVICIOS TECNICOS
=============================================*/
$(".tablaServiciosTecnicos tbody").on("click", "button.btnEditarServicioTecnico", function(){

	var idServicioTecnico = $(this).attr("idServicioTecnico");
	
	var datos = new FormData();
    datos.append("idServicioTecnico", idServicioTecnico);

     $.ajax({

      url:"ajax/serviciosTecnicos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

           $("#editarId").val(respuesta["id"]);
           $("#editar_fecha_registro").val(respuesta["fecha_registro"]);
           $("#editar_nombre_cliente").val(respuesta["nombre_cliente"]);
           $("#editar_nro_contacto").val(respuesta["nro_contacto"]);
           $("#editar_email").val(respuesta["email"]);
           $("#editar_categoria").val(respuesta["categoria"]);
           $("#editar_marca").val(respuesta["marca"]);
           $("#editar_modelo").val(respuesta["modelo"]);
           $("#editar_nro_serie").val(respuesta["nro_serie"]);
           $("#editar_reporte").val(respuesta["reporte"]);
           $("#editar_obs").val(respuesta["obs"]);
           $("#editar_tecnico").val(respuesta["tecnico"]);
           $("#editar_estado").val(respuesta["estado"]);
           
        }

  })

})

/*=============================================
ELIMINAR SERVICIO TECNICO
=============================================*/

$(".tablaServiciosTecnicos tbody").on("click", "button.btnEliminarServicioTecnico", function(){

	var idServicioTecnico = $(this).attr("idServicioTecnico");
	var codigo = $(this).attr("codigo");
	swal({

		title: '¿Está seguro de borrar el servicio tecnico?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar el servicio tecnico!'
        }).then(function(result) {
        if (result.value) {

        	window.location = "index.php?ruta=serviciosTecnicos&idServicioTecnico="+idServicioTecnico+"&codigo="+codigo;

        }


	})

})

/*=============================================
IMPRIMIR SERVICIO TECNICO
=============================================*/

$(".tablaServiciosTecnicos tbody").on("click", "button.btnImprimirServicioTecnico", function(){

  var codigoServicio = $(this).attr("codigoServicio");

  window.open("extensiones/tcpdf/pdf/docRecepcionServicioTecnico.php?codigo="+codigoServicio, "_blank");

  //window.open("extensiones/tcpdf/pdf/pdf.php", "_blank");

})
	
