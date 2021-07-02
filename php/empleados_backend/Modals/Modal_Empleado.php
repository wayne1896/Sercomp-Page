<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Registro Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php/empleados_backend/registroempleado.php">
                 <div class="form-group">
                        <h1>Datos Básicos</h1>
                        <label for="inputEmail">E-Mail:</label>
                        <input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese su email"/>
                    </div>
                    <div class="form-group">
                        <label for="inputpassword">Contraseña:</label>
                        <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingrese su Contraseña"/>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Repetir contraseña:</label>
                        <input type="password" class="form-control" name="clave" id="clave" placeholder="Re-ingrese su Contraseña"/>
                    </div>
                    
                    <h1>Datos Personales</h1> 
                    <div class="form-group">
                        <label for="inputfistname">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su Nombre"/>
                    </div>
                    <div class="form-group">
                        <label for="inputlastname">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su Apellido"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Telefono:</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese su Telefono"/>
                    </div>
                    
                  
                    <div class="form-group">
                        <label for="inputName">Cedula</label>
                        <input type="number" class="form-control" name="cedula" id="cedula" placeholder="Ingrese su Cedula"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" placeholder="Fecha de Nacimiento"/>
                    </div>
                   
                        <h1>Dirección</h1>
                        <label for="inputName">Ciudad:</label>
                        <select class="controls"  title="Seleccione Su Ciudad" id="ciudad" name="ciudad">
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

                            <label for="inputName">Sector:</label>
                            <select class="form-group" title="Seleccione Su Sector" id="sector" name="sector">
                                  <option value="">Seleccione una ciudad primero</option>
                           </select>

                            <label for="inputName">Calle:</label>
                            <select class="controls" title="Seleccione Su Calle" id="calle" name="calle">
                                <option value="">Seleccione un sector primero</option>
                            </select>

                            <div class="form-group">
                                <label for="inputName">Numero de Casa:</label>
                                <input type="number" class="form-control" name="numcasa" id="numcasa" placeholder="Ingrese su Numero de Casa"/>
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
                                
            </form>
                             <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
                               </div>
         </div>

        </div>
    </div>
</div>