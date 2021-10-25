<!DOCTYPE html>
<html>


<?php 
       include('../pcabeza\navbar_ordenreg.php');	
       include('../sidebar/sidebarclientereg.php');	
      include('../consultas/consultaorden.php');
if ( isset($_POST['lat']) ) {
    $lat = $_POST["lat"];
    $long = $_POST["long"];
}
 

include_once '../../dbConfig.php'; 

// Fetch all the country data 

$query1 = "SELECT * FROM servicios ORDER BY nombre_servicio ASC"; 

$result2 = $db->query($query1); 
   // cliente
   $query2 = "SELECT * FROM cliente c join ciudad e on (c.ciudad_cliente=e.id_ciudad)
   join sector s on (c.sector_cliente=s.id_sector) join calle x on (c.calle_cliente=x.id_calle) 
    where correo_cliente='$id2' "; 
   $result3 = $db->query($query2); 
include "../../Conexion.php";
$db =  connect();



/////// CONEXIÓN A LA BASE DE DATOS /////////
	
  ?>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>
 
	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../../vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../../vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../../vendors/images/favicon-16x16.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../../src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="../../vendors/styles/style.css">
  <link rel="stylesheet" type="text/css" href="../../src/styles/style_form_out.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');

    
	</script>
	<style>

</style>
</head>


<body>
	
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container2">
    <form method="POST"  action="registroordenp.php?accion=INS">
                 <div class="form-group">

                 <h1>Datos Básicos de la Orden</h1>
                    
                 <div class="form-group">
                                <a href="#" data-toggle="modal" data-target="#extraLargeModal"><FONT SIZE=5>Cargar Ubicacion por GPS </font></a>
                        
                           </div>
                    <label for="inputName">Servicios:</label>
                    <select class="form-group" title="Seleccione el servicio a ofrecer" id="servicio" name="servicio">
                                 <option value="">Seleccione el Servicio</option>
                                 <?php 
                    if($result2->num_rows > 0){ 
                        while($row1 = $result2->fetch_assoc()){  
                            echo '<option value="'.$row1['id_servicio'].'">'.$row1['nombre_servicio'].'</option>'; 
                        } 
                    }
                    ?>
                    </select>
                    <label for="inputfistname">Ingrese el detalle del problema:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="2"></textarea>
                    <div class="form-group">
                        <label for="inputPassword">Nombre del Cliente:</label>
                        <select class="form-group" title="Nombre cliente" id="nombre" name="nombre">
                                 <option value="">Seleccione el Cliente</option>
                                 <?php 
                    if($result3->num_rows > 0){ 
                        while($row2 = $result3->fetch_assoc()){  
                            echo '<option value="'.$row2['id_cliente'].'">'.$row2['nombre_cliente'].' '.$row2['apellido_cliente'].'</option>'; 
                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="inputfistname">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" readonly placeholder="Ingrese el Teléfono del Cliente"/
                        value="<?php echo $row2['telefono_cliente']?>">
                    </div>
                    <label for="inputName">Ciudad:</label>
                    <input type="text" class="form-control"  readonly  id="ciudad1" name="ciudad1"
                    value="<?php echo $row2['nombre_ciudad']?>">
                    <input type="text" class="form-control"  readonly hidden  id="ciudad" name="ciudad"
                    value="<?php echo $row2['ciudad_cliente']?>">
                            

                            <label for="inputName">Sector:</label>
                            <input type="text" class="form-control"  readonly  id="sector1" name="sector1"
                            value="<?php echo $row2['nombre_sector']?>">
                            <input type="text" class="form-control"  readonly hidden  id="sector" name="sector"
                            value="<?php echo $row2['sector_cliente']?>">
                                      

                            <label for="inputName">Calle:</label>
                            <input type="text" class="form-control"  readonly  id="calle1" name="calle1"
                            value="<?php echo $row2['nombre_calle']?>">
                            <input type="text" class="form-control" hidden readonly  id="calle" name="calle"
                            value="<?php echo $row2['calle_cliente']?>">


                            <div class="form-group">
                                <label for="inputName">Numero de Casa:</label>
                                <input type="text" class="form-control" name="numcasa" id="numcasa"  readonly placeholder="Ingrese su Numero de Casa"/
                                value="<?php echo $row2['numcasa_cliente']?>">
                           </div>
                           <?php
                        } 
                    }
                    ?>
                        <div class="form-group">
                        <input type="number" class="form-control" name="lat" id="lat"  value="<?php echo  $lat; ?>" required="required" />
                        <input type="number" class="form-control" name="long" id="long"  value="<?php echo  $long; ?>" required="required" />
                           </div>
                    
                       

<?php if($lat<>0){ ?>
  

<?php } ?>
    <button type="button" class="btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
   <button type="submit" name="editar" class="btn-success"><span class="glyphicon glyphicon-check"></span> Aceptar</a>
		
                    
            </form>
        

		</div>
	</div>

	<!-- js -->
	<script src="../../vendors/scripts/core.js"></script>
	<script src="../../vendors/scripts/script.min.js"></script>
	<script src="../../vendors/scripts/process.js"></script>
	<script src="../../vendors/scripts/layout-settings.js"></script>
	<script src="../../src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="../../vendors/scripts/steps-setting.js"></script>
</body>
<div class="bs-example">
    <!-- Extra Large modal -->
    

    <div id="extraLargeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Geolocalizador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
				        url: 'localizado.php',
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">OK</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    

<?php   
       
		include('../ppie\ppiemenu.php');	
	?>
    
