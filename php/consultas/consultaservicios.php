<?php
	function lista_servicios(){		
		include('php/conexion.php');	
		$sql="SELECT *  FROM  `servicios` ";
		
		return $result=$mysqli->query($sql); 
	}

	function cat_servicios($id){		
		include('php/conexion.php');	
		$sql="SELECT *  FROM  `catservicios` c JOIN servicios s ON (c.id_servicio=s.id_servicio) where c.id_servicio='$id'";
		
		return $result=$mysqli->query($sql); 
	}


?>