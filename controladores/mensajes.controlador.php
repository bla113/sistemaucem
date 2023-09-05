<?php

class ControladorMensaje
{

    /*=============================================
	CREAR MENSAJE
	=============================================*/

    static public function ctrEnviarMensaje()
    {

        if (isset($_POST["btnEnviarMensaje"])) {

         

                $tabla = "mensajes";

                $destinos = [];
                $destinos=$_POST['destinoCorreo'];


                foreach ($destinos as $key => $destino) {

                    $datos=[
                       'ASUNTO'=>$_POST['asuntoMensaje'],
                       'CONTENIDO'=>$_POST['ContenidoMensaje'],
                       'ID_DESTINO'=> $destino,
                       'ID_REMITENTE'=>$_POST['idRemitente'],
                       'ADJUNTOS'=>NULL,

                    ];
                
                $respuesta = ModeloMensaje::mdlEnviarMensaje($tabla, $datos);

                }


                //return $respuesta;
               

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "Mensajes Enviados",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "correos";

									}
								})

					</script>';
                }
            
        }
    }

    /*=============================================
	MOSTRAR MENSAJES RECIBIDOS
	=============================================*/

    static public function ctrMostrarMensajesEntrada($valor)
    {
        $tabla = "vista_mensajes_recibidos";

        $item='ID_DESTINO';

        $respuesta =ModeloMensaje::mdlMostrarCorreos($tabla, $item, $valor);

        return $respuesta;
    }


     /*=============================================
	MOSTRAR TODOS LOS MENSAJES 
	=============================================*/

    static public function ctrMostrarMensajesLeerMensajesRecibidos($valor)
    {
        $tabla = "vista_mensajes_recibidos";

        $item='ID_MENSAJE';

        $respuesta =ModeloMensaje::mdlMostrarCorreos($tabla, $item, $valor);

        return $respuesta;
    }


    /*=============================================
	MOSTRAR TODOS LOS MENSAJES 
	=============================================*/

    static public function ctrMostrarMensajesLeerMensajesEnviados($valor)
    {
        $tabla = "vista_mensajes_enviados";

        $item='ID_MENSAJE';

        $respuesta =ModeloMensaje::mdlMostrarCorreos($tabla, $item, $valor);

        return $respuesta;
    }
     /*=============================================
	MOSTRAR MENSAJES ENVIADOS
	=============================================*/

    static public function ctrMostrarMensajesEnviados($valor)
    {
        $tabla = "vista_mensajes_enviados";

        $item='ID_REMITENTE';

        $respuesta =ModeloMensaje::mdlMostrarCorreos($tabla, $item, $valor);

        return $respuesta;
    }


     /*=============================================
	MOSTRAR CANTIDAD DE MENSAJES 
	=============================================*/

    static public function ctrMostrarCantidadMensajes($item,$valor)
    {

        $tabla = "mensajes";


        $respuesta =ModeloMensaje::mdlMostrarCantMensajes($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	EDITAR AULA
	=============================================*/

    static public function ctrEditarAula()
    {

        if (isset($_POST["btnEditarAula"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editaNomAula"])) {

                $tabla = "aulas";

                $datos = array(
                    "COD_AULA" => $_POST["editarCodigoAula"],
                    "NOM_AULA" => $_POST["editaNomAula"],
                    "CAP_AULA" => $_POST["editarCapAula"],
                    "ID_AULA" => $_POST["IdAula"]
                );

                // return print_r($datos);

                $respuesta = ModeloAula::mdlEditarAula($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El aula  ha sido actualaizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "aulas";

									}
								})

					</script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El aula no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "aulas";

							}
						})

			  	</script>';
            }
        }
    }

    /*=============================================
	BORRAR AULA
	=============================================*/

    static public function ctrBorrarAula()
    {

        if (isset($_GET["idAula"])) {

            $tabla = "aulas";
            $datos = $_GET["idAula"];

            $respuesta = ModeloAula::mdlBorrarAula($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El aula  ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "aulas";

									}
								})

					</script>';
            }
        }
    }
}
