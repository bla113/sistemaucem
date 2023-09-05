<?php
if (isset($_GET['ruta']) && $_GET['idCurso']) {


 


    $item = "ID_HORARIO_OFERTA";
    $valor = $_GET['idCurso'];
    $respuesta = ControladorCursos::ctrMostrarEstudiantesCursos($item, $valor);
    $cantAlumnos = count($respuesta);

    $CurososVirtuales = ControladorCursos::ctrMostrarCusos($item,$valor);

    foreach ($CurososVirtuales as $curso){

    }

    //print_r($CurososVirtuales);
}
?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Detalle del Curso: <?php echo $curso['NOM_MATERIA']?>

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar detalle del curso</li>

        </ol>

    </section>

    <section class="content">

        <div class="content-wrapper">

            <div class="container">

                <section class="content-header">


                    <!-- Main content -->
                    <section class="content">

                        <div class="row">


                            <div class="col-md-3">


                                <div class="box box-solid">

                                    <div class="box-header with-border">

                                        <h3 class="box-title"></h3>

                                        <div class="box-tools">

                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                            </button>

                                        </div>

                                    </div>

                                    <div class="box-body no-padding">

                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="active"><a href="#"><i class="fa fa-inbox"></i> Buzón de Entrada
                                                    <span class="label label-primary pull-right">0</span></a></li>
                                            <li><a href="#"><i class="fa fa-envelope-o"></i> Enviados</a></li>
                                            <li><a href="#"><i class="fa fa-file-text-o"></i> Eliminados</a></li>
                                            <li><a href="#"><i class="fa fa-filter"></i> Buscar <span class="label label-warning pull-right">65</span></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-snapchat"></i> Espam</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /. box -->
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Labels</h3>

                                        <div class="box-tools">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                                            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                                            <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-md-9">

                                <div class="box box-primary">

                                    <div class="box-header with-border">

                                        <h3 class="box-title">Contenido del Curso:</h3>

                                        <div class="box-tools pull-right">

                                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>

                                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                                        </div>

                                    </div>

                                    <div class="box-body no-padding">

                                        <div class="mailbox-read-info">

                                            <h3>Nombre del Curso: <?php echo $curso['NOM_MATERIA']?></h3>

                                            </h5>
                                        </div>

                                        <div class="mailbox-controls with-border">



                                            <div class="mailbox-read-message">
                                                <p>Hello John,</p>

                                                <p>Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird
                                                    on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical
                                                    master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack
                                                    gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon
                                                    asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu
                                                    blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American
                                                    Apparel.</p>





                                                <p>Thanks,<br>Jane</p>
                                            </div>

                                        </div>

                                        <div class="box-footer ">
                                            <a class="btn btn-app"><span class="badge bg-blue">0</span><i class="fa fa-file-archive-o"></i>Documentos</a>
                                            <a class="btn btn-app"><span class="badge bg-body-secondary">0</span><i class="fa fa-info"></i>Descripción del Curso</a>
                                            <a class="btn btn-app"><span class="badge bg-yellow">0</span><i class="fa fa-book"></i>Lecciones</a>
                                            <a class="btn btn-app"><span class="badge bg-yellow">0</span><i class="fa fa-link"></i>Enlaces</a>
                                            <a class="btn btn-app"><span class="badge bg-yellow">0</span><i class="fa fa-pencil"></i>Ejercicios</a>
                                            <a class="btn btn-app"><span class="badge bg-fuchsia-active"></span><i class="fa fa-clock-o"></i>Asistencia</a>
                                            <hr>
                                            <h3>Interacción</h3>
                                            <a class="btn btn-app"><i class="fa fa-bookmark-o"></i>Tereas</a>
                                            <a class="btn btn-app"><i class="fa fa-bookmark"></i>Evaluaciones</a>
                                            <a class="btn btn-app"><span class="badge bg-yellow">3</span><i class="fa fa-bullhorn"></i>Notificatificación</a>
                                            <button class="btn btn-app" id="btnVerEstudiantesCurso" idCursoEstudiante="<?php echo $curso['ID_HORARIO_OFERTA']?>" data-toggle="modal" data-target="#modalEstudiantesCurso"><i class="fa fa-users"></i>
                                                <span class="badge bg-blue-gradient"><?php echo $cantAlumnos ?></span>

                                                Estudiantes del Curso

                                            </button>

                                            <div class="box-footer">

                                                <!-- /.box-footer -->
                                            </div>
                                            <!-- /. box -->
                                        </div>





                                    </div>
                    </section>
                    <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>

    </section>

</div>


<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalEstudiantesCurso" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Estudiantes del Curso</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <table class="table table-bordered table-striped tablas">

                            <thead>

                                <tr>
                                    <th>Identificación</th>
                                    <th>Nombre Completo</th>
                                    <th> N° Carnet </th>
                                    <th>Acciones</th>


                                </tr>

                            </thead>

                            <tbody id="estudiantesCurso">






                            </tbody>

                        </table>



                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar usuario</button>

                </div>

            </form>

        </div>

    </div>

</div>