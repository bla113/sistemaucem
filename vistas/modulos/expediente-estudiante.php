<?php
if (isset($_GET['ruta'])) {

    $itemP = 'ID_PLAN_CARRERA';

    $valorP = $_GET['idPlanCarrera'];

    $planCarrera = ControladorPlanCarrera::ctrMostrarPlanCarrera($itemP, $valorP);

    //print_r($planCarrera);



    $item1 = 'ID_CARRERA';

    $item2 = 'ID_PLAN_CARRERA';


    $valor1 = $_GET['idCarrera'];

    $valor2 = $_GET['idPlanCarrera'];

    $respuesta = ControladorAsociarMateriasPlan::ctrMostrarMateriasSeleccionadas($item1, $valor1, $item2, $valor2);

    $itemE = 'ID_ESTUDIANTE';

    $valorE = $_GET['idEstudiante'];

    $Estudiante = ControladorEstudiante::ctrMostrarEstudiante($itemE, $valorE);





    //print_r($respuesta);
}
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>

            Administrar estudiantes

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar estudiantes</li>

        </ol>
    </section>


    <section class="content">

        <div class="row">

            <div class="col-md-3">


                <div class="box box-primary">
                    <?php foreach ($Estudiante as $estudiante) { ?>


                        <div class="box-body box-profile">

                            <img class="profile-user-img img-responsive img-circle" src="vistas/img/estudiantes/207140318/459.png" alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo $estudiante['NOMBRE_COMPLETO'] ?></h3>

                            <p class="text-muted text-center"><?php echo $estudiante['PRIMER_APELLIDO'] . " " . $estudiante['SEGUNDO_APELLIDO'] ?></p>

                            <ul class="list-group list-group-unbordered">

                                <li class="list-group-item">

                                    <b>Identificación:</b> <a class="pull-right"><?php echo $estudiante['IDENTIFICACION_ESTUDIANTE'] ?></a>

                                </li>

                                <li class="list-group-item">

                                    <b>Fecha de Ingreso</b> <a class="pull-right"><?php echo $estudiante['FECHA_CREACION'] ?></a>


                                </li>

                                <li class="list-group-item">

                                    <b>Número de Carnet:</b> <a class="pull-right"><?php echo $estudiante['NUM_CARNE'] ?></a>


                                </li>

                                <li class="list-group-item">

                                    <b>Estado</b> <a class="pull-right"><?php if ($estudiante['ESTADO'] == 1) {

                                                                            echo ' <p> <span class="label label-danger">Activo</span>  </p>';
                                                                        }
                                                                        ?></a>

                                </li>

                                <li class="list-group-item">

                                    <b>Total de Creditos</b> <a class="pull-right"><?php
                                                                                    $total = array_sum(array_column($respuesta, 'CREDITOS'));
                                                                                    echo $total;
                                                                                    ?></a>

                                </li>
                                <li class="list-group-item">

                                    <b>Total de Creditos Aprobados: <?php $total = array_sum(array_column($respuesta, 'CREDITOS'));
                                                                    echo $total; ?></b> <a class="pull-right"></a>

                                </li>
                                <b>Progreso:</b>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                                <b>50 %: !Felicidades¡</b>

                                </li>

                            </ul>

                            <a href="#" class="btn btn-success btn-block"><b><i class=" fa fa-whatsapp"></i> Mensaje </b></a>



                            <a href="#" class="btn btn-primary btn-block"><b><i class="fa fa-send"></i> Correo</b></a>

                            <a href="#" class="btn btn-primary btn-block"><b><i class="fa fa-id-badge"></i></b></a>

                        </div>

                </div>




            <?php } ?>

            </div>
            <!-- /.col -->
            <div class="col-md-9">

                <div class="nav-tabs-custom">

                    <ul class="nav nav-tabs">

                        <li class="active"><a href="#PlandeEstudios" data-toggle="tab">Materias del Plan</a></li>

                        <li><a href="#Materiasaprobadas" data-toggle="tab">Materias Aprobadas</a></li>

                        <li><a href="#Materiaspendientes" data-toggle="tab">Materias Pendientes</a></li>

                        <li><a href="#MateriasMatruculadas" data-toggle="tab">Materias Matriculadas</a></li>

                        <li><a href="#OfertaMatricula" data-toggle="tab">Oferta Matricula</a></li>

                        <li><a href="#Prematriculas" data-toggle="tab">Prematricula</a></li>

                    </ul>

                    <div class="tab-content">
                        <!-- PANEL DE PLAN DE ESTUDIOS -->
                        <div class="active tab-pane" id="PlandeEstudios">


                            <table class="table table-bordered table-striped  tablas">

                                <thead>

                                    <tr>
                                        <th>Código</th>
                                        <th>Materia</th>
                                        <th>Créditos</th>
                                        <th>Requisitos</th>
                                        <th>Orden</th>
                                        <th>Cuatrimestre</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($respuesta as $Materias) { ?>


                                        <tr>
                                            <td> <?php echo $Materias['COD_MATERIA'] ?></td>
                                            <td><?php echo $Materias['NOM_MATERIA'] ?></td>
                                            <td><?php echo $Materias['CREDITOS'] ?></td>
                                            <td><?php
                                                echo '<button class="btn btn-primary btn-xs">' . $Materias['COD_REQUISITO'] . '</button>';

                                                ?></td>
                                            <td><?php echo $Materias['ORDEN'] ?>°</td>

                                            <td><?php echo $Materias['PERIODO'] ?>°Cuatrimestre </td>


                                        </tr>

                                    <?php  } ?>

                                </tbody>
                            </table>



                        </div>
                        <!-- FIN PANEL DE PLAN DE ESTUDIOS -->


                        <!-- INICIO PANEL  MATERIAS APROBADAS -->

                        <div class="tab-pane" id="Materiasaprobadas">

                            <!-- Materias Aprobadas  del Estudiante -->
                            <section class="content">

                                <div class="box">


                                    <div class="box-body">

                                        <table class="table table-bordered table-striped tablas">

                                            <thead>

                                                <tr>
                                                    <th>Código</th>
                                                    <th>Materia</th>
                                                    <th style="width: 20px;">Créditos</th>
                                                    <th>Requisitos</th>
                                                    <th>Nota</th>
                                                    <th>Estado</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php


                                                $IdEstudiante = $_GET['idEstudiante'];
                                                // $IdEstudiante = 1;


                                                $MateriasAprobadas = ControladorEstudiante::ctrMostrarMateriasAprobadasEstudiante($IdEstudiante);

                                                // print_r($MateriasAprobadas);

                                                //echo count($MateriasAprobadas);

                                                foreach ($MateriasAprobadas as $MateriasA) { ?>


                                                    <tr>
                                                        <td> <?php echo $MateriasA['COD_MATERIA'] ?></td>
                                                        <td><?php echo $MateriasA['NOM_MATERIA'] ?></td>
                                                        <td><?php echo $MateriasA['CREDITOS'] ?></td>
                                                        <td><?php
                                                            echo '<button class="btn btn-success btn-xs">' . $MateriasA['COD_REQUISITO'] . '</button>';

                                                            ?></td>
                                                        <td><?php echo $MateriasA['NOTA'] ?></td>
                                                        <td>
                                                            <button class="btn btn-warning btn-xs"><?php
                                                                                                    echo $resultado = $MateriasA['ID_ESTADO_MATERIA'] == 2 ? 'Aprobada' : 'Pendiente';
                                                                                                    ?></button>
                                                        </td>


                                                    </tr>

                                                <?php  } ?>

                                            </tbody>
                                        </table>


                                    </div>

                                </div>

                            </section>
                        </div>


                        <div class="tab-pane" id="Materiaspendientes">

                            <!-- Todas las Materias del Estudiante -->

                            <section class="content">

                                <div class="box">


                                    <div class="box-body">

                                        <table class="table table-bordered table-striped tablas">

                                            <thead>

                                                <tr>
                                                    <th>Código</th>
                                                    <th>Materia</th>
                                                    <th>Créditos</th>
                                                    <th>Requisitos</th>
                                                    <th>Estado</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php


                                                $valor = $_GET['idEstudiante'];


                                                $MateriasEstudiante = ControladorEstudiante::ctrMostrarMateriasEstudiante($valor);

                                                //print_r($MateriasEstudiante);

                                                foreach ($MateriasEstudiante as $Materias) { ?>


                                                    <tr>
                                                        <td> <?php echo $Materias['COD_MATERIA'] ?></td>
                                                        <td><?php echo $Materias['NOM_MATERIA'] ?></td>
                                                        <td><?php echo $Materias['CREDITOS'] ?></td>
                                                        <td><?php $array = json_decode($Materias['COD_REQUISITO'], true);

                                                            foreach ($array as $requisitos => $requisito) {

                                                                echo '<button class="btn btn-primary btn-xs">' . $requisito . '</button>';
                                                            }
                                                            ?></td>
                                                        <td> <button class="btn btn-danger btn-xs"><?php echo $Materias['NOMBRE_ESTADO'] ?></button></td>


                                                    </tr>

                                                <?php  } ?>

                                            </tbody>
                                        </table>


                                    </div>

                                </div>

                            </section>
                        </div>

                        <!-- FIN PANEL DE  MATERIAS APROBADAS -->
                        <div class="tab-pane" id="OfertaMatricula">
                            <section class="content">

                                <div class="box">


                                    <div class="box-body">

                                        <div class="box-header with-border ">

                                            <a class="btn btn-app bg-aqua-active pull-right" href="index.php?ruta=detalle-pre-matricula&idEstudiante=<?php echo $_GET['idEstudiante'] ?>&idCarrera=<?php echo $_GET['idCarrera'] ?>&idPlanCarrera=<?php echo $_GET['idPlanCarrera'] ?>">

                                                <i class="fa fa-cart-plus"></i> Ver Mátricula
                                            </a>


                                            <a class="btn btn-app bg-aqua-active" id="numeroMatriculas">
                                                <span class="badge bg-teal">0</span>
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>

                                        </div>



                                        <?php
                                        $valor =  $_GET['idEstudiante'];
                                        $respuestaO = ControladorOfertaAcademica::ctrMostrarOfertaPorEstudiante($valor);
                                        $mis_requsitos = ControladorOfertaAcademica::ctrMostrarRequisitosEstudianteAprobados($valor);
                                        //print_r($mis_requsitos);
                                        ?>

                                        <table class="table table-bordered table-striped tablas">

                                            <thead>

                                                <tr>
                                                    <th>Periodo</th>
                                                    <th>Materia</th>
                                                    <th>Requisitos</th>
                                                    <th style="width:10px">Créditos</th>
                                                    <th>Matricular</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php





                                                foreach ($respuestaO as $oferta) { ?>


                                                    <tr>
                                                        <td> <?php echo $oferta['NOM_PERIODO'] ?></td>
                                                        <td><?php echo $oferta['NOM_MATERIA'] ?></td>
                                                        <td><?php
                                                            echo '<button class="btn btn-primary btn-xs">' . $oferta['COD_REQUISITO'] . '</button>';

                                                            ?></td>
                                                        <td><?php echo $oferta['CREDITOS'] ?></td>


                                                        <td>
                                                            <?php

                                                            /*$array_requisitos = json_decode($oferta['COD_REQUISITO'], true);

                                                            foreach ($array_requisitos as $array_requisito) {

                                                                //Buscamos en los requisitos aprobados exista en la collecion requsitos de oferta

                                                                $found_key = array_search($array_requisito, array_column($mis_requsitos, 'COD_MATERIA'));
                                                                // echo  $found_key;

                                                                if ($found_key != "") { //Si existe un dato le habilitamos la matricula

                                                                    echo '<button class="btn btn-instagram accent-gray btnVerHorariosMaterias" idOferta=" ' . $oferta['ID_OFERTA'] . '" idEstudiante="' . $IdEstudiante . '" idCarrera="' . $_GET['idCarrera'] . '" idPlanCarrera="' . $valorP . '" data-toggle="modal" data-target="#modalHorariosOferta">Ver Horarios</button>';
                                                                }
                                                                if ($found_key == "") {

                                                                    if (in_array("Admitida en U", $array_requisitos)) {

                                                                        echo '<button class="btn btn-success accent-gray btnVerHorariosMaterias" idOferta=" ' . $oferta['ID_OFERTA'] . '" idEstudiante="' . $IdEstudiante . '" idCarrera="' . $_GET['idCarrera'] . '" idPlanCarrera="' . $valorP . '" data-toggle="modal" data-target="#modalHorariosOferta">Ver Horarios</button>';
                                                                    } else {
                                                                        echo '<button class="btn btn-danger accent-gray" disabled >Faltan Requisitos</button>';
                                                                    }
                                                                }

                                                                break;
                                                            }*/

                                                            $datos = array_column($mis_requsitos, 'COD_MATERIA');

                                                            $found_key = array_search($oferta['COD_REQUISITO'], $datos);


                                                            if ($found_key == false) { //Si no  existe la materia aprobada le habilitamos la matricula

                                                                echo '<button class="btn btn-instagram accent-gray btnVerHorariosMaterias" idOferta=" ' . $oferta['ID_OFERTA'] . '" idEstudiante="' . $IdEstudiante . '" idCarrera="' . $_GET['idCarrera'] . '" idPlanCarrera="' . $valorP . '" data-toggle="modal" data-target="#modalHorariosOferta">Ver Horarios</button>';
                                                            }
                                                            if ($found_key == true) {

                                                                if ($oferta['COD_REQUISITO']=="Sin requisito") {

                                                                    echo '<button class="btn btn-success accent-gray btnVerHorariosMaterias" idOferta=" ' . $oferta['ID_OFERTA'] . '" idEstudiante="' . $IdEstudiante . '" idCarrera="' . $_GET['idCarrera'] . '" idPlanCarrera="' . $valorP . '" data-toggle="modal" data-target="#modalHorariosOferta">Ver Horarios</button>';
                                                                } else {
                                                                    echo '<button class="btn btn-danger accent-gray" disabled >Faltan Requisitos</button>';
                                                                }
                                                               
                                                            }

                                                            ?>

                                                        </td>

                                                    </tr>

                                                <?php  } ?>

                                            </tbody>
                                        </table>



                                    </div>

                                </div>

                            </section>
                        </div>

                        <div class="tab-pane" id="MateriasMatruculadas">
                            <section class="content">

                                <div class="box">



                                    <div class="box-body">

                                        <table class="table table-bordered table-striped tablas">

                                            <thead>

                                                <tr>
                                                    <th>Código</th>
                                                    <th>Materia</th>
                                                    <th>Créditos</th>
                                                    <th>Requisitos</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php


                                                $valor = $_GET['idEstudiante'];
                                                $total = 0;

                                                $MateriasEstudiante = ControladorEstudiante::ctrMostrarMateriasMatriculadasEstudiante($valor);

                                                //print_r($MateriasEstudiante);

                                                foreach ($MateriasEstudiante as $Materias) { ?>


                                                    <tr>
                                                        <td> <?php echo $Materias['COD_MATERIA'] ?></td>
                                                        <td><?php echo $Materias['NOM_MATERIA'] ?></td>
                                                        <td><?php echo $Materias['CREDITOS'] ?></td>
                                                        <td><?php 
                                                                echo '<button class="btn btn-info btn-xs">' . $Materias['COD_REQUISITO'] . '</button>';
                                                           
                                                            ?></td>
                                                        <td> <button class="btn btn-info btn-xs"><?php
                                                        echo $resultado = $Materias['ID_ESTADO_MATERIA'] == 3 ? 'Matriculada' : 'Pendiente';
                                                        ?>
                                                        <td>
                                                            
                                                            <button class="btn btn-danger">Congelar</button>
                                                            
                                                        </td>

                                                    </tr>

                                                <?php  } ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                            </section>
                        </div>

                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>


<!--=====================================
MODAL VER HORARIOS OFERTADOS
======================================-->

<div id="modalHorariosOferta" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Horarios Disponibles </h4>

            </div>

            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

            <div class="modal-body ">

                <div class="box-body">




                    <table class="table table-bordered table-striped tablas">

                        <thead>

                            <tr>
                                <th>Grupo</th>
                                <th>Materia</th>
                                <th>Profesor</th>
                                <th>Modaliad</th>
                                <th>Aula</th>
                                <th>Horario</th>
                                <th>Capacidad</th>
                                <th>Matricular</th>

                            </tr>

                        </thead>

                        <tbody id="horariosOferta">






                        </tbody>

                    </table>




                </div>

            </div>

            <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>



            </div>



        </div>

    </div>

</div>