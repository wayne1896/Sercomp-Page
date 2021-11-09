<!DOCTYPE html>
<html>
<head>

	<?php 

require_once ("config/db.php");
require_once ("config/conexion.php");
include "config.php";
		include('php/sidebar2\sidebar-facturacion2.php');	
		
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
				
			</div>
			<form method='post' action=''>
				<div class="form-row align-items-center">
					<div class="col-sm-3 my-1"> 
						Fecha de inicio
						<input type='date' class='dateFilter' name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>'>
					</div>
					<div class="col-sm-3 my-1">
						Fecha final <input type='date' class='dateFilter' name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>'>
					</div>
					<div class="col-sm-3 my-1">
						<button type='submit' class="btn btn-primary" name='but_search' > Buscar</button>
					</div>
				</div>
					
			</form>
	
<?php
  // Date filter
  $emp_query = " ";
  if(isset($_POST['but_search'])){
	$fromDate = $_POST['fromDate'];
	$endDate = $_POST['endDate'];

	if(!empty($fromDate) && !empty($endDate)){
		$emp_query .= " and fecha_factura between '".$fromDate."' and '".$endDate."' ";
	}
}

		include 'ajax/pagination.php'; //include pagination file
		//pagination variables
		
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM factura f join cliente c on (f.id_cliente=c.id_cliente) join empleado e on (f.id_empleado=e.id_empleado)  ");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './facturacionfecha.php';
		//main query to fetch the data
		$sql="SELECT * FROM  factura f join cliente c on (f.id_cliente=c.id_cliente) join empleado e on (f.id_empleado=e.id_empleado) $emp_query LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="users-table table-wrapper">
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
				<tr >
					<th scope="col">#</th>
					<th scope="col">Fecha</th>
					<th scope="col">Cliente</th>
					<th scope="col">Vendedor</th>
					<th scope="col">Estado</th>
					<th scope="col">Metodo de Pago</th>
					<th class='text-right'>Total</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
		</thead>
		<tbody>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_factura=$row['id_factura'];
						$numero_factura=$row['numero_factura'];
						$fecha=date("d/m/Y", strtotime($row['fecha_factura']));
						$nombre_cliente=$row['nombre_cliente'];
						$telefono_cliente=$row['telefono_cliente'];
						$email_cliente=$row['correo_cliente'];
						$nombre_vendedor=$row['nombre_empleado']." ".$row['apellido_empleado'];
						$estado_factura=$row['estado_factura'];
						if ($estado_factura=='Pagado'){$text_estado="Pagada";$label_class='badge-active';}
						else{$text_estado="Pendiente";$label_class='badge-pending';}
						if ($estado_factura=='Anulada'){$text_estado="Anulada";$label_class='badge-trashed';}
						$pago_factura=$row['tipodepago_factura'];
						$total_venta=$row['totalpago'];
					?>
					<tr>
				
						<td scope="row"><?php echo $numero_factura; ?></td>
						<td scope="row"><?php echo $fecha; ?></td>
						<td scope="row"><a href="#" data-toggle="tooltip" data-placement="top" title="<i class='glyphicon glyphicon-phone'></i> <?php echo $telefono_cliente;?><br><i class='glyphicon glyphicon-envelope'></i>  <?php echo $email_cliente;?>" ><?php echo $nombre_cliente;?></a></td>
						<td scope="row"><?php echo $nombre_vendedor; ?></td>
						<td scope="row"><span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span></td>
						<td scope="row"><?php echo $pago_factura; ?></td>
						<td scope="row" class='text-right'><?php echo number_format ($total_venta,2); ?></td>					
					<td class="text-right">	<?php
						if($row['estado_factura']=='Pendiente'){
							?>
						<a href="php\facturacion_backend\editar_factura.php?id_factura=<?php echo $id_factura;?>"
						 class="btn btn-outline-primary" title='Editar factura' ><i class='bx bxs-edit bx'></i></a> 
						 <?php
							}
						?>
						<a href="#" class="btn btn-outline-primary" title='Descargar factura' onclick="imprimir_factura1('<?php echo $id_factura;?>');"><i class='bx bxs-download bx'></i></a> 
						
					</td>
						
					</tr>
					<?php
                    }
                }else{
                    echo "<tr>";
                    echo "<td colspan='4'>No Encontradas.</td>";
                    echo "</tr>";
                }
                ?>
        
				</tbody>
			  </table>
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