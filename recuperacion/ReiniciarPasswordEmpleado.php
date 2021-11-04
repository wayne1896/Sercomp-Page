<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['estado']['msg'])){
    $statusMsg = $sessData['estado']['msg'];
    $statusMsgType = $sessData['estado']['type'];
    unset($_SESSION['sessData']['estado']);
}include ("../php\sidebar2\indexcabe2.php");

?>
<!DOCTYPE html>
<html>
<head>
	
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP- RECUPERACION DE CONTRASEÑA</title>


	
	<!-- Site favicon -->
	<link rel="icon" type="image/png" href="../vendors\images\iconbar.png">
	<link rel="shortcut icon" type="image/png" sizes="16x16" href="../vendors\images\iconbar.png">


<body class="login-page">

	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="../vendors/images/login-page-img.png" alt="">
				</div>
			<div class="col-md-6 col-lg-5">
			<div class="login-box bg-white box-shadow border-radius-10">
    <h2 class="text-center text-primary">Recuperacion </h2>
	<p></p>
		<h4 class="text-center text-primary">Reiniciar contraseña de su cuenta</h4>
        <p></p>
		<?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
	
			<form action="MiCuentaEmpleado.php" method="post">
				<input type="password" class="form-control form-control-lg" name="password" placeholder="PASSWORD" required="">
				<p></p>
				<input type="password" class="form-control form-control-lg" name="confirm_password" placeholder="CONFIRMAR PASSWORD" required="">
				<p></p>
					<?php $fr=$_GET['fp_code'];
					?>
					<input type="hidden" class="form-control form-control-lg"   name="fp_code" value="<?php echo $fr; ?>">
					<input type="submit" class="btn btn-secondary btn-lg btn-block" name="resetSubmit" value="REINICIAR PASSWORD">
				</div>
			</form>
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
<script src="../plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="../plugins/feather.min.js"></script>

<!-- Custom scripts -->
<script src="../js/script.js"></script>

	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<?php   
      	
		include('../php/ppie\ppiemenu.php');	
	?>
</body>
</html>