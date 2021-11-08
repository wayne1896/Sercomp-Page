<?php
session_start();
include_once('../../dbconect.php');
$id1=$_POST['idservicio'];
if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		
			//hacer uso de una declaración preparada para prevenir la inyección de sql
			$stmt = $db->prepare("INSERT INTO `catservicios` ( `nombre_catservicio`, `descripcion_catservicio`,`precio_catservicio`, `id_servicio`) 
			VALUES (:nombre,:descripcion,:precio,:idservicio)");
			//instrucción if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] ,  ':descripcion' => $_POST['descripcion'],  ':precio' => $_POST['precio']
			 ,  ':idservicio' => $_POST['idservicio'])) ) ?
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
	
	header('location: ../../../subservicios.php?id='.$id1);

	


	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id1=$_POST['idservicio'];
			$id = $_GET['id'];
			$nombre=$_POST['nombre'];
			$descripcion=$_POST['descripcion'];
			$precio=$_POST['precio'];

			$sql = "UPDATE catservicios SET nombre_catservicio = '$nombre',
			descripcion_catservicio = '$descripcion', precio_catservicio = '$precio'  
			WHERE id_catservicio = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Subservicio actualizado correctamente' : 'No se puso actualizar Subservicio';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Subservicio Registrado';
	}
	$id1=$_POST['idservicio'];

	header('location: ../../../subservicios.php?id='.$id1);

		
	?>































