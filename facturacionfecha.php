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

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">
	<link rel="stylesheet" href="css/custom.css">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



	
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="vendors/styles/styles.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
<link rel="stylesheet" type="text/css" href="src/styles/style_form_out.css">
<link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>

<!-- Script -->
<script src='jquery-3.3.1.js' type='text/javascript'></script>
<script src='jquery-ui.min.js' type='text/javascript'></script>
<script type='text/javascript'>
$(document).ready(function(){
	$('.dateFilter').datepicker({
		dateFormat: "yy-mm-dd"
	});
});
</script>

<!--
<link rel="stylesheet" type="text/css" href="src\bootstrap\css\bootstrap.min.css">
-->


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
					<h4 class="text-blue h4">Facturas</h4>
				</div>
				<div class="pull-right">
					<a href="php\facturacion_backend\nueva_factura.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Factura</a>
				</div>
				
			</div>


				  <form method='post' action=''>
				  <div class="form-row align-items-center">
				  <div class="col-sm-3 my-1">

						  Fecha de inicio
						  <input type='text' class='dateFilter' name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>'>
						</div>
						<div class="col-sm-3 my-1">

							Fecha final <input type='text' class='dateFilter' name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>'>
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
			<div class="table-responsive">
	<table class="table table-striped">
	<thead>
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
						if ($estado_factura=='Pagado'){$text_estado="Pagada";$label_class='badge badge-pill badge-success';}
						else{$text_estado="Pendiente";$label_class='badge badge-pill badge-primary';}
						if ($estado_factura=='Anulada'){$text_estado="Anulada";$label_class='badge badge-pill badge-danger';}
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
					<td class="text-right">
						<a href="php\facturacion_backend\editar_factura.php?id_factura=<?php echo $id_factura;?>" class='btn btn-default' title='Editar factura' ><i class='bx bxs-edit bx-sm'></i></a> 
						<a href="#" class='btn btn-default' title='Descargar factura' onclick="imprimir_factura1('<?php echo $id_factura;?>');"><i class='bx bxs-download bx-sm'></i></a> 
						<a href="#" class='btn btn-default' title='Borrar factura' onclick="eliminar('<?php echo $numero_factura; ?>')"><i class='bx bxs-trash bx-sm' ></i></a>
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
        <tr>
					<td colspan=7><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
				</tbody>
			  </table>
			</div>
        </div>
		</div>		
	</div>
</div>

	<!-- js -->
	<script src="vendors/scripts/app.js"></script>
	
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