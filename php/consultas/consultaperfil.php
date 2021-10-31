<?php

function extraerempleadoperfil($id2){
    include('php\conexion.php');	
    $sql="SELECT * FROM empleado e JOIN ciudad c ON (e.ciudad_empleado=c.id_ciudad)
    JOIN sector s ON (e.sector_empleado=s.id_sector) JOIN calle k ON (e.calle_empleado=k.id_calle)
    join nomina n on (e.id_nomina=n.id_nomina)
     where correo_empleado='$id2'";
    return $result=$mysqli->query($sql); 
}	
?>