<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id_orden']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <center><h4 class="modal-title" id="myModalLabel">Actualizar proceso de la orden</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">	
            	<h5 style=”color: #000000;” class="text-center">Proceso actual: <?php echo $row['proceso_orden']; ?></h5>
                <label for="">Descripcion</label>
				<h6 style=”color: #000000;” class="text-center" ><?php echo $row['descripcion_orden']; ?></h6>
                <label for="">Tipo de servicio</label>
                <h6 style=”color: #000000;” class="text-center" ><?php echo $row['nombre_servicio']; ?></h6>
                <label for="">Cliente</label>
                <h6 style=”color: #000000;” class="text-center" ><?php echo $row['nombre_cliente']." ".$row['apellido_cliente']; ?></h6>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="php\orden_backend\cambiar_estado_ordenbd.php?id=<?php echo $row['id_orden']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>