<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Registro de Servicios</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php\servicios_backend\registroServicios.php">
            <h1>Datos Básicos del Servicios</h1>

                   
                    <div class="form-group">
                        <label for="inputPassword">Nombre del Servicios:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del Artículo"/>
                    </div>

                    <div class="form-group">
                        <label for="inputfistname">Descipción:</label>
                        <input type="Text" class="form-control" name="Descripcion" id="Descripcion" placeholder="Ingrese la Descripcion"/>
                    </div>
                    <div class="form-group">
                        <label for="inputfistname">Precio RD$:</label>
                        <input type="number" class="form-control" name="costo" id="costo" placeholder="Ingrese el valor del Servicio"/>
                    </div>
                                
            
                             <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
                               </div>
                               </div>
         </div>
        </form>
        </div>
    </div>
</div>