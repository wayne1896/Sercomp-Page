<!DOCTYPE html>
<html>
<head>

	<?php 



		include('php/sidebar2\sidebar-facturacion.php');	
		include('php/consultas/consultacliente.php');	
    ?>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Facturacion</title>
	


	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
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

<div class="mobile-menu-overlay"></div>

<div class="container">
    <div class="pd-ltr-20">
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="main-title">Facturas</h4>
				</div>
				<div class="pull-right">
					<a href="php\facturacion_backend\nueva_factura.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Factura</a>
				</div>
			
				<div id="resultados">

				</div><!-- Carga los datos ajax -->
				<div class='outer_div'
				></div><!-- Carga los datos ajax -->
			</div>
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
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>

<!-- Custom scripts -->
<script src="js/script.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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