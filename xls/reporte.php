<?php 
include('conexion.php');//CONEXION A LA BD

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

if(isset($_POST['generar_reporte']))
{
	// NOMBRE DEL ARCHIVO Y CHARSET
	header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=nombre_archivo.xls');
	// SALIDA DEL ARCHIVO

	$reporteCsv=$conexion->query("SELECT * FROM cliente ORDER BY `id` ASC");
	while($filaR= $reporteCsv->fetch_assoc())
			{
				<tr>
					<td><?php echo $filaR['id']; ?></td>
					<td><?php echo $filaR['nombre']; ?></td>
					<td><?php echo $filaR['nombre']; ?></td>
					<td><?php echo $filaR['nombre']; ?></td>
					<td><?php echo $filaR['nombre']; ?></td>
				</tr>	

		
		}

	


?>