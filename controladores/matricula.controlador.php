<?php

use Twilio\Rest\Serverless\V1\Service\FunctionList;

class ControladorMatricula
{

    /*=============================================
	CREAR PREMATRICULA
	=============================================*/

    static public function ctrCrearPrematricula($datos)

    {
        $tabla = 'detalle_matricula';

        $respuesta = ModeloMatricula::mdlIngresarPrematricula($tabla, $datos);


        return $respuesta;
    }

    /*=============================================
	CREAR MATRICULA
	=============================================*/

    static public function ctrCreaMatricula()

    {


        if (isset($_POST['btnCrearMatricula'])) {
            $saldo = 0;

            $pagoMinimo = filter_var($_POST['TotalSeleccionado'], FILTER_SANITIZE_NUMBER_FLOAT);
            $tatalPrematricula = filter_var($_POST['montoSeleccionado'], FILTER_SANITIZE_NUMBER_FLOAT);

            $saldo = $tatalPrematricula - $pagoMinimo;


            $materias = ControladorMatricula::ctrMostrarPrematriculasparaMatricular($_POST['idEstudiante']);

           // return $materias;
            //Metodo para asignar el estudiante al curso 

            /* foreach ($materias as $materia) {


                $tablaCurso = 'curso_estudiante';

                $datosCurso = [
                    'ID_ESTUDIANTE' => $_POST['idEstudiante'],
                    'ID_HORARIO_OFERTA' => $materia['ID_HORARIO_OFERTA']
                ];
                $AsignarCurso = ModeloMatricula::mdlAsiganarCursoEstudiante($tablaCurso, $datosCurso);
                
            }*/
            $tabla = 'matriculas';





            //CAMBIAR EL ESTADO DEL DETALLE DE MATERIA a estado 2

            $datos = [
                'ID_ESTUDIANTE' => $_POST['idEstudiante'],
                'ID_PERIODO' => $_POST['idPerido'],
                'MATERIAS' => json_encode($materias, JSON_UNESCAPED_UNICODE),
                'SUB_TOTAL' => $_POST['subtotal'],
                'DESCUENTO' =>  $_POST['montoDescuento'],
                'TOTAL_MATRICULA' => $_POST['montoSeleccionado'],
                'ID_METODO_PAGO' => $_POST['metodoDePago'],
                'SALDO' =>  $saldo,
                'COMPROBANTE_MATRICULA' => NULL,
                'ID_USUARIO' => $_SESSION["id"],
                'OBSERVACIONES'=>$_POST['observaciones'],


            ];

            // return $datos;
            $respuesta = ModeloMatricula::mdlCrearMatricula($tabla, $datos);

            $cambiar = ControladorMatricula::ctrMostrarPrematriculas($_POST['idEstudiante']); //Mando allamar todas los detalles pendientes y les cambio el estado a 2


            foreach ($cambiar as $key => $valor) {

                $cabiarEstado = ModeloMatricula::mdlActualizarEstadodetalleMatricula($valor['ID_DETALLE_MATRICULA']);
            }

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "Matricula Creada correctamente",
                      text: "Importante: Recuerde que la prematricula pendiente hasta que se envíe el comprobante de pago correspondiente !",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {

                                window.location = "matriculas";

                                }
                            })

                </script>';
            }
        }
    }

    /*=============================================
	MOSTRAR TODAS LAS MATRICULAS
	=============================================*/


    public static function ctrMotrarMatriculas()
    {

        $tabla = "vista_matriculas";
        $item = null;
        $valor = null;

        $respuesta = ModeloMatricula::mdlMostrarMatriculas($tabla, $item, $valor);

        return $respuesta;
    }

       /*=============================================
	MOSTRAR MATRICULA PARA PDF
	=============================================*/


    public static function ctrMotrarMatriculasPDF($item,$valor)
    {

        $tabla = "vista_matriculas";
        //$item = null;
        //$valor = null;

        $respuesta = ModeloMatricula::mdlMostrarMatriculasPDF($tabla, $item, $valor);

        return $respuesta;
    }


    /*=============================================
	MOSTRAR TODAS LAS MATRICULAS PARA APLICAR PAGO
	=============================================*/


    public static function ctrMotrarMatriculasParaplicarPago($valor)
    {

        $tabla = "vista_matriculas";

        $item = 'ID_MATRICULA';


        $respuesta = ModeloMatricula::mdlMostrarMatriculasParaAplicarPago($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	VALIDAR COMPROBANTE
	=============================================*/

    public static function ctrMostrarComprobante($valor)
    {

        $tabla = "vista_matriculas";

        $item = 'ID_MATRICULA';

        $respuesta = ModeloMatricula::mdlMostrarMostrarComprobante($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	MOSTRAR PREMATRICULAS POR ESTUDIANTE
	=============================================*/

    static public function ctrMostrarPrematriculas($valor2)
    {

        $tabla = "vista_detalle_matricula";

        $item2 = 'ID_ESTUDIANTE';

        $valor1 = 1;

        $item1 = 'DETALLE_ESTADO';

        $respuesta = ModeloMatricula::mdlMostrarPrematriculaPorEstudiante($tabla, $item1, $valor1, $valor2, $item2);

        return $respuesta;
    }

    /*=============================================
	MOSTRAR PREMATRICULAS POR ESTUDIANTE PARA INSERTAR EN MATRICULA
	=============================================*/

    static public function ctrMostrarPrematriculasparaMatricular($valor2)
    {

        $tabla = "vista_detalle_matricula";

        $item2 = 'ID_ESTUDIANTE';

        $valor1 = 1;

        $item1 = 'DETALLE_ESTADO';

        $respuesta = ModeloMatricula::mdlMostrarPrematriculaPorEstudianteParaMatricular($tabla, $item1, $valor1, $valor2, $item2);

        return $respuesta;
    }


    /*=============================================
	MOSTRAR PREMATRICULAS POR ESTUDIANTE PARA ASIGNARLO AL CURSO VIRTUAL
	=============================================*/
    static public function ctrMostraMatriculasParaAsignarCurso($valor)
    {

        $tabla = "matriculas";

        $item = 'ID_MATRICULA';

        $respuesta = ModeloMatricula::mdlMostrarMatriculasParaCursoVirtual($tabla, $item, $valor);

        return $respuesta;
    }


    /*=============================================
	CANBIAR EL ESTADO A LA MATRICULA
	=============================================*/
    static public function ctrCambiarEstadoMatricula($valor)
    {

        $tabla = "matriculas";


        $datos = [
            'ESTADO_MATRICULA' => 2,
            'ID_MATRICULA' => $valor
        ];


        $respuesta = ModeloMatricula::mdlCambiarEstadoMatricula($tabla, $datos);

        return $respuesta;
    }



    /*=============================================
	SELECCIONAR TODOS LOS ID DE HORARIOS MATRICULADOS POR ESTUDIANTE
	=============================================*/

    static public function ctrMostrarIdHorariosMtricula($valor1, $valor3)
    {

        $tabla = "detalle_matricula";

        $item1 = 'ID_ESTUDIANTE';
        //$valor1=3;

        //$item2 = 'ID_HORARIO_OFERTA';


        $item3 = 'ID_MATERIA';


        //$valor2=1;
        $respuesta = ModeloMatricula::mdlMostrarIdHorariosMtricula($tabla, $item1, $valor1, $item3, $valor3);

        return $respuesta;
    }


    static public function ctrBorrarDatella($valor)
    {


        $tabla = "detalle_matricula";


        $respuesta = ModeloMatricula::BorrarDetalle($tabla, $valor);

        return $respuesta;
    }
    /*=============================================
	BUSCAR ESTUDIANTE PARA MATRICULAR
	=============================================*/

    static public function ctrBucarEstudianteParaMatricular()
    {


        if (isset($_POST['btnBuscarEstudiante'])) {

            if ($_POST['buscarIdentificacion'] != "") {


                if ($_POST['buscarIdentificacion'] == 2) { //numero de carnet
                    $tabla = 'estudiante';

                    $item = 'IDENTIFICACION_ESTUDIANTE';

                    $valor = '603790355';


                    $respuesta = ModeloMatricula::mdlBuscarEstudianteParaMatricular($tabla, $item, $valor);

                    if ($respuesta) {

                        foreach ($respuesta as $estudiante) {

                            echo '<script>

								window.location = "index.php?ruta=expediente-estudiante&idEstudiante=' . $estudiante['ID_ESTUDIANTE'] . '&idCarrera=' . $estudiante['ID_CARRERA'] . '&idPlanCarrera=' . $estudiante['ID_PLAN_CARRERA'] . '";

							</script>';
                        }
                    }
                }
                if ($_POST['buscarIdentificacion'] === 2) {

                    $tabla = 'estudiantes';

                    $item = 'IDENTIFICACION_ESTUDIANTE';

                    $valor = filter_var($_POST['buscarEstudiante'], FILTER_SANITIZE_NUMBER_INT);


                    $respuesta = ModeloMatricula::mdlBuscarEstudianteParaMatricular($tabla, $item, $valor);
                }
            }/*else{
                echo '<script>

					swal({
						  type: "success",
						  title: "Teiene que locar bien los datos requeridos",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "matriculas";

									}
								})

					</script>';
            }*/
        }
    }

    /*=============================================
	CONSULTAR COSTOS DESDE LA TABLA CONFIGURACION
	=============================================*/
    static public function ctrConsulataCostos()
    {


        $tabla = "COSTOS_MATRICULAS";

        $valor = null;
        $item = null;
        $respuesta = ModeloMatricula::mdlConsultarCostos($tabla, $valor, $item);

        return $respuesta;
    }

    /*=============================================
	RESTAR CAPACIDAD AL HORARIO OFERTADO
	=============================================*/

    static public function ctrRestarCapacidadHorarioOfertado($valor)
    {

        $tabla = 'horarios_oferta';

        $item = 'ID_HORARIO_OFERTA';


        $respuesta = ModeloMatricula::mdlRestarCapacidadHorarioOfertado($tabla, $item, $valor);

        return $respuesta;
    }



    /*=============================================
	CAMBIAR EL ESTADO DE LA MATERIA ESTUDIATE
	=============================================*/

    static public function ctrCambiarEstadoMateriaEstudiante($datos)
    {


        $tabla = 'estudiante_materia';



        $respuesta = ModeloMatricula::mdlCambiarEstadoMateriaEstudiante($tabla, $datos);

        return $respuesta;
    }


    /*=============================================
	SUBIR COMPROBANTE DE PAGO 
	=============================================*/

    static public function ctrSubirComprobante()
    {


        if (isset($_POST['btnSubirArchivo'])) {

            $tabla='matriculas';

            $archivo = $_FILES['comprobantePago']["type"];

            $tipo = $_FILES['comprobantePago']['type'];

            $idMatricula = 1;

            $tamano = $_FILES['comprobantePago']['size'];


            /*=============================================
				VALIDAR COMPROBANTE
				=============================================*/

           // $ruta = "vistas/img/usuarios/admin/191.jpg";

            if (isset($_FILES["comprobantePago"]["tmp_name"])) {

                list($ancho, $alto) = getimagesize($_FILES["comprobantePago"]["tmp_name"]);

                $nuevoAncho = 700;
                $nuevoAlto = 700;

                /*=============================================
                        CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                        =============================================*/

                $directorio = "comprobantes/matriculas/";
                if (!isset($directorio)) {
                    mkdir($directorio, 0755);
                }
                //mkdir($directorio, 0755);

                /*=============================================
                        DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                        =============================================*/

                if ($_FILES["comprobantePago"]["type"] == "image/jpeg") {

                    /*=============================================
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            =============================================*/

                    $aleatorio = mt_rand(10000, 999999);

                    //$ruta = "comprobantes/matriculas/" . $aleatorio . ".jpg";
                    $ruta = "comprobantes/matriculas/" .'comprobante_matricula'.$idMatricula.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["comprobantePago"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                    $datos=[
                        'COMPROBANTE_MATRICULA'=>$ruta,
                        'ID_MATRICULA'=>$_POST['idMatriculaComprobante']
                    ];

                    $respuesta=ModeloMatricula::mdlAgregarComprobantePago($tabla,$datos);

                    if ($respuesta == "ok") {

                        echo '<script>
        
                        swal({
                            title: "comprobante agredado Exitosamente",
                            type: "success",
                            confirmButtonText: "¡Cerrar!"
                          }).then(function(result) {
                            if (result.value) {

                                window.location = "matriculas";

                                }
              
                          });
                        
        
                            </script>';
                    }


                }

                if ($_FILES["comprobantePago"]["type"] == "image/png") {

                    /*=============================================
                            GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                            =============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "comprobantes/matriculas/" .'comprobante_matricula'.$idMatricula.".png";

                    $origen = imagecreatefrompng($_FILES["comprobantePago"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                    $datos=[
                        'COMPROBANTE_MATRICULA'=>$ruta,
                        'ID_MATRICULA'=>$_POST['idMatriculaComprobante']
                    ];

                    $respuesta=ModeloMatricula::mdlAgregarComprobantePago($tabla,$datos);

                    if ($respuesta == "ok") {

                        echo '<script>
        
                        swal({
                            title: "comprobante agredado Exitosamente",
                            type: "success",
                            confirmButtonText: "¡Cerrar!"
                          }).then(function(result) {
                              
                            if (result.value) {

                                window.location = "matriculas";

                                }
                          });
                        
        
                            </script>';
                    }
                }

                if (isset($archivo) && strpos($tipo, "pdf")) {

                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['comprobantePago']['type'];

                    $tamano = $_FILES['comprobantePago']['size'];

                    $temp = $_FILES['comprobantePago']['tmp_name'];

                    /*if (!file_exists('comprobantes/matriculas/' . $idMatricula)) {

                        mkdir('comprobantes/matriculas/' . $idMatricula, 077);
                    }*/

                    if (move_uploaded_file($temp, 'comprobantes/matriculas/' . 'comprobante_matricula' . $idMatricula . ".pdf")) {


                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod('comprobantes/matriculas/' . 'comprobante_matricula' . $idMatricula . ".pdf", 0777);
                        $ruta = 'comprobantes/matriculas/' . 'comprobante_matricula' . $idMatricula . ".pdf";
                        //Mostramos el mensaje de que se ha subido co éxito
                        $datos=[
                            'COMPROBANTE_MATRICULA'=>$ruta,
                            'ID_MATRICULA'=>$_POST['idMatriculaComprobante']
                        ];
    
                        $respuesta=ModeloMatricula::mdlAgregarComprobantePago($tabla,$datos);


                        if ($respuesta == "ok") {

                            echo '<script>
            
                            swal({
                                title: "comprobante agredado Exitosamente",
                                type: "success",
                                confirmButtonText: "¡Cerrar!"
                              }).then(function(result) {
                                if (result.value) {

									window.location = "matriculas";

									}
                   
                              });
                            
            
                                </script>';
                        }
                    } else {
                        //Si no se ha podido subir la imagen, mostramos un mensaje de error
                        echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                    }
                }
            } /* TERMINA VALIDAR COMPROBANTE*/
        }
    }
}
