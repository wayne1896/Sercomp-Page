<!DOCTYPE html>
<html>
<head>

	<?php 
 		
		include('php/sidebar2\sidebar-empleado.php');	
		include('php/consultas/consultacargo.php');	
    ?>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Cargos</title>



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
        
       
           
<!-- Responsive tables Start -->
<div class="pd-20 card-box mb-30">

					<div class="clearfix mb-20">
						<div class="pull-left">
						<h4 class="main-title">Cargos o Posiciones</h4>
							
						</div>
						<div class="pull-right">
                        <a href="#addnew" class="btn btn-primary"  data-bs-toggle="modal"><i class="fa fa-code"></i> Nuevo</a>
						</div>
					</div>
					<?php 
	
	if(isset($_SESSION['message'])){
		?>
		<div class="alert alert-info text-center" style="margin-top:20px;">
			<?php echo $_SESSION['message']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php

		unset($_SESSION['message']);
	}
?>
						<div class="users-table table-wrapper">
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
                                <th scope="col">ID</th>
			 				    <th scope="col">Cargo o Posicion</th>
					

                                <th scope="col">Sueldo sin deducciones</th> 
							 				
			 				<th scope="col">Acciones </th>
								</tr>
							</thead>
							<tbody>
	
			
                                    <?php
			 			$query=lista_cargo();
		 				while ( $row= $query->fetch_assoc() ) {
							
		 					echo" 
								<tr>
					 				<td scope='row'>".$row['id_nomina']."</td>
					 				<td scope='row'>".$row['cargo']."</td>
					 			
									 <td scope='row'>RD$ ".$row['pago']."</td>
					 				<td>
									 <a href='#edit_".$row['id_nomina']."'  data-bs-toggle='modal' class='btn btn-primary'>Editar</a>
							
					 				</td>
					 			</tr>
		 					";
					
							 
							 include('php\cargo_backend\Modals\ActualizarCargoModal.php');
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
        include('php\cargo_backend\Modals\Modal_Cargo.php');	
		include('php/ppie\ppiemenu.php');	
	?>
</html>