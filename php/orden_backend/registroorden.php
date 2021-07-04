<?php
session_start();
include_once('../dbconect.php');


	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$servicios=$_POST['servicio'];
		$detalle=$_POST['descripcion'];
        $nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];
		$ciudad=$_POST['ciudad'];
        $sector=$_POST['sector'];
        $calle=$_POST['calle']; 
        $numcasa=$_POST['numcasa'];
		$lat=$_POST['lat'];
		$long=$_POST['long'];
		$fecha=$_POST['fechaorden'];

			$sql = "UPDATE orden SET descripcion_orden = '$detalle', servicio_orden = '$servicios', ciudad_orden = '$ciudad',
			 sector_orden = '$sector', calle_orden = '$calle', numcasa_orden = '$numcasa', lat = '$lat', lon = '$long'
			 , fecha_orden = '$fecha', nombre_orden = '$nombre', telefono_orden = '$servicios' , id_servicio = '$servicios'  WHERE id_orden = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Orden actualizada correctamente' : 'No se puso actualizar Orden';

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

	header('location: ../../Ordensin.php');


	if(isset($_POST['asignar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
		$empleado=$_POST['empleado'];

			$sql = "UPDATE orden SET id_empleado = '$empleado' , estado_orden = 'Asignada'  WHERE id_orden = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Orden Asignada' : 'No se puso actualizar Orden';

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

	header('location: ../../Ordensin.php');


		
	?>































