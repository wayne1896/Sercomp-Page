<?php  session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
	header("location: index.php");
	exit;
	} ?>
<!DOCTYPE html>
<html lang="en">
<link rel="icon" type="image/png" sizes="32x32" href="vendors\images\iconbar.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors\images\iconbar.png">
	
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="vendors/styles/footer.css">



  <nav>
  <div class="sidebar-top">
      <span class="shrink-btn">
        <i class='bx bx-chevron-left'></i>
      </span>
      <a href="menu.php">
      <img src="./img\Sercomp-bar.svg" class="logo" alt="">
      <h3 class="hide">Sercomp</h3>
      </A>
    </div>

    <div class="search">
      <i class='bx bx-search'></i>
      <input type="text" class="hide" name="busqueda" id="busqueda" placeholder="Quick Search ...">
    </div>


    <div class="sidebar-links">
      <ul>
      
        <li class="tooltip-element" data-tooltip="0">
          <a href="menu.php" data-active="0">
            <div class="icon">
              <i class='bx bx-home'></i>
              <i class='bx bxs-home'></i>
            </div>
            <span class="link hide">Inicio</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="adm.php" class="active" data-active="1">
            <div class="icon">
              <i class='bx bx-pie-chart-alt-2'></i>
              <i class='bx bxs-pie-chart-alt-2' ></i>
            </div>
            <span class="link hide">Dashboard</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a href="clientes.php" data-active="2">
            <div class="icon">
              <i class='bx bx-group'></i>
              <i class='bx bxs-group'></i>
            </div>
            <span class="link hide">Clientes</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="3">
          <a href="empleado.php" data-active="3">
            <div class="icon">
              <i class='bx bx-id-card'></i>
              <i class='bx bxs-id-card'></i>
            </div>
            <span class="link hide">Empleados</span>
          </a>
          <li class="tooltip-element" data-tooltip="4">
          <a href="inventario.php" data-active="4">
            <div class="icon">
            <i class='bx bx-package' ></i>
              <i class='bx bxs-package' ></i>
            </div>
            <span class="link hide">Inventario</span>
          </a>
        </li>
        </li>
        <div class="tooltip">
          <span class="show">Inicio</span>
          <span>Dashboard</span>
          <span>Clientes</span>
          <span>Empleados</span>
          <span>Inventario</span>
        </div>
      </ul>
      
      <ul>
        <li class="tooltip-element" data-tooltip="0">
          <a href="ciudad.php" data-active="5">
            <div class="icon">
              <i class='bx bx-map-pin'></i>
              <i class='bx bxs-map-pin'></i>
            </div>
            <span class="link hide">Direcciones</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="servicios.php" data-active="6">
            <div class="icon">
              <i class='bx bx-category'></i>
              <i class='bx bxs-category' ></i>
            </div>
            <span class="link hide">Servicios</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a href="facturacion.php" data-active="7">
            <div class="icon">
              <i class='bx bx-cart'></i>
              <i class='bx bxs-cart'></i>
            </div>
            <span class="link hide">Facturación</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="3">
          <a href="ordensin.php" data-active="8">
            <div class="icon">
            <i class='bx bx-receipt'></i>
              <i class='bx bxs-receipt'></i>
            </div>
            <span class="link hide">Ordenes</span>
          </a>
        </li>
      
        	<script type="text/javascript">
      function myFunction() {
        $.ajax({
          url: "php/notificaciones.php",
          type: "POST",
          processData:false,
          success: function(data){
            $("#notification-count").remove();                  
            $("#notification-latest").show();$("#notification-latest").html(data);
          },
          error: function(){}           
        });
      }
                                 
      $(document).ready(function() {
        $('body').click(function(e){
          if ( e.target.id != 'notification-icon'){
            $("#notification-latest").hide();
          }
        });
      });                                     
    </script>
    	<?php
    $conn = new mysqli("localhost","root","","tesis");
    $count = 0;
    $sql2 = "SELECT * FROM orden where estado_orden= 'Sin Asignar'";
    $result = mysqli_query($conn, $sql2);
    $count = mysqli_num_rows($result);
			?>
        
        <li class="tooltip-element" data-tooltip="4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </ul>
        <div class="dropdown">
          <a  data-active="9" id="notification-icon" onclick="myFunction()" href="#" role="button" data-toggle="dropdown">
          <span id="notification-count" class="badge badge-pill badge-warning notification"><?php if($count>0) { echo $count; } ?></span> 
          <div class="icon">
              <i class='bx bx-bell'></i>
              <i class='bx bxs-bell'></i>
            </div>
            
            <span class="link hide">Notificaciones  </span> 
           
           
            <div class="user-notification">
			
					
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
              
							<ul>
							<div id="notification-latest"></div>
							<p>

							</p><div align=center>
								<a type="button"  href="ordensin.php" class="btn btn-outline-info">Ver ordenes</a>
							</div>
							
							</ul>
              <ul>
						</div>
					</div>
				</div>
			</div>
          </a>
          
          
        </li>
        <div class="tooltip">
          <span class="show">Direcciones</span>
          <span>Servicios</span>
          <span>Facturacion</span>
          <span>Ordenes</span>
          <span>Notificaciones</span>
        </div>
      </ul>
    </div>
    

    <div class="sidebar-footer">
      
      <a href="#" class="account tooltip-element" data-tooltip="0">
        <i class='bx bx-user'></i>
      </a>
      <div class="admin-user tooltip-element" data-tooltip="1">
        <div class="admin-profile hide">
          <img src="./img/photo1.png" alt="">
          <?php 
      
      $id2=$_SESSION['User'];
	  
	 
	  $mysqli = new mysqli("localhost", "root", "", "tesis");

	  /* comprobar la conexión */
	  if (mysqli_connect_errno()) {
		  printf("Falló la conexión: %s\n", mysqli_connect_error());
		  exit();
	  }
	  
	  $consulta = "SELECT nombre_empleado, apellido_empleado FROM empleado where correo_empleado='$id2'";
	  
	  if ($resultado = $mysqli->query($consulta)) {
	  
		  /* obtener el array de objetos */
		  while ($fila = $resultado->fetch_row()) {
        echo"<div class='admin-info'> 
            <h3>".$fila[0]." ". $fila[1]."</h3>
            <h5></h5>
            </div>" ?>
        </div>
        <a href="#" class="log-out" data-toggle="modal" data-target="#logoutModal">
          <i class='bx bx-log-out'></i>
        </a>
      </div>
      <div class="tooltip">
        <?php
        echo"<span class='show'>".$fila[0]." ". $fila[1]."</span>"
        ;}}?>
        <span>Logout</span>
      </div>
      
      
    </div>
    
  </nav>
=
  <main>
  <ul class="nav nav-tabs justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="adm.php">Dashboard Clientes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="dash.php">Dashboard Servicios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="dashciudad.php">Dashboard ciudad especifica</a>
  </li>

</ul>
   
  </main>

  <script src="app.js"></script>
</body>
		<!--  modal logout -->
		<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
	 	<div class="modal-dialog ">
		<div class="modal-content">
		  <div class="modal-header">
			<h1>Cerrar Sesion <i class="fa fa-lock"></i></h1>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		  </div>
		  <div class="modal-body">
			<p><i class="fa fa-question-circle"></i> Esta seguro de cerrar sesion? <br /></p>
			<div class="actionsBtns">
				<form action="/logout" method="post">
					<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}"/>
					<a href="logout.php" type="button" class="btn btn-primary" ></span> Logout</a>
					
						<button class="btn btn-default" data-dismiss="modal">Cancel</button>
						
				</form>
			</div>
		  </div>
		</div>
	  </div>
	</div>

</html>