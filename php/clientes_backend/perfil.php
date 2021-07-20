<html>
<?php 

include('../pcabeza\navbar_clientemenu.php');	
include('../sidebar\sidebarreg.php');	
include('../consultas\consultacliente.php');	

 if(isset($_GET['id2'])){
	$query= perfilcliente($_GET['id2']);
 $row=$query->fetch_assoc();}

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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		
            <div class="container">    
                  <div class="row">
                      <div class="panel panel-default">
                      <div class="panel-heading">  <h4 >Perfil De: <?php echo $row['nombre_cliente']." ".$row['apellido_cliente'];?></h4></div>
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="User Pic" src="https://www.pngfind.com/pngs/m/470-4703547_icon-user-icon-hd-png-download.png" id="profile-image1" class="img-circle img-responsive"> 

                      </div>
					  <div class="panel-body" style="margin-left: 60px">

					  <div class="row">
						
    		<div class="row">
    			<div class="col-md-4 col-md-offset-2 col-sm-4
    			col-sm-offset-2 col-lg-4 col-Ig-offset-2 col-xs-12
    			col-xs-offset-0">
    			<div class="form-group">
    				<label class="control-label">Nombre</label>
    				<input type="text" readonly="" name="nombre" required="" placeholder="Nombre" class="form-control" value="<?php echo $row['nombre_cliente'] ?>">
					<input type="text" readonly="" name="codigo" hidden="true" required="" placeholder="Nombre" class="form-control" value="<?php echo $row['id_cliente'] ?>">
					<?php $_SESSION['codigo']=$row['id_cliente'];
					?>
    			</div>
				</div>
				
				
					<div class="col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-lg-4 col-lg-offset-0 col-xs-12 col-xs-offset-0">
					<div class="form-group">
						<label class="control-label">Apellido</label>
						<input type="text" readonly="" id="apellido" name="apellido" required="" placeholder="Apellido" class="form-control"
						value="<?php echo $row['apellido_cliente']?>">
					</div>
				</div>
				
				

				<div class="col-md-4 col-md-offset-2 col-sm-4
    			col-sm-offset-2 col-lg-4 col-Ig-offset-2 col-xs-12
    			col-xs-offset-0">
    			<div class="form-group">
    				<label class="control-label">Direccion </label>
    				<input type="text" readonly="" name="direccion" required="" placeholder="Direccion" class="form-control"
                    value="<?php echo $row['nombre_ciudad']." ".$row['nombre_sector']." ".$row['nombre_calle']." Casa No: ".$row['numcasa_cliente']?>">
    				
    			</div>
    			</div>
        
					<div class="col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-lg-4 col-lg-offset-0 col-xs-12 col-xs-offset-0">
					<div class="form-group">
						<label class="control-label">Cedula</label>
						<input type="text" id="cedula" readonly="" name="cedula" required="" placeholder="Cedula de Identidad" class="form-control"
						value="<?php echo $row['cedula_cliente']?>">

					</div>
				</div>
				</div>
		
				<div class="col-md-4 col-md-offset-2 col-sm-4
    			col-sm-offset-2 col-lg-4 col-Ig-offset-2 col-xs-12
    			col-xs-offset-0">
    			<div class="form-group">
    		
    				<label class="control-label">Telefono </label>
    				<input type="telefono" name="telefono" readonly="" required="" placeholder="Telefono" class="form-control"
                    value="<?php echo $row['telefono_cliente']?>">
    				
    			</div>
    			</div>
				

    			<div class="col-md-4 col-md-offset-0 col-sm-4
	    			col-sm-offset-0 col-lg-4 col-Ig-offset-0 col-xs-12
	    			col-xs-offset-0">
    			  <div class="form-group">
    				<label class="control-label">Fecha de nacimiento </label>
    				<input type="date" readonly="" name="fecha" required=""  class="form-control" 
                    value="<?php echo $row['fechanacimiento_cliente']?>">
    				
    			  </div>
    			</div>
				
    			</div>
			
          </div>
		  <?php
		  
		 echo "<a href='#edit_".$row['id_cliente']."'  data-toggle='modal' class='btn btn-primary'>Editar</a>'";
		 echo "       "; 
			 $id=$row['id_cliente'];
			 
		
		include('Modals\ActualizarClienteModalperfil.php');
			?>
			
    		</div>
    		</div>
                </div>
            </div>
            </div>
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

            <?php 
include('../ppie\ppiemenu.php');	
?>