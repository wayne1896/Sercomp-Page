<!DOCTYPE html>
<html>
<head>
<?php 
 

 	
		include('php/sidebar\sidebartecnico.php');	

		

 if(isset($_SESSION['message'])){
	?>
	<div class="alert alert-info text-center" style="margin-top:20px;">
	<?php echo $_SESSION['message']; ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
unset($_SESSION['message']);
}?>
	<head>
	  <meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SERCOMP - Inicio</title>
	
		<!-- Site favicon -->
		<link rel="icon" type="image/png" href="vendors\images\iconbar.png">
		<link rel="shortcut icon" type="image/png" sizes="16x16" href="vendors\images\iconbar.png">
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
		 
	
	<div class="card  pd-20 height-100-p mb-30 " style="background-color: rgba(245, 245, 245, 0.4);" >
	<div class="card-body">
		<div class="row align-items-center">
			<div class="col-md-4">
				<img src="vendors/images/banner-img.png" alt="">
			</div>
			<div class="col-md-8">
				<h4 class="main-title">
					!Bienvenido de nuevo! 
					<?php 
      
      $id2=$_SESSION['User'];
	  
	 
	  $mysqli = new mysqli("localhost", "root", "", "tesis");

	  /* comprobar la conexión */
	  if (mysqli_connect_errno()) {
		  printf("Falló la conexión: %s\n", mysqli_connect_error());
		  exit();
	  }
	  
	  $consulta = "SELECT nombre_empleado, apellido_empleado, cargo, nombre_ciudad, nombre_sector, nombre_calle, numcasa_empleado FROM empleado e join nomina n on (e.id_nomina=n.id_nomina) join ciudad c on (c.id_ciudad=e.ciudad_empleado)
	   join sector s on (s.id_sector=e.sector_empleado) join calle k on (k.id_calle=e.calle_empleado)
	    where e.usuario='$id2'";
	  
	  if ($resultado = $mysqli->query($consulta)) {
	  
		  /* obtener el array de objetos */
		  while ($fila = $resultado->fetch_row()) {
        echo"<div class='weight-600 font-30 text-blue'>".$fila[0]." ". $fila[1]." !</div>
				</h4>
				<p class='white-block__title'>Cargo: ".$fila[2]."</p>
				<p class='white-block__title'>Direccion: ".$fila[3]." ".$fila[4]." ".$fila[5]." Casa #".$fila[6].".</p>
				
				
				";}}?>
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
      
		include('php/ppie\ppiemenu.php');	
	?>
	
	</html>