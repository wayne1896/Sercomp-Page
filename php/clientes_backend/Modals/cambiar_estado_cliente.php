<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id_cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <center><h4 class="modal-title" id="myModalLabel">Borrar Cliente</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Esta seguro de Borrar el registro?</p>
				<h2 style=”color: #000000;” class="text-center" ><?php echo $row['nombre_cliente'].' '.$row['apellido_cliente']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="php/clientes_backend/cambiar_estado_clientebd.php?id=<?php echo $row['id_cliente']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>