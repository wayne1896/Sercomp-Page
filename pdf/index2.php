<?php



/* Connect To Database*/
include("../config/db.php");
include("../config/conexion.php");


    //Incluimos la librería
    require_once __DIR__.'/../vendor/autoload.php';
        
    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    use Dompdf\Options;
    $options=new Options();
    $options-> set('isRemoteEnabled',true);
    $dompdf = new Dompdf($options);
   
    ob_start();
    include './documentos/ver_orden.php'; 
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    $dompdf->render();
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=documento.pdf");
  
    $file=$dompdf->output();
    echo $file;
    

	
  
?>