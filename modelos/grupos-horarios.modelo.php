<?php

require_once "conexion.php";

class ModeloGruposHorario{

	/*=============================================
	CREAR GRUPO
	=============================================*/

	static public function mdlIngresarGruposHorarios($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NOMBRE_GRUPO,COD_GRUPO,ESTADO_GRUPO) VALUES (:NOMBRE_GRUPO,:COD_GRUPO,:ESTADO_GRUPO)");

		$stmt->bindParam(":NOMBRE_GRUPO", $datos['NOMBRE_GRUPO'], PDO::PARAM_STR);
		$stmt->bindParam(":COD_GRUPO", $datos['COD_GRUPO'], PDO::PARAM_STR);
		$stmt->bindParam(":ESTADO_GRUPO", $datos['ESTADO_GRUPO'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
        
		$stmt = null;

	}

	/*=============================================
	MOSTRAR GRUPO
	=============================================*/

	static public function mdlMostrarGruposHorarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		//$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR GRUPO
	=============================================*/

	static public function mdlEditarGrupo($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NOM_GRUPO = :NOM_GRUPO,COD_GRUPO=:COD_GRUPO WHERE ID_GRUPO = :ID_GRUPO");

		$stmt -> bindParam(":NOM_GRUPO", $datos["NOM_GRUPO"], PDO::PARAM_STR);
		$stmt -> bindParam(":COD_GRUPO", $datos["COD_GRUPO"], PDO::PARAM_STR);
		$stmt -> bindParam(":ID_GRUPO", $datos["ID_GRUPO"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		//$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR GRUPO
	=============================================*/

	static public function mdlBorrarGrupoGrupoHorarios($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_GRUPO_HORARIO = :ID_GRUPO_HORARIO");

		$stmt -> bindParam(":ID_GRUPO_HORARIO", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		//$stmt -> close();

		$stmt = null;

	}

}

