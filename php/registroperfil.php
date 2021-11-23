<?php 
	include('conexion.php');	
	
	$i='';
	if(isset($_GET['accion'])){
		$i=$_GET['accion'];
	}

	
	if ($i=='UDT') {
		$msj='';
		$codigo=$_POST['codigo'];
		$correo=$_POST['correo'];
		$nombre=$_POST['nombre'];
		$rnc=$_POST['rnc'];
		$ciudad=$_POST['ciudad'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$codigopostal=$_POST['codigopostal'];
        $impuesto=$_POST['impuesto'];
        $tasa=$_POST['tasa'];
		
        
		
		$sql="UPDATE `perfil` SET 
		`nombre_empresa`='$nombre',
		`RNC`='$rnc',
		`direccion`='$direccion',
		`ciudad`='$ciudad',
		`codigo_postal`='$codigopostal',
		`telefono`='$telefono',
		`email`='$correo',
		`impuesto`='$impuesto',
		`moneda`='Peso Domicano',
		`tasa_dolar`='$tasa' 
		
		 WHERE id_perfil ='$codigo' ";
		
		if ($mysqli->query($sql)){
			$_SESSION['message'] ='Registro actualizado correctamente';
		}
		else{
			$_SESSION['message'] ='Imposible actualizar el registro'.mysqli_error($mysqli);
			echo "error:".mysqli_error($mysqli);
		}
		header("Location: ../menu.php");
	}
	
?>