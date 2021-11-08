<!DOCTYPE html>
<html>
<head>

	<?php 

  
include('php/sidebar2\sidebar-orden.php');	


  include_once 'dbConfig.php'; 

  // ciudad
  $query = "SELECT * FROM ciudad ORDER BY nombre_ciudad ASC"; 
  $result3 = $db->query($query); 
  // servicio
  $query1 = "SELECT * FROM servicios ORDER BY nombre_servicio ASC"; 
  $result2 = $db->query($query1); 
  // empleado
  $query3 = "SELECT * FROM empleado ORDER BY nombre_empleado ASC"; 
  $result4 = $db->query($query3); 

   // cliente
   $query4 = "SELECT * FROM cliente ORDER BY nombre_cliente ASC"; 
   $result5 = $db->query($query4); 

  include "Conexion.php";
  $db =  connect();
  $query=$db->query("select * from ciudad");
  $ciudad = array();
  while($r=$query->fetch_object()){ $ciudad[]=$r; }
/////// CONEXIÓN A LA BASE DE DATOS /////////
 			
		
		include('php/consultas/consultaorden.php');	
    ?>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Ordenes sin asignar</title>

	
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
						<h4 class="main-title">Ordenes sin asignar</h4>
							
						</div>
						<div class="pull-right">
                        <a href="php\orden_backend\ordennuevo.php" class="btn btn-primary" > Nuevo</a>
						<a href="ordenasig.php" class="btn btn-secondary"><i class="fa fa-code"></i>Ver Orden asignadas</a>
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
			 				    <th scope="col">Descripcion</th>
							    <th scope="col">Servicio solicitado</th>
			 				    <th scope="col">Direccion</th>
                                <th scope="col">Fecha de Orden</th> 
							    <th scope="col">Telefono</th>
							    <th scope="col">Nombre cliente</th>
			 				    <th scope="col">Estado de la orden</th> 	
								 		
			 				<th scope="col">Acciones</th>
								</tr>
							</thead>
							<tbody>
	
			
                                    <?php
			 			$query=lista_orden_sinasignar();
		 				while ( $row= $query->fetch_assoc() ) {
							$estado_cliente=$row["estado_orden"];
							if ($estado_cliente=="Asignada"){$text_estado="Activo";$label_class="badge-active";}
							else{$text_estado="Sin Asignar";$label_class="badge-trashed";}
		 					echo" 
								<tr>
					 				<td scope='row'>".$row['id_orden']."</td>
					 				<td scope='row'>".$row['descripcion_orden']."</td>
					 				<td scope='row'>".$row['nombre_servicio']."</td>
									 <td scope='row'>".$row['nombre_ciudad']." ".$row['nombre_sector']." ".$row['nombre_calle']." Casa No:".$row['numcasa_cliente']."</td>
                                     <td scope='row'>".$row['fecha_orden']."</td>
                                     <td scope='row'>".$row['telefono_cliente']."</td>
                                     <td scope='row'>".$row['nombre_cliente']." ".$row['apellido_cliente']."</td>
									 <td scope='row'><span class='label ".$label_class."'>".$text_estado."</span></td>
					 				<td>
									 <a href='php/orden_backend/ordeneditar.php?id=".$row['id_orden']."' class='btn btn-primary'>Editar</a>
									 <a href='#asig_".$row['id_orden']."'  data-bs-toggle='modal' class='btn btn-secondary'>Asignar</a>
									
									 
									 
					 				</td>
					 			</tr>
		 					";
							 include('php\orden_backend\Modals\ActualizarOrdenModal.php');
							  include('php\orden_backend\Modals\asignar_ordenModal.php');
							 
							
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
<!-- ! Footer -->
<footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
    
    <p>Sercomp - Todos los derechos reservados 2021  </p>
			
    </div>
    <ul class="footer-end">
      <li><a href="##">About</a></li>
      <li><a href="##">Support</a></li>
    </ul>
  </div>
</footer>
</body>
<?php   
        include('php\orden_backend\Modals\Modal_Orden.php');	
		
	?>
	
</html>