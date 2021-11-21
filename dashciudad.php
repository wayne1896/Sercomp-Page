<!DOCTYPE html>
<html>
<head>

	<?php 


		include('php/sidebar2/sidebar-dash3.php');	
		include('php/consultas/consultadireccion.php');	
    ?>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Ciudades</title>


	
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
<main class="main users chart-page" id="skip-target">

<div class="container">
	<div class="pd-ltr-20">
		<!-- Responsive tables Start -->
		<div class="pd-20 card-box mb-30">
			<div class="clearfix mb-20">
				<div class="pull-left">
					<h4 class="main-title">Ciudad Dashboard</h4>
				</div>
			</div>
			<?php 
			if(isset($_SESSION['message'])){ ?>
			<div class="alert alert-info text-center" style="margin-top:20px;">
			<?php echo $_SESSION['message']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php
		unset($_SESSION['message']);}?>
		<div class="users-table table-wrapper">
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
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
						<a href='chartciudad.php?id=".$row['id_ciudad']."'  class='btn btn-primary'>Ver Dashboard</a>
						</td>
						</tr>
						";
						include('php/direccion_backend/ciudad/Modals/cambiar_estado_Ciudad.php');
						include('php/direccion_backend/ciudad/Modals/ActualizarCiudadModal.php');
					}
					?> 
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
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>

<!-- Custom scripts -->
<script src="js/script.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>






</body>
<?php   
        include('php/direccion_backend/ciudad/Modals/Modal_Ciudad.php');	
		include('php/ppie/ppiemenu.php');	
	?>
</html>