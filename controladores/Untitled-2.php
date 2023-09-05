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

                            <li class="active"><a href="#"><i class="fa-solid fa-user-ninja"></i> Jose Bladimr Rojas

                                    <span class="label label-danger pull-right">12</span></a></li>

                        </ul>

                        <ul class="nav nav-pills nav-stacked">

                            <li><a href="#"><i class="fa-solid fa-user"></i> Pablo Nuñez Castro
                                    <span class="label label-primary pull-right">0</span></a></li>

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

                        <div class="col-md-9">




                            <div class="box-body">
                                
                                <div class="box-header with-border">

                                    <h3 class="box-title">Chat</h3>


                                </div>

                                <div class="direct-chat-messages">

                                    <div class="direct-chat-msg">

                                        <div class="direct-chat-info clearfix">

                                            <span class="direct-chat-name pull-left"><?php echo $_SESSION['nombre'] ?></span>

                                            <span class="direct-chat-timestamp pull-right"><?php echo $fecha_actual = date("d-m-Y h:i:s"); ?> <i class="fa-solid fa-check"></i> <i class="fa-solid fa-check"></i></span>

                                        </div>


                                        <img class="direct-chat-img" src="vistas/img/usuarios/julio/100.png" alt="Message User Image">

                                        <div class="direct-chat-text bg-aqua">

                                            Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit.
                                            Impedit consequatur temporibus
                                            necessitatibus debitis beatae
                                            expedita repellat blanditiis
                                            officia id placeat minus
                                            odit optio obcaecati illo,
                                            ratione magni provident
                                            quaerat incidunt.
                                        </div>

                                    </div>

                                    <div class="direct-chat-msg right">

                                        <div class="direct-chat-info clearfix">

                                            <span class="direct-chat-name pull-right"><?php echo $_SESSION['perfil'] ?></span>

                                            <span class="direct-chat-timestamp pull-left"><?php echo $fecha_actual = date("d-m-Y h:i:s"); ?> <i class="fa-solid fa-check"></i> <i class="fa-solid fa-check"></i></span>

                                        </div>

                                        <img class="direct-chat-img" src="vistas/img/usuarios/julio/100.png" alt="Message User Image">

                                        <div class="direct-chat-text bg-blue">

                                            Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit.
                                            Aperiam reiciendis aspernatur
                                            earum atque officia deserunt
                                            officiis incidunt possimus,
                                            excepturi et consectetur corporis
                                            quo error dolor laborum veniam vel
                                            obcaecati molestias?
                                        </div>

                                    </div>
                                    <div class="direct-chat-msg  respuesta">
                                    </div>
                                    <div class="direct-chat-msg right   conversation">
                                    </div>

                                </div>



                            </div>

                            <div class="box-footer">

                                <div class="input-group">

                                    <input type="text" id="message" name="message" placeholder="Escriba su mensaje" class="form-control">

                                    <span class="input-group-btn">

                                        <button type="button" id="btnChat" de="<?php echo $_SESSION['nombre'] ?>" class="btn btn-primary btn-flat">Enviar</button>

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