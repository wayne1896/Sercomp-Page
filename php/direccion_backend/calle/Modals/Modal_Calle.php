<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Registro de la Calle</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="php\direccion_backend\calle\registroCalle.php">
            <h1>Datos de la Calle</h1>
         

                    <div class="form-group">
                        <label for="inputPassword">Nombre de la Calle:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre de la Calle"/>
                    </div>

                     <div class="form-group">
                        <label for="inputPassword" hidden='True'>Cod:</label>
                        <input type="text" class="form-control" name="idsector" id="idsector"  hidden='True' value="<?php echo $id; ?>" placeholder=""/>
                    </div>

                                
            
                             <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                    <button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
                               </div>
                               </div>
                               </form>
         </div>

        </div>
    </div>
</div>