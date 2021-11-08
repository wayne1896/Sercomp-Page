<!-- Ventana Editar Registros CRUD -->

<div class="modal fade" id="asig_<?php echo $row['id_orden']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Asignar Orden</h4></center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php\orden_backend\registroorden.php?id=<?php echo $row['id_orden']; ?>">
            <h1>Asignar A</h1>
            <div class="group-form">
            <label for="inputName">Empleado:</label>
                       <select class="form-control" title="Seleccione el Empleado" id="empleado" name="empleado">
                                    <option value="">Seleccione el Empleado</option>
                                    <?php 
                                     $query3 = "SELECT * FROM empleado ORDER BY nombre_empleado ASC"; 
                                     $result4 = $db->query($query3); 
                                     
                       if($result4->num_rows > 0){ 
                           while($row3 = $result4->fetch_assoc()){  
                               echo '<option value="'.$row3['id_empleado'].'">'.$row3['nombre_empleado'].' '.$row3['apellido_empleado'].'</option>'; 
                           } 
                       }
                       ?>
                       </select>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="asignar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Asignar</a>
			</div>
            </form>
            </div>
            </div>
        
        </div>
    </div>
</div>


