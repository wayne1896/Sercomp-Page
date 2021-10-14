<!DOCTYPE html>
<html>
<head>

	<?php 

  



  include_once '../../dbConfig.php'; 

  // ciudad
  $query = "SELECT * FROM ciudad ORDER BY nombre_ciudad ASC"; 
  $result3 = $db->query($query); 
  // servicio
  $query1 = "SELECT * FROM servicios ORDER BY nombre_servicio ASC"; 
  $result2 = $db->query($query1); 
  // empleado
  $query3 = "SELECT * FROM empleado ORDER BY nombre_empleado ASC"; 
  $result4 = $db->query($query3); 

   // cliente
   $query4 = "SELECT * FROM cliente ORDER BY nombre_cliente ASC"; 
   $result5 = $db->query($query4); 

  include "../../Conexion.php";
  $db =  connect();
  $query=$db->query("select * from ciudad");
  $ciudad = array();
  while($r=$query->fetch_object()){ $ciudad[]=$r; }
/////// CONEXIÓN A LA BASE DE DATOS /////////
 		include('../pcabeza\navbar_orden.php');	
		include('../sidebar\sidebarclientereg.php');	
		include('../consultas/consultaorden.php');	
    ?>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../../vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../../vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../../vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../../src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../../src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../../vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="../../src/styles/style_form_out.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>

<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20">
        
       
           
<!-- Responsive tables Start -->
<div class="pd-20 card-box mb-30">

					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Ordenes sin asignar</h4>
							
						</div>
						<div class="pull-right">
                        <a href="php\orden_backend\ordennuevo.php" class="btn btn-primary" > Nuevo</a>
						<a href="ordenasig.php" class="btn btn-secondary"><i class="fa fa-code"></i>Ver Orden asignadas</a>
						</div>
					</div>
					<?php 
	
	if(isset($_SESSION['message'])){
		?>
		<div class="alert alert-info text-center" style="margin-top:20px;">
			<?php echo $_SESSION['message']; ?>
		</div>
		<?php

		unset($_SESSION['message']);
	}
?>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>   
                                <th scope="col">ID</th>
			 				    <th scope="col">Descripcion</th>
							    <th scope="col">Servicio solicitado</th>
			 				    <th scope="col">Direccion</th>
                                <th scope="col">Fecha de Orden</th> 
							    <th scope="col">Telefono</th>
							    <th scope="col">Nombre cliente</th>
			 				    <th scope="col">Estado de la orden</th> 	
								 		
			 				<th></th>
								</tr>
							</thead>
							<tbody>
	
			
                                    <?php
			 			$query=perfilordensin($id2);
		 				while ( $row= $query->fetch_assoc() ) {
		 					echo" 
								<tr>
					 				<td scope='row'>".$row['id_orden']."</td>
					 				<td scope='row'>".$row['descripcion_orden']."</td>
					 				<td scope='row'>".$row['nombre_servicio']."</td>
									 <td scope='row'>".$row['nombre_ciudad']." ".$row['nombre_sector']." ".$row['nombre_calle']." Casa No:".$row['numcasa_cliente']."</td>
                                     <td scope='row'>".$row['fecha_orden']."</td>
                                     <td scope='row'>".$row['telefono_cliente']."</td>
                                     <td scope='row'>".$row['nombre_cliente']." ".$row['apellido_cliente']."</td>
									 <td scope='row'>".$row['estado_orden']."</td>
					 				<td>
									 <a href='#edit_".$row['id_orden']."'  data-toggle='modal' class='btn btn-primary'>Editar</a>
									
									 <a href='#delete_".$row['id_orden']."'  data-toggle='modal' class='btn btn-danger' >Cambiar Estado</a>
									 
					 				</td>
					 			</tr>
		 					";
			
							
		 				}
			 			?> 
	  </tbody>
	</table>
</div>
							</code></pre>
						</div>
					</div>
				</div>
				<!-- Responsive tables End -->

				</div>
		</div>		</div>


	<!-- js -->
	<script src="../../vendors/scripts/core.js"></script>
	<script src="../../vendors/scripts/script.min.js"></script>
	<script src="../../vendors/scripts/process.js"></script>
	<script src="../../vendors/scripts/layout-settings.js"></script>
	<script src="../../src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="../../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="../../vendors/scripts/dashboard.js"></script>
</body>

	
</html>