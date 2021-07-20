<?php
	function lista_clientes(){		
		include('php\conexion.php');	
		$sql="SELECT c.id_cliente, c.nombre_cliente, c.apellido_cliente, c.cedula_cliente, 
        c.fechanacimiento_cliente, s.nombre_ciudad, e.nombre_sector, u.nombre_calle , c.numcasa_cliente, 
        c.telefono_cliente, c.correo_cliente, c.deuda_cliente, 
        c.estado_cliente  FROM cliente c JOIN ciudad s ON (c.ciudad_cliente=s.id_ciudad) 
        JOIN sector e ON (c.sector_cliente=e.id_sector) JOIN calle u ON (c.calle_cliente=u.id_calle)";
		
		return $result=$mysqli->query($sql); 
	}

	function perfilcliente($id2){
        include('..\conexion.php');	
		$sql="SELECT * FROM  cliente c JOIN ciudad s ON (c.ciudad_cliente=s.id_ciudad) 
        JOIN sector e ON (c.sector_cliente=e.id_sector) JOIN calle u ON (c.calle_cliente=u.id_calle) where c.correo_cliente='$id2'";
		return $result=$mysqli->query($sql); 
	}	



?>