<?php


    //Incluimos la librería
    require_once __DIR__.'/../vendor/autoload.php';
    
    // reference the Dompdf namespace
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    ob_start();
    include './documentos/factura.php'; 
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    $dompdf->render();
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=documento.pdf");
    echo $dompdf->output();
?>
