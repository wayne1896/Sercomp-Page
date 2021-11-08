<?php
session_start();

include_once('../../dbconect.php');
	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		$id1=$_POST['idservicio'];
		
		try{
			$sql = "UPDATE catservicios SET estado_catservicio = CASE
			when estado_catservicio= 'Activo' then 'Desactivado'
			when estado_catservicio = 'Desactivado' then 'Activo'
			end
			WHERE id_catservicio = '".$_GET['id']."' ";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Se cambio el estado de la Subservicio' : 'Hubo un error al borrar empleado';
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
	header('location: ../../../subservicios.php?id='.$id1);
	

?>
