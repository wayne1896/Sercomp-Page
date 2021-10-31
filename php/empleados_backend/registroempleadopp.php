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
		$cargo=$_POST['cargo'];
		$rol=$_POST['rol'];
		$ciudad=$_POST['ciudad'];
        $sector=$_POST['sector'];
        $calle=$_POST['calle']; 
        $numcasa=$_POST['numcasa'];
		$telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $clave=$_POST['clave'];
		
		$sql="
		INSERT INTO `empleado`( `nombre_empleado`, `apellido_empleado`, `cedula_empleado`, 
		`fechanacimiento_empleado`, `ciudad_empleado`, `sector_empleado`, `calle_empleado`, 
		`numcasa_empleado`, `telefono_empleado`, `correo_empleado`, `clave_empleado`, `cargo_empleado`,
		 `ocupacion_empleado`, `estado_empleado`, `id_nomina`)
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
	   '$cargo',
	   '$rol',
	   'Activo',
	   $cargo'
		)";
		
		
		if ($mysqli->query($sql)){
			$msj='success';
		}
		else{
			$msj='error';
			echo "error:".mysqli_error($mysqli);
		}
		header("Location: ../../empleado.php?s=".$msj);
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
		
		$sql="UPDATE `empleado` SET 
		`nombre_empleado`='$nombre',
		`apellido_empleado`='$apellido',
		`cedula_empleado`='$cedula',
		`fechanacimiento_empleado`='$fecha',
		`ciudad_empleado`='$ciudad',
		`sector_empleado`='$sector',
		`calle_empleado`='$calle',
		`numcasa_empleado`='$numcasa',
		`telefono_empleado`='$telefono',
		`correo_empleado`='$correo'
		 WHERE id_empleado ='$codigo' ";
		
		if ($mysqli->query($sql)){
			$msj='successudt';
		}
		else{
			$msj='errorudt';
			echo "error:".mysqli_error($mysqli);
		}
		header("Location: ../../menutecnico.php?s=".$msj);
	}
	
?>