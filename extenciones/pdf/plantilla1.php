<?php

ob_start();

require_once '../../controladores/materia.controlador.php';
require_once '../../modelos/materia.modelo.php';

$item = null;

$valor = null;
$materias = ControladorMateria::ctrMostrarMateria($item, $valor);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Reporte de Ventas</title>
    <link rel="stylesheet" href="{{link_css}}">
    <style>
        html {
            margin-left: 22px;
            margin-right: 22px;
            margin-top: 28px;
            margin-bottom: 28px;
        }

        *,
        ::before,
        ::after {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body {
            font-size: 12px;
            font-weight: 400;
            color: #212529;
        }

        body,
        html {
            font-family: sans-serif;
        }

        table {
            width: 100%;
        }

        table {
            display: table;
            border-collapse: collapse;
            border-color: grey;
        }

        .th {
            font-size: 14px;
            color: #fff;
            line-height: 1.4;
            background-color: #6c7ae0;
            /*#6c7ae0 */
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .head {
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .center {
            text-align: center;
        }

        p {
            margin-top: 0;
            margin-bottom: 0;
        }

        ul {
            list-style-type: none;
        }

        .tablepe>tr:nth-child(even) {
            background-color: #f8f6ff;
        }

        .tablepe {
            /* border: 1px solid black;*/
            border-collapse: collapse;
        }

        .body>th {
            /*  border: 1px solid rgb(49, 49, 49);*/
            border: 1px solid rgb(29, 29, 29);
            /*#6c7ae0*/
        }

        .body>td {
            border: 1px solid rgb(29, 29, 29);
        }
    </style>
</head>

<body>
    <div class="container">
        <table style="padding-bottom: 12px; padding-top: 10px;">
            <thead>
                <tr>
                    <th align="left">UCEM</th>
                    <th align="center">Materias</th>
                    <th align="right"><?php echo $fecha_actual = date("d-m-Y h:i:s"); ?></th>
                </tr>
            </thead>
        </table>

        <table class="tablepe">
            <thead>
                <tr class="body">
                    <th  >CODIGO</th>
                    <th  >NOMBRE</th>
                    <th >REQUSITO</th>
                    <th >CREDITOS</th>

                    <!-- <th class="center th">Productos Vendidos</th> -->
                    <th class="center th">
                        <table>
                            <tbody>

                                <?php
                                foreach ($materias as $key => $materia) { ?>
                                    <tr class="details">
                                        <td><?php echo $materia['COD_MATERIA'] ?></td>
                                        <td><?php echo $materia['NOM_MATERIA'] ?></td>
                                        <td><?php echo $materia['CREDITOS'] ?></td>
                                        <td><?php echo $materia['COD_REQUISITO'] ?></td>



                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </td>
                    <th class="center th" width="8%">Total</th>
                </tr>
            </thead>
            <tbody>
                {{table_products_sale}}
            </tbody>
        </table>

    </div>

</body>

</html>


<?php

$html = ob_get_clean();

//echo $html;
require '../pdf/vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);


$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
//$dompdf->setPaper('A4','landscape');

$dompdf->render();
$dompdf->stream("archivo_.pdf", array("Attachment" => false))
?>