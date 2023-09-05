<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Dashboard

      <small>Control panel</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>


  <section class="content">


    <div class="row" id="inicio" onload="pedirVoto()">

      <div class="col-lg-3 col-xs-6">



        <div class="small-box bg-aqua">

          <div class="inner">

            <h3>150</h3>

            <p>New Orders</p>

          </div>

          <div class="icon">

            <i class="ion ion-bag"></i>

          </div>

          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>



        </div>

      </div>

      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-green">

          <div class="inner">

            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Bounce Rate</p>

          </div>

          <div class="icon">

            <i class="ion ion-stats-bars"></i>

          </div>

          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

        </div>

      </div>

      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-yellow">

          <div class="inner">

            <h3>44</h3>

            <p>User Registrations</p>

          </div>

          <div class="icon">

            <i class="ion ion-person-add"></i>

          </div>

          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

        </div>

      </div>

      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-red">

          <div class="inner">

            <h3>65</h3>

            <p>Unique Visitors</p>

          </div>

          <div class="icon">

            <i class="ion ion-pie-graph"></i>

          </div>

          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

        </div>

      </div>
      <div class=" col-lg-6 col-xs-12">
        <!-- MAP & BOX PANE -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Matrículas </h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="card card-blue">


                <div>
                  <canvas id="matriculas"></canvas>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class=" col-lg-6 col-xs-12">
        <!-- MAP & BOX PANE -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Estudiantes </h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="card card-blue">


                <div>
                  <canvas id="estudiantes"></canvas>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>



    </div>

  </section>

</div>

