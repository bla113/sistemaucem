<?php

require_once "conexion.php";

class ModeloMensaje{

	/*=============================================
	CREAR AULA
	=============================================*/

	static public function mdlEnviarMensaje($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ASUNTO,CONTENIDO,ID_REMITENTE,ID_DESTINO,ADJUNTOS) VALUES (:ASUNTO,:CONTENIDO,:ID_REMITENTE,:ID_DESTINO,:ADJUNTOS)");

		$stmt->bindParam(":ASUNTO", $datos['ASUNTO'], PDO::PARAM_STR);
		$stmt->bindParam(":CONTENIDO", $datos['CONTENIDO'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_REMITENTE", $datos['ID_REMITENTE'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_DESTINO", $datos['ID_DESTINO'], PDO::PARAM_STR);
		$stmt->bindParam(":ADJUNTOS", $datos['ADJUNTOS'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR MENSAJES
	=============================================*/

	static public function mdlMostrarCorreos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY  FECHA_ENVIO DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		}

		

		$stmt = null;

	}


    /*=============================================
	CONTAR  MENSAJES
	=============================================*/

	static public function mdlMostrarCantMensajes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND ESTADO_LEIDO=1");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		}

	}
	/*=============================================
	CAMBIAR ESTADO DE MENSAJE
	=============================================*/

	static public function mdlCambiarEtadoMensaje($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET FECHA_LEIDO = :FECHA_LEIDO,ESTADO_LEIDO=:ESTADO_LEIDO WHERE ID_MENSAJE = :ID_MENSAJE");

		$stmt->bindParam(":FECHA_LEIDO", $datos['FECHA_LEIDO'], PDO::PARAM_STR);
		$stmt->bindParam(":ESTADO_LEIDO", $datos['ESTADO_LEIDO'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_MENSAJE", $datos['ID_MENSAJE'], PDO::PARAM_STR);

		if($stmt->execute()){

			$respuesta=[
				'mensaje'=>'Estado Cambiado'
			];

			return $respuesta;

		}else{
			$respuesta=[
				'mensaje'=>'Error al procesar'
			];

			return $respuesta;


			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

	/*=============================================
	BORRAR AULA
	=============================================*/

	static public function mdlBorrarAula($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_AULA = :ID_AULA");

		$stmt -> bindParam(":ID_AULA", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> closeCursor();

		$stmt = null;

	}

}

