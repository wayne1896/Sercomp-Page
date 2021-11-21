<!DOCTYPE html>
<html>
<head>

	<?php 

  



include('php/sidebar/sidebartecnico.php');		
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
						<h4 class="main-title">Calle</h4>
							
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
                                <th scope="col">ID</th>
			 				    <th scope="col">Calle</th>
			 				    <th scope="col">Estado</th> 	
               			
			 				
								</tr>
							</thead>
							<tbody>
	
			
                                    <?php
                                     $c=1;
			 			$query=lista_calle($id);
		 				while ( $row= $query->fetch_assoc() ) {
              $estado_cliente=$row["estado_calle"];
							if ($estado_cliente=="Activo"){$text_estado="Activo";$label_class="badge-active";}
							else{$text_estado="Desactivado";$label_class="badge-trashed";}
		 					echo" 
								<tr>
					 				<td scope='row'>".$c."</td>
					 				<td scope='row'>".$row['nombre_calle']."</td>
                   <td scope='row'><span class='label ".$label_class."'>".$text_estado."</span></td>
					 				<td>
									
									 
					 				</td>
					 			</tr>
		 					";
							 
                             $c++;
		 				}
			 			?> 
	 </tbody>
	  </table>
		</div>
	</div>
</div>

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
        include('php/direccion_backend/calle/Modals/Modal_Calle.php');	
		include('php/ppie/ppiemenu.php');	
	?>
</html>