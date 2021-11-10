<!DOCTYPE html>
<html>
<head>

	
<?php 
 

 include('php/sidebar\sidebartecnico.php');	
 include('php/consultas/consultaperfil.php');	

$id2;
 if(isset($_GET['id2'])){
	$query= extraerempleadoperfil($_GET['id2']);
 $row=$query->fetch_assoc();}

 include_once 'dbConfig.php'; 

 // Fetch all the country data 
 $query2 = "SELECT * FROM ciudad ORDER BY nombre_ciudad ASC"; 
 $result = $db->query($query2); 
 include "Conexion.php";
 $db =  connect();
 $query2=$db->query("select * from ciudad");
 $ciudad = array();
 while($r=$query2->fetch_object()){ $ciudad[]=$r; }
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'tesis';
$usuario = 'root';
$contraseña = '';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno)
{
   die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}




	?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SERCOMP - Editar perfil</title>

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
	 

<div class="mobile-menu-overlay"></div>

<div class="container">
    <div class="pd-ltr-20">
        
       
           
<!-- Responsive tables Start -->
<div class="pd-20 card-box mb-30">

				
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
			 <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Editar Perfil</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="php\empleados_backend\registroempleadopp.php?accion=UDT">
		
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>ID </label>
                        <input type="text" class="form-control" readonly="" id="codigo" name="codigo" placeholder="ID" value="<?php echo $row['id_empleado'] ?>">
                      </div>
                    </div>
                   
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Correo electronico</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Email" value="<?php echo $row['correo_empleado'] ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="email" class="form-control" id="usuario" readonly='' name="usuario" placeholder="Email" value="<?php echo $row['usuario'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre_empleado'] ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $row['apellido_empleado'] ?>">
                      </div>
                    </div>
                  </div>
				  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono_empleado'] ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Cedula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula" value="<?php echo $row['cedula_empleado'] ?>">
                      </div>
                    </div>
                  </div>
				  
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Ciudad</label>
						<select class="form-control"  title="Seleccione Su Ciudad" required="required" id="ciudad" name="ciudad">
                        <option value="">Seleccione Su Ciudad</option> 
						<?php 
						if($result->num_rows > 0){ 
							while($row1 = $result->fetch_assoc()){  
                            	echo '<option value="'.$row1['id_ciudad'].'">'.$row1['nombre_ciudad'].'</option>'; 
							} 
						}else{ 
							echo '<option value="">Ciudad no disponible</option>'; 
						 } 
						?>
						</select>
					 </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Sector</label>
						<select class="form-control" title="Seleccione Su Sector" id="sector" required="required" name="sector">
                        <option value="">Seleccione una ciudad primero</option>
                        
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Calle</label>
                        <select class="form-control" title="Seleccione Su Calle" id="calle" required="required" name="calle">
                        <option value="">Seleccione un sector primero</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
				  <div class="col-md-4">
                      <div class="form-group">
                        <label>Numero de casa</label>
                        <input type="text" class="form-control" id="numcasa" name="numcasa" value="<?php echo $row['numcasa_empleado'] ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" value="<?php echo $row['fechanacimiento_empleado'] ?>">
                      </div>
                    </div>
					<div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Cargo</label>
                        <input type="text" class="form-control" disabled=""  placeholder="Cargo" value="<?php echo $row['cargo'] ?>">
                      </div>
                    </div>
                  </div>

				  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <input type="submit" class="btn btn-primary btn-round" value="Actualizar Perfil">
                    </div>
                  </div>
                </form>
              </div>
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

<script>$(document).ready(function(){
    $('#ciudad').on('change', function(){
        var ciudadID = $(this).val();
        var ciudadNombre = $(this).val();
        if(ciudadID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id_ciudad='+ciudadID,
                success:function(html){
                    $('#sector').html(html);
                    $('#calle').html('<option value="">Seleccione un sector primero</option>'); 
                }
            }); 
        }else{
            $('#sector').html('<option value="">Seleccione una ciudad primero</option>');
            $('#calle').html('<option value="">Seleccione un sector primero</option>'); 
        }
    });
    
    $('#sector').on('change', function(){
        var sectorID = $(this).val();
        if(sectorID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id_sector='+sectorID,
                success:function(html){
                    $('#calle').html(html);
                }
            }); 
        }else{
            $('#calle').html('<option value="">Seleccione un sector primero</option>'); 
        }
    });
});</script>

</body>

<?php   
 
		include('php/ppie\ppiemenu.php');	
	?>
	
</html>