<div class="content-wrapper">
    <section class="content-header">

        <h1>

            Administrar chat

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar chat</li>

        </ol>

    </section>


    <section class="content">


    <?php 
                    
                    $item='ID_USUARIO_ENVIA';
                    $valor=$_SESSION['id'];

                    $Mensajes= ChatControlador::ctrMostrarChats($item,$valor);
                    echo 'Hola';
                   // print_r($Mensajes);
                    ?>

        <div class="row">

            <div class="col-md-3">

                <a href="#" class="btn btn-primary btn-block margin-bottom"><i class="fa-solid fa-comment-dots"></i></a>

                <div class="box box-solid">

                    <div class="box-header with-border">

                        <h3 class="box-title">Contactos</h3>


                        <div class="box-tools">

                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
                        </div>

                    </div>

                    <div class="box-body no-padding">
                       
                  

                        <ul class="nav nav-pills nav-stacked">

                            <li class="active"><a href="#" id="btnBladimir"><img class="direct-chat-img" src="vistas/img/usuarios/ana/260.png" alt="Message User Image"> Jose Bladimr Rojas

                                    <span class="label label-danger pull-right">12</span></a></li>

                        </ul>

                        <ul class="nav nav-pills nav-stacked">

                            <li><a href="#" id="btnBladimir"><img class="direct-chat-img" src="vistas/img/usuarios/ana/260.png" alt="Message User Image"> Jose Bladimr Rojas

                                    <span class="label label-danger pull-right">12</span></a></li>

                        </ul>

                    </div>


                </div>

                <div class="box box-solid">

                    <div class="box-header with-border">

                        <h3 class="box-title">Archivados</h3>


                        <div class="box-tools">

                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">

                        <ul class="nav nav-pills nav-stacked">

                            <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>

                            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>

                            <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                        </ul>

                    </div>

                </div>

            </div>

            <div class="col-md-9">

                <div class="box box-primary">


                    <div class="row">

                        <div class="col-md-12">




                            <div class="box-body">

                                <div class="box-header with-border">

                                    <h3 class="box-title">Chat</h3>


                                </div>

                                <div class="direct-chat-messages">




                                    <div class="direct-chat-msg  respuesta">
                                        <div class="alert alert-dark">
                                            <p></p>
                                        </div>
                                        <div class="alert alert-info">Seleccione un conversación</div>
                                    </div>
                                    <div class="direct-chat-msg  ">
                                        <div id="conversation">
                                         
                                        </div>
                                    </div>

                                </div>



                            </div>

                            <div class="box-footer">

                                <div class="input-group" id="bodymessage">
                                    <input type="hidden" name="" value="2" id="IdUsusuarioDestino">

                                    <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="IdUsuarioOrigen" id="IdUsuarioOrigen">

                                    <input type="hidden" value="<?php echo $fecha_actual = date("d-m-Y h:i:s"); ?>" name="fechaEnvio" id="fechaEnvio">

                                    <input type="text" id="message" name="message" placeholder="Escriba su mensaje" class="form-control" required>

                                    <span class="input-group-btn">

                                        <button type="submit" id="btnChat" de="<?php echo $_SESSION['nombre'] ?>" class="btn btn-primary btn-flat">Enviar</button>

                                    </span>

                                </div>



                            </div>




                        </div>


                    </div>



                </div>

            </div>

        </div>

</div>

</section>

</div>