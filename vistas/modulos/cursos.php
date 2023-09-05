<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Cursos

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Cursos </li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <?php
                $CurososVirtuales = ControladorCursos::ctrMostrarCusos(null, null);
                // print_r($CurososVirtuales);

                ?>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                    <thead>

                        <tr>

                            <th style="width:10px">Materia</th>
                            <th>Grupo</th>
                            <th>Día</th>
                            <th>Horario</th>
                            <th>Aula</th>
                            <th>Modalidad</th>
                            
                            <th>Profesor</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>
                        <?php foreach ($CurososVirtuales as $cursos) { ?>

                            <tr>
                                <td><?php echo $cursos['NOM_MATERIA'] ?></td>
                                <td><?php echo $cursos['NOMBRE_GRUPO'] ?></td>
                                <td><?php echo $cursos['DIA'] ?></td>
                                <td><?php echo $cursos['INICIO'] . " - ".$cursos['FIN'] ?></td>
                                <td><?php echo $cursos['NOM_AULA'] ?></td>
                                <td><?php echo $cursos['MODALIDAD'] ?></td>
                                
                                <td><?php echo $cursos['NOMBRE_PROFESOR'] ?></td>
                                <td>

                                    <div class="btn-group">

                                        <a href="index.php?ruta=detalle-curso&idCurso=<?php echo $cursos['ID_HORARIO_OFERTA'] ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>

                                        <button class="btn btn-success" data-toggle="modal" data-target="#modalConfigurarCurso"><i class="fa fa-gear"></i></button>
                                        <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                                    </div>

                                </td>

                            </tr>


                        <?php } ?>
                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR ELANCES Y DESCRIPCION DE  CURSO
======================================-->

<div id="modalConfigurarCurso" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#695855; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Configuración del Curso</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA LA DESCRIPCIÓN -->

                        <div class="form-group">
                            <h3>Ingresar la descripción del curso</h3>
                            <input type="hidden" value="<?php echo $cursos['ID_HORARIO_OFERTA'] ?>"" name="idHorarioOferta" >

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>


                                <textarea id="ckeditor" name="descripcionCurso" class="ckeditor" required></textarea>
                                
                            </div>

                        </div>

                        <!-- ENTRADA PARA LOS ENLACES -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-link"></i></span>

                                <input type="text" class="form-control input-lg" name="enlaceCurso" placeholder="Ingresar usuario" required>

                            </div>

                        </div>




                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnActualizaCurso" class="btn btn-primary">Guardar Cambios</button>

                </div>
                <?php
                $Modificar = new ControladorOfertaAcademica();
                $Modificar->ctrActualuzarorarioOfertadoDescEnlace();

                ?>


            </form>

        </div>

    </div>

</div>