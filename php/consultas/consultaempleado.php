<?php
	function lista_empleado(){		
		include('php\conexion.php');	
		$sql="SELECT c.id_empleado, c.nombre_empleado, c.apellido_empleado, c.cedula_empleado, 
        c.fechanacimiento_empleado, s.nombre_ciudad, e.nombre_sector, u.nombre_calle , c.numcasa_empleado, 
        c.telefono_empleado, c.correo_empleado, n.cargo, 
        c.estado_empleado  FROM  `empleado` c JOIN ciudad s ON (c.ciudad_empleado=s.id_ciudad) 
        JOIN sector e ON (c.ciudad_empleado=e.id_sector) JOIN calle u ON (c.calle_empleado=u.id_calle)
        JOIN nomina n ON (c.cargo_empleado=n.id_nomina)";
		
		return $result=$mysqli->query($sql); 
	}


?>