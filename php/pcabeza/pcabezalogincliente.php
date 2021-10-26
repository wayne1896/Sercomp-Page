<?php  session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
	header("location: index.php");
	exit;
	} ?>
	<link rel="icon" type="image/png" sizes="32x32" href="vendors\images\iconbar.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors\images\iconbar.png">
<link rel="stylesheet" type="text/css" href="vendors/styles/footer.css">
<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="index.php">Acceder</a></li>
				</ul>
			</div>
		</div>
	</div>
	