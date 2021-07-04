<!-- Ventana Editar Registros CRUD -->

<div class="modal fade" id="edit_<?php echo $row['id_orden']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Editar Orden</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
			<div class="container-fluid">
            <form method="POST" action="php\orden_backend\registroorden.php?id=<?php echo $row['id_orden']; ?>">
            
            <h1>Datos Básicos de la Orden</h1>
                    
                    <div class="form-group">
                                   <a href="#" data-toggle="modal" data-target="#extraLargeModal"><FONT SIZE=5>Cargar Ubicacion por GPS </font></a>
                           
                              </div>
                       <label for="inputName">Servicios:</label>
                       <select class="form-group" title="Seleccione el servicio a ofrecer" id="servicio" name="servicio">
                                    <option value="">Seleccione el Servicio</option>
                                    <?php 
                       if($result2->num_rows > 0){ 
                           while($row1 = $result2->fetch_assoc()){  
                               echo '<option value="'.$row1['id_servicio'].'">'.$row1['nombre_servicio'].'</option>'; 
                           } 
                       }
                       ?>
                       </select>
                       <label for="inputfistname">Ingrese el detalle del problema:</label>
                       <textarea class="form-control" name="descripcion" id="descripcion"  rows="2"><?php echo $row['descripcion_orden']; ?></textarea>
                       <div class="form-group">
                           <label for="inputPassword">Nombre del Cliente:</label>
                           <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $row['nombre_cliente']; ?>" placeholder="Ingrese el nombre del Cliente"/>
                       </div>
                       <div class="form-group">
                           <label for="inputfistname">Teléfono:</label>
                           <input type="number" class="form-control" name="text" id="text"  value="<?php echo $row['telefono_cliente']; ?>" placeholder="Ingrese el Teléfono del Cliente"/>
                       </div>
                       <div class="form-group">
                        <label for="inputName">Fecha de Orden</label>
                        <input type="date" class="form-control" name="fechaorden" id="fechaorden" value="<?php echo $row['fecha_orden']; ?>"  value="<?php echo $row['fechanacimiento_cliente']; ?>" required="required" placeholder="Fecha de Nacimiento"/>
                    </div>
                       <label for="inputName">Ciudad:</label>
                           <select class="controls"  title="Seleccione Su Ciudad" id="ciudad" name="ciudad">
                               <option value="">Seleccione Su Ciudad</option>
                                   <?php 
                                   if($result3->num_rows > 0){ 
                                       while($row2 = $result3->fetch_assoc()){  
                                           echo '<option value="'.$row2['id_ciudad'].'">'.$row2['nombre_ciudad'].'</option>'; 
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
                           <div class="form-group">
                           <input type="number" class="form-control" name="lat" id="lat"   value="<?php echo $row['lat']; ?>"" required="required" />
                           <input type="number" class="form-control" name="long" id="long"   value="<?php echo $row['lon']; ?>" required="required" />
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
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
			</div>
            </form>
            </div>
            </div>
        
        </div>
    </div>
</div>


