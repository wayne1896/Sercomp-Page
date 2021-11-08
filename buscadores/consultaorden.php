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
$query="SELECT * FROM orden o 
join cliente e on (o.id_cliente=e.id_cliente) join servicios g on (o.servicio_orden=g.id_servicio) 
join empleado f on (o.id_empleado=f.id_empleado) join ciudad c on (o.ciudad_orden=c.id_ciudad) 

        join sector s on (o.sector_orden=s.id_sector) JOIN calle b on (o.calle_orden=b.id_calle) where o.estado_orden='Asignada' ";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['orden']))
{
	$q=$conexion->real_escape_string($_POST['orden']);
	$query="SELECT * FROM orden o 
	join cliente e on (o.id_cliente=e.id_cliente) join servicios g on (o.servicio_orden=g.id_servicio) 
	join empleado f on (o.id_empleado=f.id_empleado) join ciudad c on (o.ciudad_orden=c.id_ciudad) 
	join sector s on (o.sector_orden=s.id_sector) JOIN calle b on (o.calle_orden=b.id_calle)  WHERE 
		id_orden LIKE '%".$q."%' OR
		nombre_servicio LIKE '%".$q."%' OR
		descripcion_orden LIKE '%".$q."%' OR
		nombre_cliente LIKE '%".$q."%' OR
		apellido_cliente LIKE '%".$q."%' OR
		proceso_orden LIKE '%".$q."%' AND
		o.estado_orden='Asignada'";
}

$buscarOrden=$conexion->query($query);
if ($buscarOrden->num_rows > 0)
{
	
	$tabla.= 
	'<div class="users-table table-wrapper">
	<table class="posts-table">
	  <thead>
		<tr class="users-table-info">
			<th scope="col">ID</th>
			<th scope="col">Descripcion</th>
		   <th scope="col">Servicio solicitado</th>
			<th scope="col">Direccion</th>
		   <th scope="col">Fecha de Orden</th> 
		   <th scope="col">Telefono</th>
		   <th scope="col">Nombre cliente</th>
			
			<th scope="col">Proceso de la orden</th>
			<th scope="col">Asignada A</th> 				
		 <th></th>
			</tr>
		</thead>
		<tbody>';

	while($row= $buscarOrden->fetch_assoc())
	{	$estado_cliente=$row["proceso_orden"];
		if ($estado_cliente=="Finalizada"){$text_estado="Finalizada";$label_class="badge-active";}
		else{$text_estado="En proceso";$label_class="badge-pending";}
		if ($estado_cliente=='Sin empezar'){$text_estado="Sin empezar";$label_class='badge-trashed';}
		$tabla.=
		'<tr>
		<td scope="row">'.$row['id_orden'].'</td>
		<td scope="row">'.$row['descripcion_orden'].'</td>
		<td scope="row">'.$row['nombre_servicio'].'</td>
		<td scope="row">'.$row['nombre_ciudad'].' '.$row['nombre_sector'].' Casa No: '.$row['numcasa_cliente'].'</td>
		<td scope="row">'.$row['fecha_orden'].'</td>
		<td scope="row">'.$row['telefono_cliente'].'</td>
		<td scope="row">'.$row['nombre_cliente']." ".$row['apellido_cliente'].'</td>
		
		<td scope="row"><span class="label '.$label_class.'">'.$text_estado.'</span></td>
		<td scope="row">'.$row['nombre_empleado']." ".$row['apellido_empleado'].'</td>
		<td>
		 <a href="php/orden_backend/ordeneditar.php?id='.$row['id_orden'].'"   class="btn btn-primary">Editar</a>
										 
										 
		<a href="#delete_'.$row['id_orden'].'"  data-bs-toggle="modal" class="btn btn-info" >Actualizar Proceso</a>
									 
		</td> 
		</tr>
		</tbody>
		</div>
		';
		include('../php\orden_backend\Modals\ActualizarOrdenModal.php');
		include('../php\orden_backend\Modals\asignar_ordenModal.php');
	   include('../php\orden_backend\Modals\cambiar_estado_Orden.php');
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
