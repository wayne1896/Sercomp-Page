<?php
session_start();
include_once('../dbconect.php');
	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "UPDATE cliente SET estado_cliente = CASE
			when estado_cliente= 'Activo' then 'Desactivado'
			when estado_cliente = 'Desactivado' then 'Activo'
			end
			WHERE id_cliente = '".$_GET['id']."' ";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Se cambio el estado del cliente' : 'Hubo un error al borrar empleado';
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

	header('location: ../../clientes.php');

?>
