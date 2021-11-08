<?php
session_start();
include_once('../dbconect.php');

include('../conexion.php');	
	

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nombre=$_POST['nombre'];
			$apellido=$_POST['apellido'];
			$cedula=$_POST['cedula'];
			$fecha=$_POST['fechanacimiento'];
			$ciudad=$_POST['ciudad'];
			$sector=$_POST['sector'];
			$calle=$_POST['calle']; 
			$numcasa=$_POST['numcasa'];
			$telefono=$_POST['telefono'];
			$correo=$_POST['correo'];
			$clave=$_POST['clave'];

			$sql = "UPDATE cliente SET nombre_cliente = '$nombre', apellido_cliente = '$apellido', cedula_cliente = '$cedula',
			 fechanacimiento_cliente = '$fecha', ciudad_cliente = '$ciudad', sector_cliente = '$sector', calle_cliente = '$calle', numcasa_cliente = '$numcasa'
			 , telefono_cliente = '$telefono', correo_cliente = '$correo' WHERE id_cliente = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Cliente actualizado correctamente' : 'No se puso actualizar Cliente';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	

	header('location: ../../clientes.php');
	
		$i='';
	if(isset($_GET['accion'])){
		$i=$_GET['accion'];
	}

if ($i=='INS') {
	$msj='';
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$cedula=$_POST['cedula'];
	$fecha=$_POST['fechanacimiento'];
	$ciudad=$_POST['ciudad'];
	$sector=$_POST['sector'];
	$calle=$_POST['calle']; 
	$numcasa=$_POST['numcasa'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$clave=$_POST['clave'];
	
	$sql="
	INSERT INTO `cliente` ( `nombre_cliente`, `apellido_cliente`, `cedula_cliente`, `fechanacimiento_cliente`, 
	`ciudad_cliente`, `sector_cliente`, `calle_cliente`, `numcasa_cliente`, `telefono_cliente`, `correo_cliente`, 
	`clave_cliente`, `deuda_cliente`, `estado_cliente`)
	VALUES (
   '$nombre',
   '$apellido',
   '$cedula',
   '$fecha',
   '$ciudad',
   '$sector',
   '$calle',
   '$numcasa',
   '$telefono',
   '$correo',
   '$clave',
   '0',
   'Activo'
	)";
	
	
	if ($mysqli->query($sql)){
		$_SESSION['message'] ='Registro almacenado correctamente';
	}
	else{
		$_SESSION['message'] ='Imposible almacenar el registro'.mysqli_error($mysqli);
		echo "error:".mysqli_error($mysqli);
	}
	header("Location: ../../clientes.php");
}

if ($i=='FAC') {
	$msj='';
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$cedula=$_POST['cedula'];
	$fecha=$_POST['fechanacimiento'];
	$ciudad=$_POST['ciudad'];
	$sector=$_POST['sector'];
	$calle=$_POST['calle']; 
	$numcasa=$_POST['numcasa'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$clave=$_POST['clave'];
	
	$sql="
	INSERT INTO `cliente` ( `nombre_cliente`, `apellido_cliente`, `cedula_cliente`, `fechanacimiento_cliente`, 
	`ciudad_cliente`, `sector_cliente`, `calle_cliente`, `numcasa_cliente`, `telefono_cliente`, `correo_cliente`, 
	`clave_cliente`, `deuda_cliente`, `estado_cliente`)
	VALUES (
   '$nombre',
   '$apellido',
   '$cedula',
   '$fecha',
   '$ciudad',
   '$sector',
   '$calle',
   '$numcasa',
   '$telefono',
   '$correo',
   '$clave',
   '0',
   'Activo'
	)";
	
	
	if ($mysqli->query($sql)){
		$_SESSION['message'] ='Registro almacenado correctamente';
	}
	else{
		$_SESSION['message'] ='Imposible almacenar el registro'.mysqli_error($mysqli);
		echo "error:".mysqli_error($mysqli);
	}
	header("Location: ../facturacion_backend/nueva_factura.php");
}


	

		
	?>
































