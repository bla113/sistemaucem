<?php

require_once "../controladores/estudiante.controlador.php";
require_once "../controladores/plan-carrera.controlador.php";
require_once "../controladores/asignarPlanEstudiante.controlador.php";
require_once "../controladores/asignarMateria.controlador.php";
require_once "../controladores/oferta-academica.controlador.php";



require_once "../modelos/estudiante.modelo.php";
require_once "../modelos/plan-carrera.modelo.php";
require_once "../modelos/asignarPlanEstudiante.modelo.php";
require_once "../modelos/asignarMateria.modelo.php";
require_once "../modelos/oferta-academica.modelo.php";



class AjaxEstudiante
{


	/*=============================================
	EDITAR ESTUDIANTE
	=============================================*/

	public $IdentificacionEstu;


	public function ajaxBuscarEstudiante()
	{

		$item = "IDENTIFICACION_ESTUDIANTE";

		$valor = $this->IdentificacionEstu;

		$respuesta = ControladorEstudiante::ctrMostrarEstudiante($item, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	EDITAR ESTUDIANTE
	=============================================*/

	public $idEstudiante;



	public function ajaxEditarEstudiante()
	{

		$item = "ID_ESTUDIANTE";
		$valor = $this->idEstudiante;

		$respuesta = ControladorEstudiante::ctrMostrarEstudiante($item, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/

	public $activarEstudiante;
	public $activarId;


	public function ajaxActivarEstudiante()
	{

		$tabla = "estudiante";

		$item1 = "ESTADO";
		$valor1 = $this->activarEstudiante;

		$item2 = "ID_ESTUDIANTE";
		$valor2 = $this->activarId;

		$respuesta = ModeloEstudiante::mdlActualizarEstudiante($tabla, $item1, $valor1, $item2, $valor2);
	}

	/*=============================================
	VALIDAR NO REPETIR ESTUDIANTE
	=============================================*/

	public $validarIdentificacion;

	public function ajaxValidarIdentificicacion()
	{

		$item = "IDENTIFICACION_ESTUDIANTE";
		$valor = $this->validarIdentificacion;

		$respuesta = ControladorEstudiante::ctrMostrarEstudiante($item, $valor);

		echo json_encode($respuesta);
	}




	/*=============================================
	ASIGNAR MATERIAS DEL PLAN DE CARRERA
	=============================================*/
	public $IdEstudiantePlan;
	public $idPlanCarrera;

	public function ajaxAsignarMateriasEstudiante()
	{

		$IdEstudiante = $this->IdEstudiantePlan;
		$IdPlanCarrera = $this->idPlanCarrera;



		$respuesta = ControladorAsiganrPlanEstudiante::ctrAsignarPlanEstudiante($IdPlanCarrera, $IdEstudiante);

		echo json_encode($respuesta);
	}

	/*=============================================
	BUSCAR IDENTIFICACION
	=============================================*/
	public $Identificacion;

	public function ajaxBuscarIdentificacion()
	{

		$valor = $this->Identificacion;

		$tabla = "padron_electoral";

		$item = "IDENTIFICACION";

		$respuesta = ModeloEstudiante::mdlBuscarIdentificacion($tabla, $item, $valor);


		echo json_encode($respuesta);
	}




		/*=============================================
			MOSTRAR MATEERIAS DEL PLAN DE CARRERA
	=============================================*/

	public $idCarreraEstudiante;
	public $idPlanCarreraEstudiante;


	public  function ajaxMotsrarMateriasPlanCarrera(){


		$item1 = 'ID_CARRERA';

		$item2 = 'ID_PLAN_CARRERA';


		$valor1 = 17;

		$valor2 = 7;
	
		$respuesta = ControladorAsociarMateriasPlan::ctrMostrarMateriasSeleccionadas($item1, $valor1, $item2, $valor2);


		echo json_encode($respuesta);
	}
	/*=============================================
			BUSCAR MATERIAS PARA MATRICULAR
	=============================================*/
	public $idEstudianteM;

	public function ajaxBuscarMateriasMatricula()
	{

	

		$valor = $this->idEstudianteM;

		$materias_ofertadas = ControladorOfertaAcademica::ctrMostrarOfertaPorEstudiante($valor);
		//$mis_requsitos = ControladorOfertaAcademica::ctrMostrarRequisitosEstudianteAprobados($valor);

		//$datos = array_column($mis_requsitos, 'COD_MATERIA');

		//$found_key = array_search($oferta['COD_REQUISITO'], $datos);

		echo json_encode($materias_ofertadas);
	}

}

/*=============================================
EDITAR ESTUDIANTE
=============================================*/
if (isset($_POST["idEstudiante"])) {

	$editar = new AjaxEstudiante();
	$editar->idEstudiante = $_POST["idEstudiante"];
	$editar->ajaxEditarEstudiante();
}
/*=============================================
MOSTRAR MATERIAS PARA MATRICULAR POR ESTUDIANTE
=============================================*/
if (isset($_POST["idEstudianteM"])) {

	$materias = new AjaxEstudiante();
	$materias->idEstudianteM = $_POST["idEstudianteM"];
	$materias->ajaxBuscarMateriasMatricula();
}

/*=============================================
BUSCAR ESTUDIANTE
=============================================*/
if (isset($_POST["identificacion"])) {

	$buscar = new AjaxEstudiante();
	$buscar->IdentificacionEstu = $_POST["identificacion"];
	$buscar->ajaxBuscarEstudiante();
}
/*=============================================
ACTIVAR USUARIO
=============================================*/

if (isset($_POST["activarEstudiante"])) {

	$activarEstudiante = new AjaxEstudiante();
	$activarEstudiante->activarEstudiante = $_POST["activarEstudiante"];
	$activarEstudiante->activarId = $_POST["activarId"];
	$activarEstudiante->ajaxActivarEstudiante();
}

/*=============================================
VALIDAR NO REPETIR ESTUDIANTE
=============================================*/

if (isset($_POST["validarIdentificacion"])) {

	$valIdentificacion = new AjaxEstudiante();
	$valIdentificacion->validarIdentificacion = $_POST["validarIdentificacion"];
	$valIdentificacion->ajaxValidarIdentificicacion();
}


/*=============================================
ASIGNAR LAS MATERIAS DEL PLAN DE CARREA
=============================================*/

if (isset($_POST["idEstudiantePlan"])) {

	$asignar = new AjaxEstudiante();
	$asignar->IdEstudiantePlan = $_POST["idEstudiantePlan"];
	$asignar->idPlanCarrera = $_POST["idPlanCarrera"];
	$asignar->ajaxAsignarMateriasEstudiante();
}


if (isset($_POST["numeroIdentificacion"])) {

	$buscar = new AjaxEstudiante();
	$buscar->Identificacion = $_POST["numeroIdentificacion"];
	$buscar->ajaxBuscarIdentificacion();
}
/*=============================================
MOSTRAR LAS MATERIAS DEL PLAN DE CARREA
=============================================*/


if (isset($_POST["idPlanCarreraEstudiante"])) {

	$plan = new AjaxEstudiante();
	$plan->idPlanCarreraEstudiante = $_POST["idPlanCarreraEstudiante"];
	$plan->idCarreraEstudiante = $_POST["idCarreraEstuidiante"];
	$plan->ajaxMotsrarMateriasPlanCarrera();
}