<!DOCTYPE html>
<html>


<?php 

session_start();


    $lat = $_POST["lat"];
    $lon = $_POST["lon"];
 
    echo json_encode($lat);
echo json_encode($lon);

include_once '../../dbConfig.php'; 

// Fetch all the country data 
$query = "SELECT * FROM ciudad ORDER BY nombre_ciudad ASC"; 
$query1 = "SELECT * FROM servicios ORDER BY nombre_servicio ASC"; 
$result1 = $db->query($query); 
$result2 = $db->query($query1); 
include "../../Conexion.php";
$db =  connect();



/////// CONEXIÓN A LA BASE DE DATOS /////////
       include('../pcabeza\navbar_orden.php');	
      include('../sidebar\sidebar.php');	
      include('../consultas/consultaorden.php');	
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
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del Cliente"/>
                    </div>
                    <div class="form-group">
                        <label for="inputfistname">Teléfono:</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese el Teléfono del Cliente"/>
                    </div>
                    <label for="inputName">Ciudad:</label>
                        <select class="controls"  title="Seleccione Su Ciudad" id="ciudad" name="ciudad">
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

                            <label for="inputName">Sector:</label>
                            <select class="form-group" title="Seleccione Su Sector" id="sector" name="sector">
                                  <option value="">Seleccione una ciudad primero</option>
                           </select>

                            <label for="inputName">Calle:</label>
                            <select class="controls" title="Seleccione Su Calle" id="calle" name="calle">
                                <option value="">Seleccione un sector primero</option>
                            </select>

                            <div class="form-group">
                                <label for="inputName">Numero de Casa:</label>
                                <input type="number" class="form-control" name="numcasa" id="numcasa" placeholder="Ingrese su Numero de Casa"/>
                           </div>
                       <div class="form-group">
                                <a href="#" data-toggle="modal" data-target="#Gpsmodal">Cargar Ubicacion por GPS </a>
                        
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


<input type="text" class="form-control" name="nombre1" id="nombre1"  value="<?php echo  $lat+$lon; ?>" required="required" />";

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
<?php   
       
		include('../ppie\ppiemenu.php');	
	?>
        <!--  modal logout -->
        <div class="modal" id="Gpsmodal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog ">
		<div class="modal-content">
		  <div class="modal-header">
			<h1>Ubicacion <i class="fa fa-lock"></i></h1>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		  </div>
		  <div class="modal-body">
			<p><i class="fa fa-question-circle"></i> Ubicacion GPS <br /></p>
			<div class="actionsBtns">
				<form action="" method="post">
                <head>
		
		
		<!-- Carga API de google maps -->
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		
		<script type="text/javascript">
			var x=document.getElementById("errores");
			
			navigator.geolocation.getCurrentPosition(mostrarPosicion,showError); //Obtiene la posición
			
			function mostrarPosicion(position)
			{
				lat=position.coords.latitude; //Obtener latitud
				lon=position.coords.longitude; //Obtener longitud
				latlon=new google.maps.LatLng(lat, lon); //Crear objeto que representa un punto geográfico
				divmapa=document.getElementById('mapa');
				divmapa.style.height='600px'; //Alto
				divmapa.style.width='800px'; //Ancho
				
				<!-- Opciones para el mapa-->
				var myOptions={
					center:latlon,zoom:10, //Zoom
					mapTypeId:google.maps.MapTypeId.ROADMAP, //Tipo de mapa
					mapTypeControl:false, //Deshabilita el control de tipo de mapa
					navigationControlOptions:{ style:google.maps.NavigationControlStyle.SMALL } //Aspecto pequeño
				};
				var map=new google.maps.Map(document.getElementById("mapa"),myOptions); //Funcion que crea un mapa en la div .
				var marker=new google.maps.Marker({position:latlon,map:map,title:"Estás aquí!"}); //Constructor para crear marcador de la posición
			}
			
			<!-- Funcion para mostrar errores  -->
			function showError(error)
			{
				switch(error.code) 
				{
					case error.PERMISSION_DENIED:
					x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
					break;
					case error.POSITION_UNAVAILABLE:
					x.innerHTML="La información de la localización no esta disponible."
					break;
					case error.TIMEOUT:
					x.innerHTML="El tiempo de petición ha expirado."
					break;
					case error.UNKNOWN_ERROR:
					x.innerHTML="Ha ocurrido un error desconocido."
					break;
				}
			}
		</script>
	</head>
	
	<body>
		
		<!-- División o secciona para mostrar errores -->
		<div id="errores"></div>
		
		<!-- División o secciona para mostrar mapa -->
		<div id="mapa"></div>
		
		
	</body>
    <script>
    $.ajax({
            type: 'post',
            url: 'ordennuevo.php',
            data: {lat: lat, lon: lon },
            contentType: "application/json; charset=utf-8",
            traditional: true,
            success: function (data) {
                ...
            }
        });
        </script>

					<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}"/>
					<button type="sutmib" >Confirmar ubicacion</button>

					
						<button class="btn btn-default" data-dismiss="modal">Cancel</button>
						
				</form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
</html>