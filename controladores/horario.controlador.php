<?php

class ControladorHorario
{

    /*=============================================
	CREAR HORARIO
	=============================================*/ 

    static public function ctrCrearHorario()
    {

        if (isset($_POST["btnCrearHorario"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCodigoHoario"])) {

                $tabla = "horarios";

                $datos = array(
                    "COD_HORARIO" => $_POST["nuevoCodigoHoario"],
                    "NOM_HORARIO" => $_POST["nuevoNomHorario"],
                    "INICIO" => $_POST["horarioInicio"],
                    "FIN" => $_POST["horarioFinal"]

                );



                $respuesta = ModeloHorario::mdlIngresaHorario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El horario ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "horarios";

									}
								})

					</script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El horario  no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "horarios";

							}
						})

			  	</script>';
            }
        }
    }

    /*=============================================
	MOSTRAR HORARIO
	=============================================*/

    static public function ctrMostrarHorario($item, $valor)
    {

        $tabla = "horarios";

        $respuesta = ModeloHorario::mdlMostrarHorario($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	EDITAR HORARIO
	=============================================*/

    static public function ctrEditarHorario()
    {

        if (isset($_POST["btnEditarHorario"])) {

           

                $tabla = "horarios";

                $datos = array(
                    "COD_HORARIO" => $_POST["editarCodigoHorario"],
                    "NOM_HORARIO" => $_POST["editaNomHorario"],
                    "INICIO" => $_POST["editarInicio"],
                    "FIN" => $_POST["editarFinal"],
                    "ID_HORARIO" => $_POST["IdHorario"]
                );
                // return print_r($datos);

                $respuesta = ModeloHorario::mdlEditarHorario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El horario  ha sido modificado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "horarios";

									}
								})

					</script>';
                }
           
        }
    }

    /*=============================================
	BORRAR HORARIO
	=============================================*/

    static public function ctrBorrarHorario()
    {

        if (isset($_GET["idHorario"])) {

            $tabla = "horarios";
            $datos = $_GET["idHorario"];

            $respuesta = ModeloHorario::mdlBorrarHorario($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El horario  ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "horarios";

									}
								})

					</script>';
            }
        }
    }
}
