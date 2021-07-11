<?php
	function lista_servicios(){		
		include('php/conexion.php');	
		$sql="SELECT *  FROM  `servicios` where estado_servicio='Activo'";
		
		return $result=$mysqli->query($sql); 
	}


?>