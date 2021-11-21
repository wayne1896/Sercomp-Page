<!DOCTYPE html>
<html>
  	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Registro</title>
<?php 
include ("php/sidebar2/regcabe.php");

    // Include the database config file 
    include_once 'dbConfig.php'; 
     
    // Fetch all the country data 
    $query = "SELECT * FROM ciudad ORDER BY nombre_ciudad ASC"; 
    $result = $db->query($query); 
?>

<head>

 
	
	<!-- Site favicon -->
	<link rel="icon" type="image/png" href="vendors/images/iconbar.png">
	<link rel="shortcut icon" type="image/png" sizes="16x16" href="vendors/images/iconbar.png">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->

	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
  <link rel="stylesheet" type="text/css" href="src/styles/style_form_out.css">
  
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- Custom styles -->
<link rel="stylesheet" href="./css/style.min.css">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" type="text/css" href="vendors/styles/footer.css">

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


<body class="login-page">
	
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="src/images/register-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
				<form id="regForm" action="php/clientes_backend/registroclientep.php?accion=INS" method="POST">
  <h1>Registro de Usuario:</h1>
  <!-- One "tab" for each step in the form: -->
      
      <div class="tab"><div class="main-title-wrapper">
    <p>Datos Básicos</p>
    </div>
        
      <label for="inputEmail">E-Mail</label>
        <p><input class="form-control" placeholder="E-mail..." type="email"  oninput="this.className = ''" name="correo"></p>
      <label for="inputEmail">Contraseña</label>
        <p><input class="form-control" placeholder="Contraseña..." oninput="this.className = ''" name="clave" type="password"></p>
      <label for="inputEmail">Contraseña</label>
        <p><input class="form-control" placeholder="Repite la contraseña" oninput="this.className = ''" name="clave" type="password"></p>
   
      </div>
      <div class="tab">
      <p> Datos personales:</p>
      <label for="inputEmail">Nombre</label>
        <p><input class="form-control" placeholder="Nombre..." oninput="this.className = ''" name="nombre"></p>
        <label for="inputEmail">Apellido</label> 
        <p><input class="form-control" placeholder="Apellido..." oninput="this.className = ''" name="apellido"></p>
        <label for="inputEmail">Telefono</label>
        <p><input class="form-control" placeholder="Telefono..." type="number" oninput="this.className = ''" name="telefono"></p>
        <label for="inputEmail">Cedula</label>
        <p><input class="form-control" placeholder="Cedula..." type="number" oninput="this.className = ''" name="cedula"></p>
        <label for="inputEmail">Fecha de nacimiento</label>
        <p><input class="form-control" placeholder="Fecha de Nacimiento" type="date"oninput="this.className = ''" name="fechanacimiento"></p>
        
       
      </div>
      <div class="tab">
      <p>Dirección:</p>
      <label for="inputEmail">Ciudad</label>
      <select class="controls"  title="Seleccione Su Ciudad" id="ciudad" name="ciudad">
<option value="">Seleccione Su Ciudad</option>
    <?php 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['id_ciudad'].'">'.$row['nombre_ciudad'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Ciudad no disponible</option>'; 
    } 
    ?>
      </select>
      <label for="inputEmail">Sector</label>
        <select class="controls" title="Seleccione Su Sector" id="sector"  name="sector">
        <option value="">Seleccione una ciudad primero</option>
          
        </select>
        <label for="inputEmail">Calle</label>
        <select class="controls" title="Seleccione Su Calle" id="calle" name="calle">
          <option value="">Seleccione un sector primero</option>
        </select>
        <label for="inputEmail">Numero de casa</label>
        <p><input placeholder="Numero de casa..." type="number" oninput="this.className = ''" name="numcasa"></p>
      </div>
      <div style="overflow:auto;">
      <div class="main-btns-wrapper">
          <button type="button" class="secondary-default-btn" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
          <button type="button"  class="primary-default-btn" name id="nextBtn"  onclick="nextPrev(1)">Siguiente</button>
          
        </div>
      </div>
    
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Aceptar";
  
  } else {
    document.getElementById("nextBtn").innerHTML = "Siguiente";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

$(document).ready(function(){
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
});

 
</script>

				</div>
			</div>
		</div>
	</div>
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
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
</body>

</html>