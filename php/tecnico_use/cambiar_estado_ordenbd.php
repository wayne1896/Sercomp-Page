<?php
session_start();
include_once('../dbconect.php');
	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "UPDATE orden SET proceso_orden = CASE
			when proceso_orden= 'Sin empezar' then 'En proceso'
			when proceso_orden = 'En proceso' then 'Finalizada'
			when proceso_orden = 'Finalizada' then 'Finalizada'
			end
			WHERE id_orden = '".$_GET['id']."' ";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Se cambio el estado de la orden' : 'La orden ya esta finalizada';
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

	header('location: ordenasig.php');

?>
