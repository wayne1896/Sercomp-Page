
<!DOCTYPE html>
<html>
<head>
	
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - LOGIN</title>

	<!-- Site favicon -->
	<link rel="icon" type="image/png" href="vendors\images\iconbar.png">
	<link rel="shortcut icon" type="image/png" sizes="16x16" href="vendors\images\iconbar.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="index.php">
				<img class="fondo" src="vendors\images\Sercomp-bar.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="register.php">Registro</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php	



	$mensaje='';
	$color='';
	if (isset($_GET['s'])) {
		switch ($_GET['s']) {
			case 'success':
				$mensaje='Registro almacenado correctamente';
				$color='success';
				break;
			case 'error':
				$mensaje='Imposible almacenar el registro';
				$color='danger';
				break;
			case 'successudt':
				$mensaje='Registro actualizado correctamente';
				$color='success';
				break;
			case 'errorudt':
				$mensaje='Imposible actualizar el registro';
				$color='danger';
				break;
			case 'successdlt':
				$mensaje='Registro inhabilitado correctamente';
				$color='success';
				break;
			case 'errordlt':
				$mensaje='Imposible inhabilitar el registro';
				$color='danger';
				break;
		}
	}
	if (!empty($mensaje) and !empty($color)) {
		echo '<div class="alert alert-'.$color.'" role="alert">'.$mensaje.'</div>';
	}
?>
	
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img class="fondo" src="vendors/images/Sercomp.png" alt="">
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
                        <div class="alert-light text-danger text-center py-2"  style="margin-top:20px"><?php echo $_GET['Empty'] ?></div>                                
                    <?php
                        }
                    ?>
 
 
                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-2" style="margin-top:20px"><?php echo $_GET['Invalid'] ?></div>                                
                    <?php
                        }
                    ?>
						<form>
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons" >
									<label class="btn active">
										<input type="radio" name="rol" value="admin">
										<div class="icon"><img src="vendors/images/briefcase.svg" class="svg" alt=""></div>
										<span>Yo soy</span>
										Empleado
									</label>
									<label class="btn">
										<input type="radio" name="rol" value="cliente">
										<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
										<span>Yo soy</span>
										Cliente
									</label>
								</div>
							</div>
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
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>