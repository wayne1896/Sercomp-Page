<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	/* Connect To Database*/
	include("../config/db.php");
	include("../config/conexion.php");
	$id_factura= intval($_GET['id_factura']);
	$sql_count=mysqli_query($con,"select * from factura where id_factura='".$id_factura."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('Factura no encontrada')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	$sql_factura=mysqli_query($con,"select * from factura where id_factura='".$id_factura."'");
	$rw_factura=mysqli_fetch_array($sql_factura);
	$numero_factura=$rw_factura['numero_factura'];
	$id_cliente=$rw_factura['id_cliente'];
	$id_vendedor=$rw_factura['id_empleado'];
	$fecha_factura=$rw_factura['fecha_factura'];
	$condiciones=$rw_factura['tipodepago_factura'];
	
    // get the HTML
     ob_start();
     include 'res/ver_factura_html.php';
    $content = ob_get_clean();

	use Dompdf\Dompdf;
	   
			
			// init HTML2PDF
			$dompdf = new Dompdf('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
			// display the full page
			$dompdf->loadHtml(utf8_decode($content));
			$dompdf->render();
			header("Content-type: application/pdf");
			header("Content-Disposition: inline; filename=documento.pdf");
		  
			// lanzamos a render
		
		
			echo $dompdf->output();