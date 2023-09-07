<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar matriculas

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar matriculas</li>

        </ol>

    </section>



    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">
                    <i class="fa fa-university"></i> Universidad UCEM
                    <p class="pull-right">Fecha: <?php echo $hoy = date("Y-m-d h:m") ?></p>
                </h1>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">

            <div class="row">
                <form action="">
                    <div class="col-sm-6 invoice-col">
                        <div class="box box-primary">
                            <div class="form-group">
                                <label>Ingrese el criterrio de busqueda</label>

                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                        <select class="form-control input-lg" id="buscarEstudiante" name="buscarEstudiante" required>

                                            <option value="">Selecionar tipo de busqueda</option>

                                            <option value="1">Identificación</option>

                                            <option value="2">Número de Carnet</option>

                                        </select>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="input-group input-lg ">

                                        <input type="text" id="identificacionB"  value="603790355" class="form-control input-lg" placeholder="Ingrese criterio de búsqueda">
                                        <span class="input-group-btn">
                                            <button id="btnuscarEstudiante" type="button" class="btn btn-info btn-lg"><i class="fa fa-search"></i></button>
                                        </span>


                                    </div>
                                </div>

                            </div>

                        </div>

                </form>
            </div>
            <div class="col-sm-6">



                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detalles del Estudiante</h3>
                    </div>

                    <form class="form-horizontal ">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nombre Completo</label>

                                <div class="col-sm-10">
                                    <input type="hidden" name="idestudiante" id="idestudiante">
                                    <input type="hidden" name="idOferta" id="idOferta">
                                    <input type="hidden" name="idCarrera" id="idCarrera">
                                    <input type="hidden" name="idPlanCarrera" id="idPlanCarrera">
                                    <input type="text" class="form-control" id="nombreEstudiante" placeholder="Nombre Completo" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Identificación</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="indenEstudiante" placeholder="Identificación" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Carnet</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="carnetEstudiante" placeholder="Número de carnet" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Carrera</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="carreraEstudiante" placeholder="Carrera" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Plan de Carrera</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="palnEstudiante" placeholder="Plan de Carrera" disabled>
                                </div>
                            </div>




                        </div>

                    </form>


                </div>







            </div>

        </div>



        <div class="box-header with-border">

            <button class="btn btn-success btn-lg" id="buscarOfertasE"><i class="fa fa-repeat"></i> CARGAR MATERIAS </button>

        </div>

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-9 table-responsive">


                <div class="box box-info">
                    <div class="box-header with-border">
                        <table class="table table-bordered table-striped dt-responsive tablas">

                            <thead>

                                <tr>

                                    <th>Codigo</th>
                                    <th>Materia</th>
                                    <th>Requisitos</th>
                                    <th>Créditos</th>
                                    <th>Acciones</th>

                                </tr>

                            </thead>

                            <tbody id="horariosOfertaM">


                            </tbody>

                        </table>
                    </div>
                </div>


            </div>
            <div class="col-xs-3 table-responsive">
                <div class="box">

                    <div class="box-header with-border">
                        <div class="row">




                            <hr>
                            <div class="col col-3">
                                <button class="btn btn-app " id="verMateriasSeleccionadas" data-toggle="modal" data-target="#modalmateriasSeleccionadas">

                                    Ver Carrito

                                </button>
                                <button class="btn btn-app bg-green-gradient" data-toggle="modal" data-target="#modalAgregarUsuario">

                                    Ver facturas

                                </button>
                                <button class="btn btn-app btn-primary bg-aqua" data-toggle="modal" data-target="#modalAgregarUsuario">

                                    Limpiar

                                </button>

                                <a class="btn btn-app bg-aqua-active" href="index.php?ruta=detalle-pre-matricula&idEstudiante=<?php echo 48 ?>&idCarrera=<?php echo 3 ?>&idPlanCarrera=<?php echo 3 ?>">

                                    <i class="fa fa-cart-plus"></i> Procesar Pago
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="box-body">



                    </div>

                </div>
            </div>
        </div>

    </section>

    <div class="clearfix"></div>
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


<!--=====================================
MODAL VER MATERIAS SELECCIONADAS
======================================-->

<div id="modalmateriasSeleccionadas" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Materias seleccionadas </h4>

            </div>

            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

            <div class="modal-body ">

                <div class="box-body">




                    <table class="table table-bordered table-striped tablas">

                        <thead>

                            <tr>
                                <th style="width:20px">Dia</th>
                                <th>Materia</th>
                                <th style="width:10px">Créditos</th>
                                <th style="width:30px">Modalidad</th>
                                <th style="width:40px">Horario</th>
                                <th>Aula</th>
                                <th>Profesor</th>
                                <th style="width:10px">Acción</th>

                            </tr>

                        </thead>

                        <tbody id="materiasSelccionadas">






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