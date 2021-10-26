<?php

	session_start();
	
    require_once __DIR__.'/../../vendor/autoload.php';
	/* Connect To Database*/
	include("../config/db.php");
	include("../config/conexion.php");
	$session_id= session_id();
	$sql_count=mysqli_query($con,"select * from tmp where session_id='".$session_id."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No hay productos agregados a la factura')</script>";
	echo "<script>window.close();</script>";
	exit;
	}

	
		
	//Variables por GET
	$id_cliente=intval($_GET['id_cliente']);
	$id_vendedor=intval($_GET['id_vendedor']);
	$condiciones=mysqli_real_escape_string($con,(strip_tags($_REQUEST['condiciones'], ENT_QUOTES)));

	//Fin de variables por GET
	$sql=mysqli_query($con, "select LAST_INSERT_ID(numero_factura) as last from factura order by id_factura desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
	$numero_factura=$rw['last']+1;	
    // get the HTML
     ob_start();
     include 'res/factura_html.php';
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
