<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id_nomina']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Editar Cargo</h4></center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
        <div class="modal-body">
			<div class="container-fluid">
                <form method="POST" action="php\cargo_backend\registrocargo.php?id=<?php echo $row['id_nomina']; ?>">
    

                    <h1>Datos Cargo</h1> 
                    <div class="form-group">
                        <label for="inputfistname"">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"  value="<?php echo $row['cargo']; ?>" required="required" placeholder="Ingrese el nombre del cargo"/>
                    </div>
        
                    <div class="form-group">
                        <label for="inputName">Sueldo</label>
                        <input type="text" class="form-control" name="sueldo" id="sueldo"  value="<?php echo $row['pago']; ?>" required="required" placeholder="Ingrese el sueldo"/>
                    </div>
                    <div class="modal-footer">                
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
                    </div>
                </form>
            </div>
         </div>
        </div>
        </div>
        </div>


