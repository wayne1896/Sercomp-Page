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
			$_SESSION['message'] ='Registro almacenado correctamente';
		}
		else{
			$_SESSION['message'] ='Imposible almacenar el registro'.mysqli_error($mysqli);
			echo "error:".mysqli_error($mysqli);
		}
		header("Location: ordensin.php");
	}
	
	if ($i=='UDP') {
		
		$msj='';
		$codigo=$_POST['codigo'];
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
		UPDATE `orden` SET 
		`descripcion_orden`='$detalle',
		`servicio_orden`='$servicios',
		`ciudad_orden`='$ciudad',
		`sector_orden`='$sector',
		`calle_orden`='$calle',
		`numcasa_orden`='$numcasa'
		
		WHERE 
		id_orden ='$codigo'
		";
		
		
		if ($mysqli->query($sql)){
			$_SESSION['message'] ='Registro actualizado correctamente';
		}
		else{
			$_SESSION['message'] ='Imposible actualizar el registro'.mysqli_error($mysqli);
			echo "error:".mysqli_error($mysqli);
		}
		header("Location: ordensin.php?s=".$msj);
	}
	
	
?>