<?php 
       include('php\pcabeza\navbar_adm.php');	
      include('php\SideBar\sidebar.php');	
      include('php/consultas/consultacliente.php');	
  ?>
  	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>
  
	<link rel="stylesheet" href="assets/css/ilmudetil.css">
	<script src="assets/js/highcharts.js"></script>
	
	<script src="assets/js/jquery-1.10.1.min.js"></script>
  <script>
        var chart; 
        $(document).ready(function() {
              chart = new Highcharts.Chart(
              {
                  
                 chart: {
                    renderTo: 'mygraph',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'Ciudades de clientes '
                 },
                 tooltip: {
                    formatter: function() {
                        return '<b>'+
                        this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
                    }
                 },
                 
                
                 plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                            }
                        }
                    }
                 },
       
                    series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                    <?php
                        include "connection.php";
                        $query = mysqli_query($con,"SELECT * from ciudad c join cliente s on  (c.id_ciudad=s.ciudad_cliente) group by c.nombre_ciudad");
                     
                        while ($row = mysqli_fetch_array($query)) {
                          $idciudad= $row['id_ciudad'];
                            $browsername = $row['nombre_ciudad'];
                         
                            $data = mysqli_fetch_array(mysqli_query($con,"SELECT count(nombre_ciudad) from ciudad s join cliente c on  (c.ciudad_cliente=s.id_ciudad) where c.ciudad_cliente='$idciudad'"));
                            $jumlah = $data['count(nombre_ciudad)'];
                            ?>
                            [ 
                                '<?php echo $browsername ?>', <?php echo $jumlah; ?>
                            ],
                            <?php
                        }
                        ?>
             
                    ]
                }]
              });
        }); 
    </script>
	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="src/styles/style_form_out.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
   
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
               
                <div class="col-md-8">
                             <!-- Breadcrumbs-->
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="#">Dashboard</a>
</li>
<li class="breadcrumb-item active">My Dashboard</li>
</ol>
<!-- Icon Cards-->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesis";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sqll = "SELECT Count(id_cliente) from cliente  ";
if (mysqli_query($conn, $sqll))
{
echo "";
}
else
{
echo "Error: " . $sqll . "<br>" . mysqli_error($conn);
}
$result = mysqli_query($conn, $sqll);
if (mysqli_num_rows($result) > 0)
{
// output data of each row
while($row = mysqli_fetch_assoc($result))
{
?>
<div class="row">
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-primary o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-comments"></i>
</div>
<div class="mr-5"><?php echo $row['Count(id_cliente)']; ?> Registrados</div>
</div>
<a class="card-footer text-white clearfix small z-1" href="clientes.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-warning o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-list"></i>
</div>
<?php
}
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesis";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sqll = "SELECT Count(id_empleado) from empleado  ";
if (mysqli_query($conn, $sqll))
{
echo "";
}
else
{
echo "Error: " . $sqll . "<br>" . mysqli_error($conn);
}
$result = mysqli_query($conn, $sqll);
if (mysqli_num_rows($result) > 0)
{
// output data of each row
while($row = mysqli_fetch_assoc($result))
{
?>
<div class="mr-5"><?php echo $row['Count(id_empleado)'];?>  Empleados</div>
</div>
<?php
}
}
else
{
echo '0 results';
}
?>
<a class="card-footer text-white clearfix small z-1" href="empleado.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-success o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-shopping-cart"></i>
</div>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesis";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sqll = "SELECT Count(id_producto) from inventario  ";
if (mysqli_query($conn, $sqll))
{
echo "";
}
else
{
echo "Error: " . $sqll . "<br>" . mysqli_error($conn);
}
$result = mysqli_query($conn, $sqll);
if (mysqli_num_rows($result) > 0)
{
// output data of each row
while($row = mysqli_fetch_assoc($result))
{
?>
<div class="mr-5"><?php echo $row['Count(id_producto)'];?> Inventario</div>
</div>
<?php
}
}
else
{
echo '0 results';
}
?>
<a class="card-footer text-white clearfix small z-1" href="inventario.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
<div class="card text-white bg-danger o-hidden h-100">
<div class="card-body">
<div class="card-body-icon">
<i class="fa fa-fw fa-support"></i>
</div>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesis";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sqlll = "SELECT Count(id_orden) from orden Where estado_orden='Sin Asignar' ";
if (mysqli_query($conn, $sqlll))
{
echo "";
}
else
{
echo "Error: " . $sqll . "<br>" . mysqli_error($conn);
}
$result = mysqli_query($conn, $sqll);
if (mysqli_num_rows($result) > 0)
{
// output data of each row
while($row = mysqli_fetch_assoc($result))
{
?>
<div class="mr-5"><?php echo $row['Count(id_producto)'];?> Ordenes sin Asignar</div>
</div>
<?php
}
}
else
{
echo '0 results';
}
?>
<a class="card-footer text-white clearfix small z-1" href="ordensin.php">
<span class="float-left">View Details</span>
<span class="float-right">
<i class="fa fa-angle-right"></i>
</span>
</a>
</div>
</div>
</div>

<script type="text/javascript">
window.dataf= <?php echo $number_formated; ?>
</script>
<!-- Area Chart Example-->
<div class="card mb-3">
<div class="card-header">
<i class="fa fa-area-chart"></i> Dashboard</div>
<div class="card-body">
<div class="panel panel-primary">
   
     <div class="panel-body">
     <div id ="mygraph"></div>
    </div>
</div>
</div></div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
 
</body>
<?php   

		include('php/ppie\ppiemenu.php');	
	?>
</html>