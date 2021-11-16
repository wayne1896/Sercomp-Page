<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Registro de Cargo</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php\cargo_backend\registrocargo.php">
            <h1>Datos Básicos del Cargo</h1>

                    
                    <div class="form-group">
                        <label for="inputPassword">Nombre del Articulo:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del Cargo"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputfistname">Sueldo RD$:</label>
                        <input type="number" class="form-control" name="sueldo" id="sueldo" placeholder="Ingrese el sueldo"/>
                    </div>
                    <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
                               </div>
                                
            </form>
                            
                               </div>
         </div>

        </div>
    </div>
</div>