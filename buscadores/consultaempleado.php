<?php
  include_once '../dbConfig.php'; 

  // Fetch all the country data 
  $query = "SELECT * FROM ciudad ORDER BY nombre_ciudad ASC"; 
  $result = $db->query($query); 


  include "../Conexion.php";
  $db =  connect();
  $query=$db->query("select * from ciudad");
  $ciudad = array();
  while($r=$query->fetch_object()){ $ciudad[]=$r; }

  $query1 = "SELECT * FROM nomina ORDER BY cargo ASC"; 
  $result1 = $db->query($query1); 
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'tesis';
$usuario = 'root';
$contraseña = '';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT c.id_empleado, c.nombre_empleado, c.apellido_empleado, c.cedula_empleado, 
c.fechanacimiento_empleado, s.nombre_ciudad, e.nombre_sector, u.nombre_calle , c.numcasa_empleado, 
c.telefono_empleado, c.correo_empleado, c.usuario, n.cargo, 
c.estado_empleado  FROM  `empleado` c JOIN ciudad s ON (c.ciudad_empleado=s.id_ciudad) 
JOIN sector e ON (c.ciudad_empleado=e.id_sector) JOIN calle u ON (c.calle_empleado=u.id_calle)
JOIN nomina n ON (c.cargo_empleado=n.id_nomina) ORDER BY id_empleado";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['empleados']))
{
	$q=$conexion->real_escape_string($_POST['empleados']);
	$query="SELECT c.id_empleado, c.nombre_empleado, c.apellido_empleado, c.cedula_empleado, 
    c.fechanacimiento_empleado, s.nombre_ciudad, e.nombre_sector, u.nombre_calle , c.numcasa_empleado, 
    c.telefono_empleado, c.correo_empleado, c.usuario, n.cargo, 
    c.estado_empleado  FROM  `empleado` c JOIN ciudad s ON (c.ciudad_empleado=s.id_ciudad) 
    JOIN sector e ON (c.ciudad_empleado=e.id_sector) JOIN calle u ON (c.calle_empleado=u.id_calle)
    JOIN nomina n ON (c.cargo_empleado=n.id_nomina) WHERE 
		id_empleado LIKE '%".$q."%' OR
		nombre_empleado LIKE '%".$q."%' OR
		apellido_empleado LIKE '%".$q."%' OR
		cedula_empleado LIKE '%".$q."%' OR
		correo_empleado LIKE '%".$q."%'";
}

$buscarEmpleados=$conexion->query($query);
if ($buscarEmpleados->num_rows > 0)
{
	$tabla.= 
	'<div class="users-table table-wrapper">
	<table class="posts-table">
	  <thead>
		<tr class="users-table-info">
            <th scope="col">ID</th>
             <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
             <th scope="col">Cedula</th>
            <th scope="col">Fecha de Nacimiento</th> 
            <th scope="col">Telefono</th>
            <th scope="col">Direccion</th>
            <th scope="col">Correo</th>
			<th scope="col">Usuario</th>
            <th scope="col">Cargo</th>
             <th scope="col">Estado</th> 				
         <th></th>
            </tr>
        </thead>
        <tbody>';

	while($row= $buscarEmpleados->fetch_assoc())
	{	$estado_cliente=$row["estado_empleado"];
		if ($estado_cliente=="Activo"){$text_estado="Activo";$label_class="badge-active";}
		else{$text_estado="Desactivado";$label_class="badge-trashed";}
		$tabla.=
		'<tr>
		<td scope="row">'.$row['id_empleado'].'</td>
		<td scope="row">'.$row['nombre_empleado'].'</td>
		<td scope="row">'.$row['apellido_empleado'].'</td>
		<td scope="row">'.$row['cedula_empleado'].'</td>
		<td scope="row">'.$row['fechanacimiento_empleado'].'</td>
		<td scope="row">'.$row['telefono_empleado'].'</td>
		<td scope="row">'.$row['nombre_ciudad'].' '.$row['nombre_sector'].'Casa No: '.$row['numcasa_empleado'].'</td>
		<td scope="row">'.$row['correo_empleado'].'</td>
		<td scope="row">'.$row['usuario'].'</td>
		<td scope="row">'.$row['cargo'].'</td>
		<td scope="row"><span class="label '.$label_class.'">'.$text_estado.'</span></td>
		<td>
		 <a href="#edit_'.$row['id_empleado'].'"  data-bs-toggle="modal" class="btn btn-primary">Editar</a>
										 
										 
		<a href="#delete_'.$row['id_empleado'].'"   data-bs-toggle="modal" class="btn btn-danger" >Cambiar Estado</a>
									 
		</td> 
		</tr>
		</tbody>
		</div>
		';
        include('../php/empleados_backend/Modals/cambiar_estado_Empleado.php');
        include('../php/empleados_backend/Modals/ActualizarEmpleadoModal.php');
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
