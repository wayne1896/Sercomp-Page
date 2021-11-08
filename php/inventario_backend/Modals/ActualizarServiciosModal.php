<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Editar Producto</h4></center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
        <div class="modal-body">
			<div class="container-fluid">
                <form method="POST" action="php\inventario_backend\registroinventario.php?id=<?php echo $row['id_producto']; ?>">
    

                    <h1>Datos Productos</h1> 
                    <div class="form-group">
                        <label for="inputfistname"">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"  value="<?php echo $row['nombre_producto']; ?>" required="required" placeholder="Ingrese su Nombre"/>
                    </div>
                    <div class="form-group">
                        <label for="inputlastname">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion"  value="<?php echo $row['descripcion_producto']; ?>" required="required" placeholder="Ingrese su Apellido"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad"  value="<?php echo $row['cantidad_producto']; ?>" required="required" placeholder="Ingrese su Telefono"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputName">Costo</label>
                        <input type="text" class="form-control" name="costo" id="costo"  value="<?php echo $row['costo_producto']; ?>" required="required" placeholder="Ingrese su Cedula"/>
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


