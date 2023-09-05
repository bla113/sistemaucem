<?php

require_once "conexion.php";

class ModeloChat{

	/*=============================================
	CREAR MENSAJE
	=============================================*/

	static public function mdlCrearChat($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(MENSAJE,ID_USUARIO_ENVIA,ID_USUARIO_RECIBE) VALUES (:MENSAJE,:ID_USUARIO_ENVIA,:ID_USUARIO_RECIBE)");

		$stmt->bindParam(":ID_USUARIO_ENVIA", $datos['ID_USUARIO_ENVIA'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_USUARIO_RECIBE", $datos['ID_USUARIO_RECIBE'], PDO::PARAM_STR);
		$stmt->bindParam(":MENSAJE", $datos['MENSAJE'], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}



	/*=============================================
	MOSTRAR REPSUESTA
	=============================================*/

	static public function mdlMostraRespuesta(){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM respuestas WHERE TAGS  LIKE '%HOLA'");

			//$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		
		

			$stmt = null;

	}


	/*=============================================
	CONSULTAR LOS CHATS
	=============================================*/

	static public function mdlMostrarChats($tabla, $item, $valor){

		
		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
            $stmt -> closeCursor();
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		}

		

		$stmt = null;

	}

}