
<?php
$conn = new mysqli("localhost","root","","tesis");


$sql = "SELECT * FROM orden o join cliente c on (o.id_cliente=c.id_cliente) where o.estado_orden= 'Sin Asignar'  limit 5";
$result = mysqli_query($conn, $sql);

$response='';
$c=1;
while($row=mysqli_fetch_array($result)) {

	/* Formate fecha */
	$fechaOriginal = $row["fecha_orden"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . 
	"<div class='notification-dropdown-text'>" .
	"<span class='notification-dropdown__title'>". $c . "- ". $row["nombre_cliente"] . " ". $row["apellido_cliente"] . "- ". $fechaFormateada . " </span>" . 
	"<span class='notification-dropdown__subtitle'>" . $row["descripcion_orden"]  ."</span>" .
	"</div>";
	$c++;
}
if(!empty($response)) {
	print $response;
}


?>