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
	
	if ($i=='UDT') {
		$msj='';
		$codigo=$_POST['codigo'];
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
		
		$sql="UPDATE `cliente` SET 
		`nombre_cliente`='$nombre',
		`apellido_cliente`='$apellido',
		`cedula_cliente`='$cedula',
		`fechanacimiento_cliente`='$fecha',
		`ciudad_cliente`='$ciudad',
		`sector_cliente`='$sector',
		`calle_cliente`='$calle',
		`numcasa_cliente`='$numcasa',
		`telefono_cliente`='$telefono',
		`correo_cliente`='$correo'
		 WHERE id_cliente ='$codigo' ";
		
		if ($mysqli->query($sql)){
			$msj='successudt';
		}
		else{
			$msj='errorudt';
			echo "error:".mysqli_error($mysqli);
		}
		header("Location: ../../menucliente.php?s=".$msj);
	}
	
?>