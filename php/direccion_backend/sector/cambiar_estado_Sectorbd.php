<?php
session_start();

include_once('../../dbconect.php');
	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		$id1=$_POST['idciudad'];
		
		try{
			$sql = "UPDATE sector SET estado_sector = CASE
			when estado_sector= 'Activo' then 'Desactivado'
			when estado_sector = 'Desactivado' then 'Activo'
			end
			WHERE id_sector = '".$_GET['id']."' ";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Se cambio el estado de la sector' : 'Hubo un error al borrar empleado';
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
	header('location: ../../../sector.php?id='.$id1);
	

?>
