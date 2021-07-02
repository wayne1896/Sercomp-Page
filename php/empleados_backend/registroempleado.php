<?php
session_start();
include_once('../dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		
			//hacer uso de una declaración preparada para prevenir la inyección de sql
			$stmt = $db->prepare("INSERT INTO `empleado` ( `nombre_empleado`, `apellido_empleado`, `cedula_empleado`, `fechanacimiento_empleado`, 
			`ciudad_empleado`, `sector_empleado`, `calle_empleado`, `numcasa_empleado`, `telefono_empleado`, `correo_empleado`, 
			`clave_empleado`, `cargo_empleado`, `estado_empleado`) VALUES (:nombre, :apellido, :cedula, :fechanacimiento, :ciudad, :sector, :calle, :numcasa,
			 :telefono, :correo, :clave, :deuda ,:estado)");
			//instrucción if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] , ':apellido' => $_POST['apellido'],
			':cedula' => $_POST['cedula'] , ':fechanacimiento' => $_POST['fechanacimiento'] , ':ciudad' => $_POST['ciudad'] ,
			':sector' => $_POST['sector'] ,  ':calle' => $_POST['calle'],':numcasa' => $_POST['numcasa'] , 
			 ':telefono' => $_POST['telefono'], ':correo' => $_POST['correo'], ':clave' => $_POST['clave']
			 , ':cargo' => $_POST['cargo'], ':estado' =>"Activo")) ) ?
			  'Cliente guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
		
		}
		catch(PDOException $e){
			$_SESSION['message'] ='Algo salió mal. No se puede agregar el Cliente';
		}
	
		//cerrar la conexion
		$database->close();
	}
	
	else{
		$_SESSION['message'] = 'Llene el formulario';
	}
	
	header('location: ../../Empleado.php');

	


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
			$clave=$_POST['clave'];

			$sql = "UPDATE empleado SET nombre_empleado = '$nombre', apellido_empleado = '$apellido', cedula_empleado = '$cedula',
			 fechanacimiento_empleado = '$fecha', ciudad_empleado = '$ciudad', sector_empleado = '$sector', calle_empleado = '$calle', numcasa_empleado = '$numcasa'
			 , telefono_empleado = '$telefono',cargo_empleado='$cargo', correo_empleado = '$correo' WHERE id_empleado = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Empleado actualizado correctamente' : 'No se puso actualizar Cliente';

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

		
	?>































