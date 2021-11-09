<?php 
      include('php/sidebar2\sidebar-dash2.php');	
      include('php/consultas/consultacliente.php');	
  ?>
  	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SERCOMP - Dashboard</title>
	<script src="vendors/scripts/core.js"></script>
	
  
	<link rel="stylesheet" href="assets/css/ilmudetil.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
		<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
		<script type="text/javascript" src="https://code.highcharts.com/modules/export-data.js"></script>
		<script type="text/javascript">
			$(function () {
				$('#mygraph').highcharts({
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					title: {
						text: 'Servicios mas solicitados'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								format: '<b>{point.name}</b>: {point.percentage:.1f} %',
								style: {
									color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
								}
							}
						}
					},
                    series: [{
                   
                    name: 'Solicitado',
                    data: [
                    <?php
                        include "connection.php";
                        $query = mysqli_query($con,"SELECT * from `ciudad` c join cliente s on  (c.id_ciudad=s.ciudad_cliente) 
                        join orden o on (o.id_cliente=s.id_cliente) JOIN servicios e on (o.servicio_orden=e.id_servicio)
                         group by e.nombre_servicio");
                     
                        while ($row = mysqli_fetch_array($query)) {
                          $idx= $row['id_servicio'];
                            $browsername = $row['nombre_servicio'];
                         
                            $data = mysqli_fetch_array(mysqli_query($con,"SELECT count(nombre_ciudad) from ciudad s join cliente c on  (c.ciudad_cliente=s.id_ciudad)
                            join orden o on (o.id_cliente=c.id_cliente) JOIN servicios e on (o.servicio_orden=e.id_servicio) where o.servicio_orden='$idx'"));
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

  
	

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


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

<div class="container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
               
                <div class="col-md-8">
                             <!-- Breadcrumbs-->
<ol class="breadcrumb">
<li class="breadcrumb-item">
<h4 class="main-title">Dashboard</h4>
</li>

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
<div class="row stat-cards">
          <div class="col-md-6 col-xl-3">
        <a href="clientes.php">
		<article class="stat-cards-item">
              <div class="stat-cards-icon primary">
                <i class='bx bxs-group bx-md' aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
                
						  <p class="stat-cards-info__title">Clientes</p>
						  <p class="stat-cards-info__num"><?php echo $row['Count(id_cliente)']; ?></p>
						  </div>
            </article>
		</a>
          </div>
			
		  <div class="col-md-6 col-xl-3">
		  <a href="empleado.php">
            <article class="stat-cards-item">
              <div class="stat-cards-icon warning">
                <i class='bx bxs-id-card bx-md' aria-hidden="true"></i>
              </div>
			  <div class="stat-cards-info">

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
 <p class="stat-cards-info__title">Empleados</p>
 <p class="stat-cards-info__num"><?php echo $row['Count(id_empleado)'];?> </p>


<?php
}
}
else
{
echo '0 results';
}
?>

</div>
            </article>
			</a>
          </div>
		  <div class="col-md-6 col-xl-3">
		  <a  href="inventario.php">
            <article class="stat-cards-item">
              <div class="stat-cards-icon purple">
                <i  class='bx bxs-package bx-md' aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
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
 <p class="stat-cards-info__title">Inventario</p>
<p class="stat-cards-info__num"><?php echo $row['Count(id_producto)'];?></p>

<?php
}
}
else
{
echo '0 results';
}
?>
</div>
</article>
			</a>
          </div>
		  <div class="col-md-6 col-xl-3">
		  <a href="ordensin.php">
            <article class="stat-cards-item">
              <div class="stat-cards-icon success">
                <i class='bx bxs-receipt bx-md' aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
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
echo "Error: " . $sqlll . "<br>" . mysqli_error($conn);
}
$result = mysqli_query($conn, $sqlll);
if (mysqli_num_rows($result) > 0)
{
// output data of each row
while($row = mysqli_fetch_assoc($result))
{
?>
 <p class="stat-cards-info__title"> Ordenes </p>
 <p class="stat-cards-info__title"> sin Asignar</p>
<p class="stat-cards-info__num"><?php echo $row['Count(id_orden)'];?></p>
</div>
<?php
}
}
else
{
echo '0 results';
}
?>
</div>
</article>
			</a>
          </div>


<!-- Area Chart Example-->

<div class="card-header">
<i class="fa fa-area-chart"></i><h3 class="main-title" >  Grafica </h3></div>

<div class="row">
    <div class="col-lg-9">
       <div class="chart">
         <div id ="mygraph">

         </div>
        </div>
      </div>
      <div class="col-lg-3">
            
      <article class="white-block">
              <div class="top-cat-title">
                <h3>Facturas</h3>
                <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesis";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sqll = "SELECT Count(id_factura) from factura  ";
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
                <p>Total de facturas <?php echo $row['Count(id_factura)'];?></p>
                <?php
}
}
else
{
echo '0 results';
}
?>
              </div>
              
              <ul class="top-cat-list">
                <li>
                  <a href="facturacion.php">
                  <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesis";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sqll = "SELECT Count(id_factura), sum(totalpago) from factura where estado_factura= 'Pagado'  ";
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
                    <div class="top-cat-list__title">
                      Pagadas 
                     <span class="success"><?php echo $row['Count(id_factura)'];?></span>
                     </div>
                     <div class="top-cat-list__subtitle">
                      Cobro pagado <span class="succes">RD$ <?php echo $row['sum(totalpago)'];?></span>
                    
                     <?php
}
}
else
{
echo '0 results';
}
?>
                   
                    </div>
                    
                  </a>
                </li>
                <li>
                  <a href="facturacion.php">
                  <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesis";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sqll = "SELECT Count(id_factura), sum(totalpago) from factura where estado_factura= 'Pendiente'  ";
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
                    <div class="top-cat-list__title">
                     Pendientes
                     <span class="warning"><?php echo $row['Count(id_factura)'];?></span>
                     </div>
                     <div class="top-cat-list__subtitle">
                      Cobro pendiente <span class="warning">RD$ <?php echo $row['sum(totalpago)'];?></span>
                    
                     <?php
}
}
else
{
echo '0 results';
}
?>
                    
                    
                    </div> 
                  </a>
                </li>
                <li>
                  <a href="facturacion.php">
                  <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesis";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sqll = "SELECT Count(id_factura), sum(totalpago) from factura where estado_factura= 'Anulada'  ";
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
                    <div class="top-cat-list__title">
                      Anuladas 
                     <span class="danger"><?php echo $row['Count(id_factura)'];?></span>
                     </div>
                     <div class="top-cat-list__subtitle">
                      Cobro anulado <span class="danger">RD$ <?php echo $row['sum(totalpago)'];?></span>
                     <?php
}
}
else
{
echo '0 results';
}
?>
                    
                    
                    </div> 
                  </a>
                </li>
                
              </ul>
            </article>
          </div>
</div>
</div>
</div>
</div>
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
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>

<!-- Custom scripts -->
<script src="js/script.js"></script>



 
</body>
<?php   

		include('php/ppie\ppiemenu.php');	
	?>
</html>