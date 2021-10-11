<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id_servicio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Editar Servicios</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php\servicios_backend\registroServicios.php?id=<?php echo $row['id_servicio']; ?>">
          
        
          
                    <h1>Datos Servicio</h1> 
                    <div class="form-group">
                        <label for="inputfistname"">Nombre Servicio</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"  value="<?php echo $row['nombre_servicio']; ?>" required="required" placeholder="Ingrese Nombre de la Ciudad"/>
                    </div>
           
                   
                   
                 
          
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
			</form>
            </div>

        </div>
    </div>
</div>


