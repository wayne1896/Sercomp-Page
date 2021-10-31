<?php  session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
	header("location: index.php");
	exit;
	} ?>
<!-- Site favicon -->
<link rel="icon" type="image/png" href="vendors\images\iconbar.png">
	<link rel="shortcut icon" type="image/png" sizes="16x16" href="vendors\images\iconbar.png">

  <link rel="stylesheet" type="text/css" href="vendors/styles/footer.css">

<div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="menu.php" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Sercomp</span>
                    <span class="logo-subtitle">V1</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a  href="menu.php"><span class="bx bxs-home bx-sm" aria-hidden="true"></span>  Inicio</a>
                </li>
                <li>
                    <a class="show-cat-btn active" href="##">
                        <span class="bx bx-pie-chart-alt-2 bx-sm"" aria-hidden="true"></span>  Dashboard
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a class="active" href="adm.php">Clientes</a>
                        </li>
                        <li>
                            <a href="dash.php">Servicios</a>
                        </li>
                        <li>
                            <a href="dashciudad.php">Ciudades</a>
                       </li>
                    </ul>
                </li>
                <li>
                    <a  href="clientes.php">
                        <span class="bx bx-group bx-sm" aria-hidden="true"></span>  Clientes</a>
            
                </li>
                <li>
                    <a  href="empleado.php">
                        <span class="bx bx-id-card bx-sm" aria-hidden="true"> </span>  Empleados</a>
                  
                </li>
                <li>
                    <a  href="inventario.php">
                        <span class="bx bx-package bx-sm" aria-hidden="true"> </span>  Inventario</a>
                  
                </li>
                <li>
                    <a  href="ciudad.php">
                        <span class="bx bx-map-pin bx-sm" aria-hidden="true"> </span>  Direcciones</a>
                  
                </li>
            
                 <li>
                    <a  href="servicios.php">
                        <span class="bx bx-category bx-sm" aria-hidden="true"> </span>  Servicios</a>
                  
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="bx bx-cart bx-sm" aria-hidden="true"></span>  Facturacion
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="facturacion.php">Facturas por nombre</a>
                        </li>
                        <li>
                            <a href="facturacionfecha.php">Facturas por fecha</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="bx bx-receipt bx-sm" aria-hidden="true"></span>  Ordenes
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="ordensin.php">Ordenes sin asignar</a>
                        </li>
                        <li>
                            <a href="ordenasig.php">Ordenes asignadas</a>
                        </li>
                    </ul>
                </li>
               
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture><source srcset="./img/photo1.png" type="image/png"><img src="./img/avatar/avatar-illustrated-01.png" alt="User name"></picture>
            </span>
            <div class="sidebar-user-info">
            <?php 
      
      $id2=$_SESSION['User'];
	  
	 
	  $mysqli = new mysqli("localhost", "root", "", "tesis");

	  /* comprobar la conexión */
	  if (mysqli_connect_errno()) {
		  printf("Falló la conexión: %s\n", mysqli_connect_error());
		  exit();
	  }
	  
	  $consulta = "SELECT nombre_empleado, apellido_empleado, cargo FROM empleado e join nomina n on (e.id_nomina=n.id_nomina) where e.correo_empleado='$id2'";
	  
	  if ($resultado = $mysqli->query($consulta)) {
	  
		  /* obtener el array de objetos */
		  while ($fila = $resultado->fetch_row()) {
        echo"<span class='sidebar-user__title'>".$fila[0]." ". $fila[1].".</span>
                <span class='sidebar-user__subtitle'>".$fila[2]."</span>"
                ;}}?>
            </div>
        </a>
    </div>
</aside>
  <div class="main-wrapper">
    <!-- ! Main nav -->
    <nav class="main-nav--bg">
  <div class="container main-nav">
    <div class="main-nav-start">
      <div class="search-wrapper">
        <i data-feather="search" aria-hidden="true"></i>
        <input type="text" name="busqueda" id="busqueda" placeholder="Palabra a buscar ..." required>
      </div>
    </div>
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      
      <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
        <span class="sr-only">Switch theme</span>
        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
      </button>
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
      <div class="notification-wrapper">
        <button class="gray-circle-btn dropdown-btn" id="notification-icon" onclick="myFunction()" href="#" role="button" data-toggle="dropdown" title="Ver ordenes nuevas"  type="button">
          <span class="sr-only">Ver ordenes nuevas</span>
          <?php if($count>0) {
         echo  '<span id="notification-count" class="icon notification active" aria-hidden="true"> </span>';
         } 
         else echo  '<span id="notification-count" class="icon notification" aria-hidden="true"> </span>';
         ?>
          
        </button>
        
        <ul class="users-item-dropdown notification-dropdown dropdown">
          
     
         
          <li>
           <a href="ordensin.php">
           <div class="notification-dropdown-icon danger">
              <i data-feather="info" aria-hidden="true"></i>
            </div>
            <div  id="notification-latest"> 
            </div>
           </a>
          </li>
         
          <li>
            <a class="link-to-page" href="ordensin.php">Ver ordenes</a>
          </li>
        </ul>
      </div>
      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span class="nav-user-img">
            <picture><source srcset="./img/photo1.png" type="image/png"><img src="./img/avatar/avatar-illustrated-02.png" alt="User name"></picture>
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
          <li><a href="perfil.php?id2=<?php echo $id2;?>">
              <i data-feather="user" aria-hidden="true"></i>
              <span>Profile</span>
            </a></li>
          <li><a href="##">
              <i data-feather="settings" aria-hidden="true"></i>
              <span>Account settings</span>
            </a></li>
            <li><a class="log-out" href="#"  data-bs-toggle="modal" data-bs-target="#logoutModal">
              <i data-feather="log-out" aria-hidden="true" ></i>
              <span>Log out</span>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!--  modal logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
		  <div class="modal-header">
      <h5 class="modal-title" id="logoutmodalLabel">Cerrar sesion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<p><i class="fa fa-question-circle"></i> Esta seguro de cerrar sesion? <br /></p>
      </div>
			<div class="modal-footer">
				<form action="/logout" method="post">
					<input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}"/>
					<a href="logout.php" type="button" class="btn btn-primary" ></span> Logout</a>
					
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Cancelar">Cancelar</button>
						
				</form>
			
		  </div>
		</div>
	  </div>
	</div>