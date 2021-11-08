<!DOCTYPE html>
<html>
<head>

	
<?php 
 

 include('php/sidebar2\sidebar.php');	
 include('php/consultas/consultaperfil.php');	

$query= extraerempresaperfil();
$row=$query->fetch_assoc();

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
                <h5 class="card-title">Editar Cuenta de la Empresa</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="php\empleados_backend\registroempleadop.php?accion=UDT">
		
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>ID </label>
                        <input type="text" class="form-control" readonly="" id="codigo" name="codigo" placeholder="Company" value="<?php echo $row['id_perfil'] ?>">
                      </div>
                    </div>
                   
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Correo electronico</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Email" value="<?php echo $row['email'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Company" value="<?php echo $row['nombre_empresa'] ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Last Name" value="<?php echo $row['ciudad'] ?>">
                      </div>
                    </div>
                  </div>
				  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Direccion</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Company" value="<?php echo $row['direccion'] ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" value="<?php echo $row['telefono'] ?>">
                      </div>
                    </div>
                  </div>
				  
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Codigo postal</label>
                        <input type="text" class="form-control" id="codigopostal" name="codigopostal" placeholder="" value="<?php echo $row['codigo_postal'] ?>">
					 </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Impuesto</label>
                        <input type="text" class="form-control" id="impuesto" name="impuesto" placeholder="" value="<?php echo $row['impuesto'] ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Logo Url</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="" value="<?php echo $row['logo_url'] ?>">
                      </div>
                    </div>
                  </div>



				  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <input type="submit" class="btn btn-primary btn-round" value="Update Profile">
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