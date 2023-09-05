<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar usuarios

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar grupos</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGrupo">

                    Agregar grupos de Horarios

                </button>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Nombre del Grupo</th>
                            <th>Código Grupo</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>
                        <?php

                        $grupos = ControladorGruposHorarios::ctrMostrarGruposHorarios(null, null);
                        foreach ($grupos as $grupo) { ?>
                            <tr>
                                <td><?php echo $grupo['ID_GRUPO_HORARIO'] ?></td>
                                <td><?php echo $grupo['COD_GRUPO'] ?></td>
                                <td><?php echo $grupo['NOMBRE_GRUPO'] ?></td>
                                <td><?php
                                    if ($grupo['ESTADO_GRUPO'] == 1) {
                                        echo '<button class="btn btn-success btn-xs">Activo</button>';
                                    }
                                    if ($grupo['ESTADO_GRUPO'] == 2) {
                                        echo '<button class="btn btn-primary btn-xs">Descativado</button>';
                                    }

                                    ?></td>

                                <td>

                                    <div class="btn-group">

                                        <button class="btn btn-warning btnEditarGrupo" idGrupo="<?php echo $grupo['ID_GRUPO_HORARIO'] ?>" data-toggle="modal" data-target="#modalEditarCarrera"><i class="fa fa-pencil"></i></button>

                                        <button class="btn btn-danger btnEliminarGrupoMaterias" idGrupoHorario="<?php echo $grupo['ID_GRUPO_HORARIO'] ?>"><i class="fa fa-times"></i></button>


                                    </div>

                                </td>
                            <?php } ?>
                            </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR GRUPO
======================================-->

<div id="modalAgregarGrupo" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Grupo de Horarios</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">
                            <label for="">Ingrese el Nombre del Grupo de Horarios ofertados</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoNombreGrupo" placeholder="Ingresar nombre del grupo" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CODIGO DE GRUPO -->

                        <div class="form-group">

                        <label for="">Ingrese el Código del Grupo de Horario</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoCodigoGrupo" placeholder="Ingresar el código" required>

                            </div>

                        </div>




                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnCrearGrupoHorario" class="btn btn-primary">Guardar Grupo</button>

                </div>

                <?php
                $CrearGrupo = new ControladorGruposHorarios();
                $CrearGrupo->ctrCrearGrupoHorario();

                ?>

            </form>

        </div>

    </div>

</div>


<!--=====================================
MODAL EDITAR GRUPO
======================================-->

<div id="modalEditarCarrera" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar grupo</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg" id="editarCodigoGrupo" name="editarCodigoGrupo" placeholder="Ingresar nombre" required>
                                <input type="hidden" id="IdGrupo" name="IdGrupo">
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CODIGO DE GRUPO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lg" id="editarNombreGrupo" name="editarNombreGrupo" placeholder="Ingresar usuario" required>

                            </div>

                        </div>




                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnEditarGrupo" class="btn btn-primary">Guardar usuario</button>

                </div>

                <?php
                $EditarGrupo = new ControladorGrupo();
                $EditarGrupo->ctrEditarGrupo();

                ?>

            </form>

        </div>

    </div>

</div>

<?php
$EliminarGrupo= new ControladorGruposHorarios();
$EliminarGrupo->ctrBorrarGruposHorarios();
?>

