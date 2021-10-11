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
$query="SELECT c.id_cliente, c.nombre_cliente, c.apellido_cliente, c.cedula_cliente, 
c.fechanacimiento_cliente, s.nombre_ciudad, e.nombre_sector, u.nombre_calle , c.numcasa_cliente, 
c.telefono_cliente, c.correo_cliente, c.deuda_cliente, 
c.estado_cliente  FROM cliente c JOIN ciudad s ON (c.ciudad_cliente=s.id_ciudad) 
JOIN sector e ON (c.sector_cliente=e.id_sector) JOIN calle u ON (c.calle_cliente=u.id_calle) ORDER BY id_cliente";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['clientes']))
{
	$q=$conexion->real_escape_string($_POST['clientes']);
	$query="SELECT c.id_cliente, c.nombre_cliente, c.apellido_cliente, c.cedula_cliente, 
    c.fechanacimiento_cliente, s.nombre_ciudad, e.nombre_sector, u.nombre_calle , c.numcasa_cliente, 
    c.telefono_cliente, c.correo_cliente, c.deuda_cliente, 
    c.estado_cliente  FROM cliente c JOIN ciudad s ON (c.ciudad_cliente=s.id_ciudad) 
    JOIN sector e ON (c.sector_cliente=e.id_sector) JOIN calle u ON (c.calle_cliente=u.id_calle) WHERE 
		id_cliente LIKE '%".$q."%' OR
		nombre_cliente LIKE '%".$q."%' OR
		apellido_cliente LIKE '%".$q."%' OR
		cedula_cliente LIKE '%".$q."%' OR
		correo_cliente LIKE '%".$q."%'";
}

$buscarClientes=$conexion->query($query);
if ($buscarClientes->num_rows > 0)
{
	$tabla.= 
	'<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>   
			<th scope="col">ID</th>
			 <th scope="col">Nombre</th>
			<th scope="col">Apellido</th>
			 <th scope="col">Cedula</th>
			<th scope="col">Fecha de Nacimiento</th> 
			<th scope="col">Telefono</th>
			<th scope="col">Direccion</th>
			<th scope="col">Correo</th>
			<th scope="col">Deuda</th>
			 <th scope="col">Estado</th> 				
		 <th></th>
			</tr>
		</thead>
		<tbody>';

	while($row= $buscarClientes->fetch_assoc())
	{
		$tabla.=
		'<tr>
		<td scope="row">'.$row['id_cliente'].'</td>
		<td scope="row">'.$row['nombre_cliente'].'</td>
		<td scope="row">'.$row['apellido_cliente'].'</td>
		<td scope="row">'.$row['cedula_cliente'].'</td>
		<td scope="row">'.$row['fechanacimiento_cliente'].'</td>
		<td scope="row">'.$row['telefono_cliente'].'</td>
		<td scope="row">'.$row['nombre_ciudad'].' '.$row['nombre_sector'].'Casa No: '.$row['numcasa_cliente'].'</td>
		<td scope="row">'.$row['correo_cliente'].'</td>
		<td scope="row">'.$row['deuda_cliente'].'</td>
		<td scope="row">'.$row['estado_cliente'].'</td>
		<td>
		 <a href="#edit_'.$row['id_cliente'].'"  data-toggle="modal" class="btn btn-primary-cliente">Editar</a>
										 
										 
		<a href="#delete_'.$row['id_cliente'].'"  data-toggle="modal" class="btn btn-danger-cliente" >Cambiar Estado</a>
									 
		</td> 
		</tr>
		</tbody>
		</div>
		';
		include('../php/clientes_backend/Modals/cambiar_estado_cliente.php');
		include('../php/clientes_backend/Modals/ActualizarClienteModal.php');
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
