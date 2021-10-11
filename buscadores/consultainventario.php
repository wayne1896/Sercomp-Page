<?php
  include_once '../dbConfig.php'; 


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
$query="SELECT * FROM inventario ORDER BY id_producto";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['inventario']))
{
	$q=$conexion->real_escape_string($_POST['inventario']);
	$query="SELECT *  FROM  inventario  WHERE 
		id_producto LIKE '%".$q."%' OR
		nombre_producto LIKE '%".$q."%' OR
		descripcion_producto LIKE '%".$q."%' OR
		estado_producto LIKE '%".$q."%'";
}

$buscarProducto=$conexion->query($query);
if ($buscarProducto->num_rows > 0)
{
	$tabla.= 
	'<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>   
            <th scope="col">ID</th>
             <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
             <th scope="col">Cantidad</th>
            <th scope="col">Costo</th>
          
             <th scope="col">Estado</th> 				
         <th></th>
            </tr>
        </thead>
        <tbody>';

	while($row= $buscarProducto->fetch_assoc())
	{
		$tabla.=
		'<tr>
		<td scope="row">'.$row['id_producto'].'</td>
		<td scope="row">'.$row['nombre_producto'].'</td>
		<td scope="row">'.$row['descripcion_producto'].'</td>
		<td scope="row">'.$row['cantidad_producto'].'</td>
		<td scope="row">$'.$row['costo_producto'].'</td>
		<td scope="row">'.$row['estado_producto'].'</td>
		<td>
		 <a href="#edit_'.$row['id_producto'].'"  data-toggle="modal" class="btn btn-primary-inventario">Editar</a>
										 
										 
		<a href="#delete_'.$row['id_producto'].'"  data-toggle="modal" class="btn btn-danger-inventario" >Cambiar Estado</a>
									 
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
