<?php
/*Datos de conexion a la base de datos*/
define('DB_HOST', 'localhost');//DB_HOST:  generalmente suele ser "127.0.0.1"
define('DB_USER', 'root');//Usuario de tu base de datos
define('DB_PASS', '');//Contraseña del usuario de la base de datos
define('DB_NAME', 'tesis');//Nombre de la base de datos

$con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$con){
    die("imposible conectarse: ".mysqli_error($con));
}
if (@mysqli_connect_errno()) {
    die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}
  $query=$con->query("select * from perfil where id_perfil=1");
  while ( $row= $query->fetch_assoc() ) {

/*Datos de la empresa*/
define('NOMBRE_EMPRESA', $row['nombre_empresa']);
define('RNC', $row['RNC']);
define('DIRECCION_EMPRESA', $row['ciudad']." ".$row['direccion']);
define('TELEFONO_EMPRESA', $row['telefono']);
define('EMAIL_EMPRESA', $row['email']);
define('TAX', $row['impuesto']);
define('Logo', $row['logo_url']);

  }
?>