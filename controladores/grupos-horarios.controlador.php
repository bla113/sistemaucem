<?php

class ControladorGruposHorarios{

	/*=============================================
	CREAR GRUPO HORARIO
	=============================================*/

	static public function ctrCrearGrupoHorario(){

		if(isset($_POST["btnCrearGrupoHorario"])){

	

				$tabla = "grupo_horario";

				$datos = [
					'NOMBRE_GRUPO'=>$_POST["nuevoNombreGrupo"],
					'COD_GRUPO'=>$_POST["nuevoCodigoGrupo"],
					'ESTADO_GRUPO'=>1
				];
				
				

				$respuesta = ModeloGruposHorario::mdlIngresarGruposHorarios($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El grupo del Horario se ha creado ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "grupos-horarios";

									}
								})

					</script>';

				}


		

		}

	}

	/*=============================================
	MOSTRAR GRUPO
	=============================================*/

	static public function ctrMostrarGruposHorarios($item, $valor){

		$tabla = "grupo_horario";

		$respuesta = ModeloGruposHorario::mdlMostrarGruposHorarios($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR GRUPO
	=============================================*/

	static public function ctrEditarGrupo(){

		if(isset($_POST["btnEditarGrupo"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreGrupo"] )||
               preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCodigoGrupo"])){

				$tabla = "grupos";

				$datos = [
					'NOM_GRUPO'=>$_POST["editarNombreGrupo"],
					'COD_GRUPO'=>$_POST["editarCodigoGrupo"],
					'ID_GRUPO'=>$_POST["IdGrupo"],

				];

							  
				$respuesta = ModeloGrupo::mdlEditarGrupo($tabla,$datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El grupo ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "grupos-materia";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los campos no puede ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "grupos-materia";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR GRUPO
	=============================================*/

	static public function ctrBorrarGruposHorarios(){

		if(isset($_GET["idGrupoHorario"])){

			$tabla ="grupo_horario";
			$datos = $_GET["idGrupoHorario"];

			$respuesta =ModeloGruposHorario::mdlBorrarGrupoGrupoHorarios($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El grupo ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "grupos-horarios";

									}
								})

					</script>';
			}
		}
		
	}
}
