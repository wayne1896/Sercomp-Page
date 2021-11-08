<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id_servicio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Editar Subservicio</h4></center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php\servicios_backend\Subservicio\registroSubservicio.php?id=<?php echo $row['id_catservicio']; ?>">
            <h1>Datos Básicos del Servicio</h1>
         

                    <div class="form-group">
                        <label for="inputPassword">Nombre del Sub-Servicio:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $row['nombre_catservicio']; ?>" placeholder="Ingrese el nombre del sub servicio"/>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword">Descripcion del Sub-Servicio:</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion"  value="<?php echo $row['descripcion_catservicio']; ?>"  placeholder="Ingrese la descripcion del sub servicio"/>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword">Precio del Sub-Servicio:</label>
                        <input type="text" class="form-control" name="precio" id="precio"  value="<?php echo $row['precio_catservicio']; ?>"  placeholder="Ingrese el precio del sub servicio"/>
                    </div>

                     <div class="form-group">
                        <label for="inputPassword" hidden='True'>Cod:</label>
                        <input type="text" class="form-control" name="idservicio" id="idservicio"  hidden='True' value="<?php echo $id; ?>" placeholder=""/>
                    </div>

                                
          
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
			</form>
            </div>

        </div>
    </div>
</div>


