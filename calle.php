<!DOCTYPE html>
<html>
<head>

	<?php 

  




 		include('php/pcabeza\navbar_direccion.php');	
		include('php/sidebar\sidebar.php');	
		include('php/consultas/consultadireccion.php');	
        $id= $_GET['id'];
			if(isset($_GET['id'])){
				$query=lista_calle($_GET['id']);
			 $row=$query->fetch_assoc();
			}$id;
   
    ?>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Calles</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
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
							<h4 class="text-blue h4">Calle</h4>
							
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
			 				    <th scope="col">Calle</th>
			 				    <th scope="col">Estado</th> 				
			 				<th></th>
								</tr>
							</thead>
							<tbody>
	
			
                                    <?php
                                     $c=1;
			 			$query=lista_calle($id);
		 				while ( $row= $query->fetch_assoc() ) {
		 					echo" 
								<tr>
					 				<td scope='row'>".$c."</td>
					 				<td scope='row'>".$row['nombre_calle']."</td>
                                     <td scope='row'>".$row['estado_calle']."</td>
					 				<td>
									 <a href='#edit_".$row['id_calle']."'  data-toggle='modal' class='btn btn-primary'>Editar</a>		 
									 <a href='#delete_".$row['id_calle']."'  data-toggle='modal' class='btn btn-danger' >Cambiar Estado</a>
									 
					 				</td>
					 			</tr>
		 					";
							 include('php/clientes_backend/Modals/cambiar_estado_cliente.php');
							 include('php\direccion_backend\calle\Modals\ActualizarCalleModal.php');
                             $c++;
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

		<script>
$( document ).ready(function() {
  // Asociar un evento al botón que muestra la ventana modal
  $('#addnew').click(function() {
    $.ajax({
        // la URL para la petición
        url : 'php\direccion_backend\calle\Modals\Modal_Calle.php',
 
        // la información a enviar
        data : { 'id' : <?php echo $id; ?> },
 
        // especifica si será una petición POST o GET
        type : 'GET',
 
        // el tipo de información que se espera de respuesta
        dataType : 'html',
 
        // código a ejecutar si la petición es satisfactoria;
       
 
        // código a ejecutar si la petición falla;
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
  });
});

$( document ).ready(function() {
  // Asociar un evento al botón que muestra la ventana modal
  $('#edit_').click(function() {
    $.ajax({
        // la URL para la petición
        url : 'php\direccion_backend\calle\Modals\ActualizarCalleModal.php',
 
        // la información a enviar
        data : { 'id' : <?php echo $id; ?> },
 
        // especifica si será una petición POST o GET
        type : 'GET',
 
        // el tipo de información que se espera de respuesta
        dataType : 'html',
 
        // código a ejecutar si la petición es satisfactoria;
       
 
        // código a ejecutar si la petición falla;
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
  });
});
</script>

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
        include('php\direccion_backend\calle\Modals\Modal_Calle.php');	
		include('php/ppie\ppiemenu.php');	
	?>
</html>