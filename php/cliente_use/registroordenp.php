<?php 
	include('../conexion.php');	
	
	$i='';
	if(isset($_GET['accion'])){
		$i=$_GET['accion'];
	}

	if ($i=='INS') {
		
		$msj='';
		
		$servicios=$_POST['servicio'];
		$detalle=$_POST['descripcion'];
        $nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];
		$ciudad=$_POST['ciudad'];
        $sector=$_POST['sector'];
        $calle=$_POST['calle']; 
        $numcasa=$_POST['numcasa'];
		$lat=$_POST['lat'];
		$long=$_POST['long'];
		$fecha=date('y-m-d');
		
		$sql="
		INSERT INTO `orden`( `descripcion_orden`, `servicio_orden`, `ciudad_orden`, `sector_orden`, `calle_orden`, `numcasa_orden`, 
		`lat`, `lon`, `fecha_orden`, `estado_orden`, `telefono_orden`, `id_cliente`, `id_empleado`, `id_servicio`) 
		VALUES (
	   '$detalle',
	   '$servicios',
       '$ciudad',
       '$sector',
       '$calle',
	   '$numcasa',
	   '$lat',
	   '$long',
	   '$fecha',
	   'Sin Asignar',
	   '$telefono',
       '$nombre',
	   '0',
	   '$servicios'
		)";
		
		
		if ($mysqli->query($sql)){
			$msj='success';
		}
		else{
			$msj='error';
			echo "error:".mysqli_error($mysqli);
		}
		header("Location: ordensin.php?s=".$msj);
	}
	
?>