<?php

	function extraerorden($id){		
		include('..\conexion.php');	
		$sql="SELECT * FROM orden o 
join cliente e on (o.id_cliente=e.id_cliente) join servicios g on (o.servicio_orden=g.id_servicio) 
 join ciudad c on (o.ciudad_orden=c.id_ciudad) 
join sector s on (o.sector_orden=s.id_sector) JOIN calle b on (o.calle_orden=b.id_calle) where id_orden='$id' ";
		
		return $result=$mysqli->query($sql); 
	}

	
?>