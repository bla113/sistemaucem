<?php
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
require_once "../controladores/mensajes.controlador.php";
require_once "../modelos/mensajes.modelo.php";

class AjaxMensajes
{
/*=============================================
BUSCAR USUARIO
=============================================*/
    public $buscarUsuario;

    public function ajaxMostrarTodos()
    {

        $item = null;

        $valor = null;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);
    }




    /*=============================================
CAMBIAR EL ESTADO DEL MENSAJE
=============================================*/
public $idMensaje;

public function ajaxCambiarEstadoMensaje()
{

    $tabla = 'mensajes';

    date_default_timezone_set('America/Costa_Rica');
    
    $hora_leido=date("Y-m-d H:i:s");

    $datos=[
        'ID_MENSAJE'=> $this->idMensaje,
        'ESTADO_LEIDO'=>1,
        'FECHA_LEIDO'=>$hora_leido

    ];
   

    $respuesta = ModeloMensaje::mdlCambiarEtadoMensaje($tabla, $datos);

    echo json_encode($respuesta);
}
}

/*=============================================
BUSCAR USUARIO
=============================================*/
if (isset($_POST["buscarUsuario"])) {

    $valUsuario = new AjaxMensajes();
    $valUsuario->buscarUsuario = $_POST["buscarUsuario"];
    $valUsuario->ajaxMostrarTodos();
}

/*=============================================
CAMBIAR EL ESTADO DEL MENSAJE
=============================================*/
if (isset($_POST["idMensaje"])) {

    $cambiarEstado = new AjaxMensajes();
    $cambiarEstado->idMensaje = $_POST["idMensaje"];
    $cambiarEstado->ajaxCambiarEstadoMensaje();
}

