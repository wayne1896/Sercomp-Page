<?php
session_start();

include_once('../../dbconect.php');
	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		$id1=$_POST['idsector'];
		
		try{
			$sql = "UPDATE calle SET estado_calle = CASE
			when estado_calle= 'Activo' then 'Desactivado'
			when estado_calle = 'Desactivado' then 'Activo'
			end
			WHERE id_calle = '".$_GET['id']."' ";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Se cambio el estado de la calle' : 'Hubo un error al borrar empleado';
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
	header('location: ../../../calle.php?id='.$id1);
	

?>
