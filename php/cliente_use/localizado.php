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

include('../sidebar/sidebarclientereg.php');	
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
 
	<link href="css/reset.css" rel="stylesheet" style="text/css" />

<link href="css/main.css" rel="stylesheet" style="text/css" media="screen" />
	<!-- Basic Page Info -->

 
	
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
<?php   
       
		include('../ppie\ppiemenu.php');	
	?>
    
</html>