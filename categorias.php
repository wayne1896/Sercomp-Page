<?php

	

include('php/sidebar2\sidebar-inventario.php');	
include('php/consultas/consultainventario.php');	

if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
	header("location: login.php");
	exit;
	}

/* Connect To Database*/
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
	<title>SERCOMP - Categoria</title>

   <!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Custom styles -->
	<link rel="stylesheet" href="./css/style.min.css">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  
	<link rel="stylesheet" href="css1/custom.css">
  
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
  <script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
  
	  gtag('config', 'UA-119386393-1');
  </script>
  </head>
  </head>
  <body>

	
<div class="mobile-menu-overlay"></div>
    <div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoCliente"><span class="glyphicon glyphicon-plus" ></span> Nueva Categoría</button>
			</div>
			<h4 class="main-title"> Categorías</h4>
		</div>
		<div class="panel-body">
		
			
			
			<?php
				include("modal/registro_categorias.php");
				include("modal/editar_categorias.php");
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			
		
	
			
			
			
  </div>
</div>
		 
	</div>
	<hr>
	
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
        include('php\inventario_backend\Modals\Modal_Inventario.php');	
		include('php/ppie\ppiemenu.php');	
	?>
	<script type="text/javascript" src="js1/categorias.js"></script>
  </body>
</html>
