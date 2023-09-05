<?php

require_once "../controladores/mensajes.controlador.php";
require_once "../modelos/mensajes.modelo.php";

class AjaxMensaje{

	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/	

	public $idUsuario;
 
	public function ajaxMostrarNuevosMensajes(){

		$item = "ID_DESTINO";
        
		$valor = $this->idUsuario;

		$respuesta =ControladorMensaje::ctrMostrarMensajesEntrada($item, $valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
EDITAR AULA
=============================================*/
if(isset($_POST["idUsuario"])){

	$contar = new AjaxMensaje();
	$contar -> idUsuario = $_POST["idUsuario"];
	$contar -> ajaxMostrarNuevosMensajes();

}

