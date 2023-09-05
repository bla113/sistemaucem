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

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMatricula">

                    Agregar matricula

                </button>

                <a href="extenciones/pdf/materias_reporte.php">PDF</a>

                <a href="crear-matricula" class="btn btn-success btn-lg">Crear matricula</a>
            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                    <thead>

                        <tr>

                            <th style="width:100px">#</th>
                            <th>Estudiante</th>
                            <th>Periodo</th>
                            <th>Fecha</th>
                            <th>Saldo</th>
                            <th>Estado</th>
                            <th>observaciones</th>
                            <th>Opciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $matriculas = ControladorMatricula::ctrMotrarMatriculas();
                        foreach ($matriculas as $key => $matricula) { ?>

                            <tr>
                                <td>MAIC-00<?php echo $matricula['ID_MATRICULA']   ?></td>
                                <td><?php echo $matricula['NOMBRE_COMPLETO'] . ' ' . $matricula['PRIMER_APELLIDO'] . ' ' . $matricula['SEGUNDO_APELLIDO']    ?></td>
                                <td><?php echo $matricula['NOM_PERIODO']   ?></td>

                                <td><?php echo $matricula['FECHA_CREACION']    ?></td>
                                <td> ₡ <?php echo $matricula['SALDO']   ?></td>
                                <td><?php
                                    if ($matricula["COMPROBANTE_MATRICULA"] !== NULL || !empty($matricula["COMPROBANTE_MATRICULA"])) {

                                        if ($matricula["ESTADO_MATRICULA"] === 1) {

                                            echo'<button class="btn btn-danger btn-xs btnValidarPago" idValidarMatricula=" '.$matricula['ID_MATRICULA'].'" idEstudianteCurso="'.$matricula['ID_ESTUDIANTE'].'" data-toggle="modal" data-target="#modalValidarPago">APLICAR PAGO</button>';

                                        } else {
                                            if($matricula['SALDO']>0 ){

                                                echo '<button class="btn btn-instagram btn-xs">Proxima Cuota: 28/02/2023</button>';
                                            }else{
                                                echo '<button class="btn btn-instagram btn-xs">Pagada</button>';
                                            }
                                            
                                        }
                                    } else {
                                        echo '<button class="btn btn-success btn-xs btnSubirComprobante" idMatricula="'.$matricula['ID_MATRICULA'].'" data-toggle="modal" data-target="#modalAgregarComprobante"><i class="fa fa-upload"></i> Subir Comprobante</button>';
                                    }
                                    ?></td>
                                    <td><?php echo $matricula['OBSERVACIONES']?></td>
                                <td>

                                    <div class="btn-group">


                                        <?php if ($matricula['SALDO'] > 0) {
                                            echo '<button class="btn btn-warning"><i class="fa fa-money"></i></button>';
                                        } ?>
                                        <a href="extenciones/pdf/matriculaPDF.php?idMtricula=<?php echo $matricula['ID_MATRICULA']   ?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i></a>

                                        <button class="btn btn-info btnDetalleMatricula" idMatricula="<?php echo $matricula['ID_MATRICULA'] ?>" data-toggle="modal" data-target="#modalDetalleMatricula"><i class="fa fa-eye"></i></button>

                                       
                                    </div>

                                </td>

                            </tr>
                        <?php  } ?>


                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR MATRICULA
======================================-->

<div id="modalAgregarMatricula" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Realizar Matrícula</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <h3 class="tex text-xl-center text-center text-uppercase"> Buscar Estudiante</h3>

                <div class="modal-body">

                    <div class="box-body">


                        <!-- SELECCIONAR BUSQUEDA-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                <select class="form-control input-lg" name="buscarIdentificacion">

                                    <option value="">Selecionar Tipo Busqueda</option>

                                    <option value="1">Número de Carnet</option>

                                    <option value="2">Identificación</option>



                                </select>

                            </div>

                        </div>
                        <!-- ENTRADA PARA LA CONTRASEÑA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <input type="text" class="form-control input-lg" name="buscarEstudiante" placeholder="Ingresar los datos" required>

                            </div>

                        </div>
                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnBuscarEstudiante" class="btn btn-primary">Buscar Estudiante</button>

                </div>

                <?php
                $buscar = new ControladorMatricula();
                $buscar->ctrBucarEstudianteParaMatricular();
                ?>

            </form>

        </div>

    </div>

</div>


<!--=====================================
MODAL VALIDAR PAGO
======================================-->

<div id="modalValidarPago" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Validar pago de Matricula</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <h3 class="tex text-xl-center text-center text-uppercase"> Validando Pago del Matricula </h3>





                <div class="modal-body">


                    <div class="showPDF">

                    </div>



                    <hr>
                    <br>


                    <!-- <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>

                            <input type="number" class="form-control input-lg" name="ingresarMonto" placeholder="Ingrese el Monto del Comprobante" required>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-user"></i></span>

                            <input type="number" class="form-control input-lg" id="nombreEstudiante" name="ingresarMonto" disabled>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-user"></i></span>

                            <input type="number" class="form-control input-lg" id="identifiacionEstudiante" name="ingresarMonto" disabled>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-user"></i></span>

                            <input type="number" class="form-control input-lg" id="carnetEstudiante" name="ingresarMonto" disabled>

                        </div>

                    </div> -->


                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left btn-lg"" data-dismiss=" modal">Salir</button>

                    <button type="button" idMatricula="<?php echo $matricula['ID_MATRICULA'] ?>" idEstudiante="<?php echo $matricula['ID_ESTUDIANTE'] ?>" id="btnAplicarPago" class="btn btn-primary btn-lg">Aplicar Pago y Matricular</button>

                </div>

            </form>

        </div>

    </div>

</div>


<!--=====================================
DETALLE DE MATRICULA
======================================-->

<div id="modalDetalleMatricula" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Detalle de Materias Seleccionadas</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">


                        <table class="table table-bordered table-striped tablas">

                            <thead>

                                <tr>

                                    <th style="width: 120px;">Materia</th>
                                    <th style="text-align: left;">Créditos</th>

                                </tr>

                            </thead>

                            <tbody id="detalledeMatricula">




                            </tbody>

                        </table>







                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Salir</button>


                </div>

            </form>

        </div>

    </div>

</div>


<!--=====================================
MODAL AGREGAR COMPROBANTE DE PAGO
======================================-->

<div id="modalAgregarComprobante" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Subir Comprobante de la Matricula</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


          <input type="hidden" name="idMatriculaComprobante" id="idMatriculaComprobante">
            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR COMPOBATE DE PAGO </div>

              <input type="file" id="nuevaFoto" name="comprobantePago"  accept=".jpg, .jpeg, .png, .pdf" required>

              <p class="help-block">Peso máximo de la foto 10 MB</p>

              <img src="vistas/img/plantilla/image-6.png" class="img-thumbnail" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" name="btnSubirArchivo" class="btn btn-primary"><i class="fa fa-upload"></i> Subir Comprobante</button>

        </div>

        <?php
        $SubirArchivo= new ControladorMatricula();

        $SubirArchivo->ctrSubirComprobante();
        ?>

      </form>

    </div>

  </div>

</div>