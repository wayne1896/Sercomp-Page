<?php


	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$numero_factura=intval($_GET['id']);
		$del1="delete from facturas where numero_factura='".$numero_factura."'";
		$del2="delete from detalle_factura where numero_factura='".$numero_factura."'";
		if ($delete1=mysqli_query($con,$del1) and $delete2=mysqli_query($con,$del2)){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se puedo eliminar los datos
			</div>
			<?php
			
		}
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "factura, cliente, empleado";
		 $sWhere = "";
		 $sWhere.=" WHERE factura.id_cliente=cliente.id_cliente and factura.id_empleado=empleado.id_empleado";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and  (cliente.nombre_cliente like '%$q%' or factura.numero_factura like '%$q%')";
			
		}
		
		
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  ");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './facturacion.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="users-table table-wrapper">
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
					<th scope="col">#</th>
					
					<th scope="col">Fecha</th>
					<th scope="col">Cliente</th>
					<th scope="col">Vendedor</th>
					<th scope="col">Estado</th>
					<th scope="col">Metodo de Pago</th>
					<th class='text-right'>Total</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_factura=$row['id_factura'];
						$numero_factura=$row['numero_factura'];
						$fecha=date("d/m/Y", strtotime($row['fecha_factura']));
						$nombre_cliente=$row['nombre_cliente'];
						$telefono_cliente=$row['telefono_cliente'];
						$email_cliente=$row['correo_cliente'];
						$nombre_vendedor=$row['nombre_empleado']." ".$row['apellido_empleado'];
						$estado_factura=$row['estado_factura'];
						if ($estado_factura=='Pagado'){$text_estado="Pagada";$label_class='badge-active';}
						else{$text_estado="Pendiente";$label_class='badge-pending';}
						if ($estado_factura=='Anulada'){$text_estado="Anulada";$label_class='badge-trashed';}
						$pago_factura=$row['tipodepago_factura'];
						$total_venta=$row['totalpago'];
					?>
					<tr>
				
						<td scope="row"><?php echo $numero_factura; ?></td>
						<td scope="row"><?php echo $fecha; ?></td>
						<td scope="row"><a href="#" data-toggle="tooltip" data-placement="top" title="<i class='glyphicon glyphicon-phone'></i> <?php echo $telefono_cliente;?><br><i class='glyphicon glyphicon-envelope'></i>  <?php echo $email_cliente;?>" ><?php echo $nombre_cliente;?></a></td>
						<td scope="row"><?php echo $nombre_vendedor; ?></td>
						<td scope="row"><span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span></td>
						<td scope="row"><?php echo $pago_factura; ?></td>
						<td scope="row" class='text-right'><?php echo number_format ($total_venta,2); ?></td>					
					<td class="text-right">
						<?php
						if($row['estado_factura']=='Pendiente'){
							?>
						<a href="php\facturacion_backend\editar_factura.php?id_factura=<?php echo $id_factura;?>"
						 class="btn btn-outline-primary" title='Editar factura' ><i class='bx bxs-edit bx'></i></a> 
						 <?php
							}
						?>
						<a href="#" class="btn btn-outline-primary" title='Descargar factura' onclick="imprimir_factura1('<?php echo $id_factura;?>');"><i class='bx bxs-download bx'></i></a> 
						
					</td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right">
						<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
				</tbody>
			  </table>
			</div>
			<?php
		}
	}
?>