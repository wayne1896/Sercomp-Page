<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['estado']['msg'])){
    $statusMsg = $sessData['estado']['msg'];
    $statusMsgType = $sessData['estado']['type'];
    unset($_SESSION['sessData']['estado']);
}
?>
<!DOCTYPE html>
<html>
<head>
	
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Tesis - Bootstrap Admin Dashboard HTML Template</title>

	<link rel="icon" type="image/png" href="../vendors\images\iconbar.png">
	<link rel="shortcut icon" type="image/png" sizes="16x16" href="../vendors\images\iconbar.png">


	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">

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
				<a href="../index.php">
				<img class="fondo" src="../vendors\images\Sercomp-bar.svg" alt="">
				</a>
			</div>
		<div class="login-menu">
			<ul>
					<li><a href="../register.php">Registro</a></li>
			</ul>
		</div>
	</div>
</div>
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
	
			<form action="MiCuentaCliente.php" method="post">
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
</body>