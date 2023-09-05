<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Reportes

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Reportes </li>

    </ol>

  </section>

  <section class="content">


    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Title</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="col-md-6">
          <!-- Application buttons -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Área de Reportes</h3>
            </div>
            <div class="box-body">

              <a class="btn btn-app" href="extenciones/pdf/materias_reporte.php">
                <i class="fa fa-book"></i> Materias
              </a>
              <button class="btn btn-app bg-aqua" data-toggle="modal" data-target="#modalReportePlan">
               Materias por Plan de Carrera
              </button>
           
             
            </div>

          </div>


        </div>

      </div>
    </div>


</div>


</section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalReportePlan" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" action="extenciones/pdf/materiasXplanCarrera.php" method="get">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Reporte de materias por plan de estudios</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <?php // $plan_carreras = ControladorPlanCarrera::ctrMostrarPlanCarrera(null, null); ?>


            <!-- ENTRADA PARA SELECCIONAR PLAN DE ESTUDIOS -->

            <div class="form-group">
              <label class="">Seleccione el Plan de Carrera</label><br> <br>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                <select class="form-control input-lg" name="plandeEstudios">

                  <?php // foreach ($plan_carreras as $planes) { ?>

                    <!-- <option value="<?php // echo $planes['ID_PLAN_CARRERA'] ?>"><?php // echo $planes['NOM_PLAN'] ?> </option> -->

                  <?php // } ?>

                  <option value="1" selected>Bachillerato Administración de Negocios</option>
                  <option value="2">Bachillerato en Contaduría</option>
                  <option value="4">Bachillerato en Ingeniería Industrial</option>
                  <option value="3">Bachillerato Ingeniería en Sistemas</option>



                </select>

              </div>

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Crear Reporte</button>

        </div>

      </form>

    </div>

  </div>

</div>