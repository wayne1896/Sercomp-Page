<?php	
	//connection
    $conn = new mysqli('localhost', 'root', '', 'tesis');

$sql1 = "UPDATE `factura` SET `estado_factura`='Pagado' WHERE id_factura='".$_GET['id']."'" ;
										  $query1 = $conn->query($sql1);

                                          
                                          header("Location: facturaspagadas.php");		 
									
			?>