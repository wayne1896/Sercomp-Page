<?php
	function lista_ciudad(){		
		include('php\conexion.php');	
		$sql="SELECT * FROM ciudad";
		
		return $result=$mysqli->query($sql); 
	}
	function lista_sector($id){		
		include('php\conexion.php');	
		$sql="SELECT * FROM sector s JOIN ciudad c ON (s.id_ciudad=c.id_ciudad) where s.id_ciudad='$id'";
		
		return $result=$mysqli->query($sql); 
	}
	function lista_calle($id){		
		include('php\conexion.php');	
		$sql="SELECT * FROM calle c JOIN sector s ON (c.id_sector=s.id_sector) where c.id_sector='$id'";
		
		return $result=$mysqli->query($sql); 
	}




?>