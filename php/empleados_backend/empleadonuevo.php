<!DOCTYPE html>
<html>
<?php 

    // Include the database config file 
    include_once '../../dbConfig.php'; 
     
    // Fetch all the country data 
    $query = "SELECT * FROM ciudad ORDER BY nombre_ciudad ASC"; 
    $result1 = $db->query($query); 

	include('../sidebar/sidebarreg.php');	
    $query1 = "SELECT * FROM nomina ORDER BY cargo ASC"; 
    $result2 = $db->query($query1); 
?>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Empleado nuevo</title>
 
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
	<style>

</style>
</head>


<body>
	
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container2">
        <form method="POST" action="registroempleado.php?accion=INS">
                 <div class="form-group">
                        <h1>Datos Básicos</h1>
                        <label for="inputEmail">E-Mail:</label>
                        <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese su email"/>
                    </div>
                    <div class="form-group">
                        <label for="inputpassword">Contraseña:</label>
                        <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingrese su Contraseña"/>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Repetir contraseña:</label>
                        <input type="password" class="form-control" name="clave" id="clave" placeholder="Re-ingrese su Contraseña"/>
                    </div>
                    
                    <h1>Datos Personales</h1> 
                    <div class="form-group">
                        <label for="inputfistname">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su Nombre"/>
                    </div>
                    <div class="form-group">
                        <label for="inputlastname">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su Apellido"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Telefono:</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese su Telefono"/>
                    </div>
                    
                  
                    <div class="form-group">
                        <label for="inputName">Cedula</label>
                        <input type="number" class="form-control" name="cedula" id="cedula" placeholder="Ingrese su Cedula"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" placeholder="Fecha de Nacimiento"/>
                    </div>
                    <label for="inputName">Cargo:</label>
                    <select class="form-control" title="Seleccione Su Cargo" id="cargo" name="cargo">
                                 
                                 <?php 
                    if($result2->num_rows > 0){ 
                        while($row1 = $result2->fetch_assoc()){  
                            echo '<option value="'.$row1['id_nomina'].'">'.$row1['cargo'].'</option>'; 
                        } 
                    }
                    ?>
                    </select>
                    <label for="inputName">Asignado:</label>
                    <select class="form-control" title="Su asignacion" id="rol" name="rol">
                           <option value="Tecnico"> Tecnico </option>
                           <option value="Oficina"> Oficina </option>
                    
                    </select>
                    <div class="form-group">
                        <h1>Dirección</h1>
                        <label for="inputName">Ciudad</label>
                        <select class="form-control"  title="Seleccione Su Ciudad" id="ciudad" required="required" name="ciudad">
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
                            <label for="inputName">Sector</label>
                            <select class="form-control" title="Seleccione Su Sector" id="sector" required="required" name="sector">
                            <option value="">Seleccione una ciudad primero</option>
                            
                            </select>
                            <label for="inputName">Calle</label>
                            <select class="form-control" title="Seleccione Su Calle" id="calle" required="required" name="calle">
                            <option value="">Seleccione un sector primero</option>
                            </select>
                            
                            <label for="inputName">Numero de Casa</label>
                            <input type="number" class="form-control" name="numcasa" id="numcasa"  required="required" placeholder="Ingrese su Numero de Casa"/>
                            
                            
                   
                           
                                <button type="button" class="btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                <button type="submit" name="editar" class="btn-success"><span class="glyphicon glyphicon-check"></span> Aceptar</a>
		
                          
					
                          
                    </div>
                    
                    
                    
           
            
        
                    
            </form>
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