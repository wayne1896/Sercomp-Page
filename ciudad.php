<!DOCTYPE html>
<html>
<head>

	<?php 


		include('php/sidebar2\sidebar-direcciones.php');	
		include('php/consultas/consultadireccion.php');	
    ?>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Ciudades</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="vendors/styles/styles.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
<link rel="stylesheet" type="text/css" href="src/styles/style_form_out.css">


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
							<h4 class="text-blue h4">Ciudad</h4>
							
						</div>
						<div class="pull-right">
                        <a href="#addnew" class="btn btn-primary" data-toggle="modal"><i class=""></i> Nuevo</a>
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
			 				    <th scope="col">Ciudad</th>
			 				    <th scope="col">Estado</th> 				
			 				<th></th>
								</tr>
							</thead>
							<tbody>
	
			
                                    <?php
			 			$query=lista_ciudad();
		 				while ( $row= $query->fetch_assoc() ) {
		 					echo" 
								<tr>
					 				<td scope='row'>".$row['id_ciudad']."</td>
					 				<td scope='row'>".$row['nombre_ciudad']."</td>
                                     <td scope='row'>".$row['estado_ciudad']."</td>
					 				<td>
									 <a href='#edit_".$row['id_ciudad']."'  data-toggle='modal' class='btn btn-primary'>Editar</a>
									 <a href='sector.php?id=".$row['id_ciudad']."' class='btn btn-info'>Ver Sectores</a>	 
										 
									 <a href='#delete_".$row['id_ciudad']."'  data-toggle='modal' class='btn btn-danger' >Cambiar Estado</a>
									 
					 				</td>
					 			</tr>
		 					";
							 include('php\direccion_backend\ciudad\Modals\cambiar_estado_Ciudad.php');
							 include('php\direccion_backend\ciudad\Modals\ActualizarCiudadModal.php');
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
	<script src="vendors/scripts/app.js"></script>
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
</body>
<?php   
        include('php\direccion_backend\ciudad\Modals\Modal_Ciudad.php');	
		include('php/ppie\ppiemenu.php');	
	?>
</html>