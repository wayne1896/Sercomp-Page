<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id_empleado']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Editar Empleado</h4></center>
                <button type="button" class="close" data-bs.dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php/empleados_backend/registroempleado.php?id=<?php echo $row['id_empleado']; ?>">
            <div class="form-group">
                        <label for="inputEmail">E-Mail</label>
                        <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $row['correo_empleado']; ?>" required="required" placeholder="Ingrese su email"/>
                        
                        <label for="inputEmail">Usuario</label>
                        <input type="email" class="form-control" name="usuario" readonly='' id="usuario" value="<?php echo $row['usuario']; ?>" required="required" placeholder="Ingrese su email"/>
                    </div>

                    <h1>Datos Personales</h1> 
                    <div class="form-group">
                        <label for="inputfistname"">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"  value="<?php echo $row['nombre_empleado']; ?>" required="required" placeholder="Ingrese su Nombre"/>
                    </div>
                    <div class="form-group">
                        <label for="inputlastname">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido"  value="<?php echo $row['apellido_empleado']; ?>" required="required" placeholder="Ingrese su Apellido"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Telefono</label>
                        <input type="number" class="form-control" name="telefono" id="telefono"  value="<?php echo $row['telefono_empleado']; ?>" required="required" placeholder="Ingrese su Telefono"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputName">Cedula</label>
                        <input type="text" class="form-control" name="cedula" id="cedula"  value="<?php echo $row['cedula_empleado']; ?>" required="required" placeholder="Ingrese su Cedula"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento"  value="<?php echo $row['fechanacimiento_empleado']; ?>" required="required" placeholder="Fecha de Nacimiento"/>
                    </div>
                    <label for="inputName">Cargo:</label>
                    <select class="form-control" title="Seleccione Su Cargo" id="cargo" name="cargo">
                                 
                                 <?php 
                    if($result1->num_rows > 0){ 
                        while($row1 = $result1->fetch_assoc()){  
                            echo '<option value="'.$row1['id_nomina'].'">'.$row1['cargo'].'</option>'; 
                        } 
                    }
                    ?>
                    </select>
                       <h1>Dirección</h1>

                                    <select class="form-control"  title="Seleccione Su Ciudad" id="ciudad" required="required" name="ciudad">
                        <option value="">Seleccione Su Ciudad</option>
                    <?php 
                    if($result->num_rows > 0){ 
                        while($row = $result->fetch_assoc()){  
                            echo '<option value="'.$row['id_ciudad'].'">'.$row['nombre_ciudad'].'</option>'; 
                        } 
                    }else{ 
                        echo '<option value="">Ciudad no disponible</option>'; 
                    } 
                    ?>
                    </select>

                        <select class="form-control" title="Seleccione Su Sector" id="sector" required="required" name="sector">
                        <option value="">Seleccione una ciudad primero</option>
                        
                        </select>
                        <select class="form-control" title="Seleccione Su Calle" id="calle" required="required" name="calle">
                        <option value="">Seleccione un sector primero</option>
                        </select>
                        <div class="form-control">
                        <label for="inputName">Numero de Casa</label>
                        <input type="number" class="form-control" name="numcasa" id="numcasa" value="<?php echo $row['numcasa_empleado']; ?>" required="required" placeholder="Ingrese su Numero de Casa"/>
                    </div>
                    </div>
                    
                    
            </div>
            <script>$(document).ready(function(){
    $('#ciudad').on('change', function(){
        var ciudadID = $(this).val();
        var ciudadNombre = $(this).val();
        if(ciudadID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id_ciudad='+ciudadID,
                success:function(html){
                    $('#sector').html(html);
                    $('#calle').html('<option value="">Seleccione un sector primero</option>'); 
                }
            }); 
        }else{
            $('#sector').html('<option value="">Seleccione una ciudad primero</option>');
            $('#calle').html('<option value="">Seleccione un sector primero</option>'); 
        }
    });
    
    $('#sector').on('change', function(){
        var sectorID = $(this).val();
        if(sectorID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id_sector='+sectorID,
                success:function(html){
                    $('#calle').html(html);
                }
            }); 
        }else{
            $('#calle').html('<option value="">Seleccione un sector primero</option>'); 
        }
    });
});</script>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
			</form>
            </div>

        </div>
    </div>
</div>


