 <div class="content-wrapper">

   <section class="content-header">

     <h1>

       Administrar correos

     </h1>

     <ol class="breadcrumb">

       <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

       <li class="active">Administrar correos</li>

     </ol>

   </section>


   <section class="content">

     <div class="row">




       <div class="col-md-12">



         <div class="nav-tabs-custom">

           <ul class="nav nav-tabs">

             <li class="active"><a href="#bandeja-entrada" data-toggle="tab">Bandeja de Entrada</a></li>

             <li><a href="#bandeja-salida" data-toggle="tab">Bandeja Salida</a></li>

           </ul>

           <div class="tab-content">

             <div class="active tab-pane" id="bandeja-entrada">

               <div class="row">

                 <div class="col-md-2">

                   <button class="btn btn-primary btn-block margin-bottom" id="btnCrearCorreo" data-toggle="modal" data-target="#modalCrearCorreo"> <i class="fa fa-plus"></i> Crear</a>

                 </div>



                 <div class="col-md-12">

                   <div class="box box-primary">

                     <div class="box-header with-border">

                       <h3 class="box-title">Mensajes Recibidos</h3>

                       <div class="mailbox-controls">

                         <button type="button" id="btnRefrescar" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>

                       </div>

                     </div>

                     <?php
                      $CorreosEntrada = ControladorMensaje::ctrMostrarMensajesEntrada($_SESSION['id']);
                      //print_r($CorreosEnviados);                 
                      ?>
                     <div class="box-body no-padding">

                       <div class="table-responsive mailbox-messages">

                         <table class="table table-bordered table-striped tablas">

                           <thead>

                             <tr>

                               <th><i class="fa fa-check"></i></th>
                               <th>Destino</th>
                               <th>Contenido</th>
                               <th style="width:10px">Adjuntos</th>
                               <th>Fecha Envío</th>
                               <th>Acciones</th>



                             </tr>

                           </thead>

                           <tbody id="BandejaEntrada">

                             <?php foreach ($CorreosEntrada as $key => $inbox) { ?>

                               <tr>

                                 <td><input type="checkbox"></td>

                                 <td class="mailbox-name"><a class="leer" idCorreo="<?php echo $inbox['ID_MENSAJE'] ?>" href="index.php?ruta=leer-mensaje-recibido&idMensaje=<?php echo $inbox['ID_MENSAJE'] ?>"><?php echo $inbox['nombre'] ?></a></td>

                                 <td class="mailbox-subject"><b><?php echo $inbox['ASUNTO'] ?></b>...

                                 </td>

                                 <td class="mailbox-attachment"><i class="fa fa-file-pdf-o"></i></td>

                                 <td class="mailbox-subject"><b><?php echo $inbox['FECHA_ENVIO'] ?></b></td>

                                 <td>

                                   <div class="btn-group">

                                     <button type="button" class="btn btn-google btn-sm"><i class="fa fa-trash-o"></i></button>

                                     <button type="button" class="btn btn-info btn-sm"><i class="fa fa-reply"></i></button>

                                     <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-share"></i></button>

                                   </div>

                                 </td>

                               </tr>

                             <?php } ?>

                           </tbody>

                         </table>

                       </div>

                     </div>

                   </div>

                 </div>

               </div>




             </div>

             <div class="tab-pane" id="bandeja-salida">

               <div class="row">


                 <div class="col-md-12">

                   <div class="box box-primary">

                     <div class="box-header with-border">

                       <h3 class="box-title">Bandeja Salida</h3>


                     </div>

                     <?php
                      $CorreosEnviados = ControladorMensaje::ctrMostrarMensajesEnviados($_SESSION['id']);
                      //print_r($CorreosEnviados);                 
                      ?>

                     <div class="box-body no-padding">

                       <div class="table-responsive mailbox-messages">

                         <table class="table table-bordered table-striped tablas">

                           <thead>

                             <tr>

                               <th>#</th>

                               <th>Destino</th>

                               <th>Contenido</th>

                               <th style="width:10px">Adjuntos</th>

                               <th>Fecha Recibido</th>

                               <th>Acciones</th>


                             </tr>

                           </thead>

                           <tbody>

                             <?php foreach ($CorreosEnviados as $key => $send) { ?>

                               <tr>

                                 <td><input type="checkbox"></td>

                                 <td class="mailbox-name"><a href="index.php?ruta=leer-mensaje-enviado&idMensaje=<?php echo $send['ID_MENSAJE'] ?>"><?php echo $send['nombre'] ?></a></td>

                                 <td class="mailbox-subject"><b><?php echo $send['ASUNTO'] ?></b> - ...

                                 </td>

                                 <td class="mailbox-attachment"><i class="fa fa-file-pdf-o"></i></td>

                                 <td class="mailbox-subject"><b><?php echo $send['FECHA_ENVIO'] ?></b></td>

                                 <td>

                                   <div class="btn-group">

                                     <button type="button" class="btn btn-google btn-sm"><i class="fa fa-trash-o"></i></button>

                                     <button type="button" class="btn btn-info btn-sm"><i class="fa fa-reply"></i></button>

                                     <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-share"></i></button>

                                   </div>

                                 </td>

                               </tr>

                             <?php } ?>

                           </tbody>

                         </table>

                       </div>

                     </div>

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

 <div id="modalCrearCorreo" class="modal fade" role="dialog">

   <div class="modal-dialog modal-lg">

     <div class="modal-content">

       <form role="form" method="post" enctype="multipart/form-data">

         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

         <div class="modal-header" style="background:#3c8dbc; color:white">

           <button type="button" class="close" data-dismiss="modal">&times;</button>

           <h4 class="modal-title">Crear Nuevo Correo</h4>

         </div>

         <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

         <div class="modal-body">

           <div class="box-body">

             <div class="col-md-12">

               <div class="box box-sucess">

                 <div class="box-header with-border">

                   <h3 class="box-title">Creando nuevo Mensaje</h3>

                 </div>

                 <div class="box-body">

                   <div class="form-group">

                     <div class="input-group">

                       <span class="input-group-addon">PARA:</span>

                       <select class="form-control" name="destinoCorreo[]" id="destinoCorreo" multiple required>



                       </select>

                     </div>

                   </div>



                   <div class="form-group">

                     <input class="form-control" placeholder="Asunto:" name="asuntoMensaje" required>

                   </div>

                   <div class="form-group">

                     <textarea id="ckeditor" name="ContenidoMensaje" class="ckeditor" required>
                    </textarea>

                   </div>

                   <div class="form-group">

                     <div class="btn btn-success btn-file">

                       <i class="fa fa-paperclip"></i> Adjuntar

                       <input type="file" name="attachment">

                     </div>

                     <p class="help-block">Max. 10MB</p>

                   </div>

                 </div>

               </div>

             </div>

           </div>

         </div>

         <!--=====================================
        PIE DEL MODAL
        ======================================-->

         <div class="modal-footer">
           <input type="hidden" name="idRemitente" value="<?php echo $_SESSION['id'] ?>">

           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

           <button type="submit" name="btnEnviarMensaje" class="btn btn-primary"> <i class="fa fa-send"></i> Enviar</button>

         </div>

         <?php
          $Enviar = new ControladorMensaje();
          $Enviar->ctrEnviarMensaje();
          ?>

       </form>

     </div>

   </div>

 </div>