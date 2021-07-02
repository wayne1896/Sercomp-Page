<?php
session_start();
include_once('../dbconect.php');
	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "UPDATE empleado SET estado_empleado = CASE
			when estado_empleado= 'Activo' then 'Desactivado'
			when estado_empleado = 'Desactivado' then 'Activo'
			end
			WHERE id_empleado = '".$_GET['id']."' ";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Se cambio el estado del empleado' : 'Hubo un error al borrar empleado';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccionar miembro para eliminar primero';
	}

	header('location: ../../Empleado.php');

?>
