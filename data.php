<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","tesis");

$sqlQuery = "SELECT sum(servicio_orden), nombre_ciudad 
FROM orden o Join ciudad c on (o.ciudad_orden=c.id_ciudad) 
Join servicios s on (o.servicio_orden=s.id_servicio)
  group by nombre_ciudad";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>