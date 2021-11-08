<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id_catservicio']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <center><h4 class="modal-title" id="myModalLabel">Borrar Subservicio</h4></center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <form method="POST" action="php\servicios_backend\Subservicio\cambiar_estado_Subserbd.php?id=<?php echo $row['id_catservicio']; ?>">
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
				<h2 style=”color: #000000;” class="text-center" ><?php echo $row['nombre_catservicio']; ?></h2>
			</div>
            <div class="form-group">
                        <label for="inputPassword" hidden='True'>Cod:</label>
                        <input type="text" class="form-control" name="idservicio" id="idservicio"  hidden='True' value="<?php echo $id; ?>" placeholder=""/>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit"  class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>
            </form>

        </div>
    </div>
</div>