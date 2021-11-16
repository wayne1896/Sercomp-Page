<?php
session_start();
include_once('../dbconect.php');
	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "UPDATE inventario SET estado_producto = CASE
			when estado_producto= 'Stock' then 'Agotado'
			when estado_producto = 'Agotado' then 'Stock'
			end
			WHERE id_producto = '".$_GET['id']."' ";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Se cambio el estado del producto' : 'Hubo un error al borrar producto';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccionar producto para eliminar primero';
	}

	header('location: ../../inventario.php');

?>
