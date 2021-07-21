<!DOCTYPE html>

<?php 
	
		
		$active_facturas="active";
		$active_productos="";
		$active_clientes="";
		$active_usuarios="";	

 		include('../pcabeza\pcabezafacturacion.php');	
		include('../sidebar\sidebarcliente.php');	
		include('../consultas/consultacliente.php');	
    ?>

<head>
  	<script src="https://www.paypalobjects.com/api/checkout.js"></script>

  		<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
  
  	<link rel="stylesheet" type="text/css" href="asset/swal2/sweetalert2.min.css">
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
        <h4 class="text-blue h4">Procesar pago</h4>

							
		</div>				
	</div>
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
						//connection
						$conn = new mysqli('localhost', 'root', '', 'tesis');

								$sql = "SELECT * FROM  factura f JOIN cliente c ON (f.id_cliente=c.id_cliente) JOIN empleado e ON (f.id_empleado=e.id_empleado)
          WHERE id_factura='".$_GET['id']."'";
						$query = $conn->query($sql);
						$row = $query->fetch_assoc();
                        $tasa=60;
							echo "
								<tr>
									<td>".$row['id_factura']."</td>
									<td scope='row'>".$row['fecha_factura']."</td>
					<td scope='row'>".$row['nombre_cliente'].' '.$row['apellido_cliente']."</td>
					<td scope='row'>".$row['nombre_empleado'].' '.$row['apellido_empleado']."</td>
					<td scope='row'>".$row['estado_factura']."</td>
                	<td scope='row'>".$row['tipodepago_factura']."</td>
					<td scope='row'>RD $".$row['totalpago']."</td>
                    <td colspan='2'><span id='paypal-button'></span></td>
								</tr>
							";
                            $preciofinal=$row['totalpago'] / $tasa;
                         
					?>
					<tr>
						
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>


<script src="asset/swal2/sweetalert2.min.js"></script>
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
<script>
paypal.Button.render({
    env: 'sandbox', // change for production if app is live,

	client: {
        sandbox:    'ASGUx7y4H9lXnmwvmWYkbx_fey_FeusHKgcdX39yv67zd43Dju6U99fUCKlUeO6YI1AzbeYXy6XMdxGD',
        //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
    },

    commit: true, // Show a 'Pay Now' button

    style: {
    	color: 'gold',
    	size: 'small'
    },

    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                    	//total purchase
                        amount: { 
                        	total: '<?php echo  bcdiv($preciofinal,'1','2'); ?>', 
                        	currency: 'USD' 
                        }
                    }
                ]
            }
        });
    },

    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
    		//sweetalert for successful transaction
    		swal('Thank you!', 'Paypal purchase successful.', 'success');
        });
    },

}, '#paypal-button');
</script>
</body>
</html>