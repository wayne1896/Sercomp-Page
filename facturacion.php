<!DOCTYPE html>
<html>
<head>

	<?php 



		$active_facturas="active";
		$active_productos="";
		$active_clientes="";
		$active_usuarios="";	

 		include('php/pcabeza\pcabezafacturacion.php');	
		include('php/sidebar\sidebar.php');	
		include('php/consultas/consultacliente.php');	
    ?>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">
	<link rel="stylesheet" href="css/custom.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="src\bootstrap\css\bootstrap.min.css">
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
							<h4 class="text-blue h4">Facturas</h4>
							
						</div>
							<div class="pull-right">
                       		 <a href="php\facturacion_backend\nueva_factura.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Factura</a>
							</div>
							<form class="form-horizontal" role="form" id="datos_cotizacion">
				<div class="form-group mb-0">
						
					
						<div class="col-md-5">
						<input type="text" name="busqueda" id="q" placeholder="Nombre del cliente o # de factura" onkeyup='load(1);'>
							</div>
							<div class="col-md-5">
						
						
					</div>
						<div class="form-group row">
							
						</div>
						</form>
							
					</div>
				
				</div>
				
			
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			</div>
		</div>	

				<!-- Responsive tables End -->

				</div>

		</div>		
	</div>
</div>

	<!-- js -->
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
        include('php/clientes_backend/Modals/AgregarModal.php');	
		include('php/ppie\ppiemenu.php');	
	?>
	<!--  modal logout -->
	<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog ">
		<div class="modal-content">
		  <div class="modal-header">
			<h1>Cerrar Sesion <i class="fa fa-lock"></i></h1>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		  </div>
		  <div class="modal-body">
			<p><i class="fa fa-question-circle"></i> Esta seguro de cerrar sesion? <br /></p>
			<div class="actionsBtns">
				<form action="/logout" method="post">
					<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}"/>
					<a href="logout.php" type="button" class="btn btn-primary" ></span> Logout</a>
					
						<button class="btn btn-default" data-dismiss="modal">Cancel</button>
						
				</form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
</html>	<script src="buscadores\peticioncliente.js"></script>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/facturas.js"></script>