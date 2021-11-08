<?php
  include('..\consultas\consultaorden1.php');
			$id= $_GET['id'];
			if(isset($_GET['id'])){
				$query=extraerorden($_GET['id']);
			 $row=$query->fetch_assoc();
			}
			
?>
<!DOCTYPE html>
<html>


<?php 

if ( isset($_POST['lat']) ) {
    $lat = $_POST["lat"];
    $long = $_POST["long"];
}
 

include_once '../../dbConfig.php'; 

// Fetch all the country data 
$query = "SELECT * FROM ciudad ORDER BY nombre_ciudad ASC"; 
$query1 = "SELECT * FROM servicios ORDER BY nombre_servicio ASC"; 
$result1 = $db->query($query); 
$result2 = $db->query($query1); 
   // cliente
   $query2 = "SELECT * FROM cliente ORDER BY nombre_cliente ASC"; 
   $result3 = $db->query($query2); 
include "../../Conexion.php";
$db =  connect();



/////// CONEXIÓN A LA BASE DE DATOS /////////
  
include('../sidebar/sidebarclientereg.php');		
      include('../consultas/consultaorden.php');	
  ?>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Orden nueva</title>
 
	
 
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	  <!-- Custom styles -->
	  <link rel="stylesheet" href="../../css/style.min.css">
	  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	
	
	

	<!-- Global site tag (gtag.js) - Google Analytics -->

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
	
<main class="main" id="skip-target">
    <div class="container" >
    <form method="POST"  action="registroordenp.php?accion=UDP">
    <div class="main-title-wrapper">
    <h1 class="sign-up__title">Datos Básicos de la orden</h1>
    </div>

    <div class="row new-page__row">
            <div class="mx-auto" >
              <div class="main-content new-page-content" >
               
         
                    <label class="form-label" for="inputName">Servicios:</label>
                    <select class="form-control" title="Seleccione el servicio a ofrecer" id="servicio" name="servicio">
                                 <option value="">Seleccione el Servicio</option>
                                 <?php 
                    if($result2->num_rows > 0){ 
                        while($row1 = $result2->fetch_assoc()){  
                            echo '<option value="'.$row1['id_servicio'].'">'.$row1['nombre_servicio'].'</option>'; 
                        } 
                    }
                    ?>
                    </select>
                     
                    <input type="text" class="form-control" readonly="" name="codigo" id="codigo" value="<?php echo $row['id_orden']; ?>" placeholder="Ingrese el nombre del Cliente"/>
                    <?php $id2= $row['id_orden'];
                     ?>
                    <label class="form-label" for="inputfistname">Ingrese el detalle del problema:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="2"><?php echo $row['descripcion_orden']; ?></textarea>
                    
                 
                           <label for="inputPassword">Nombre del Cliente:</label>
                           <input type="text" class="form-control" readonly="" name="nombre" id="nombre" value="<?php echo $row['nombre_cliente'].' '.$row['apellido_cliente']; ?>" placeholder="Ingrese el nombre del Cliente"/>
                       
                    
                        <label class="form-label" for="inputfistname">Teléfono:</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" value="<?php echo $row['telefono_cliente']; ?>"  placeholder="Ingrese el Teléfono del Cliente"/>
                    
                        
                        <label class="form-label" for="inputName">Numero de Casa:</label>
                                <input type="number" class="form-control" name="numcasa" id="numcasa"    value="<?php echo $row['numcasa_orden']; ?>" placeholder="Ingrese su Numero de Casa"/>
                    <label class="form-label" for="inputName">Ciudad:</label>
                        <select class="form-control"  title="Seleccione Su Ciudad" id="ciudad" name="ciudad">
                            <option value="">Seleccione Su Ciudad</option>
                                <?php 
                                if($result1->num_rows > 0){ 
                                    while($row = $result1->fetch_assoc()){  
                                        echo '<option value="'.$row['id_ciudad'].'">'.$row['nombre_ciudad'].'</option>'; 
                                    } 
                                }else{ 
                                    echo '<option value="">Ciudad no disponible</option>'; 
                                } 
                                ?>
                        </select>

                            <label class="form-label" for="inputName">Sector:</label>
                            <select class="form-control" title="Seleccione Su Sector" id="sector" name="sector">
                                  <option value="">Seleccione una ciudad primero</option>
                           </select>

                            <label class="form-label" class="form-label" for="inputName">Calle:</label>
                            <select class="form-control" title="Seleccione Su Calle" id="calle" name="calle">
                                <option value="">Seleccione un sector primero</option>
                            </select>

                            
                          
                     
                           </div>
                    
                           <script>$(document).ready(function(){
    $('#ciudad').on('change', function(){
        var ciudadID = $(this).val();
        var ciudadNombre = $(this).val();
        if(ciudadID){
            $.ajax({
                type:'POST',
                url:'../../ajaxData.php',
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
                url:'../../ajaxData.php',
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

<?php if($lat=null){ ?>
  

<?php } ?>
   
<div class="main-btns-wrapper">
<a type="button" class="secondary-default-btn" href="ordensin.php"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> Cancel</a>
                                <button type="submit" name="editar" class="primary-default-btn"><span class="glyphicon glyphicon-check"></span> Actualizar</a>
                                </div>
            </form>
        

		</div>
	</div>
    </div>


</main>

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
	
</body>
<div class="bs-example">
    <!-- Extra Large modal -->
    

    <div id="extraLargeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Geolocalizador</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <title>Geolocalizador web</title>
<link href="css/reset.css" rel="stylesheet" style="text/css" />
<link href="css/main.css" rel="stylesheet" style="text/css" media="screen" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>

</head>
<body>
	<div id="container">
		<div id="errorjs" style="color:red;font-size:25px;margin-top:30px;"></div>
		<h1>Geolocalizador </h1>
		<h2>Haz click en el siguiente bot&oacute;n para localizarte</h2>
		<button id="btn">¡Local&iacute;zame!</button>
	</div>
</body>
<script type="text/javascript">

 
      
	//funcion autoejecutable para obtener las coordenadas con HTML Geolocation API
	(function(){
		//capa para mostrar las coordenadas (definida tambien en el HTML)
		var errorjs=document.getElementById('errorjs');
		//verificamos si el navegador soporta Geolocation API de HTML5
		if(navigator.geolocation){
			//intentamos obtener las coordenadas del usuario
			navigator.geolocation.getCurrentPosition(function(objPosicion){
				//almacenamos en variables la longitud y latitud
				var iLongitud=objPosicion.coords.longitude, iLatitud=objPosicion.coords.latitude;


				//pasamos las variables por ajax
				$("#btn").on( 'click', function () {
				    $.ajax({
				        type: 'post',
				        url: 'localizado1.php',
				        data: 'long='+iLongitud+'&lat='+iLatitud,
				        success: function( data ) {
				            document.write( data );
				        }
				    });
                    
				    errorjs.innerHTML='<img src="load.gif" />';
                    
				});
			}
            
            ,function(objError){
				//manejamos los errores devueltos por Geolocation API
				switch(objError.code){
					//no se pudo obtener la informacion de la ubicacion
					case objError.POSITION_UNAVAILABLE:
						errorjs.innerHTML='La informaci&oacute;n de tu posici&oacute;n no es posible';
					break;
					//timeout al intentar obtener las coordenadas
					case objError.TIMEOUT:
						errorjs.innerHTML="Tiempo de espera agotado";
					break;
					//el usuario no desea mostrar la ubicacion
					case objError.PERMISSION_DENIED:
						errorjs.innerHTML='Necesitas permitir tu localizaci&oacute;n';
					break;
					//errores desconocidos
					case objError.UNKNOWN_ERROR:
						errorjs.innerHTML='Error desconocido';
					break;
				}
			});
		}else{
			//el navegador del usuario no soporta el API de Geolocalizacion de HTML5
			errorjs.innerHTML='Tu navegador no soporta la Geolocalizaci&oacute;n en HTML5';
		}
	})();
</script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    

<?php   
       
		include('../ppie\ppiemenu.php');	
	?>
    
