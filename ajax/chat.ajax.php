<?php

use Twilio\Rest\Chat;

require_once "../controladores/chat.controlador.php";
require_once "../modelos/chat.modelo.php";

class AjaxMensaje
{

	/*=============================================
	GUARDAR MENSAJE
	=============================================*/

	public $mensaje;
	public $UsuarioRecibe;
	public $usuarioEnvia;

	public function ajaxGuardarMesaje()
	{
		$UsuarioRecibe = $this->UsuarioRecibe;
		$usuarioEnvia = $this->usuarioEnvia;
		$mesaje = $this->mensaje;

		$respuesta =ChatControlador::ctrCrearChat($mesaje,$UsuarioRecibe,$usuarioEnvia);



		echo json_encode($respuesta);
	}



    /*=============================================
	GUARDAR MENSAJE
	=============================================*/



    
}

/*=============================================
GUARDAR MENSAJE
=============================================*/
if (isset($_POST["mensaje"])) {

	$editar = new AjaxMensaje();
	$editar->UsuarioRecibe = $_POST["IdUsusuarioDestino"];
	$editar->usuarioEnvia = $_POST["IdUsuarioOrigen"];
	$editar->mensaje = $_POST["mensaje"];
	$editar->ajaxGuardarMesaje();
}
