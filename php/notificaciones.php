<?php
$conn = new mysqli("localhost","root","","tesis");


$sql = "SELECT * FROM orden where estado_orden= 'Sin Asignar'  limit 5";
$result = mysqli_query($conn, $sql);

$response='';
$c=1;
while($row=mysqli_fetch_array($result)) {

	/* Formate fecha */
	$fechaOriginal = $row["fecha_orden"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'>". $c . "- ". $row["nombre_orden"] . " - <span>". $fechaFormateada . "</span> </div>" . 
	"<div class='notification-comment'>" . $row["descripcion_orden"]  ."</div>" .
	"</div>";
	$c++;
}
if(!empty($response)) {
	print $response;
}


?>