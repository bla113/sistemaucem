<?php


require_once '../../controladores/plan-carrera.controlador.php';
require_once '../../modelos/plan-carrera.modelo.php';

if(isset($_GET['plandeEstudios'])){

	$planEstudios= $_GET['plandeEstudios'];


	if ($planEstudios ==1 ) {
		$item = 'ID_CARRERA';
		$valor = 1;
		$materias = ControladorPlanCarrera::ctrReportemateriasAdministracion($item, $valor);
		$nombrePlan='Bachillerato en Administración de Negocios';
		
	} elseif ($planEstudios ==2) {
		$item = 'ID_CARRERA';

		$valor = 2;
		$materias = ControladorPlanCarrera::ctrReportemateriasAdministracion($item, $valor);
		$nombrePlan='Bachillerato en Contaduría';
	}  elseif ($planEstudios ==4) {
		$item = 'ID_CARRERA';

		$valor = 4;
		$materias = ControladorPlanCarrera::ctrReportemateriasAdministracion($item, $valor);
		$nombrePlan='Bachillerato en Ingeniería Industrial';

	}else {
		$item = 'ID_CARRERA';

		$valor = 3;
		$materias = ControladorPlanCarrera::ctrReportemateriasAdministracion($item, $valor);
		$nombrePlan='Bachillerato en Ingeniería en Sistemas';
	}
}else{
	echo '<script> window.location = "inicio";</script>';
}



	









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
		<tr class="information">
					<td colspan="6">
						<table>
							<tr>
								<td>
									<img width="10" height="10" style="border-top-left-radius: 80px 80px;" src="data:image/png;base64,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" class="img-fluid rounded-top" alt="">
								</td>
								<td>
									Universidad UCEM<br/>
									Calle Ancha, Alajuela<br/>
									Telefono: 2443-4545<br/>
									Whatsapp: 8425-1212<br/>
									<br/>
								</td>

								<td>
									
								</td>
							</tr>
						</table>
					</td>
                </tr>
			
				<tr class="top">
					<td  colspan="6">
						<table>
							<tr>
								<td class="title" >
									Plan de Carrera de 
									<?php echo $nombrePlan?></h4>
									
                                    <hr>
									Fecha de Emisión: <?php echo $fecha_actual = date("d-m-Y h:i:s"); ?><br/>
									USUARIO: <?php echo 'J.Rojas'; 
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				</tr>

				
				
				<tr class="heading" style="align-self: auto;">
					<td style="width: 50px;">Código</td>
					<td >Nombre</td>
					<td>Créditos</td>
					<td>Requisitos</td>
					<td>Periodo</td>
			

				</tr>
				<?php 
				foreach ($materias as $key => $materia) {?>
				<tr class="details">
					<td style="width: 50px;"> <?php echo $materia['COD_MATERIA'] ?></td>
					<td style="text-align: center;"><?php echo $materia['NOM_MATERIA'] ?></td>
					<td><?php echo $materia['CREDITOS'] ?></td>
					<td><?php echo $materia['COD_REQUISITO'] ?></td>
					<td><?php echo $materia['PERIODO'] ?>° Cuatri</td>
					

				</tr>
				<?php 
				
			}?>
				
				<tr class="heading">
					<td></td>
					<td>Total de Créditos</td>
					<td><?php echo $materia['TOTALCREDITOSPLAN'];?></td>
				</tr>
				
				<tr class="item">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					
					<td></td>

				</tr>
				<tr class="item">
					<td>_____________________</td>
					<td>_____________________</td>
					<td>_____________________</td>
					<td></td>
					
					<td></td>

				</tr>
				<tr class="item">
					<td>Firma Universidad</td>
					<td>Firma Gerente</td>
					<td>Sello</td>
					<td></td>
					
					<td></td>

				</tr>

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
$dompdf->stream($materia['NOM_PLAN'].".pdf", array("Attachment" => false))

?>