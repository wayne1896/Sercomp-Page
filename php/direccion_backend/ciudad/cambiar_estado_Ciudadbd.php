<?php
session_start();
include_once('../../dbconect.php');
	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "UPDATE ciudad SET estado_ciudad = CASE
			when estado_ciudad= 'Activo' then 'Desactivado'
			when estado_ciudad = 'Desactivado' then 'Activo'
			end
			WHERE id_ciudad = '".$_GET['id']."' ";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Se cambio el estado de la ciudad' : 'Hubo un error al borrar empleado';
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

	header('location: ../../../ciudad.php');

?>
