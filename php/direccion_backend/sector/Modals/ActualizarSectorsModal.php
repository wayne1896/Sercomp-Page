<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id_sector']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Editar Sector</h4></center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php/direccion_backend/sector/registroSector.php?id=<?php echo $row['id_sector']; ?>">
          
                    <h1>Datos Sector</h1> 
                    <div class="form-group">
                        <label for="inputfistname"">Nombre Sector</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"  value="<?php echo $row['nombre_sector']; ?>" required="required" placeholder="Ingrese nombre del Sector"/>
                    </div>
                   
                   
                    <div class="form-group">
                        <label for="inputPassword" hidden='True'>Cod:</label>
                        <input type="text" class="form-control" name="idciudad" id="idciudad"  hidden='True' value="<?php echo $id; ?>" placeholder=""/>
                    </div>
                    
            </div>
          
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
			</form>
            </div>

        </div>
    </div>
</div>


