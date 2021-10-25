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
	
?>