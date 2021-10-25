<?php
	



	$id_factura= intval($_GET['id_orden']);
	$sql_count=mysqli_query($con,"select * from orden where id_orden='".$id_factura."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('Orden no encontrada')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	$sql_factura=mysqli_query($con,"SELECT * FROM orden o 
	join cliente e on (o.id_cliente=e.id_cliente) join servicios g on (o.servicio_orden=g.id_servicio) 
	join empleado f on (o.id_empleado=f.id_empleado) join ciudad c on (o.ciudad_orden=c.id_ciudad) 
	
			join sector s on (o.sector_orden=s.id_sector) JOIN calle b on (o.calle_orden=b.id_calle) where o.id_orden='".$id_factura."'");
	$rw_factura=mysqli_fetch_array($sql_factura);
	$numero_factura=$rw_factura['id_orden'];
	$id_cliente=$rw_factura['id_cliente'];
	$id_vendedor=$rw_factura['id_empleado'];
	$fecha_factura=$rw_factura['fecha_orden'];
	$condiciones=$rw_factura['proceso_orden'];
	
	
    // get the HTML
     ob_start();
     include 'res/ver_orden_html.php';
    $content = ob_get_clean();

	use Dompdf\Dompdf;
	   
			
			// init HTML2PDF
			$dompdf = new Dompdf('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
			// display the full page
			$dompdf->loadHtml(utf8_decode($content));


			$dompdf->render();
			header("Content-type: application/pdf");
			header("Content-Disposition: inline; filename=documento.pdf");
		
		
		
		
			echo $dompdf->output();
			
			
	?>