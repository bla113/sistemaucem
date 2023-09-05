
<?php
if(isset($_GET['ruta']) && $_GET['ruta']='leer-mensaje'){

$valor=$_GET['idMensaje'];

$mensajes=ControladorMensaje::ctrMostrarMensajesLeerMensajesEnviados($valor);

}
?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Leer Mensajes

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar mensajes</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">


            <div class="box-body">

                <div class="col-md-12">
                    <div class="box box-primary">
                        <?php foreach ($mensajes as $key => $mensaje) {
                            # code...
                        }?>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="mailbox-read-info">
                                <h3> <b>Mensaje Para: <?php echo $mensaje['nombre'] ?></b>  </h3>
                                <h5>Asunto: <?php echo $mensaje['ASUNTO'] ?>
                                    <span class="mailbox-read-time pull-right">Fecha: <?php echo $mensaje['FECHA_ENVIO'] ?></span>
                                </h5>
                            </div>
                            <!-- /.mailbox-read-info -->
                            <div class="mailbox-controls with-border text-center">


                            </div>
                            <!-- /.mailbox-controls -->
                            <div class="mailbox-read-message">
                                <textarea id="ckeditor" name="ContenidoMensaje" class="ckeditor" readonly><?php echo $mensaje['CONTENIDO'] ?></textarea>
                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <ul class="mailbox-attachments clearfix">
                                <li>
                                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                                    <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                                        <span class="mailbox-attachment-size">
                                            1,245 KB
                                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                        </span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- /.box-footer -->
                        <div class="box-footer">
                            <div class="pull-right">
                            <a href="correos" class="btn btn-facebook"><i class="fa fa-reply"></i> Regresar</a>

                                <button type="button" class="btn btn-facebook"><i class="fa fa-share"></i> Reenviar</button>
                            </div>
                            <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Borrar</button>
                            <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir</button>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /. box -->
                </div>

            </div>

           

        </div>

    </section>

</div>