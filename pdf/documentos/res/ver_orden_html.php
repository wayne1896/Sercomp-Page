<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>

        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo ""; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
			<img style="width: 100%;" src="documentos\res\logo.jpg" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo NOMBRE_EMPRESA;?></span>
				<br><?php echo DIRECCION_EMPRESA;?><br> 
				RNC: <?php echo RNC;?><br>
				Telefono: <?php echo TELEFONO_EMPRESA;?><br>
				Email: <?php echo EMAIL_EMPRESA;?>
                
            </td>
			<td style="width: 25%;text-align:right">
			ORDEN No <?php echo $numero_factura;?>
			</td>
			
        </tr>
    </table>
    <br>
    

	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:50%;" class='midnight-blue'>Orden A</td>
        </tr>
		<tr>
           <td style="width:50%;" >
			<?php 
				$sql_cliente=mysqli_query($con,"SELECT * FROM orden o 
				join cliente e on (o.id_cliente=e.id_cliente) join servicios g on (o.servicio_orden=g.id_servicio) 
				join empleado f on (o.id_empleado=f.id_empleado) join ciudad c on (o.ciudad_orden=c.id_ciudad) 
				
						join sector s on (o.sector_orden=s.id_sector) JOIN calle b on (o.calle_orden=b.id_calle) where e.id_cliente='$id_cliente'");
				$rw_cliente=mysqli_fetch_array($sql_cliente);
				echo $rw_cliente['nombre_cliente'];
				echo "<br>";
				echo $rw_cliente['nombre_ciudad']." ".$rw_cliente['nombre_sector']." ".$rw_cliente['nombre_calle']." No Casa: ".$rw_cliente['numcasa_cliente'];
				echo "<br> Telefono: ";
				echo $rw_cliente['telefono_cliente'];
				echo "<br> Email: ";
				echo $rw_cliente['correo_cliente'];
				echo"<br> <a href='https://www.google.es/maps/place/".$rw_cliente['lat'].",".$rw_cliente['lon']."'>Ver Ubicacion GPS </a>";
			?>
			
		   </td>
        </tr>
        
   
    </table>
    
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>TECNICO</td>
		  <td style="width:25%;" class='midnight-blue'>FECHA</td>
		 =
        </tr>
		<tr>
           <td style="width:35%;">
			<?php 
				$sql_user=mysqli_query($con,"select * from empleado where id_empleado='$id_vendedor'");
				$rw_user=mysqli_fetch_array($sql_user);
				echo $rw_user['nombre_empleado']." ".$rw_user['apellido_empleado'];
			?>
		   </td>
		  <td style="width:25%;"><?php echo date("d/m/Y", strtotime($fecha_factura));?></td>
		
        </tr>
		
        
   
    </table>
	<br>
  
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-blue'>ID.</th>
			<th style="width: 20%;text-align:center" class='midnight-blue'>SERVICIO.</th>
            <th style="width: 60%" class='midnight-blue'>DESCRIPCION</th>
          
            
        </tr>

<?php
$nums=1;
$sumador_total=0;
$sql=mysqli_query($con, "select * from orden o 
join cliente e on (o.id_cliente=e.id_cliente) join servicios g on (o.servicio_orden=g.id_servicio) 
join empleado f on (o.id_empleado=f.id_empleado) join ciudad c on (o.ciudad_orden=c.id_ciudad) 

		join sector s on (o.sector_orden=s.id_sector) JOIN calle b on (o.calle_orden=b.id_calle) where o.id_orden='".$id_factura."'");
while ($row=mysqli_fetch_array($sql))
{
	$id_producto=$row["id_orden"];
	
	$cantidad=$row['id_servicio'];
	$servicio=$row['nombre_servicio'];
	$nombre_producto=$row['descripcion_orden'];
	
	

	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
			<td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $servicio; ?></td>
            <td class='<?php echo $clase;?>' style="width: 60%; text-align: center"><?php echo $nombre_producto;?></td>
          
            
        </tr>

	<?php 

	
$nums++;
}


?>
  

</table>



<br>

