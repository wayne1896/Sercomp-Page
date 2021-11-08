<?php
	function lista_inventario(){		
		include('php\conexion.php');	
		$sql="SELECT * FROM inventario";
		
		return $result=$mysqli->query($sql); 
	}

	



?>