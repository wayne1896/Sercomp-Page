<!DOCTYPE html>
<html>
<head>

	<?php 
	
		
		$active_facturas="active";
		$active_productos="";
		$active_clientes="";
		$active_usuarios="";	

 		include('../pcabeza\pcabezafacturacion.php');	
		include('../sidebar\sidebarclientereg.php');	
		include('../consultas/consultacliente.php');	
    ?>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../../vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../../vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../../vendors/images/favicon-16x16.png">
	<link rel="stylesheet" href="css/custom.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../../src\bootstrap\css\bootstrap.min.css">
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



<div class="mobile-menu-overlay">

</div>

<div class="main-container">
    <div class="pd-ltr-20">
        
       
           
<!-- Responsive tables Start -->
<div class="pd-20 card-box mb-30">

	<div class="clearfix mb-20">
		<div class="pull-left">
			<h4 class="text-blue h4">Facturas pagadas</h4>
							
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
				<th>#</th>
					
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Vendedor</th>
					<th>Estado</th>
					<th>Metodo de Pago</th>
					<th >Total</th>
					<th >Acciones</th>				
					<th></th>
				</tr>
			</thead>
			<tbody>
	
			
            <?php
            $c=1;
			$query=perfilfactura($id2);
		 	while ( $row= $query->fetch_assoc() ) {
				$id_factura=$row['id_factura'];
		 		echo" 
				<tr>
					<td scope='row'>".$c."</td>
					<td scope='row'>".$row['fecha_factura']."</td>
					<td scope='row'>".$row['nombre_cliente'].' '.$row['apellido_cliente']."</td>
					<td scope='row'>".$row['nombre_empleado'].' '.$row['apellido_empleado']."</td>
					<td scope='row'>".$row['estado_factura']."</td>
                	<td scope='row'>".$row['tipodepago_factura']."</td>
					<td scope='row'>RD $".$row['totalpago']."</td>
					<td scope='row'>	 <a href='../../pdf/index1.php?id_factura=".$row['id_factura']."' class='btn btn-default'   >
					<span class='glyphicon glyphicon-print'></span> Imprimir
				  </button></td>
		
					
				<td>
				
									 
				</td>
				</tr>
		 			";
							
                $c++;
		 	}
			?> 
	  		</tbody>
		</table>
	</div>

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
</html>	
<script type="text/javascript" src="../../js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="../../js/facturas.js"></script>
