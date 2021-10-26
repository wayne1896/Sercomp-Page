<?php 
	include('../conexion.php');	
	$i='';
	if(isset($_GET['accion'])){
		$i=$_GET['accion'];
	}

if ($i=='INS') {
	$msj='';
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$cedula=$_POST['cedula'];
	$fecha=$_POST['fechanacimiento'];
	$ciudad=$_POST['ciudad'];
	$sector=$_POST['sector'];
	$calle=$_POST['calle']; 
	$numcasa=$_POST['numcasa'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$clave=$_POST['clave'];
	
	$sql="
	INSERT INTO `cliente` ( `nombre_cliente`, `apellido_cliente`, `cedula_cliente`, `fechanacimiento_cliente`, 
	`ciudad_cliente`, `sector_cliente`, `calle_cliente`, `numcasa_cliente`, `telefono_cliente`, `correo_cliente`, 
	`clave_cliente`, `deuda_cliente`, `estado_cliente`)
	VALUES (
   '$nombre',
   '$apellido',
   '$cedula',
   '$fecha',
   '$ciudad',
   '$sector',
   '$calle',
   '$numcasa',
   '$telefono',
   '$correo',
   '$clave',
   '0',
   'Activo'
	)";
	
	
	if ($mysqli->query($sql)){
		$msj='success';
	}
	else{
		$msj='error';
		echo "error:".mysqli_error($mysqli);
	}
		header("Location: ../../index.php?s=".$msj);
	}
	
?>