<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Registro de Inventario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php\registrocliente.php">
            <h1>Datos Básicos del Inventario</h1>

                    <div class="form-group">
                        <label for="inputpassword">ID Articulo:</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la Descripción del problema"/>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Nombre del Articulo:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del Artículo"/>
                    </div>

                    <div class="form-group">
                        <label for="inputfistname">Cantidad:</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese la Cantidad"/>
                    </div>
                    <div class="form-group">
                        <label for="inputfistname">Precio RD$:</label>
                        <input type="number" class="form-control" name="costo" id="costo" placeholder="Ingrese el valor del Artículo"/>
                    </div>
                                
            </form>
                             <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
                               </div>
                               </div>
         </div>

        </div>
    </div>
</div>