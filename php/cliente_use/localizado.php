<?php
//incluimos simple html dom
require_once('simple_html_dom.php');
//variable longitud
$long = $_POST['long'];
//variable latitud
$lat = $_POST['lat'];
//buscamos el resultado con la latitud y longitud de google maps
$html = file_get_html("https://maps.google.es/maps?q=$lat,$long");
//buscamos el resultado del código postal y la província localizada con simple html dom
foreach($html->find('span[class=pp-headline-item pp-headline-address]') as $element)
//$element es el resultado
include('../pcabeza\navbar_ordenreg.php');	
include('../sidebar/sidebarreg.php');	
include('../consultas/consultaorden.php');	
?>
<html>
<title>Geolocalizador</title>
<head>
<link href="css/reset.css" rel="stylesheet" style="text/css" />

<link href="css/main.css" rel="stylesheet" style="text/css" media="screen" />
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Ordenes</title>
 
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

	<div id="container">
		<h1>¡Localizado!</h1>

		<h2>Tu posici&oacute;n es:</h2>
		<p class="pos">
			
		</p>

		<a href='<?php echo "https://www.google.es/maps/place/$lat,$long"; ?>' target="_blank"><button class="map">Ver en google maps</button></a>
		<form action="ordennuevo.php" method="post">
	 <div class="form-group">
                      
                        <input type="text" class="form-control" visibility: hidden name="lat" id="lat"  value="<?php echo $lat; ?>" required="required" placeholder="Ingrese su Nombre"/>
                    </div>
                    <div class="form-group">
                      
                        <input type="text" class="form-control" visibility: hidden name="long" id="long"  value="<?php echo $long; ?>" required="required" placeholder="Ingrese su Apellido"/>
                    </div>
					<input class="btn btn-primary" name="gps" type="submit" value="Guardar ubicacion">

</form>

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
    
</html>