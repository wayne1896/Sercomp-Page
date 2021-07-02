<?php
 $con = new mysqli("localhost", "root", "", "tesis");
 
 if(!$con)
 {
	 die(' Fallo al conectar a MySQL'.mysqli_error($con));
 }

?>
