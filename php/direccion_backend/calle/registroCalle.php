<?php
session_start();
include_once('../../dbconect.php');
$id1=$_POST['idsector'];
if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		
			//hacer uso de una declaración preparada para prevenir la inyección de sql
			$stmt = $db->prepare("INSERT INTO `calle` ( `nombre_calle`, `estado_calle`, `id_sector`) VALUES (:nombre,:estado,:idsector)");
			//instrucción if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] ,  ':idsector' => $_POST['idsector']
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
	
	header('location: ../../../calle.php?id='.$id1);

	


	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id1=$_POST['idsector'];
			$id = $_GET['id'];
			$nombre=$_POST['nombre'];

			$sql = "UPDATE calle SET nombre_calle = '$nombre' WHERE id_calle = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Calle actualizada correctamente' : 'No se puso actualizar Calle';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Calle registrada';
	}
	$id1=$_POST['idsector'];

	header('location: ../../../calle.php?id='.$id1);

		
	?>































