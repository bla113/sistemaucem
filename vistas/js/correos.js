/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#btnCrearCorreo").on("click", function () {
  var usuario = $(this).val();

  var datos = new FormData();

  datos.append("buscarUsuario", usuario);

  $.ajax({
    url: "ajax/mensajes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      respuesta.forEach(function (item, index, array) {
        //$("#materiaOferta").empty();

        document.getElementById("destinoCorreo").innerHTML +=
          "<option value='" +
          item[0] +
          "'>" +
          item[1] +
          "(" +
          item[2] +
          ")</option>";
      });
    },
  });
});

/*=============================================
CAMBIAR EL ESTADO DEL MENSAJE A LEIDO
=============================================*/

$(".leer").on("click", function () {
  var idMensaje = $(this).attr("idCorreo");

  var datos = new FormData();

  datos.append("idMensaje", idMensaje);

  $.ajax({
    url: "ajax/mensajes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
    },
  });

  //console.log(idMensaje);
});

/*$(document).ready(function () {
  var refreshId = setInterval(function () {
    $("#BandejaEntrada").load("correos"); //actualizas el div
  }, 1000);
});
$('#BandejaEntrada').load('correos');*/

$("#btnRefrescar").on("click", function () {
 
  window.location.reload()
});