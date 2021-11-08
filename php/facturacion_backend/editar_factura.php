<?php

	include('../sidebar/sidebarreg.php');


	/* Connect To Database*/
	require_once ("../../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	if (isset($_GET['id_factura']))
	{
		$id_factura=intval($_GET['id_factura']);

		$sql_factura=mysqli_query($con,"select * from factura f join cliente c on (f.id_cliente=c.id_cliente) JOIN ciudad s ON (c.ciudad_cliente=s.id_ciudad) 
		JOIN sector e ON (c.sector_cliente=e.id_sector) JOIN calle u ON (c.calle_cliente=u.id_calle)
		where f.id_cliente=c.id_cliente and f.id_factura='".$id_factura."'");
		$count=mysqli_num_rows($sql_factura);
		if ($count==1)
		{
				$rw_factura=mysqli_fetch_array($sql_factura);
				$id_cliente=$rw_factura['id_cliente'];
				$nombre_cliente=$rw_factura['nombre_cliente'];
				$telefono_cliente=$rw_factura['telefono_cliente'];
				$email_cliente=$rw_factura['correo_cliente'];
				$id_vendedor_db=$rw_factura['id_empleado'];
				$fecha_factura=date("d/m/Y", strtotime($rw_factura['fecha_factura']));
				$condiciones=$rw_factura['tipodepago_factura'];
				$estado_factura=$rw_factura['estado_factura'];
				$numero_factura=$rw_factura['numero_factura'];
				$_SESSION['id_factura']=$id_factura;
				$_SESSION['numero_factura']=$numero_factura;
		}	
		else
		{
			header("location: facturas.php");
			exit;	
		}
	} 
	else 
	{
		header("location: facturas.php");
		exit;
	}

?>
<!DOCTYPE html>
<html>
 <!-- Basic Page Info -->
 <meta charset="utf-8">
	<title>SERCOMP - Editar factura</title>

	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	  <!-- Custom styles -->
	  <link rel="stylesheet" href="../../css/style.min.css">
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
	
    
  <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4 class='main-title'><i class='bx bxs-edit'></i> Editar Factura</h4>
		</div>
		<div class="panel-body">
		<?php 
			include("modal/buscar_productos.php");
		
		
		?>
			<form class="form-horizontal" role="form" id="datos_factura">
				<div class="form-group row">
				  <label class="form-label" for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Selecciona un cliente" required value="<?php echo $nombre_cliente;?>">
					  <input id="id_cliente" name="id_cliente" type='hidden' value="<?php echo $id_cliente;?>">	
				  </div>
				  <label class="form-label" for="tel1" class="col-md-1 control-label">Teléfono</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" value="<?php echo $telefono_cliente;?>" readonly>
							</div>
					<label class="form-label" for="mail" class="col-md-1 control-label">Email</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="mail" placeholder="Email" readonly value="<?php echo $email_cliente;?>">
							</div>
				 </div>
						<div class="form-group row">
							<label class="form-label" for="empresa" class="col-md-1 control-label">Vendedor</label>
							<div class="col-md-3">
								<select class="form-control input-sm" id="id_vendedor" name="id_vendedor">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from empleado order by nombre_empleado");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["id_empleado"];
											$nombre_vendedor=$rw["nombre_empleado"]." ".$rw["apellido_empleado"];
											if ($id_vendedor==$id_vendedor_db){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
							</div>
							<label class="form-label" for="tel2" class="col-md-1 control-label">Fecha</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="fecha" value="<?php echo $fecha_factura;?>" readonly>
							</div>
							<label class="form-label" for="email" class="col-md-1 control-label">Pago</label>
							<div class="col-md-2">
								<select class='form-control input-sm ' id="condiciones" name="condiciones">
									<option value="Efectivo" <?php if ($condiciones=='Efectivo'){echo "selected";}?>>Efectivo</option>
									<option value="Cheque" <?php if ($condiciones=='Cheque'){echo "selected";}?>>Cheque</option>
									<option value="Transferencia" <?php if ($condiciones=='Transferencia'){echo "selected";}?>>Transferencia bancaria</option>
									<option value="Credito" <?php if ($condiciones=='Credito'){echo "selected";}?>>Crédito</option>
								</select>
							</div>
							<div class="col-md-2">
								<select class='form-control input-sm ' id="estado_factura" name="estado_factura">
									<option value="Pagado" <?php if ($estado_factura=='Pagado'){echo "selected";}?>>Pagada</option>
									<option value="Pendiente" <?php if ($estado_factura=='Pendiente'){echo "selected";}?>>Pendiente</option>
									<option value="Anulada" <?php if ($estado_factura=='Anulada'){echo "selected";}?>>Anulada</option>
									
								</select>
							</div>
						</div>
				

				<div class="col-md-12">
					<div class="pull-right">
				
						<button type="submit" class="btn btn-outline-primary">
						  <span class="bx bx-refresh bx-sm"></span> Actualizar datos
						</button>
				
						
						<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal">
						 <span class="bx bx-search-alt bx-sm"></span> Agregar productos
						</button>
						<button type="button" class="btn btn-outline-primary" onclick="imprimir_factura1('<?php echo $id_factura;?>')">
						  <span class="bx bx-printer bx-sm"></span> Imprimir
						</button>
					</div>	
				</div>
			</form>	
			<div class="clearfix"></div>
				<div class="editar_factura" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->	
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
			
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
	<script src="../../plugins/chart.min.js"></script>
	<!-- Icons library -->
	<script src="../../plugins/feather.min.js"></script>
	
	<!-- Custom scripts -->
	<script src="../../js/script.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../../js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="../../js/editar_factura.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(function() {
						$("#nombre_cliente").autocomplete({
							source: "./ajax/autocomplete/clientes.php",
							minLength: 2,
							select: function(event, ui) {
								event.preventDefault();
								$('#id_cliente').val(ui.item.id_cliente);
								$('#nombre_cliente').val(ui.item.nombre_cliente);
								$('#tel1').val(ui.item.telefono_cliente);
								$('#mail').val(ui.item.email_cliente);
																
								
							 }
						});
						 
						
					});
					
	$("#nombre_cliente" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
											
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#nombre_cliente" ).val("");
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
						}
			});	
	</script>

  </body>
  <?php   
       
		include('../ppie\ppiemenu.php');	
	?>
    

</html>