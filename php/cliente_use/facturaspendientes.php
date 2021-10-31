<!DOCTYPE html>
<html>
<head>

	<?php 
	
		include('../sidebar\sidebarclientereg.php');	
		include('../consultas/consultacliente.php');	
    ?>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Facturas pendientes</title>

		<!-- Site favicon -->
		<link rel="icon" type="image/png" href="vendors\images\iconbar.png">
		<link rel="shortcut icon" type="image/png" sizes="16x16" href="vendors\images\iconbar.png">
		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	  
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	  <!-- Custom styles -->
	  <link rel="stylesheet" href="../../css/style.min.css">
	  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	
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

<div class="container">
    <div class="pd-ltr-20">
        
       
           
<!-- Responsive tables Start -->
<div class="pd-20 card-box mb-30">

					<div class="clearfix mb-20">
						<div class="pull-left">
						<h4 class="main-title">Facturas pendientes</h4>
							
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
	<div class="users-table table-wrapper">
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
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
			$query=perfilfacturapendiente($id2);
		 	while ( $row= $query->fetch_assoc() ) {
				$estado_factura=$row['estado_factura'];
				if ($estado_factura=='Pagado'){$text_estado="Pagada";$label_class='badge-active';}
				else{$text_estado="Pendiente";$label_class='badge-pending';}
				if ($estado_factura=='Anulada'){$text_estado="Anulada";$label_class='badge-trashed';}
				
		 		echo" 
				<tr>
					<td scope='row'>".$c."</td>
					<td scope='row'>".$row['fecha_factura']."</td>
					<td scope='row'>".$row['nombre_cliente'].' '.$row['apellido_cliente']."</td>
					<td scope='row'>".$row['nombre_empleado'].' '.$row['apellido_empleado']."</td>
					<td scope='row'><span class='label ".$label_class."'>".$text_estado."</span></td>
                	<td scope='row'>".$row['tipodepago_factura']."</td>
					<td scope='row'>RD $".$row['totalpago']."</td>

					<td>
						<a href='checkout.php?id=".$row['id_factura']."' class='btn btn-primary btn-sm'>Pagar</a>
					</td>	 
				
				</tr>
		 			";
							
                $c++;
		 	}
			?> 
	  		</tbody>
			  </tbody>
	  </table>
		</div>
	</div>
</div>
	
	<!-- js -->
	<script
		  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
		  integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
		  crossorigin="anonymous"
		></script>
	
		<!-- Light Switch -->
	   <!-- Chart library -->
	<script src="../../plugins/chart.min.js"></script>
	<!-- Icons library -->
	<script src="../../plugins/feather.min.js"></script>
	
	<!-- Custom scripts -->
	<script src="../../js/script.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
</body>

<?php   
        
		include('../ppie\ppiemenu.php');	
	?>
</html>	