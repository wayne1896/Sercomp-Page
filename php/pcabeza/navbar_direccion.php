<?php  session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
	header("location: index.php");
	exit;
	} ?>
		<link rel="icon" type="image/png" sizes="32x32" href="vendors\images\iconbar.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors\images\iconbar.png">
<link rel="stylesheet" type="text/css" href="vendors/styles/footer.css">
<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
			
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" id="buscar" class="form-control search-input" placeholder="Search Here">
						
					</div>

			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
			
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" name="busqueda" id="busqueda"  class="form-control search-input" placeholder="Search Here">
						
					</div>

			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
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
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" id="notification-icon" onclick="myFunction()" href="#" role="button" data-toggle="dropdown"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span>
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
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
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="vendors/images/photo1.png" alt="">
						</span>
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
			
  
     echo"<span class='user-name'>Usuario: ".$fila[0]." ". $fila[1]." </span>";}} ?>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="php\empleados_backend\perfil.php"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
						<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="vendors/images/photo1.jpg" alt="">
						</span>
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
			
  
     echo"<span class='user-name'>Usuario ".$fila[0]." ". $fila[1]." </span>";}} ?>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
						<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item"  href="#" data-toggle="modal" data-target="#logoutModal"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
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