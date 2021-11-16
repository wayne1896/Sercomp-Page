<?php
	function lista_cargo(){		
		include('php/conexion.php');	
		$sql="SELECT *  FROM  `nomina` ";
		
		return $result=$mysqli->query($sql); 
	}




?>