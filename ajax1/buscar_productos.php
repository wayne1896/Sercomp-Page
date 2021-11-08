<?php

		include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones1.php");
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_producto=intval($_GET['id']);
		if ($delete1=mysqli_query($con,"DELETE FROM inventario WHERE id_producto='".$id_producto."'")){
		?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		 
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $id_categoria =intval($_REQUEST['id_categoria']);
		 $aColumns = array('codigo_producto', 'nombre_producto');//Columnas de busqueda
		 $sTable = "inventario";
		 $sWhere = "";
		
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		
		if ($id_categoria>0){
			$sWhere .=" and id_categoria='$id_categoria'";
		}
		$sWhere.=" order by id_producto asc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 18; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './productos.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			
			<div class="users-table table-wrapper">
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
                                <th scope="col">ID</th>
			 				    <th scope="col">Nombre</th>
								<th scope="col">Cantidad</th>

                                <th scope="col">Estado</th> 
							 				
			 				<th scope="col">Acciones </th>
								</tr>
							</thead>
							<tbody>
			  
				<?php
				$nums=1;
				while ($row=mysqli_fetch_array($query)){
						$id_producto=$row['id_producto'];
						$codigo_producto=$row['codigo_producto'];
						$nombre_producto=$row['nombre_producto'];
						$estado_producto=$row['estado_producto'];
						$stock=$row['stock'];
			
			 			
							
							if ($estado_producto=="Stock"){$text_estado="Activo";$label_class="badge-active";}
							else{$text_estado="Agotado";$label_class="badge-trashed";}
		 					echo" 
								<tr>
					 				<td scope='row'>".$id_producto."</td>
					 				<td scope='row'>".$nombre_producto."</td>
									 <td scope='row'>".$stock."</td>
					 			
                                     <td scope='row'><span class='label ".$label_class."'>".$text_estado."</span></td>
					 				<td>
									 
										 
									 <a href='producto.php?id=".$row['id_producto']."' class='btn btn-info'>Ver Producto</a>
									 <a href='#delete_".$row['id_producto']."'  data-bs-toggle='modal' class='btn btn-danger' >Cambiar Estado</a>
									
									 
					 				</td>
					 			</tr>
		 					";
							 include("../modal/cambiar_estado_inventario.php");
							}
		 				
			 			?> 
	  </tbody>
	  </table>
		</div>
				
			
			<?php
		}
	}
?>
