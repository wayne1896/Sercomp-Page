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

	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'>". $c . "- ". $row["nombre_cliente"] . " ". $row["apellido_cliente"] . "- <span>". $fechaFormateada . "</span> </div>" . 
	"<div class='notification-comment'>" . $row["descripcion_orden"]  ."</div>" .
	"</div>";
	$c++;
}
if(!empty($response)) {
	print $response;
}


?>