/*=============================================
SideBar Menu
=============================================*/

$(".sidebar-menu").tree();

/*=============================================
Data Table
=============================================*/

$(".tablas").DataTable({
  dom: "Bfrtip",
  buttons: [
    {
      extend: "pdfHtml5",
      download: "open",
    }],
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
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});

/*$(document).ready(function () {
   setInterval(function () {
		
		var today = new Date();
	
		var idUsuario = 1;

		var datos = new FormData();
	  
		datos.append("idUsuario", idUsuario);
	  
		$.ajax({
		  url: "ajax/notificaciones.ajax.php",
		  method: "POST",
		  data: datos,
		  cache: false,
		  contentType: false,
		  processData: false,
		  dataType: "json",
		  success: function (respuesta) {
	  
			  //console.log(respuesta);
			var cantidad = respuesta.length;
			document.getElementById("cantidadCorreos").innerHTML = cantidad;
		  },
		});
		
	  }, 2000)
 

 
});*/
