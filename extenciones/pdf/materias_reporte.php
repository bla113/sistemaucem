<?php


	require_once '../../controladores/materia.controlador.php';
	require_once '../../modelos/materia.modelo.php';

	$item = null;

	$valor = null;
	$materias = ControladorMateria::ctrMostrarMateria($item, $valor);







ob_start();

include 'imagen.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>ReporteMaterias</title>

	<style>
		.invoice-box {
			max-width: 900px;
			margin: auto;
			padding: 15px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			font-size: 12px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 16px;
			line-height: 16px;
			color: #333;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
            padding-bottom: 2px;
		}

		.invoice-box table tr.details td {
			padding: bottom 2px;;
			text-align: auto;
			font-size: 12px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			line-height: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.invoice-box.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.invoice-box.rtl table {
			text-align: center;
		}

		.invoice-box.rtl table tr td:nth-child(2) {
			text-align: left;
		}

        .nombreColum{
            text-align:center;
        }
	</style>
</head>

<body>
	<div class="invoice-box">
		<table >
			
				<tr class="top">
					<td  colspan="6">
						<table>
							<tr>
								<td class="title" >
									REPORTE DE TODAS LAS MATERIAS <br />
									
                                    <hr>
									Fecha de Emisión: <?php echo $fecha_actual = date("d-m-Y h:i:s"); ?><br/>
									USURIO: <?php echo 'J.Rojas'; ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				</tr>

				<!-- <tr class="information">
					<td colspan="6">
						<table>
							<tr>
								<td>
									Universidad UCEM<br/>
									Calle Ancha, Alajuela<br/>
									Telefono: 2443-4545<br/>
									Whatsapp: 8425-1212<br/>
								</td>

								<td>
									Estudiante: <br />
									Carnete: <br />
									Identificación: <br>
									Telefono:<br>
									Correo:
								</td>
							</tr>
						</table>
					</td>
                </tr> -->
				
				<tr class="heading" style="align-self: auto;">
					<td style="width: 50px;">Código</td>
					<td >Nombre</td>
					<td>Créditos</td>
					<td>Requisitos</td>
			

				</tr>
				<?php 
				foreach ($materias as $key => $materia) {?>
				<tr class="details">
					<td style="width: 50px;"> <?php echo $materia['COD_MATERIA'] ?></td>
					<td style="text-align: justify;"><?php echo $materia['NOM_MATERIA'] ?></td>
					<td><?php echo $materia['CREDITOS'] ?></td>
					<td><?php echo $materia['COD_REQUISITO'] ?></td>
					
					

				</tr>
				<?php }?>
				
			
				
				
				

		</table>
	</div>
</body>



</html>



<?php

$html = ob_get_clean();


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
$dompdf->getCanvas()->page_text(250,750, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 12, array(0,0,0));
$dompdf->stream("materias_.pdf", array("Attachment" => false))

?>