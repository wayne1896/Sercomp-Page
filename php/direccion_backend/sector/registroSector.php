<?php
session_start();
include_once('../../dbconect.php');
$id1=$_POST['idciudad'];
if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		
			//hacer uso de una declaración preparada para prevenir la inyección de sql
			$stmt = $db->prepare("INSERT INTO `sector` ( `nombre_sector`, `estado_sector`, `id_ciudad`) VALUES (:nombre,:estado,:idciudad)");
			//instrucción if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] ,  ':idciudad' => $_POST['idciudad']
			 ,  ':estado' =>"Activo")) ) ?
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
	
	header('location: ../../../sector.php?id='.$id1);

	


	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id1=$_POST['idciudad'];
			$id = $_GET['id'];
			$nombre=$_POST['nombre'];

			$sql = "UPDATE sector SET nombre_sector = '$nombre' WHERE id_sector = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Sector actualizado correctamente' : 'No se puso actualizar Sector';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Sector registrado';
	}
	$id1=$_POST['idciudad'];

	header('location: ../../../sector.php?id='.$id1);

		
	?>































