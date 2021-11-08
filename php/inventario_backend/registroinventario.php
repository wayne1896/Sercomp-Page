<?php
session_start();
include_once('../dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		
			//hacer uso de una declaración preparada para prevenir la inyección de sql
			$stmt = $db->prepare("INSERT INTO `inventario`( `nombre_producto`, `descripcion_producto`, `cantidad_producto`, 
			`costo_producto`, `estado_producto`) VALUES (:nombre, :descripcion, :cantidad, :costo,:estado)");
			//instrucción if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] , ':descripcion' => $_POST['descripcion'],
			':cantidad' => $_POST['cantidad'] ,  ':costo' => $_POST['costo'], ':estado' =>"Stock")) ) ?
			  'Producto guardado correctamente' : 'Algo salió mal. No se puede agregar producto';	
		
		}
		catch(PDOException $e){
			$_SESSION['message'] ='Algo salió mal. No se puede agregar el Producto';
		}
	
		//cerrar la conexion
		$database->close();
	}
	
	else{
		$_SESSION['message'] = '';
	}
	
	header('location: ../../inventario.php');

	


	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nombre=$_POST['nombre'];
			$descripcion=$_POST['descripcion'];
			$cantidad=$_POST['cantidad'];
			$costo=$_POST['costo'];
			

			$sql = "UPDATE inventario SET nombre_producto = '$nombre', descripcion_producto = '$descripcion', cantidad_producto = '$cantidad',
			 costo_producto = '$costo' WHERE id_producto = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Producto actualizado correctamente' : 'No se puso actualizar Producto';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: ../../inventario.php');

		
	?>































