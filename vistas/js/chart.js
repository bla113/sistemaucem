const estudiantes = document.getElementById("estudiantes");
const matriculas = document.getElementById("matriculas");
const cantidadCorreos = document.getElementById("cantidadCorreos");
//cargar(16);
new Chart(estudiantes, {
  type: "bar",
  data: {
    labels: [
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre",
    ],
    datasets: [
      {
        label: "Matrículas 2024",
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        responsive: true,
        title: {
          display: true,
          text: "Estudiantes activos",
        },
      },
    },
  },
});

new Chart(matriculas, {
  type: "line",
  data: {
    labels: [
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre",
    ],
    datasets: [
      {
        label: "Matrículas 2024",
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        responsive: true,
        title: {
          display: true,
          text: "Matrículas Anuales detalladas",
        },
      },
    },
  },
});

/* function cargar(idCarrera) {
  var datos = new FormData();

  datos.append("idCarrera", idCarrera);

  $.ajax({
    url: "ajax/carrera.ajax.php",
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
}*/

