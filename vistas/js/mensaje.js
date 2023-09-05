$(document).ready(function () {



















  $(".contenido").text(""); //se limpia el chat cuando carga la página

  $("#btnChat").on("click", function () {
    var mensaje = $("#message").val();

    if (mensaje !== "") {
      var usuario = $(this).attr("de");

      var IdUsuarioOrigen = $("#IdUsuarioOrigen").val();
      var IdUsusuarioDestino = $("#IdUsusuarioDestino").val();

      $(".contenido").val("");

      var mesajeRespuesta =
        '<div class="direct-chat-msg">' +
        ' <span class="direct-chat-name pull-right">' +
        usuario +
        "</span>" +
        '<span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>' +
        "</div>" +
        '<img class="direct-chat-img" src="vistas/img/usuarios/julio/100.png" alt="Message User Image">' +
        '<div class="direct-chat-text bg-aqua mensaje">' +
        mensaje +
        "</div>" +
        "</div>";

      $(".conversation").append(mesajeRespuesta);

      var datos = new FormData();

      datos.append("IdUsusuarioDestino", IdUsusuarioDestino);
      datos.append("IdUsuarioOrigen", IdUsuarioOrigen);
      datos.append("mensaje", mensaje);

      console.log(IdUsusuarioDestino);
      console.log(IdUsuarioOrigen);
      console.log(mensaje);
      $.ajax({
        url: "ajax/chat.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {},
      });

      $("#message").val("");
    } else {
      swal({
        title: "Error, no puede ir vacío",
        text: "¡Mensaje sin caracteres!",
        type: "error",
        confirmButtonText: "¡Cerrar!",
      });
    }
  });

  $("#btnBladimir").on("click", function () {
    var mensajeBladi =
      '   <div class="direct-chat-msg">' +
      '<div class="direct-chat-info clearfix">' +
      '<span class="direct-chat-name pull-left"><?php  ?></span>' +
      '<span class="direct-chat-timestamp pull-right"> <i class="fa-solid fa-check"></i> <i class="fa-solid fa-check"></i></span>' +
      "</div>" +
      '<img class="direct-chat-img" src="vistas/img/usuarios/julio/100.png" alt="Message User Image">' +
      '<div class="direct-chat-text bg-aqua">' +
      "Lorem ipsum dolor sit amet" +
      "consectetur adipisicing elit." +
      "Impedit consequatur temporibus" +
      "necessitatibus debitis beatae" +
      " expedita repellat blanditiis" +
      "officia id placeat minus" +
      "odit optio obcaecati illo," +
      "ratione magni provident" +
      "quaerat incidunt." +
      "</div>" +
      "</div>";
    $("#conversation").append(mensajeBladi);

    console.log(mensajeBladi);
  });
});
