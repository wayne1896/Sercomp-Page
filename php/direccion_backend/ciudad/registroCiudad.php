<?php
session_start();
include_once('../../dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		
			//hacer uso de una declaración preparada para prevenir la inyección de sql
			$stmt = $db->prepare("INSERT INTO `ciudad` ( `nombre_ciudad`, `estado_ciudad`) VALUES (:nombre,:estado)");
			//instrucción if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'],  ':estado' =>"Activo")) ) ?
			  '' : '';	
		
		}
		catch(PDOException $e){
			$_SESSION['message'] ='Algo salió mal. ';
		}
	
		//cerrar la conexion
		$database->close();
	}
	
	else{
		$_SESSION['message'] = '';
	}
	
	header('location: ../../../ciudad.php');

	


	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id1=$_POST['idciudad'];
			$id = $_GET['id'];
			$nombre=$_POST['nombre'];

			$sql = "UPDATE ciudad SET nombre_ciudad = '$nombre' WHERE id_ciudad = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Ciudad actualizado correctamente' : 'No se puso actualizar Sector';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Ciudad registrada';
	}
	$id1=$_POST['idciudad'];

	header('location: ../../../ciudad.php');

		
	?>































