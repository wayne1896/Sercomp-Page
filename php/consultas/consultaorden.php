<?php
	function lista_orden_asignada(){		
		include('php\conexion.php');	
		$sql="SELECT * FROM orden o 
join cliente e on (o.id_cliente=e.id_cliente) join servicios g on (o.servicio_orden=g.id_servicio) 
join empleado f on (o.id_empleado=f.id_empleado) join ciudad c on (o.ciudad_orden=c.id_ciudad) 

        join sector s on (o.sector_orden=s.id_sector) JOIN calle b on (o.calle_orden=b.id_calle) where o.estado_orden='Asignada' ";
		
		return $result=$mysqli->query($sql); 
	}

	function lista_orden_sinasignar(){		
		include('php\conexion.php');	
		$sql="SELECT * FROM orden o 
join cliente e on (o.id_cliente=e.id_cliente) join servicios g on (o.servicio_orden=g.id_servicio) 
 join ciudad c on (o.ciudad_orden=c.id_ciudad) 

        join sector s on (o.sector_orden=s.id_sector) JOIN calle b on (o.calle_orden=b.id_calle) where o.estado_orden='Sin Asignar' ";
		
		return $result=$mysqli->query($sql); 
	}

	function perfilordenasig($id2){
        include('..\conexion.php');	
		$sql="SELECT * FROM orden o join cliente e on (o.id_cliente=e.id_cliente) join servicios g on (o.servicio_orden=g.id_servicio) 
		join ciudad c on (o.ciudad_orden=c.id_ciudad) 
		join sector s on (o.sector_orden=s.id_sector) JOIN calle b on (o.calle_orden=b.id_calle) 
         where e.correo_cliente='$id2' and o.estado_orden='Asignada'";
		return $result=$mysqli->query($sql); 
	}	
	function perfilordensin($id2){
        include('..\conexion.php');	
		$sql="SELECT * FROM orden o join cliente e on (o.id_cliente=e.id_cliente) join servicios g on (o.servicio_orden=g.id_servicio) 
		join ciudad c on (o.ciudad_orden=c.id_ciudad) 
		join sector s on (o.sector_orden=s.id_sector) JOIN calle b on (o.calle_orden=b.id_calle) 
         where e.correo_cliente='$id2' and o.estado_orden='Sin Asignar'";
		return $result=$mysqli->query($sql); 
	}	


?>