<?php

function extraerempleadoperfil($id2){
    include('php/conexion.php');	
    $sql="SELECT * FROM empleado e JOIN ciudad c ON (e.ciudad_empleado=c.id_ciudad)
    JOIN sector s ON (e.sector_empleado=s.id_sector) JOIN calle k ON (e.calle_empleado=k.id_calle)
    join nomina n on (e.id_nomina=n.id_nomina)
     where usuario='$id2'";
    return $result=$mysqli->query($sql); 
}	

function extraerclienteperfil($id2){
    include('php/conexion.php');	
    $sql="SELECT * FROM cliente e JOIN ciudad c ON (e.ciudad_cliente=c.id_ciudad)
    JOIN sector s ON (e.sector_cliente=s.id_sector) JOIN calle k ON (e.calle_cliente=k.id_calle)
   
     where correo_cliente='$id2'";
    return $result=$mysqli->query($sql); 
}	
function extraerempresaperfil(){
    include('php/conexion.php');	
    $sql="SELECT * FROM perfil where id_perfil='1'";
    return $result=$mysqli->query($sql); 
}	
?>