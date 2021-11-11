<?php
session_start();
include_once('../dbconect.php');
include('../conexion.php');	


	


	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nombre=$_POST['nombre'];
			$apellido=$_POST['apellido'];
			$cedula=$_POST['cedula'];
			$fecha=$_POST['fechanacimiento'];
			$ciudad=$_POST['ciudad'];
			$sector=$_POST['sector'];
			$calle=$_POST['calle']; 
			$numcasa=$_POST['numcasa'];
			$telefono=$_POST['telefono'];
			$cargo=$_POST['cargo'];
			$correo=$_POST['correo'];
			$usuario=$_POST['usuario'];
			$clave=$_POST['clave'];

			$sql = "UPDATE empleado SET nombre_empleado = '$nombre', apellido_empleado = '$apellido', cedula_empleado = '$cedula',
			 fechanacimiento_empleado = '$fecha', ciudad_empleado = '$ciudad', sector_empleado = '$sector', calle_empleado = '$calle', numcasa_empleado = '$numcasa'
			 , telefono_empleado = '$telefono',cargo_empleado='$cargo', correo_empleado = '$correo' , usuario = '$usuario' WHERE id_empleado = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Empleado actualizado correctamente':"" ;

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: ../../Empleado.php');

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
		$usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
		
		$sql="
		INSERT INTO `empleado`( `nombre_empleado`, `apellido_empleado`, `cedula_empleado`, 
		`fechanacimiento_empleado`, `ciudad_empleado`, `sector_empleado`, `calle_empleado`, 
		`numcasa_empleado`, `telefono_empleado`, `correo_empleado`, `usuario` , `clave_empleado`, `cargo_empleado`,
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
	   '$usuario',
       '$clave',
	   '$cargo',
	   '$rol',
	   'Activo',
	   '$cargo'
		)";
		
		
		if ($mysqli->query($sql)){
			$_SESSION['message'] ='Registro almacenado correctamente';
		}
		else{
			$_SESSION['message'] ='Imposible almacenar el registro'.mysqli_error($mysqli);
			echo "error:".mysqli_error($mysqli);
		}
		header("Location: ../../empleado.php");
	}	



	?>































