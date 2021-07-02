<?php
session_start();
include_once('../dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		
			//hacer uso de una declaración preparada para prevenir la inyección de sql
			$stmt = $db->prepare("INSERT INTO `servicios` ( `nombre_servicio`,`descripcion_servicio`, `precio_servicio`, 
			 `estado_servicio`) VALUES (:nombre, :descripcion, :costo ,:estado)");
			//instrucción if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] , 'descripcion' => $_POST['Descripcion'],
			':costo' => $_POST['costo'],  ':estado' =>"Activo")) ) ?
			  'Cliente guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
		
		}
		catch(PDOException $e){
			$_SESSION['message'] ='Algo salió mal. No se puede agregar el Cliente';
		}
	
		//cerrar la conexion
		$database->close();
	}
	
	else{
		$_SESSION['message'] = 'Llene el formulario';
	}
	
	header('location: ../../servicios.php');

	


	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nombre=$_POST['nombre'];
			$descripcion=$_POST['Descripcion'];
			$costo=$_POST['costo'];

			$sql = "UPDATE servicios SET nombre_servicio = '$nombre', descripcion_servicio = '$descripcion', precio_servicio = '$costo' WHERE id_servicio = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Servicio actualizado correctamente' : 'No se puso actualizar Servicio';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Servicio registrado';
	}

	header('location: ../../servicios.php');

		
	?>































