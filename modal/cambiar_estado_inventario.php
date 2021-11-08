<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <center><h4 class="modal-title" id="myModalLabel">Cambiar estado de producto</h4></center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Cambiar el estado del registro?</p>
				<h2 style=”color: #000000;” class="text-center" ><?php echo $row['nombre_producto']; ?></h2>
                <h2 style=”color: #000000;” class="text-center" > Cantidad</h2>
                <h2 style=”color: #000000;” class="text-center" ><?php echo $row['stock']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="modal/cambiar_estado_inventariobd.php?id=<?php echo $row['id_producto']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>