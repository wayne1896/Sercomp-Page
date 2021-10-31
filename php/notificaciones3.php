
<?php
session_start();
$id2=$_SESSION['User'];
$conn = new mysqli("localhost","root","","tesis");


$sql = "SELECT * FROM `orden` o join cliente c on (o.id_cliente=c.id_cliente) join empleado e on (o.id_empleado=e.id_empleado) where o.proceso_orden='En proceso' 
and c.correo_cliente='$id2'  limit 5";
$result = mysqli_query($conn, $sql);

$response='';
$c=1;
while($row=mysqli_fetch_array($result)) {

	/* Formate fecha */
	$fechaOriginal = $row["fecha_orden"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . 
	
	"<div class='notification-dropdown-text'>" .
	"<div class='notification-dropdown-icon info'>
	<i class='bx bx-check-circle bx-md'></i>
            </div>".
	"<span class='notification-dropdown__title'>". $c . "- " . $row["estado_orden"]  ." a ". $row["nombre_empleado"] . " ". $row["apellido_empleado"] . ", ". $row["proceso_orden"] . " </span>" . 
	"<span class='notification-dropdown__subtitle'>". $row["descripcion_orden"]." </span>" .
	"</div>";
	$c++;
}
if(!empty($response)) {
	print $response;
}


?>