	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - LOGIN</title>

	<?php	
include ("php\sidebar2\indexcabe.php");




				if(isset($_SESSION['message'])){
					?>
					<div class="alert alert-info text-center" style="margin-top:20px;">
					<?php echo $_SESSION['message']; ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<?php
				unset($_SESSION['message']);
				}
?>
	<body class="login-page">
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img  src="vendors/images/Sercomp.png" alt="logo">
				</div>
				<div class="col-md-6 col-lg-5">
				<form action="php/validacion.php" method="post">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login </h2>
						</div>
						<?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div  class="alert alert-warning alert-dismissible fade show"  style="margin-top:20px"><?php echo $_GET['Empty'] ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>                                
                    <?php
                        }
                    ?>
 
 
                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div  class="alert alert-warning alert-dismissible fade show" style="margin-top:20px"><?php echo $_GET['Invalid'] ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>                                
                    <?php
                        }
                    ?>
						<form>
						
							<div class="input-group custom">
								<input type="text" name="usuario" class="form-control form-control-lg" placeholder="Correo">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" name="clave" class="form-control form-control-lg" placeholder="Contraseña">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Recordar</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="#" data-toggle="modal" data-target="#Recuperacion">Recuperar contraseña</a></div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<button class="btn btn-success btn-lg btn-block"  name="login">Iniciar sesion</a>
									</div>
									</form>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">o</div>
								 
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="register.php">Registrarte</a>
									</div>
								
								</div>
							</div>
						</form>
					</div>
				</div> <!-- Modal -->
<div class="modal fade" id="Recuperacion" tabindex="-1" role="dialog" aria-labelledby="Recuperacion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 align="center" class="modal-title" id="exampleModalLabel">Recuperacion de contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div align="center" class="modal-body">
       <a type="button" class="btn btn-primary" href="EnviarPasswordEmpleado.php">Empleado</a>
	   <a type="button" class="btn btn-secondary" href="EnviarPasswordCliente.php">Cliente</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
       
      </div>
    </div>
  </div>
</div>
</div>
		</div>
	</div>
</div>
</div>
	<!-- js -->
		<!-- js -->
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

	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<?php   
      	
		include('php/ppie\ppiemenu.php');	
	?>
</body>
</html>