<?php
session_start();
include_once('../dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		
			//hacer uso de una declaración preparada para prevenir la inyección de sql
			$stmt = $db->prepare("INSERT INTO `cliente` ( `nombre_cliente`, `apellido_cliente`, `cedula_cliente`, `fechanacimiento_cliente`, 
			`ciudad_cliente`, `sector_cliente`, `calle_cliente`, `numcasa_cliente`, `telefono_cliente`, `correo_cliente`, 
			`clave_cliente`, `deuda_cliente`, `estado_cliente`) VALUES (:nombre, :apellido, :cedula, :fechanacimiento, :ciudad, :sector, :calle, :numcasa,
			 :telefono, :correo, :clave, :deuda ,:estado)");
			//instrucción if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] , ':apellido' => $_POST['apellido'],
			':cedula' => $_POST['cedula'] , ':fechanacimiento' => $_POST['fechanacimiento'] , ':ciudad' => $_POST['ciudad'] ,
			':sector' => $_POST['sector'] ,  ':calle' => $_POST['calle'],':numcasa' => $_POST['numcasa'] , 
			 ':telefono' => $_POST['telefono'], ':correo' => $_POST['correo'], ':clave' => $_POST['clave']
			 , ':deuda' =>'0', ':estado' =>"Activo")) ) ?
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
	
	header('location: ../../clientes.php');

	


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
			$correo=$_POST['correo'];
			$clave=$_POST['clave'];

			$sql = "UPDATE cliente SET nombre_cliente = '$nombre', apellido_cliente = '$apellido', cedula_cliente = '$cedula',
			 fechanacimiento_cliente = '$fecha', ciudad_cliente = '$ciudad', sector_cliente = '$sector', calle_cliente = '$calle', numcasa_cliente = '$numcasa'
			 , telefono_cliente = '$telefono', correo_cliente = '$correo' WHERE id_cliente = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Cliente actualizado correctamente' : 'No se puso actualizar Cliente';

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

	header('location: ../../clientes.php');

		
	?>































