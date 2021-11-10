<?php



/* Connect To Database*/
include("../config/db.php");
include("../config/conexion.php");

    //Incluimos la librería
    require_once __DIR__.'/../vendor/autoload.php';
        
    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    ob_start();
    include './documentos/ver_factura.php'; 
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    $dompdf->render();
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=documento.pdf");
    $file_name = md5(rand()) . '.pdf';
    $file=$dompdf->output();
    echo $file;
    file_put_contents($file_name, $file);

	

?>